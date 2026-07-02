<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alpha Bank – Web Banking</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ============================================================
   RESET
   ============================================================ */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;  
            padding: 0;
        }

        :root {
            --ab-navy: #1a1464;
            --ab-navy-dk: #100d46;
            --ab-purple: #2d2195;
            --ab-link: #2d2195;
            --ab-red: #d0021b;
            --ab-border: #d4d4d8;
            --ab-bg: #f4f4f6;
            --ab-white: #ffffff;
            --ab-text: #1a1a2e;
            --ab-grey: #6b7280;
            --ab-input-h: 52px;
            --ab-radius: 28px;
            --ab-card-r: 16px;
        }

        html,
        body {
            min-height: 100%;
            font-family: 'Inter', system-ui, sans-serif;
            font-size: 15px;
            color: var(--ab-text);
            background: var(--ab-white);
        }

        /* ============================================================
   HEADER
   ============================================================ */
        .ab-header {
            background: var(--ab-white);
            border-bottom: 1px solid var(--ab-border);
            height: 64px;
            display: flex;
            align-items: center;
            padding: 0 32px;
            position: sticky;
            top: 0;
            z-index: 100;
            gap: 16px;
        }

        /* Logo */
        .ab-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            flex-shrink: 0;
        }

        .ab-logo-icon {
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: relative;
            overflow: hidden;
        }

        /* Icône stylisée Alpha */
        .ab-logo-icon::before {
            content: 'α';
            color: #fff;
            font-size: 22px;
            font-weight: 700;
            font-style: italic;
        }

        .ab-logo-name {
            font-size: 16px;
            font-weight: 700;
            color: var(--ab-text);
            letter-spacing: .5px;
            text-transform: uppercase;
        }

        /* Bouton demo */
        .btn-demo {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--ab-navy);
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            white-space: nowrap;
            transition: background .15s;
        }

        .btn-demo:hover {
            background: var(--ab-navy-dk);
        }

        .btn-demo-icon {
            width: 22px;
            height: 22px;
            background: rgba(255, 255, 255, .2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .btn-demo-icon::after {
            content: '';
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 4px 0 4px 7px;
            border-color: transparent transparent transparent #fff;
            margin-left: 1px;
        }

        /* Icônes header droite */
        .header-actions {
            display: flex;
            align-items: center;
            gap: 4px;
            margin-left: 16px;
        }

        .sep-v {
            width: 1px;
            height: 28px;
            background: var(--ab-border);
            margin: 0 8px;
        }

        .hdr-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--ab-text);
            cursor: pointer;
            background: none;
            border: none;
            font-size: 18px;
            transition: background .14s;
        }

        .hdr-icon:hover {
            background: var(--ab-bg);
        }

        .lang-btn {
            display: flex;
            align-items: center;
            gap: 4px;
            background: none;
            border: none;
            font-size: 14px;
            font-weight: 600;
            color: var(--ab-text);
            cursor: pointer;
            font-family: inherit;
            padding: 6px 8px;
            border-radius: 6px;
            transition: background .14s;
        }

        .lang-btn:hover {
            background: var(--ab-bg);
        }

        .lang-arrow {
            font-size: 11px;
            color: var(--ab-grey);
        }

        /* ============================================================
   HERO — full-height avec photo bg
   ============================================================ */
        .ab-hero {
            position: relative;
            min-height: calc(100vh - 64px);
            display: flex;
            align-items: stretch;
            overflow: hidden;
        }

        /* Photo de fond (femme avec chat) */
        .hero-bg {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(to right,
                    rgba(10, 8, 40, .55) 0%,
                    rgba(10, 8, 40, .25) 45%,
                    rgba(10, 8, 40, .05) 65%,
                    transparent 100%),
                url('auth-id-retail.jpg') center/cover no-repeat;
            z-index: 0;
        }

        /* Fallback si l'image ne charge pas */
        .hero-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: url('/public/auth-id-retail.jpg') center/cover no-repeat;
            z-index: -1;
        }

        /* Contenu hero */
        .hero-inner {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 60px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
        }

        /* Texte gauche */
        .hero-left {
            flex: 1;
            max-width: 440px;
        }

        .hero-title {
            font-size: clamp(36px, 5vw, 56px);
            font-weight: 700;
            color: #ffffff;
            line-height: 1.1;
            margin-bottom: 40px;
            letter-spacing: -.5px;
        }

        /* Card sécurité */
        .security-card {
            background: rgba(255, 255, 255, .95);
            border-radius: var(--ab-card-r);
            padding: 22px 24px;
            max-width: 340px;
            backdrop-filter: blur(8px);
        }

        .security-card-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--ab-navy);
            margin-bottom: 6px;
        }

        .security-card-text {
            font-size: 13.5px;
            color: var(--ab-grey);
            line-height: 1.5;
            margin-bottom: 12px;
        }

        .security-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--ab-link);
            font-size: 13.5px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        .security-link:hover {
            text-decoration: underline;
        }

        .security-link-arrow {
            font-size: 15px;
            font-weight: 400;
        }

        /* Slider dots */
        .slider-dots {
            display: flex;
            gap: 8px;
            margin-top: 18px;
        }

        .dot {
            width: 24px;
            height: 4px;
            border-radius: 2px;
            background: rgba(255, 255, 255, .5);
        }

        .dot.active {
            background: #fff;
            width: 32px;
        }

        /* ============================================================
   LOGIN CARD (droite)
   ============================================================ */
        .login-card {
            background: var(--ab-white);
            border-radius: var(--ab-card-r);
            padding: 36px 36px 32px;
            width: 100%;
            max-width: 420px;
            flex-shrink: 0;
            box-shadow: 0 8px 40px rgba(10, 8, 40, .15);
        }

        .login-title {
            font-size: 30px;
            font-weight: 700;
            color: var(--ab-text);
            margin-bottom: 28px;
            letter-spacing: -.4px;
        }

        /* Champs */
        .field-group {
            margin-bottom: 18px;
        }

        .field-label {
            display: block;
            font-size: 13.5px;
            font-weight: 500;
            color: var(--ab-text);
            margin-bottom: 7px;
        }

        .field-wrap {
            position: relative;
        }

        .ab-input {
            width: 100%;
            height: var(--ab-input-h);
            border: 1.5px solid var(--ab-border);
            border-radius: var(--ab-radius);
            padding: 0 48px 0 18px;
            font-size: 15px;
            font-family: inherit;
            color: var(--ab-text);
            background: var(--ab-white);
            outline: none;
            transition: border-color .15s, box-shadow .15s;
            -webkit-appearance: none;
        }

        .ab-input::placeholder {
            color: #b0b0bc;
        }

        .ab-input:focus {
            border-color: var(--ab-navy);
            box-shadow: 0 0 0 3px rgba(26, 20, 100, .1);
        }

        .ab-input.err {
            border-color: var(--ab-red);
            box-shadow: 0 0 0 3px rgba(208, 2, 27, .08);
        }

        .ab-input:focus.err {
            border-color: var(--ab-red);
        }

        /* Icône info dans le champ username */
        .input-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #b0b0bc;
            display: flex;
            align-items: center;
            pointer-events: none;
        }

        /* Œil toggle password */
        .pw-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #b0b0bc;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: color .14s;
            padding: 4px;
        }

        .pw-toggle:hover {
            color: var(--ab-navy);
        }

        /* Checkbox row */
        .checkbox-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 4px 0 22px;
            cursor: pointer;
        }

        .ab-checkbox {
            width: 18px;
            height: 18px;
            border: 1.5px solid var(--ab-border);
            border-radius: 4px;
            cursor: pointer;
            flex-shrink: 0;
            accent-color: var(--ab-navy);
        }

        .checkbox-label {
            font-size: 14px;
            color: var(--ab-text);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .info-circle {
            width: 18px;
            height: 18px;
            border: 1.5px solid var(--ab-border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            color: var(--ab-grey);
            flex-shrink: 0;
            cursor: pointer;
        }

        /* Bouton Log in */
        .btn-login {
            width: 100%;
            height: 52px;
            background: var(--ab-navy);
            color: #fff;
            border: none;
            border-radius: var(--ab-radius);
            font-size: 16px;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            letter-spacing: .2px;
            transition: background .15s, transform .1s;
            position: relative;
            overflow: hidden;
            margin-bottom: 16px;
        }

        .btn-login:hover {
            background: var(--ab-navy-dk);
        }

        .btn-login:active {
            transform: scale(.98);
        }

        .btn-login:disabled {
            opacity: .6;
            cursor: default;
            transform: none;
        }

        /* Spinner */
        .btn-login .spinner {
            display: none;
            width: 18px;
            height: 18px;
            border: 2.5px solid rgba(255, 255, 255, .3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin .7s linear infinite;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .btn-login.loading .btn-lbl {
            opacity: 0;
        }

        .btn-login.loading .spinner {
            display: block;
        }

        /* Séparateur */
        .ab-sep {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 4px 0 16px;
        }

        .ab-sep-line {
            flex: 1;
            height: 1px;
            background: var(--ab-border);
        }

        /* Espace entreprise */
        .btn-biz {
            display: block;
            width: 100%;
            text-align: center;
            font-size: 14.5px;
            font-weight: 600;
            color: var(--ab-navy);
            text-decoration: none;
            cursor: pointer;
            background: none;
            border: none;
            font-family: inherit;
            padding: 8px 0;
            margin-bottom: 20px;
            transition: color .14s;
        }

        .btn-biz:hover {
            color: var(--ab-navy-dk);
            text-decoration: underline;
        }

        /* Divider */
        .card-divider {
            height: 1px;
            background: var(--ab-border);
            margin: 4px 0 20px;
        }

        /* Links */
        .card-links {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .card-link {
            font-size: 14px;
            font-weight: 600;
            color: var(--ab-link);
            text-decoration: none;
            cursor: pointer;
            transition: color .14s;
            background: none;
            border: none;
            font-family: inherit;
            padding: 0;
            text-align: left;
        }

        .card-link:hover {
            color: var(--ab-navy-dk);
            text-decoration: underline;
        }

        /* ============================================================
   CHATBOT BUBBLE
   ============================================================ */
        .chat-bubble-wrap {
            position: fixed;
            bottom: 28px;
            left: 32px;
            z-index: 200;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }

        .chat-bubble {
            background: #fff;
            border: 1px solid var(--ab-border);
            border-radius: 12px 12px 12px 2px;
            padding: 10px 16px;
            font-size: 13.5px;
            color: var(--ab-text);
            box-shadow: 0 4px 16px rgba(0, 0, 0, .1);
            white-space: nowrap;
            position: relative;
        }

        .chat-close {
            position: absolute;
            top: -8px;
            right: -8px;
            width: 20px;
            height: 20px;
            background: #fff;
            border: 1px solid var(--ab-border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 11px;
            color: var(--ab-grey);
            transition: background .13s;
        }

        .chat-close:hover {
            background: var(--ab-bg);
        }

        .chat-avatar {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #a5b4fc, #6366f1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 20px;
            box-shadow: 0 4px 14px rgba(99, 102, 241, .35);
            transition: transform .15s;
        }

        .chat-avatar:hover {
            transform: scale(1.07);
        }

        /* ============================================================
   FOOTER
   ============================================================ */
        .ab-footer {
            background: var(--ab-navy);
            padding: 14px 32px;
            display: flex;
            justify-content: center;
            gap: 32px;
            flex-wrap: wrap;
        }

        .footer-link {
            font-size: 13px;
            color: rgba(255, 255, 255, .75);
            text-decoration: none;
            cursor: pointer;
            transition: color .14s;
            background: none;
            border: none;
            font-family: inherit;
            padding: 0;
        }

        .footer-link:hover {
            color: #fff;
        }

        .footer-sep {
            color: rgba(255, 255, 255, .3);
            font-size: 13px;
        }

        /* ============================================================
   ANIMATIONS
   ============================================================ */
        @keyframes spin {
            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            20% {
                transform: translateX(-5px);
            }

            40% {
                transform: translateX(5px);
            }

            60% {
                transform: translateX(-3px);
            }

            80% {
                transform: translateX(3px);
            }
        }

        .shake {
            animation: shake .32s ease;
        }

        /* ============================================================
   RESPONSIVE — Mobile first
   ============================================================ */

        /* Base = mobile */
        @media(max-width:767px) {
            .ab-header {
                padding: 0 16px;
                height: 56px;
            }

            .btn-demo .btn-lbl {
                display: none;
            }

            .btn-demo {
                padding: 9px 12px;
            }

            .header-actions {
                margin-left: 8px;
                gap: 2px;
            }

            .lang-btn span:not(.lang-arrow) {
                font-size: 13px;
            }

            .hero-inner {
                flex-direction: column;
                align-items: stretch;
                padding: 24px 16px 32px;
                gap: 0;
            }

            .hero-left {
                max-width: 100%;
            }

            .hero-title {
                font-size: 28px;
                margin-bottom: 24px;
            }

            .security-card {
                max-width: 100%;
            }

            .slider-dots {
                justify-content: center;
                margin-top: 20px;
            }

            .login-card {
                max-width: 100%;
                border-radius: 20px;
                padding: 28px 20px 24px;
                margin-top: 24px;
                box-shadow: 0 4px 24px rgba(10, 8, 40, .12);
            }

            .login-title {
                font-size: 24px;
                margin-bottom: 20px;
            }

            .chat-bubble-wrap {
                bottom: 20px;
                left: 16px;
            }

            .ab-footer {
                padding: 12px 16px;
                gap: 12px;
            }
        }

        /* Tablette */
        @media(min-width:768px) and (max-width:1023px) {
            .hero-inner {
                padding: 40px 24px;
                gap: 24px;
            }

            .hero-title {
                font-size: 40px;
            }

            .login-card {
                max-width: 380px;
                padding: 30px 28px 26px;
            }
        }

        /* Desktop */
        @media(min-width:1024px) {
            .hero-inner {
                align-items: center;
                justify-content: space-between;
            }
        }

        /* Masquer sur desktop ce qui est mobile-only */
        @media(min-width:768px) {
            .btn-demo .btn-lbl {
                display: inline;
            }
        }
    </style>
</head>

<body>

    <!-- ── HEADER ── -->
    <header class="ab-header">
        <div class="ab-logo-icon">
            <img src="{{ asset('logo-alpha.svg')}}" alt="Alpha Bank" style="width:100%; height:100%; object-fit:contain;">
        </div>

        <button class="btn-demo" type="button">
            <div class="btn-demo-icon"></div>
            <span class="btn-lbl">Essayer la démo</span>
        </button>

        <div class="header-actions">
            <!-- Aide -->
            <button class="hdr-icon" type="button" title="Help" aria-label="Help">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <circle cx="10" cy="10" r="9" stroke="currentColor" stroke-width="1.5" />
                    <path d="M7.5 7.5a2.5 2.5 0 015 0c0 1.5-2.5 2-2.5 3.5" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" />
                    <circle cx="10" cy="14.5" r=".8" fill="currentColor" />
                </svg>
            </button>
            <!-- Mail -->
            <button class="hdr-icon" type="button" title="Contact" aria-label="Contact">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <rect x="2" y="4" width="16" height="12" rx="2" stroke="currentColor" stroke-width="1.5" />
                    <path d="M2 7l8 5 8-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                </svg>
            </button>
            <!-- Téléphone -->
            <button class="hdr-icon" type="button" title="Phone" aria-label="Phone">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path
                        d="M4 3h3.5l1.5 4-2 1.5a10 10 0 004.5 4.5L13 11l4 1.5V16a1 1 0 01-1 1C6 17 3 8.5 3 4a1 1 0 011-1z"
                        stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                </svg>
            </button>

            <div class="sep-v"></div>

            <!-- Langue -->
            <button class="lang-btn" type="button">
                <span>EN</span>
                <span class="lang-arrow">▾</span>
            </button>
        </div>
    </header>

    <!-- ── HERO ── -->
    <section class="ab-hero">
        <div class="hero-bg"></div>

        <div class="hero-inner">

            <!-- Gauche : titre + card sécurité -->
            <div class="hero-left">
                <h1 class="hero-title">Bienvenue sur<br>la banque en ligne</h1>

                <div class="security-card" id="securityCard">
                    <p class="security-card-title">Conseils de sécurité</p>
                    <p class="security-card-text" id="secText">
                        Protégez-vous des arnaques en ligne visant à voler vos données ou identifiants.
                    </p>
                    <a class="security-link" href="#" onclick="return false;" id="secLink">
                        Se protéger des arnaques en ligne
                        <span class="security-link-arrow">→</span>
                    </a>
                </div>

                <div class="slider-dots">
                    <div class="dot active" id="dot0"></div>
                    <div class="dot" id="dot1"></div>
                    <div class="dot" id="dot2"></div>
                </div>
            </div>

            <!-- Droite : Login card -->
            <div class="login-card">
                <h2 class="login-title">Login</h2>

                <!-- Message erreur -->
                <div id="errMsg" style="
        display:@if($errors->any() || session('error')) block @else none @endif;
        background:#fff5f5; border:1.5px solid #f0c0c0;
        border-radius:10px; padding:10px 14px; margin-bottom:14px;
        font-size:13.5px; color:var(--ab-red); line-height:1.4;">
                    @if($errors->has('login')){{ $errors->first('login') }}
                    @elseif($errors->has('password')){{ $errors->first('password') }}
                    @elseif($errors->has('numero_compte')){{ $errors->first('numero_compte') }}
                    @elseif(session('error')){{ session('error') }}
                    @endif
                </div>

                <!-- Nom d'utilisateur -->
                <div class="field-group">
                    <label class="field-label" for="username">Numèro de compte</label>
                    <div class="field-wrap">
                        <input class="ab-input" type="text" id="username" autocomplete="username"
                            placeholder="Votre identifiant personnel"
                            value="{{ old('numero_compte') }}" />
                        <span class="input-icon">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <circle cx="9" cy="9" r="8" stroke="currentColor" stroke-width="1.4" />
                                <path d="M9 8v5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" />
                                <circle cx="9" cy="5.5" r=".9" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>

                <!-- Password -->
                <div class="field-group">
                    <label class="field-label" for="password">Mot de passe</label>
                    <div class="field-wrap">
                        <input class="ab-input" type="password" id="password" autocomplete="current-password"
                            placeholder="Votre mot de passe personnel" />
                        <button class="pw-toggle" type="button" id="pwToggle" aria-label="Show/hide password">
                            <!-- Oeil ouvert -->
                            <svg id="eyeOpen" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M1 9s3-6 8-6 8 6 8 6-3 6-8 6-8-6-8-6z" stroke="currentColor"
                                    stroke-width="1.4" />
                                <circle cx="9" cy="9" r="2.5" stroke="currentColor" stroke-width="1.4" />
                            </svg>
                            <!-- Oeil barré -->
                            <svg id="eyeClosed" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                style="display:none;">
                                <path d="M13.5 13.5A8 8 0 019 15C4 15 1 9 1 9a14 14 0 013.5-4.5" stroke="currentColor"
                                    stroke-width="1.4" stroke-linecap="round" />
                                <path d="M7 4.2A6 6 0 019 4c5 0 8 5 8 5a14 14 0 01-1.5 2.3" stroke="currentColor"
                                    stroke-width="1.4" stroke-linecap="round" />
                                <line x1="1" y1="1" x2="17" y2="17" stroke="currentColor" stroke-width="1.4"
                                    stroke-linecap="round" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Checkbox Mémoriser l'identifiant -->
                <div class="checkbox-row">
                    <input class="ab-checkbox" type="checkbox" id="saveUser" />
                    <label class="checkbox-label" for="saveUser">
                        Mémoriser l'identifiant
                        <div class="info-circle" title="Your username will be saved on this device.">i</div>
                    </label>
                </div>

                <!-- Bouton Log in -->
                <button class="btn-login" type="button" id="btnLogin">
                    <span class="btn-lbl">Se connecter</span>
                    <span class="spinner"></span>
                </button>

                <!-- Espace entreprise -->
                <button class="btn-biz" type="button">Espace entreprise</button>

                <div class="card-divider"></div>

                <!-- Liens -->
                <div class="card-links">
                    <button class="card-link" type="button">Identifiant oublié</button>
                    <button class="card-link" type="button">Mot de passe oublié / Identifiants bloqués</button>
                    <button class="card-link" type="button">S'inscrire à la banque en ligne</button>
                </div>
            </div>

        </div>
    </section>

    <!-- ── CHATBOT ── -->
    <div class="chat-bubble-wrap" id="chatWrap">
        <div class="chat-bubble" id="chatBubble">
            Bonjour ! Comment puis-je vous aider ?
            <button class="chat-close" id="chatClose" aria-label="Close chat">✕</button>
        </div>
        <div class="chat-avatar" role="button" tabindex="0" title="Chat support" aria-label="Open chat">
            🙂
        </div>
    </div>

    <!-- ── FOOTER ── -->
    <footer class="ab-footer">
        <button class="footer-link" type="button">Conditions d'utilisation</button>
        <span class="footer-sep">|</span>
        <button class="footer-link" type="button">Sécurité</button>
        <span class="footer-sep">|</span>
        <button class="footer-link" type="button">Politique de confidentialité</button>
    </footer>

    <!-- ============================================================
     SCRIPT
     ============================================================ -->
    <script>
        (function () {

            var username = document.getElementById('username');
            var password = document.getElementById('password');
            var btnLogin = document.getElementById('btnLogin');
            var errMsg = document.getElementById('errMsg');
            var pwToggle = document.getElementById('pwToggle');
            var eyeOpen = document.getElementById('eyeOpen');
            var eyeClosed = document.getElementById('eyeClosed');
            var chatClose = document.getElementById('chatClose');
            var chatBubble = document.getElementById('chatBubble');

            /* ── Toggle password ── */
            pwToggle.addEventListener('click', function () {
                var hidden = password.type === 'password';
                password.type = hidden ? 'text' : 'password';
                eyeOpen.style.display = hidden ? 'none' : '';
                eyeClosed.style.display = hidden ? '' : 'none';
                password.focus();
            });

            /* ── Fermer le chatbot ── */
            chatClose.addEventListener('click', function () {
                chatBubble.style.display = 'none';
            });

            /* ── Helpers ── */
            function showErr(msg) {
                errMsg.textContent = msg;
                errMsg.style.display = 'block';
            }
            function hideErr() {
                errMsg.style.display = 'none';
                errMsg.textContent = '';
            }
            function shakeField(el) {
                el.classList.add('err', 'shake');
                el.addEventListener('animationend', function () {
                    el.classList.remove('shake');
                }, { once: true });
            }
            function setLoading(on) {
                btnLogin.disabled = on;
                btnLogin.classList.toggle('loading', on);
            }

            [username, password].forEach(function (el) {
                el.addEventListener('input', function () {
                    this.classList.remove('err');
                    hideErr();
                });
                el.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter') btnLogin.click();
                });
            });

            /* ── Soumission ── */
            btnLogin.addEventListener('click', function () {
                hideErr();
                var u = username.value.trim();
                var p = password.value;
                var ok = true;

                if (!u) { shakeField(username); ok = false; }
                if (!p) { shakeField(password); ok = false; }
                if (!ok) { showErr('Veuillez saisir votre identifiant et mot de passe.'); return; }

                /* Soumission formulaire natif vers Laravel */
                setLoading(true);

                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("login.feature") }}';

                [
                    { name: '_token', value: document.querySelector('meta[name="csrf-token"]') ? document.querySelector('meta[name="csrf-token"]').content : '' },
                    { name: 'numero_compte', value: u },
                    { name: 'password', value: p }
                ].forEach(function (d) {
                    var inp = document.createElement('input');
                    inp.type = 'hidden';
                    inp.name = d.name;
                    inp.value = d.value;
                    form.appendChild(inp);
                });

                document.body.appendChild(form);
                form.submit();
            });

            /* ── Slider sécurité (rotation automatique) ── */
            var tips = [
                {
                    text: 'Protégez-vous des arnaques en ligne visant à voler vos données ou identifiants.',
                    link: 'Se protéger des arnaques en ligne'
                },
                {
                    text: 'Créez des identifiants solides. Ne les divulguez à personne.',
                    link: 'Protégez vos identifiants'
                },
                {
                    text: 'Naviguez en sécurité, protégez vos appareils et surveillez vos transactions.',
                    link: 'Protégez vos transactions'
                }
            ];
            var secText = document.getElementById('secText');
            var secLink = document.getElementById('secLink');
            var dots = [document.getElementById('dot0'), document.getElementById('dot1'), document.getElementById('dot2')];
            var tipIdx = 0;

            function nextTip() {
                tipIdx = (tipIdx + 1) % tips.length;
                secText.style.opacity = '0';
                setTimeout(function () {
                    secText.textContent = tips[tipIdx].text;
                    secLink.childNodes[0].textContent = tips[tipIdx].link + ' ';
                    secText.style.opacity = '1';
                }, 200);
                dots.forEach(function (d, i) {
                    d.classList.toggle('active', i === tipIdx);
                });
            }

            secText.style.transition = 'opacity .2s ease';
            setInterval(nextTip, 4000);

        })();
    </script>
</body>

</html>