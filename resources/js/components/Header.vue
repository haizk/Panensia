<template>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-2">
                <div class="header-style">
                    <a href="index.html">
                        <img src="http://localhost:8000/assets/img/Panensia.png" alt="" style="width: 50px;" >
                    </a>
                    <div class="extras bag">
                           <a href="javascript:void(0)" class="menu-btn">
                           <i class="fa-solid fa-bag-shopping"></i>
                       </a>
                       <div class="bar-menu">
                           <i class="fa-solid fa-bars"></i>
                       </div>
                    </div>
                </div>
            </div>
            <NavComponent></NavComponent>
            <div class="col-lg-3">
                <div class="extras bag">
       <a href="javascript:void(0)" id="desktop-menu" class="menu-btn">

                        <i class="fa-solid fa-bag-shopping"></i></a>
                     <a href="#" class="button button-2">Order Now</a>
                </div>
            </div>
         <div class="menu-wrap">
           <div class="menu-inner ps ps--active-x ps--active-y">
             <span class="menu-cls-btn"><i class="cls-leftright"></i><i class="cls-rightleft"></i></span>
             <div class="checkout-order">
                    <div class="title-checkout">
                        <h2>My Orders</h2>
                    </div>
                    <div class="banner-wilmington">
                        <img alt="logo" src="https://via.placeholder.com/50x50">
                        <h6>Kennington Lane Cafe</h6>
                    </div>
                    <ul>
                        <li class="price-list">
                        <i class="closeButton fa-solid fa-xmark"></i>
                        <div class="counter-container">
                            <div class="counter-food">
                                <img alt="food" src="https://via.placeholder.com/100x67">
                                <h4>Pasta, kiwi and sauce chilli</h4>
                            </div>
                            <h3>$39</h3>
                        </div>
                        <div class="price">
                                <div>
                                      <h2>$39</h2>
                                      <span>Sum</span>
                                  </div>
                                      <div>
                                          <div class="qty-input">
                                            <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                            <input class="product-qty" type="number" name="product-qty" min="0" value="1">
                                            <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                                        </div>
                                        <span>Quantity</span>
                                    </div>
                                    </div>
                        </li>
                        <li class="price-list">
                        <i class="closeButton fa-solid fa-xmark"></i>
                        <div class="counter-container">
                            <div class="counter-food">
                                <img alt="food" src="https://via.placeholder.com/100x67">
                                <h4>Rice with shrimps and kiwi</h4>
                            </div>
                            <h3>$49</h3>
                        </div>
                        <div class="price">
                                <div>
                                      <h2>$49</h2>
                                      <span>Sum</span>
                                  </div>
                                      <div>
                                          <div class="qty-input">
                                            <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                            <input class="product-qty" type="number" name="product-qty" min="0" value="1">
                                            <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                                        </div>
                                        <span>Quantity</span>
                                    </div>
                                    </div>
                        </li>
                    </ul>
                    <div class="totel-price">
                        <span>Total order:</span>
                        <h5>$137</h5>
                    </div>
                    <div class="totel-price">
                        <span>To pay:</span>
                        <h2>$137</h2>
                    </div>
                    <button class="button-price">Checkout</button>

                </div>
             </div>
          </div>
<div class="mobile-nav hmburger-menu" id="mobile-nav" style="display:block;">


        <div class="res-log">
            <a href="index.html">
                  
            </a>
          </div>
        <ul>

              <li><a href="index.html">Home</a>
              </li>

              <li><a href="about.html">About Us</a></li>

              <li class="menu-item-has-children"><a href="JavaScript:void(0)">Restaurants</a>

                <ul class="sub-menu">

                  <li><a href="restaurants.html">Restaurants</a></li>
                  <li><a href="restaurant-card.html">Restaurant Card</a></li>
                  <li><a href="checkout.html">Checkout</a></li>
                </ul>

               </li>
                <li class="menu-item-has-children"><a href="JavaScript:void(0)">Pages</a>

                <ul class="sub-menu">

                   <li><a href="blog.html">Blog</a></li>
                   <li><a href="single-blog.html">Single Blog</a></li>
                   <li><a href="services.html">Services</a></li>
                   <li><a href="faq.html">FAQ</a></li>
                   <li><a href="pricing-table.html">Pricing Table</a></li>
                   <li><a href="become-partner.html">Become A Partner</a></li>
                   <li><a href="404.html">404</a></li>
                </ul>

               </li>

              <li><a href="contact.html">contacts</a></li>

            </ul>

      <a href="JavaScript:void(0)" id="res-cross"></a>
  </div>
</div>
</div>


</template>
        <script>
                import NavComponent from './Nav.vue';

                export default {
                    name: 'App',
                    components: {
                        NavComponent
                    }
                }
            </script>