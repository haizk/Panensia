@extends('user.layout.master')
@section('content')
    <!-- hero-section -->
    <section class="hero-section about gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="300">
                    <div class="about-text">
                        <ul class="crumbs d-flex">
                            <li><a href="index.html">Home</a></li>
                            <li class="two"><a href="index.html"><i class="fa-solid fa-right-long"></i>Restaurants</a>
                            </li>
                        </ul>
                        <h2>Restaurants</h2>
                        <p>Egestas sed tempus urna et pharetra pharetra massa. Fermentum posuere urna nec tincidunt praesent
                            semper.</p>
                        <div class="restaurant">
                            <div class="nice-select-one">
                                <select class="nice-select Advice">
                                    <option>Choose a Restaurant</option>
                                    <option>Choose a Restaurant 1</option>
                                    <option>Choose a Restaurant 2</option>
                                    <option>Choose a Restaurant 3</option>
                                    <option>Choose a Restaurant 4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">
                    <div class="restaurants-girl-img food-photo-section">
                        <img alt="man" src="https://via.placeholder.com/676x585">
                        <a href="#" class="one"><i class="fa-solid fa-burger"></i>Burgers</a>
                        <a href="#" class="two"><i class="fa-solid fa-drumstick-bite"></i>Chicken</a>
                        <a href="#" class="three"><i class="fa-solid fa-cheese"></i>Steaks</a>
                        <a href="#" class="for"><i class="fa-solid fa-pizza-slice"></i>Fish</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner -->
    <section class="banner" data-aos="fade-up" data-aos-delay="200" data-aos-duration="300">
        <div class="container">
            <div class="banner-img" style="background-image: url(https://via.placeholder.com/1400x393);">
                <div class="banner-logo">
                    <h4>Restaurant<br>of the Month
                        <span class="chevron chevron--left"></span>
                    </h4>
                    <div class="banner-wilmington">
                        <img alt="logo" src="https://via.placeholder.com/40x40">
                        <h6>The Wilmington</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="choose-lunches">

                            <h2>Choose 2 lunches</h2>
                            <h3>pay for one</h3>
                            <a href="#" class="button button-2 non">Order Now<i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- best-restaurants -->
    <section class="best-restaurants gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
                    <div class="logos-card restaurant-page ">
                        <img alt="logo" src="https://via.placeholder.com/100x100">
                        <div class="cafa">
                            <h4><a href="#">Kennington Lane Cafe</a></h4>
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="cafa-button">
                                <a href="#">american</a>
                                <a href="#">steakhouse</a>
                                <a class="end" href="#">seafood</a>
                            </div>
                            <p>Non enim praesent elementum facilisis leo vel fringilla. Lectus proin nibh nisl condimentum
                                id. Quis varius quam quisque id diam vel.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="flip-up" data-aos-delay="300" data-aos-duration="400">
                    <div class="logos-card restaurant-page">
                        <img alt="logo" src="https://via.placeholder.com/100x100">
                        <div class="cafa">
                            <h4><a href="restaurant-card.html">The Wilmington</a></h4>
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="cafa-button">
                                <a href="#">american</a>
                                <a href="#">steakhouse</a>
                                <a class="end" href="#">seafood</a>
                            </div>
                            <p>Vulputate enim nulla aliquet porttitor lacus luctus. Suscipit adipiscing bibendum est
                                ultricies integer. Sed adipiscing diam donec adipiscing tristique.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="flip-up" data-aos-delay="400" data-aos-duration="500">
                    <div class="logos-card restaurant-page two">
                        <img alt="logo" src="https://via.placeholder.com/100x100">
                        <div class="cafa">
                            <h4><a href="restaurant-card.html">Kings Arms</a></h4>
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star-half-stroke"></i>
                            </div>
                            <div class="cafa-button">
                                <a href="#">healthy</a>
                                <a href="#">steakhouse</a>
                                <a class="end" href="#">vegetarian</a>
                            </div>
                            <p>Tortor at risus viverra adipiscing at in tellus. Cras semper auctor neque vitae tempus. Dui
                                accumsan sit amet nulla facilisi. Sed adipiscing diam .</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="flip-up" data-aos-delay="500" data-aos-duration="600">
                    <div class="logos-card restaurant-page two">
                        <img alt="logo" src="https://via.placeholder.com/100x100">
                        <div class="cafa">
                            <h4><a href="restaurant-card.html">The Victoria</a></h4>
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="cafa-button">
                                <a href="#">american</a>
                                <a href="#">steakhouse</a>
                                <a class="end" href="#">seafood</a>
                            </div>
                            <p>Non enim praesent elementum facilisis leo vel fringilla. Lectus proin nibh nisl condimentum
                                id. Quis varius quam quisque id diam vel.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
                    <div class="logos-card restaurant-page two">
                        <img alt="logo" src="https://via.placeholder.com/100x100">
                        <div class="cafa">
                            <h4><a href="restaurant-card.html">Lanes of London</a></h4>
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="cafa-button">
                                <a href="#">american</a>
                                <a href="#">steakhouse</a>
                                <a class="end" href="#">seafood</a>
                            </div>
                            <p>At erat pellentesque adipiscing commodo elit at imperdiet dui. Suspendisse faucibus interdum
                                posuere
                                lorem. Elit sed vulputate mi sit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="flip-up" data-aos-delay="300" data-aos-duration="400">
                    <div class="logos-card restaurant-page two">
                        <img alt="logo" src="https://via.placeholder.com/100x100">
                        <div class="cafa">
                            <h4><a href="restaurant-card.html">The Andover Arms</a></h4>

                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star-half-stroke"></i>
                            </div>
                            <div class="cafa-button">
                                <a href="#">healthy</a>
                                <a href="#">steakhouse</a>
                                <a class="end" href="#">vegetarian</a>
                            </div>
                            <p>Lacus vestibulum sed arcu non odio euismod lacinia at. Id neque aliquam vestibulum morbi.
                                Ante metus dictum ullamcorper a lacus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe-section -->
    <section class="subscribe-section gap" style="background:#fcfcfc">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
                    <div class="img-subscribe">
                        <img alt="Illustration" src="https://via.placeholder.com/676x403">
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1" data-aos="flip-up" data-aos-delay="300" data-aos-duration="400">
                    <div class="get-the-menu">
                        <h2>Get the menu of your favorite restaurants every day</h2>
                        <form>
                            <i class="fa-regular fa-bell"></i>
                            <input type="text" name="email" placeholder="Enter email address">
                            <button class="button button-2">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
