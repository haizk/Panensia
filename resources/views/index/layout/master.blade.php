<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('index.layout.head')
</head>
<body class="menu-layer">

	<!-- loader start-->
	<div class="page-loader">
		<div class="wrapper">
	        <div class="circle"></div>
	        <div class="circle"></div>
	        <div class="circle"></div>
	        <div class="shadow"></div>
	        <div class="shadow"></div>
	        <div class="shadow"></div>
	        <span>Loading</span>
	    </div>
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

</body>
