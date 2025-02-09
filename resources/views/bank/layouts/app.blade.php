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
	<title>Unicredit - Mon Compte </title>
	<!-- Favicon icon -->

	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('Unicredit.png') }}">


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
        /*  testimonial one function by = owl.carousel.js */
        /*  testimonial one function by = owl.carousel.js */
        jQuery('.testimonial-one').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            center: true,
            dots: false,
            navText: ['<i class="fas fa-caret-left"></i>', '<i class="fas fa-caret-right"></i>'],
            responsive: {
                0: {
                    items: 2
                },
                400: {
                    items: 3
                },
                700: {
                    items: 5
                },
                991: {
                    items: 6
                },

                1200: {
                    items: 4
                },
                1600: {
                    items: 5
                }
            }
        })
    }

    jQuery(window).on('load', function () {
        setTimeout(function () {
            carouselReview();
        }, 1000);
    });
</script>
<!--**********************************
    Main wrapper end
***********************************-->

</body>
