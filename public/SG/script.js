// Attendre que le DOM soit chargé
document.addEventListener("DOMContentLoaded", function () {
  // ==========================================
  // Gestion du formulaire de connexion Laravel
  // ==========================================
  const loginForm = document.getElementById("loginForm");
  const codeClientInput = document.getElementById("codeClient");
  const codeSecretInput = document.getElementById("codeSecret");
  const clearBtn = document.getElementById("clearBtn");
  const clearBtnSecret = document.getElementById("clearBtnSecret");
  const step1 = document.getElementById("step1");
  const step2 = document.getElementById("step2");
  const togglePasswordBtn = document.getElementById("togglePassword");

  let isStep2 = false; // Indicateur d'étape

  // Animation au focus de l'input
  [codeClientInput, codeSecretInput].forEach((input) => {
    if (input) {
      input.addEventListener("focus", function () {
        this.parentElement.style.transform = "scale(1.01)";
        this.parentElement.style.transition = "transform 0.3s ease";
      });

      input.addEventListener("blur", function () {
        this.parentElement.style.transform = "scale(1)";
      });
    }
  });

  // Boutons d'effacement
  if (clearBtn) {
    clearBtn.addEventListener("click", function () {
      codeClientInput.value = "";
      codeClientInput.focus();
    });
  }

  if (clearBtnSecret) {
    clearBtnSecret.addEventListener("click", function () {
      codeSecretInput.value = "";
      codeSecretInput.focus();
    });
  }

  // Toggle password visibility
  if (togglePasswordBtn && codeSecretInput) {
    togglePasswordBtn.addEventListener("click", function () {
      const type =
        codeSecretInput.getAttribute("type") === "password"
          ? "text"
          : "password";
      codeSecretInput.setAttribute("type", type);

      // Changer l'icône
      if (type === "text") {
        this.innerHTML = `
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="eye-icon">
            <path d="M10 4C5 4 2 10 2 10s3 6 8 6 8-6 8-6-3-6-8-6z" stroke="currentColor" stroke-width="1.5"/>
            <circle cx="10" cy="10" r="2" stroke="currentColor" stroke-width="1.5"/>
            <line x1="3" y1="3" x2="17" y2="17" stroke="currentColor" stroke-width="1.5"/>
          </svg>
        `;
      } else {
        this.innerHTML = `
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="eye-icon">
            <path d="M10 4C5 4 2 10 2 10s3 6 8 6 8-6 8-6-3-6-8-6z" stroke="currentColor" stroke-width="1.5"/>
            <circle cx="10" cy="10" r="2" stroke="currentColor" stroke-width="1.5"/>
          </svg>
        `;
      }
    });
  }

  // ==========================================
  // GESTION DES 2 ÉTAPES AVEC SOUMISSION LARAVEL
  // ==========================================

  loginForm.addEventListener("submit", function (e) {
    e.preventDefault();

    if (!isStep2) {
      // ÉTAPE 1 : Validation du code client
      const codeClient = codeClientInput.value.trim();

      if (codeClient.length === 0) {
        showError("Veuillez saisir votre code client");
        return;
      }

      // Passer à l'étape 2
    //   console.log("Passage à l'étape 2");
      step1.classList.add("hidden");
      step2.classList.remove("hidden");
      isStep2 = true;

      // Retirer le required du code client pour l'étape 2
      codeClientInput.removeAttribute("required");

      // Focus sur le champ mot de passe
      setTimeout(() => {
        if (codeSecretInput) {
          codeSecretInput.focus();
        }
      }, 100);

    } else {
      // ÉTAPE 2 : Validation du mot de passe et soumission Laravel
      const codeSecret = codeSecretInput.value.trim();

      if (codeSecret.length === 0) {
        showError("Veuillez saisir votre code secret");
        return;
      }

      // Soumission du formulaire à Laravel
    //   console.log("Soumission du formulaire à Laravel");
      submitFormToLaravel();
    }
  });

  // ==========================================
  // SOUMISSION AJAX À LARAVEL
  // ==========================================
  function submitFormToLaravel() {
    const formData = new FormData(loginForm);
    const submitBtn = loginForm.querySelector('button[type="submit"]');

    // Désactiver le bouton et afficher le loading
    submitBtn.disabled = true;
    const originalText = submitBtn.textContent;
    submitBtn.textContent = "Connexion...";

    fetch(loginForm.action, {
      method: "POST",
      body: formData,
      headers: {
        "X-Requested-With": "XMLHttpRequest",
        "Accept": "application/json",
      },
    })
      .then(response => {
        // console.log("Response status:", response.status);
        // console.log("Response headers:", response.headers.get("content-type"));

        // Vérifier si la réponse est du JSON
        const contentType = response.headers.get("content-type");
        if (!contentType || !contentType.includes("application/json")) {
          throw new Error("La réponse du serveur n'est pas au format JSON. Vérifiez votre controller Laravel.");
        }

        if (!response.ok) {
          return response.json().then(data => {
            throw data;
          }).catch(err => {
            // Si la réponse n'est même pas du JSON valide
            throw { message: "Erreur serveur (Status: " + response.status + ")" };
          });
        }
        return response.json();
      })
      .then(data => {
        // console.log("✅ Succès:", data);

        // Afficher le message de succès
        showSuccess(data.message || "Connexion réussie !");

        // Redirection après 1.5 secondes
        setTimeout(() => {
          if (data.redirect) {
            window.location.href = data.redirect;
          } else if (data.success) {
            // Si pas de redirect mais succès, recharger ou aller au dashboard
            window.location.href = "/mon_compte/dashboard_bank";
          }
        }, 1500);
      })
      .catch(error => {
        // console.error("❌ Erreur complète:", error);

        // Réactiver le bouton
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;

        // Afficher les erreurs
        if (error.errors) {
          // Erreurs de validation Laravel
          Object.keys(error.errors).forEach(key => {
            error.errors[key].forEach(message => {
              showError(message);
            });
          });
        } else if (error.message) {
          // Message d'erreur général
          showError(error.message);
        } else {
          // Erreur par défaut
          showError("Une erreur est survenue lors de la connexion");
        }
      });
  }

  // ==========================================
  // Fonctions de notification (TOASTS)
  // ==========================================
  function showError(message) {
    showNotification(message, "error");
  }

  function showSuccess(message) {
    showNotification(message, "success");
  }

  function showNotification(message, type) {
    // Créer l'élément de notification
    const notification = document.createElement("div");
    notification.className = `notification notification-${type}`;
    notification.textContent = message;

    // Styles de la notification
    Object.assign(notification.style, {
      position: "fixed",
      top: "20px",
      right: "20px",
      padding: "16px 24px",
      borderRadius: "8px",
      backgroundColor: type === "error" ? "#E60028" : "#28A745",
      color: "#FFFFFF",
      fontWeight: "600",
      fontSize: "15px",
      boxShadow: "0 4px 12px rgba(0, 0, 0, 0.15)",
      zIndex: "10000",
      animation: "slideInRight 0.3s ease",
      maxWidth: "350px",
    });

    // Ajouter au body
    document.body.appendChild(notification);

    // Supprimer après 4 secondes
    setTimeout(() => {
      notification.style.animation = "slideOutRight 0.3s ease";
      setTimeout(() => {
        notification.remove();
      }, 300);
    }, 4000);
  }

  // ==========================================
  // Animations CSS
  // ==========================================
  const style = document.createElement("style");
  style.textContent = `
    @keyframes slideInRight {
      from {
        transform: translateX(100%);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    @keyframes slideOutRight {
      from {
        transform: translateX(0);
        opacity: 1;
      }
      to {
        transform: translateX(100%);
        opacity: 0;
      }
    }
  `;
  document.head.appendChild(style);

  // ==========================================
  // Console log
  // ==========================================

});
