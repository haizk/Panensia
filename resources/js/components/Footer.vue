<!-- eslint-disable vue/multi-word-component-names -->
<template>
    <footer class="gap no-bottom" style="background-color: #363636;">
        <div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-sm-12">
					<div class="footer-description">
						<a href="/">
							<img src="http://localhost:8000/assets/img/Panensia-wt.png" alt="" style="width: 100px;" >
						</a>
						<h2>PANENSIA</h2>
						<p>Supplier 
							Rempah-Rempah
							& Bumbu Dapur</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="menu">
						<h4>Panensia</h4>
						<ul class="footer-menu">
							<li><RouterLink to="/">Home<i class="fa-solid fa-arrow-right"></i></RouterLink></li>
							<li><RouterLink to="/tentang">About us<i class="fa-solid fa-arrow-right"></i></RouterLink></li>
							<li><RouterLink to="/produk">Produk<i class="fa-solid fa-arrow-right"></i></RouterLink></li>
							<li><RouterLink to="/kontak">Contacts<i class="fa-solid fa-arrow-right"></i></RouterLink></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="menu contacts">
						<h4>Contacts</h4>
						<div class="footer-location">
							<i class="fa-solid fa-location-dot"></i>
							<p>Surakarta</p>
						</div>
						<a href="mailto:quickeat@mail.net"><i class="fa-solid fa-envelope"></i>panensia@gmail.com</a>
						<a href="callto:+14253261627"><i class="fa-solid fa-phone"></i>+1 425 326 16 27</a>
					</div>
					<ul class="social-media">
							<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
						</ul>
				</div>
			</div>
			<div class="footer-two gap no-bottom">
				<p>Copyright © {{ new Date().getFullYear() }} Panensia. All rights reserved.</p>
				<div class="privacy">
					<RouterLink to="#">Privacy Policy</RouterLink>
					<RouterLink to="#">Terms & Services</RouterLink>
				</div>
			</div>
		</div>
	

    </footer>
</template>
