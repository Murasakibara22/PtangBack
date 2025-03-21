@extends('bank.layouts.app')

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="form-head mb-4">
            <h2 class="text-primary font-w600 mb-0 text-uppercase">Bienvenue <span class="text-black"> {{ Auth::user()->prenom.', '.Auth::user()->nom }} </span> </h2>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-8">
                        <div class="card-bx stacked">
                            <img src="{{ asset('assets/images/card.png') }}" alt="" class="mw-100">
                            <div class="card-info text-white">
                                <p class="mb-1">Compte Principal</p>
                                <h2 class="fs-36 text-white mb-sm-4 mb-3">724 451,44  €</h2>
                                <div class="d-flex align-items-center justify-content-between mb-sm-5 mb-3">
                                    <img src="{{ asset('assets/images/dual-dot.png') }}" alt="" class="dot-img">
                                    <h4 class="fs-20 text-white mb-0">**** **** **** 576</h4>
                                </div>
                                <div class="d-flex">
                                    <div class="me-5">
                                        <p class="fs-14 mb-1 op6">Rachel Bélanger</p>
                                        <span>08/31</span>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void()"><i
                                    class="fa fa-caret-down" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-4">
                        <div class="card bgl-primary card-body overflow-hidden p-0 d-flex rounded">
                            <div class="p-0 text-center mt-3">
                                <span class="text-black">Limite</span>
                                <h3 class="text-black fs-20 mb-0 font-w600">0,000€</h3>
                                <small>10,000 €</small>
                            </div>
                            <canvas id="lineChart" height="300" class="mt-auto line-chart-demo"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-xl-6 col-sm-6">
                        <div class="card">
                            <div class="card-header flex-wrap border-0 pb-0">
                                <div class="me-3 mb-2">
                                    <p class="fs-14 mb-1">Revenu</p>
                                    <span class="fs-24 text-black font-w600">12 410,00€</span>
                                </div>
                                <span class="fs-12 mb-2">
                                    <svg width="21" height="15" viewBox="0 0 21 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.999939 13.5C1.91791 12.4157 4.89722 9.22772 6.49994 7.5L12.4999 10.5L19.4999 1.5"
                                            stroke="#2BC155" stroke-width="2"></path>
                                        <path
                                            d="M6.49994 7.5C4.89722 9.22772 1.91791 12.4157 0.999939 13.5H19.4999V1.5L12.4999 10.5L6.49994 7.5Z"
                                            fill="url(#paint0_linear)"></path>
                                        <defs>
                                            <linearGradient id="paint0_linear" x1="10.2499" y1="3" x2="10.9999"
                                                y2="13.5" gradientUnits="userSpaceOnUse">
                                                <stop offset="0" stop-color="#2BC155" stop-opacity="0.73">
                                                </stop>
                                                <stop offset="1" stop-color="#2BC155" stop-opacity="0"></stop>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    14% (30 Jours)</span>
                            </div>
                            <div class="card-body p-0">
                                <canvas id="widgetChart1" height="80"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-6">
                        <div class="card">
                            <div class="card-header flex-wrap border-0 pb-0">
                                <div class="me-3 mb-2">
                                    <p class="fs-14 mb-1">Depenses</p>
                                    <span class="fs-24 text-black font-w600">5 600,00€</span>
                                </div>
                                <span class="fs-12 mb-2">
                                    <svg width="21" height="15" viewBox="0 0 21 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.3514 7.5C15.9974 9.37169 19.0572 12.8253 20 14H1V1L8.18919 10.75L14.3514 7.5Z"
                                            fill="url(#paint0_linear1)"></path>
                                        <path d="M19.5 13.5C18.582 12.4157 15.6027 9.22772 14 7.5L8 10.5L1 1.5"
                                            stroke="#FF2E2E" stroke-width="2" stroke-linecap="round"></path>
                                        <defs>
                                            <linearGradient id="paint0_linear1" x1="10.5" y1="2.625"
                                                x2="9.64345" y2="13.9935" gradientUnits="userSpaceOnUse">
                                                <stop offset="0" stop-color="#FF2E2E"></stop>
                                                <stop offset="1" stop-color="#FF2E2E" stop-opacity="0.03">
                                                </stop>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    2% (30 Jours)</span>
                            </div>
                            <div class="card-body p-0">
                                <canvas id="widgetChart2" height="80"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card overflow-hidden">
                            <div class="card-header d-sm-flex d-block border-0 pb-0">
                                <div class="mb-sm-0 mb-2">
                                    <p class="fs-14 mb-1">Utilisation Hebdomadaire du Portefeuille</p>
                                    <span class="mb-0">
                                        <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.9999 6L5.99994 -2.62268e-07L-6.10352e-05 6"
                                                fill="#2BC155"></path>
                                        </svg>
                                        <strong class="fs-24 text-black ms-2 me-3">15%</strong>Semaine
                                        dernière</span>
                                </div>
                                <span class="fs-12">
                                    <svg width="21" height="15" viewBox="0 0 21 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.999939 13.5C1.91791 12.4157 4.89722 9.22772 6.49994 7.5L12.4999 10.5L19.4999 1.5"
                                            stroke="#2BC155" stroke-width="2"></path>
                                        <path
                                            d="M6.49994 7.5C4.89722 9.22772 1.91791 12.4157 0.999939 13.5H19.4999V1.5L12.4999 10.5L6.49994 7.5Z"
                                            fill="url(#paint0_linear2)"></path>
                                        <defs>
                                            <linearGradient id="paint0_linear2" x1="10.2499" y1="3" x2="10.9999"
                                                y2="13.5" gradientUnits="userSpaceOnUse">
                                                <stop offset="0" stop-color="#2BC155" stop-opacity="0.73">
                                                </stop>
                                                <stop offset="1" stop-color="#2BC155" stop-opacity="0"></stop>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    0% (30 Jours)</span>
                            </div>
                            <div class="card-body p-0">
                                <canvas id="widgetChart3" height="80"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body pb-1">
                                <div class="row align-items-center">
                                    <div class="col-xl-5 col-xxl-12 col-md-5">
                                        <h4 class="fs-20 text-black mb-4">Depenses</h4>
                                        <div class="row">
                                            <div class="d-flex col-xl-12 col-xxl-6  col-md-12 col-sm-6 mb-4">
                                                <svg class="me-3" width="14" height="54" viewBox="0 0 14 54"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="-6.10352e-05" width="14" height="54" rx="7"
                                                        fill="#AC39D4"></rect>
                                                </svg>
                                                <div>
                                                    <p class="fs-14 mb-2">Investissement</p>
                                                    <span class="fs-18 font-w500"><span
                                                            class="text-black me-2">0,00€</span>/20,000€</span>
                                                </div>
                                            </div>
                                            <div class="d-flex col-xl-12 col-xxl-6 col-md-12 col-sm-6 mb-4">
                                                <svg class="me-3" width="14" height="54" viewBox="0 0 14 54"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="-6.10352e-05" width="14" height="54" rx="7"
                                                        fill="#40D4A8"></rect>
                                                </svg>
                                                <div>
                                                    <p class="fs-14 mb-2">Factures</p>
                                                    <span class="fs-18 font-w500"><span
                                                            class="text-black me-2">0,00€</span>/5,000€</span>
                                                </div>
                                            </div>
                                            <div class="d-flex col-xl-12 col-xxl-6 col-md-12 col-sm-6 mb-4">
                                                <svg class="me-3" width="14" height="54" viewBox="0 0 14 54"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="-6.10352e-05" width="14" height="54" rx="7"
                                                        fill="#1EB6E7"></rect>
                                                </svg>
                                                <div>
                                                    <p class="fs-14 mb-2">Restaurant</p>
                                                    <span class="fs-18 font-w500"><span
                                                            class="text-black me-2">0€</span>/$1,000€</span>
                                                </div>
                                            </div>
                                            <div class="d-flex col-xl-12 col-xxl-6 col-md-12 col-sm-6 mb-4">
                                                <svg class="me-3" width="14" height="54" viewBox="0 0 14 54"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="-6.10352e-05" width="14" height="54" rx="7"
                                                        fill="#461EE7"></rect>
                                                </svg>
                                                <div>
                                                    <p class="fs-14 mb-2">Immobilier</p>
                                                    <span class="fs-18 font-w500"><span
                                                            class="text-black me-2">0,00€</span>/4,000€</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7  col-xxl-12 col-md-7">
                                        <div class="row g-3">
                                            <div class="col-sm-6">
                                                <div class="bg-secondary rounded text-center p-3">
                                                    <div
                                                        class="d-inline-block position-relative donut-chart-sale mb-3">
                                                        <span class="donut1" data-peity="{ " fill":=""
                                                            ["rgb(255,="" 255,="" 255)",="" "rgba(255,="" 0.2)"
                                                            ],="" "innerradius" :="" 33,="" "radius" :=""
                                                            10}"="">0/8</span>
                                                        <small class="text-white">0%</small>
                                                    </div>
                                                    <span class="fs-14 text-white d-block">Investissement</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="bg-success rounded text-center p-3">
                                                    <div
                                                        class="d-inline-block position-relative donut-chart-sale mb-3">
                                                        <span class="donut1" data-peity="{ " fill":=""
                                                            ["rgb(255,="" 255,="" 255)",="" "rgba(255,="" 0.2)"
                                                            ],="" "innerradius" :="" 33,="" "radius" :=""
                                                            10}"="">0/8</span>
                                                        <small class="text-white">0%</small>
                                                    </div>
                                                    <span class="fs-14 text-white d-block">Factures</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div
                                                    class="border border-2 border-primary rounded text-center p-3">
                                                    <div
                                                        class="d-inline-block position-relative donut-chart-sale mb-3">
                                                        <span class="donut1" data-peity="{ " fill":=""
                                                            ["rgb(30,="" 170,=""
                                                            231)",="" "rgba(234,="" 234,="" 1)"
                                                            ],="" "innerradius" :="" 33,="" "radius" :=""
                                                            10}"="">0/8</span>
                                                        <small class="text-black">0%</small>
                                                    </div>
                                                    <span class="fs-14 text-black d-block">Restaurant</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="bg-info rounded text-center p-3">
                                                    <div
                                                        class="d-inline-block position-relative donut-chart-sale mb-3">
                                                        <span class="donut1" data-peity="{ " fill":=""
                                                            ["rgb(255,="" 255,="" 255)",="" "rgba(255,="" 0.2)"
                                                            ],="" "innerradius" :="" 33,="" "radius" :=""
                                                            10}"="">0/10</span>
                                                        <small class="text-white">0%</small>
                                                    </div>
                                                    <span class="fs-14 text-white d-block">Immobilier</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
