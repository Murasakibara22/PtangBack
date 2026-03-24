<div class="nav-header">
    <a href="/" class="brand-logo">
        <img class="logo-abbr" src="{{ asset('Logodb.svg') }}" alt="">
    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </div>
</div>


<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">

                {{-- Barre de recherche --}}
                <div class="header-left">
                    <div class="dashboard_bar">
                        <div class="input-group search-area d-lg-inline-flex d-none">
                            <div class="input-group-append">
                                <button class="input-group-text search_icon">
                                    <i class="flaticon-381-search-2"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control"
                                   placeholder="{{ __('app.header_search_ph') }}">
                        </div>
                    </div>
                </div>

                {{-- Droite : profil utilisateur --}}
                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown header-profile">

                        <a class="nav-link" href="javascript:void(0)"
                           role="button" data-bs-toggle="dropdown">
                            <div class="header-info">
                                {{-- Bienvenue --}}
                                <span class="text-black">
                                    {{ __('app.header_welcome') }}
                                    <strong> {{ auth()->user()->nom }} </strong>
                                </span>
                                <p class="fs-12 mb-0">
                                    {{ auth()->user()->nom . ' ' . auth()->user()->prenom }}
                                </p>
                            </div>
                            {{-- Photo --}}
                            @if(auth()->user()->photo)
                                <img src="{{ asset('images/User/' . auth()->user()->photo) }}" width="20" alt="">
                            @else
                                <img src="{{ asset('assets/images/card.png') }}" width="20" alt="">
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">

                            {{-- Profil --}}
                            <a href="{{ route('dashboard.profile') }}" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg"
                                     class="text-primary" width="18" height="18"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                                <span class="ms-2">{{ __('app.header_profile') }}</span>
                            </a>

                            {{-- Déconnexion --}}
                            <a href="/deconnexion" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg"
                                     class="text-danger" width="18" height="18"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                    <polyline points="16 17 21 12 16 7"/>
                                    <line x1="21" y1="12" x2="9" y2="12"/>
                                </svg>
                                <span class="ms-2">{{ __('app.header_logout') }}</span>
                            </a>

                        </div>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
</div>
