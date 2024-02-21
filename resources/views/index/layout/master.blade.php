<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('index.layout.head')
</head>
<body class="menu-layer">

	<!-- loader start-->
	<div class="page-loader">
		@include('index.layout.loader')
	</div>
	<!-- loader end-->
    <header>
		@include('index.layout.header')
		<!-- header -->
	</header>

		@yield('content')
		<!-- content -->

	<footer class="gap no-bottom" style="background-color: #363636;">
		@include('index.layout.footer')
		<!-- footer -->
	</footer>

	<!-- bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <!-- owl.carousel -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- aos -->
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <!-- custom -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
