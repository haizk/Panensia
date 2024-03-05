<template>
    <main>
        <!-- introBannerHolder -->
        <section class="introBannerHolder d-flex w-100 bgCover" style="background-image: url(https://i.ibb.co/9wmwSHB/indian-garam-masala-powder-and-colourful-spices-s-2023-11-27-05-18-00-utc.jpg);">
			<div class="container">
				<div class="row">
					<div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
						<h1 class="headingIV fwEbold playfair mb-4 text-white">Produk</h1>
						<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
							<li class="mr-2">
								<RouterLink to="/" class="text-white-50">Home /</RouterLink>
							</li>
							<li class="mr-2">
								<RouterLink to="/produk" class="active text-white">Produk</RouterLink>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
        <!-- twoColumns -->
        <div class="twoColumns container pt-lg-23 pb-lg-20 pt-md-16 pb-md-4 pt-10 pb-4">
            <div class="row">
                <div class="col-12 col-lg-9 order-lg-3">
                    <!-- content -->
                    <article id="content">
                        <!-- show-head -->
                        <header class="show-head d-flex flex-wrap justify-content-between mb-7">
                            <ul class="list-unstyled viewFilterLinks d-flex flex-nowrap align-items-center">
                                <li class="mr-2"><a href="javascript:void(0);" class="active"><i class="fas fa-th-large"></i></a></li>
                                <li class="mr-2"><a href="javascript:void(0);"><i class="fas fa-list"></i></a></li>
                                <li class="mr-2">Showing 1–9 of 24 results</li>
                            </ul>
                            <!-- sortGroup -->
                            <div class="sortGroup">
                                <div class="d-flex flex-nowrap align-items-center">
                                    <strong class="groupTitle mr-2">Sort by:</strong>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle buttonReset" type="button" id="sortGroup" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Default sorting</button>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="sortGroup">
                                            <li><a href="javascript:void(0);">Default Order</a></li>
                                            <li><a href="javascript:void(0);">Default Order</a></li>
                                            <li><a href="javascript:void(0);">Default Order</a></li>
                                            <li><a href="javascript:void(0);">Default Order</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="row">
                            <!-- featureCol -->
                            <div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
                                <div class="border">
                                    <div class="imgHolder position-relative w-100 overflow-hidden">
                                        <img src="https://www.panensia.co.id/wp-content/uploads/2023/10/buah-bit.jpg" alt="image description" class="img-fluid w-100">
                                        <ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
                                            <li class="active" style="list-style: none;"><RouterLink to="/detailproduk" style="border-radius: 10px;">Selengkapnya</RouterLink></li>
                                        </ul>
                                    </div>
                                    <div class="text-center py-5 px-4">
                                        <span class="title d-block mb-2"><a href="shop-detail.html">Buah Bit</a></span>
                                        <span class="price d-block fwEbold"><del>Rp59.000</del>Rp55.000</span>
                                        <span class="hotOffer fwEbold text-uppercase text-white position-absolute d-block">HOT</span>
                                        <span class="hotOffer green fwEbold text-uppercase text-white position-absolute d-block ml-8">Sale</span>
                                    </div>
                                </div>
                            </div>
                            <!-- featureCol -->
                            <div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
                                <div class="border">
                                    <div class="imgHolder position-relative w-100 overflow-hidden">
                                        <img src="https://www.panensia.co.id/wp-content/uploads/2023/10/bunga-lawang-600x600.jpg" alt="image description" class="img-fluid w-100">
                                        <ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
                                            <li class="active" style="list-style: none;"><RouterLink to="/detailproduk" style="border-radius: 10px;">Selengkapnya</RouterLink></li>
                                        </ul>
                                    </div>
                                    <div class="text-center py-5 px-4">
                                        <span class="title d-block mb-2"><a href="shop-detail.html">Bunga Lawang</a></span>
                                        <span class="price d-block fwEbold">Rp75.000</span>
                                    </div>
                                </div>
                            </div>
                            <!-- featureCol -->
                            <div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
                                <div class="border">
                                    <div class="imgHolder position-relative w-100 overflow-hidden">
                                        <img src="https://www.panensia.co.id/wp-content/uploads/2023/10/jahe-600x600.jpg" alt="image description" class="img-fluid w-100">
                                        <ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
                                            <li class="active" style="list-style: none;"><RouterLink to="/detailproduk" style="border-radius: 10px;">Selengkapnya</RouterLink></li>
                                        </ul>
                                    </div>
                                    <div class="text-center py-5 px-4">
                                        <span class="title d-block mb-2"><a href="shop-detail.html">Jahe</a></span>
                                        <span class="price d-block fwEbold">Rp39.000</span>
                                        <span class="hotOffer fwEbold text-uppercase text-white position-absolute d-block">HOT</span>
                                    </div>
                                </div>
                            </div>
                            <!-- featureCol -->
                            <div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
                                <div class="border">
                                    <div class="imgHolder position-relative w-100 overflow-hidden">
                                        <img src="http://placehold.it/270x300" alt="image description" class="img-fluid w-100">
                                        <ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
                                            <li class="active" style="list-style: none;"><RouterLink to="/detailproduk" style="border-radius: 10px;">Selengkapnya</RouterLink></li>
                                        </ul>
                                    </div>
                                    <div class="text-center py-5 px-4">
                                        <span class="title d-block mb-2"><a href="shop-detail.html">Kunyit</a></span>
                                        <span class="price d-block fwEbold"><del>Rp40.000</del>Rp36.000</span>
                                        <span class="hotOffer green fwEbold text-uppercase text-white position-absolute d-block">Sale</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 pt-3 mb-lg-0 mb-md-6 mb-3">
                                <!-- pagination -->
                                <ul class="list-unstyled pagination d-flex justify-content-center align-items-end">
                                    <li><a href="javascript:void(0);"><i class="fas fa-chevron-left"></i></a></li>
                                    <li class="active"><a href="javascript:void(0);">1</a></li>
                                    <li><a href="javascript:void(0);">2</a></li>
                                    <li>...</li>
                                    <li><a href="javascript:void(0);"><i class="fas fa-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 col-lg-3 order-lg-1">
                    <!-- sidebar -->
                    <aside id="sidebar">
                        <!-- widget -->
                        <section class="widget overflow-hidden mb-9">
                            <form action="javascript:void(0);" class="searchForm position-relative border">
                                <fieldset>
                                    <input type="search" class="form-control" placeholder="Cari Produk...">
                                    <button class="position-absolute"><i class="icon-search"></i></button>
                                </fieldset>
                            </form>
                        </section>
                        <!-- widget -->
                        <section class="widget overflow-hidden mb-9">
                            <h3 class="headingVII fwEbold text-uppercase mb-5">Kategori Produk</h3>
                            <ul class="list-unstyled categoryList mb-0">
                                <li class="mb-5 overflow-hidden"><a href="javascript:void(0);">Rempah <span class="num border float-right">6</span></a></li>
                                <li class="mb-5 overflow-hidden"><a href="javascript:void(0);">Sayur <span class="num border float-right">8</span></a></li>
                                <li class="mb-4 overflow-hidden"><a href="javascript:void(0);">Buah <span class="num border float-right">9</span></a></li>
                            </ul>
                        </section>
                        <!-- widget -->
                        
                        <!-- widget -->
                        <section class="widget mb-9">
                            <h3 class="headingVII fwEbold text-uppercase mb-6">Best Seller</h3>
                            <ul class="list-unstyled recentListHolder mb-0 overflow-hidden">
                                <li class="mb-6 d-flex flex-nowrap">
                                    <div class="alignleft">
                                        <a href="shop-detail.html"><img src="https://www.panensia.co.id/wp-content/uploads/2023/10/kunyit-600x600.jpg" alt="image description" class="img-fluid"></a>
                                    </div>
                                    <div class="description-wrap pl-1">
                                        <h4 class="headingVII mb-1"><a href="shop-detail.html">Kunyit</a></h4>
                                        <strong class="price fwEbold d-block;">Rp36.000</strong>
                                    </div>
                                </li>
                                <li class="mb-6 d-flex flex-nowrap">
                                    <div class="alignleft">
                                        <a href="shop-detail.html"><img src="https://www.panensia.co.id/wp-content/uploads/2023/10/kayu-manis-600x600.jpg" alt="image description" class="img-fluid"></a>
                                    </div>
                                    <div class="description-wrap pl-1">
                                        <h4 class="headingVII mb-1"><a href="shop-detail.html">Kayu Manis</a></h4>
                                        <strong class="price fwEbold d-block;">Rp45.000</strong>
                                    </div>
                                </li>
                                <li class="mb-6 d-flex flex-nowrap">
                                    <div class="alignleft">
                                        <a href="shop-detail.html"><img src="https://www.panensia.co.id/wp-content/uploads/2023/10/cengkeh.jpg" alt="image description" class="img-fluid"></a>
                                    </div>
                                    <div class="description-wrap pl-1">
                                        <h4 class="headingVII mb-1"><a href="shop-detail.html">Cengkeh</a></h4>
                                        <strong class="price fwEbold d-block;">Rp89.000</strong>
                                    </div>
                                </li>
                            </ul>
                        </section>
                        <!-- widget -->

                        <!-- widget -->
                        
                    </aside>
                </div>
            </div>
        </div>
        <div class="container mb-lg-24 mb-md-16 mb-10">
            <!-- subscribeSecBlock -->

            <!-- subscribeSecBlock -->
            
        </div>
        <!-- footerHolder -->

        <!-- footerHolder -->
        
    </main>
</template>