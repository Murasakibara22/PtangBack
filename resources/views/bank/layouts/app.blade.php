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
	<title>Deutsh Bank - Mon Compte </title>
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
     BOUTON FLOTTANT — Service & Assistance email
     Présent sur toutes les pages via app.blade.php
     ============================================================ -->
<style>
  /* ── Bouton rond flottant ── */
  #float-support-btn {
    position: fixed;
    bottom: 32px;
    right: 32px;
    z-index: 9999;
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: #0066b2;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 20px rgba(0,102,178,.5);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background .2s, transform .2s, box-shadow .2s;
    outline: none;
  }
  #float-support-btn:hover {
    background: #00519e;
    transform: scale(1.08);
    box-shadow: 0 6px 26px rgba(0,102,178,.6);
  }
  #float-support-btn.open {
    background: #1a2c6b;
  }

  /* Icônes : chat visible au départ, croix visible quand ouvert */
  #float-support-btn .fsb-icon-chat,
  #float-support-btn .fsb-icon-close {
    position: absolute;
    transition: opacity .2s, transform .2s;
  }
  #float-support-btn .fsb-icon-close {
    opacity: 0;
    transform: rotate(-45deg) scale(.6);
  }
  #float-support-btn.open .fsb-icon-chat {
    opacity: 0;
    transform: rotate(45deg) scale(.6);
  }
  #float-support-btn.open .fsb-icon-close {
    opacity: 1;
    transform: rotate(0deg) scale(1);
  }

  /* Badge point rouge pulsé */
  #float-support-btn::after {
    content: '';
    position: absolute;
    top: 5px;
    right: 5px;
    width: 12px;
    height: 12px;
    background: #e3001b;
    border-radius: 50%;
    border: 2px solid #fff;
    animation: fsb-pulse 2.2s ease infinite;
  }
  #float-support-btn.open::after { display: none; }

  @keyframes fsb-pulse {
    0%,100% { transform: scale(1); opacity: 1; }
    55%      { transform: scale(1.4); opacity: .65; }
  }

  /* ── Popup ── */
  #float-support-popup {
    position: fixed;
    bottom: 102px;
    right: 32px;
    z-index: 9998;
    width: 300px;
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 10px 44px rgba(0,0,0,.18);
    overflow: hidden;
    /* État fermé */
    opacity: 0;
    transform: translateY(18px) scale(.94);
    transform-origin: bottom right;
    pointer-events: none;
    transition: opacity .25s ease, transform .25s ease;
  }
  #float-support-popup.visible {
    opacity: 1;
    transform: translateY(0) scale(1);
    pointer-events: all;
  }

  /* Header bleu */
  .fsp-header {
    background: linear-gradient(135deg, #0066b2 0%, #1a4f8a 100%);
    padding: 16px 18px 14px;
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .fsp-avatar {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: rgba(255,255,255,.15);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .fsp-header-text h4 {
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    margin: 0 0 3px;
    font-family: Arial, sans-serif;
  }
  .fsp-header-text p {
    color: rgba(255,255,255,.75);
    font-size: 12px;
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    align-items: center;
    gap: 5px;
  }
  .fsp-dot-online {
    display: inline-block;
    width: 8px;
    height: 8px;
    background: #4cde80;
    border-radius: 50%;
    animation: fsb-pulse 2.2s ease infinite;
    flex-shrink: 0;
  }

  /* Body */
  .fsp-body {
    padding: 16px 18px 8px;
    font-family: Arial, sans-serif;
  }
  .fsp-label {
    font-size: 10.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .9px;
    color: #999;
    margin-bottom: 10px;
  }

  /* Ligne email */
  .fsp-email-row {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 11px 13px;
    border-radius: 9px;
    background: #f4f8fc;
    border: 1px solid #d0e4f0;
  }
  .fsp-email-row svg { flex-shrink: 0; }
  .fsp-email-info { flex: 1; min-width: 0; }
  .fsp-email-info span {
    display: block;
    font-size: 10.5px;
    color: #999;
    margin-bottom: 3px;
  }
  /* Email en surbrillance dégradé */
  .fsp-email-link {
    display: block;
    font-size: 12.5px;
    font-weight: 700;
    text-decoration: none;
    word-break: break-all;
    background: linear-gradient(90deg, #0066b2, #1a90d8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1.3;
  }
  .fsp-email-link:hover { opacity: .8; }

  /* Bouton copier */
  .fsp-copy-btn {
    flex-shrink: 0;
    background: #fff;
    border: 1px solid #c8ddf0;
    border-radius: 6px;
    padding: 5px 9px;
    font-size: 11px;
    color: #0066b2;
    cursor: pointer;
    font-family: Arial, sans-serif;
    transition: background .15s, color .15s, border-color .15s;
    white-space: nowrap;
  }
  .fsp-copy-btn:hover   { background: #e8f0f8; }
  .fsp-copy-btn.copied  { color: #1a8a3a; border-color: #a8ddb8; background: #f0fff5; }

  /* Footer */
  .fsp-footer {
    padding: 10px 18px 16px;
    font-family: Arial, sans-serif;
  }
  .fsp-cta {
    display: block;
    width: 100%;
    background: #0066b2;
    color: #fff !important;
    border: none;
    border-radius: 8px;
    padding: 11px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    text-align: center;
    text-decoration: none !important;
    transition: background .15s;
    font-family: Arial, sans-serif;
  }
  .fsp-cta:hover { background: #00519e; }
  .fsp-note {
    text-align: center;
    font-size: 11px;
    color: #bbb;
    margin-top: 9px;
    font-family: Arial, sans-serif;
  }
</style>

<!-- Bouton -->
<button id="float-support-btn" aria-label="Service et Assistance" title="Service &amp; Assistance">
  <svg class="fsb-icon-chat" width="24" height="24" viewBox="0 0 24 24" fill="none">
    <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"
          stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    <circle cx="9"  cy="11" r="1.2" fill="#fff"/>
    <circle cx="12" cy="11" r="1.2" fill="#fff"/>
    <circle cx="15" cy="11" r="1.2" fill="#fff"/>
  </svg>
  <svg class="fsb-icon-close" width="22" height="22" viewBox="0 0 22 22" fill="none">
    <line x1="4" y1="4" x2="18" y2="18" stroke="#fff" stroke-width="2.3" stroke-linecap="round"/>
    <line x1="18" y1="4" x2="4" y2="18" stroke="#fff" stroke-width="2.3" stroke-linecap="round"/>
  </svg>
</button>

<!-- Popup -->
<div id="float-support-popup" role="dialog" aria-label="Service et Assistance">

  <div class="fsp-header">
    <div class="fsp-avatar">
      <svg width="22" height="22" viewBox="0 0 22 22" fill="none">
        <circle cx="11" cy="8" r="4" stroke="#fff" stroke-width="1.8"/>
        <path d="M3 20c0-4 3.6-7 8-7s8 3 8 7" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/>
      </svg>
    </div>
    <div class="fsp-header-text">
      <h4>Support Deutsche Bank</h4>
      <p><span class="fsp-dot-online"></span> Service en ligne</p>
    </div>
  </div>

  <div class="fsp-body">
    <p class="fsp-label">Services email — Assistance</p>
    <div class="fsp-email-row">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
        <rect x="2" y="4" width="16" height="12" rx="2" stroke="#0066b2" stroke-width="1.5"/>
        <path d="M2 7l8 5 8-5" stroke="#0066b2" stroke-width="1.5" stroke-linecap="round"/>
      </svg>
      <div class="fsp-email-info">
        <span>Contactez-nous</span>
        <a class="fsp-email-link" href="mailto:joackimcoulibaly@gmail.com">
          joackimcoulibaly@gmail.com
        </a>
      </div>
      <button class="fsp-copy-btn" id="fspCopyBtn" type="button">Copier</button>
    </div>
  </div>

  <div class="fsp-footer">
    <a class="fsp-cta" href="mailto:joackimcoulibaly@gmail.com">
      ✉ Envoyer un email
    </a>
    <p class="fsp-note">Réponse sous 24h ouvrées</p>
  </div>

</div>

<script>
(function () {
  var btn     = document.getElementById('float-support-btn');
  var popup   = document.getElementById('float-support-popup');
  var copyBtn = document.getElementById('fspCopyBtn');
  var email   = 'joackimcoulibaly@gmail.com';
  var isOpen  = false;

  function openPopup()  { isOpen = true;  btn.classList.add('open');    popup.classList.add('visible'); }
  function closePopup() { isOpen = false; btn.classList.remove('open'); popup.classList.remove('visible'); }

  btn.addEventListener('click', function (e) {
    e.stopPropagation();
    isOpen ? closePopup() : openPopup();
  });

  /* Clic en dehors = fermer */
  document.addEventListener('click', function (e) {
    if (isOpen && !popup.contains(e.target) && !btn.contains(e.target)) {
      closePopup();
    }
  });

  /* Échap = fermer */
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && isOpen) closePopup();
  });

  /* Copier email */
  copyBtn.addEventListener('click', function () {
    var done = function () {
      copyBtn.textContent = '✓ Copié';
      copyBtn.classList.add('copied');
      setTimeout(function () {
        copyBtn.textContent = 'Copier';
        copyBtn.classList.remove('copied');
      }, 2200);
    };
    if (navigator.clipboard) {
      navigator.clipboard.writeText(email).then(done);
    } else {
      var ta = document.createElement('textarea');
      ta.value = email;
      ta.style.position = 'fixed';
      ta.style.opacity  = '0';
      document.body.appendChild(ta);
      ta.focus(); ta.select();
      document.execCommand('copy');
      document.body.removeChild(ta);
      done();
    }
  });
})();
</script>
<!--**********************************
    Main wrapper end
***********************************-->

</body>
</html>