<template>
    <main>
        <section class="introBannerHolder d-flex w-100 bgCover"  style="background-image: linear-gradient(to right , #ffffff,#ffffff, #5ba515);">
        <div class="container">
          <div class="row">
            <div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
              <h1 class="headingIV fwEbold playfair mb-4">Berita</h1>
              <ul class="list-unstyled breadCrumbs d-flex justify-content-center">
                <li class="mr-2"><a href="home.html">Home</a></li>
                <li class="mr-2">/</li>
                <li class="active">Berita</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
  
      <div class="twoColumns container pt-lg-23 pb-lg-20 pt-md-16 pb-md-4 pt-10 pb-4">
        <div class="row">
          <div class="col-12 col-lg-9 order-lg-3">
            <article id="content">
              <div class="row">
                <div class="col-md-4 mb-4">
                  <div class="card" style="height: 100%">
                    <img src="https://i.pinimg.com/564x/b7/29/c8/b729c892ce5ccbee699a47c944653ffa.jpg" class="card-img-top">
                    <div class="card-body" style ="display: flex; flex-direction: column;">
                      <h5 class="card-title" style ="flex-grow: 1;">6 Manfaat Minum Air Jahe saat Perut Kosong di Pagi Hari</h5>
                      <p class="card-text" style ="flex-grow: 1;">Dalam pengobatan kuno, jahe digunakan sebagai ramuan</p>
                      <a href="BeritaDetail.vue" class="btn btnTheme btnShop md-round fwEbold text-white" style="color: #ffffff; background-color: #5ba515; border-color: #5ba515;">Baca Selengkapnya</a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 mb-4">
                  <div class="card" style="height: 100%">
                    <img src="https://i.pinimg.com/564x/b7/29/c8/b729c892ce5ccbee699a47c944653ffa.jpg " class="card-img-top">
                    <div class="card-body" style ="display: flex; flex-direction: column;">
                      <h5 class="card-title" style ="flex-grow: 1;">Kegunaan Temulawak</h5>
                      <p class="card-text" style ="flex-grow: 1;">Dalam pengobatan kuno, jahe digunakan sebagai ramuan</p>
                      <a href="/detailberita" class="btn btnTheme btnShop md-round fwEbold text-white" style="color: #ffffff; background-color: #5ba515; border-color: #5ba515;">Baca Selengkapnya</a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 mb-4">
                  <div class="card" style="height: 100%">
                    <img src="https://i.pinimg.com/564x/b7/29/c8/b729c892ce5ccbee699a47c944653ffa.jpg " class="card-img-top">
                    <div class="card-body" style ="display: flex; flex-direction: column;">
                      <h5 class="card-title" style ="flex-grow: 1;">Kegunaan Temulawak</h5>
                      <p class="card-text" style ="flex-grow: 1;">Dalam pengobatan kuno, jahe digunakan sebagai ramuan</p>
                      <RouterLink to="/detailberita">
                      <a href="/detailberita" class="btn btnTheme btnShop md-round fwEbold text-white" style="color: #ffffff; background-color: #5ba515; border-color: #5ba515;">Baca Selengkapnya</a>
                    </RouterLink>
                    </div>
                  </div>
                </div>

              </div>
            </article>
          </div>

          <div class="col-12 col-lg-3 order-lg-1">
            <aside id="sidebar">
              <section class="widget overflow-hidden mb-md-9 mb-6">
                <h3 class="headingVII fwEbold text-uppercase mb-4">Search</h3>
                <form action="javascript:void(0);" class="searchForm position-relative border">
                  <fieldset>
                    <input type="search" class="form-control" placeholder="Search product...">
                    <button class="position-absolute"><i class="icon-search"></i></button>
                  </fieldset>
                </form>
              </section>
  
              <section class="widget overflow-hidden mb-md-5 mb-3">
                <h3 class="headingVII fwEbold text-uppercase mb-4">CATEGORIES</h3>
                <ul class="list-unstyled archiveList mb-0">
                  <li class="mb-3"><a href="javascript:void(0);" class="d-block">Slimming</a></li>
                  <li class="mb-3"><a href="javascript:void(0);" class="d-block">Detox</a></li>
                  <li class="mb-3"><a href="javascript:void(0);" class="d-block">Imun dan Stamina</a></li>
                  <li class="mb-3"><a href="javascript:void(0);" class="d-block">Kulit dan Kecantikan</a></li>
                  <li class="mb-3"><a href="javascript:void(0);" class="d-block">Diabeter dan Gula Darah</a></li>
                </ul>
              </section>
            </aside>
          </div>
        </div>
      </div>
      
        <div class="col-12 mb-sm-0 mb-4">
            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                    </a>
                </li>
                </ul>
            </nav>
            </div>


      <div class="container mb-lg-24 mb-md-16 mb-10">
        <section class="subscribeSecBlock bgCover col-12 pt-lg-24 pb-lg-12 pt-md-16 pb-md-8 py-10" style="background-image: linear-gradient(to top , #5ba515, #ffffff);">
          <header class="col-12 mainHeader mb-9 text-center">
            <h1 class="headingIV playfair fwEblod mb-4">Subscribe Our Newsletter</h1>
            <span class="headerBorder d-block mb-5"><img src="" alt="Header Border" class="img-fluid img-bdr"></span>
            <p class="mb-6">Enter Your email address to join our mailing list and keep yourself update</p>
          </header>
          <form class="emailForm1 mx-auto overflow-hidden d-flex flex-wrap">
            <input type="email" class="form-control px-4 border-0" placeholder="Enter your mail...">
            <button type="submit" class="btn btnTheme btnShop fwEbold text-white py-3 px-4 py-md-3 px-md-4">Shop Now <i class="fas fa-arrow-right ml-2"></i></button>
          </form>
        </section>
      </div>
      
      
     
    </main>
  </template>
  