<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Alazea - Gardening &amp; Landscaping HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="/theme/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="/theme/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
                                .search-results {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background-color: #70c745;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 10;
    overflow-y: auto;
    max-height: 250px; /* Set the maximum height to enable scrolling */
    border-radius: 4px;
}

.search-suggestion {
    padding: 10px;
    border-bottom: 1px solid gray;
    display: flex;
    align-items: center;
}

.suggestion-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    margin-right: 10px;
    border-radius: 4px;
}

.suggestion-details {
    flex: 1;
}

.suggestion-name {
    font-weight: bold;
}

.suggestion-price {
    color: #000;
}

.no-results{
    color:#000;
    padding:10px;
}

  </style>
  <style>
.icon-hover:hover {
  border-color: #3b71ca !important;
  background-color: white !important;
  color: #3b71ca !important;
}

.icon-hover:hover i {
  color: #3b71ca !important;
}
</style>

<style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            margin: 10px;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .carousel-inner {
            display: flex;
            flex-wrap: wrap;
        }

        .carousel-item {
            flex: none;
            width: 100%;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #333;
            border-radius: 50%;
            width: 30px;
            height: 30px;
        }
    </style>
     

</head>

<body>
    <!-- Preloader -->
    <!-- <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="/theme/img/core-img/leaf.png" alt="">
        </div>
    </div> -->

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Top Header Content -->
                            <div class="top-header-meta">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="infodeercreative@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: infodeercreative@gmail.com</span></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: +1 234 122 122</span></a>
                            </div>

                            <!-- Top Header Content -->
                            @if(auth()->check())
                            <div class="top-header-meta d-flex">
                                <!-- Language Dropdown -->
                                <div class="language-dropdown">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle mr-30" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a href="login-register.html">My Account</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <!-- <li><a href="{{url('logout')}}">logout</a></li> -->
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <button type="submit">Logout</button>
                                                    </form>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <!-- Login -->
                                <div class="login">
                                    <a href="{{url('login')}}"><i class="fa fa-user" aria-hidden="true"></i> <span>Login</span></a>
                                    
                                </div>
                                <div class="login">
                                    <a href="{{url('register')}}"><i class="fa fa-user" aria-hidden="true"></i> <span>Register</span></a>
                                    
                                </div>
                                @endif
                                <!-- Cart -->
                                <div class="cart">
                                    <a href="{{url('viewcart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Cart <span class="cart-quantity">
                                    
                                                <?php
                                                $totalPrice = 0;
                                                $cartItems = session('cart') ?? [];
                                               
                                                ?>
                                                <a href="{{ route('shopping.cart') }}">
                                                    <span class="cart-item-count">({{ count($cartItems) }})</span>
                                                </a>                         </span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        <a href="index.html" class="nav-brand"><img src="/theme/img/core-img/logo1.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="shop.html">Shop</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.html">Shop</a></li>
                                                    <li><a href="shop-details.html">Shop Details</a></li>
                                                    <li><a href="cart.html">Shopping Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="portfolio.html">Portfolio</a>
                                                <ul class="dropdown">
                                                    <li><a href="portfolio.html">Portfolio</a></li>
                                                    <li><a href="single-portfolio.html">Portfolio Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="blog.html">Blog</a>
                                                <ul class="dropdown">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-post.html">Blog Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="portfolio.html">Portfolio</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>

                                <!-- Search Icon -->
                                <div id="searchIcon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>

                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>

                <!-- Search Form -->
    <div class="search-form">
        <form action="#" method="get">
            <input type="search" name="search" id="searchInput" placeholder="Type keywords &amp; press enter...">
             <!-- Search Results Container -->
    <div class="search-results" id="searchResults"></div>
            <button type="submit" class="d-none"></button>
        </form>
           
        <!-- Close Icon -->
        <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
    </div>


                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
<br><br><br><br>
<br>





<section class="py-5">
    <div class="container">
        <div class="row gx-5">
            <aside class="col-lg-5">
                <div class="mb-3 d-flex justify-content-center">
                    <img style="max-width: 100%; min-height: 60vh; max-height: 60vh; margin: auto;" class="rounded-4 fit" src="{{ asset('images/' . $product->image) }}" />
                </div>
            </aside>
            <main class="col-lg-6">
                <div class="ps-lg-3">
                    <h4 class="title text-dark" style="text-transform: uppercase;">
                        {{$product->productName}}
                    </h4>
                    <div class="d-flex flex-row ">
            <div class="text-warning  me-2">
                       
      
                        <div class="">
          Species:   <span class="h5">   &nbsp; &nbsp;  {{$product->species_name}}</span>
                    </div>
            </div>
                  
                    </div>
            </div>
            <div class="mb-3">
            Price:    <span class="h5">   &nbsp; &nbsp;  &nbsp; &nbsp;  Rs.      {{$product->discountPrice}}

                      
                        </span>
            
          </div>

         
          
          <span class="text-muted"><i class="fa fa-shopping-basket"></i> <span> {{ $orderCount }} orders</span> </span> 
      
          @if($product->quantity == 0)
          <span class="text-danger ms-2 " style="padding:15px">Out Of Stock</span>
          @else
          <span class="text-success ms-2 " style="padding:15px">In stock({{$product->quantity}})</span>
          @endif
                    <br>
                    <p>
                        {{$product->description}}
                    </p>
                    <hr />
                    <div class="row mb-4">
    <div class="col-md-4 col-6">
    
        <form action="{{ route('addbook.to.cart2', $product->slug) }}" method="post">

            @csrf
            @if($product->quantity > 0)
                <button type="submit" class="btn btn-primary shadow-0" id="add-to-cart-button">
                    <i class="me-1 fa fa-shopping-basket"></i> Add to cart
                </button>
            </form>
            @else
                <input type="text" class="btn btn-success shadow-0" value="Restock Soon" readonly>
            @endif
    </div>

</div>
                </div>
            </main>
        </div>
    </div>
</section>

<div class="container mt-5">
    <h2 class="mb-4">Related Products</h2>
    <div class="owl-carousel owl-theme">
        <!-- Product Card 1 -->
        @foreach($relatedProducts as $relatedProduct)
        <a  href="{{ url('products/' . $relatedProduct->slug) }}">

        <div class="product-card">
            <img style="height:180px;" src="{{ asset('images/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->productName }}">
            <h4>{{ $relatedProduct->productName }}</h4>
            <p>${{ $relatedProduct->discountPrice }}</p>
        </div>
        </a>
        @endforeach

    </div>
</div>
<br><br>





<!-- ##### Footer Area Start ##### -->
<footer class="footer-area bg-img" style="background-image: url(/theme/img/bg-img/3.jpg);">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="footer-logo mb-30">
                                <a href="#"><img src="/theme/img/core-img/logo.png" alt=""></a>
                            </div>
                            <p>Lorem ipsum dolor sit samet, consectetur adipiscing elit. India situs atione mantor</p>
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>QUICK LINK</h5>
                            </div>
                            <nav class="widget-nav">
                                <ul>
                                    <li><a href="#">Purchase</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Payment</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Return</a></li>
                                    <li><a href="#">Advertise</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="#">Orders</a></li>
                                    <li><a href="#">Policities</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>BEST SELLER</h5>
                            </div>

                            <!-- Single Best Seller Products -->
                            <div class="single-best-seller-product d-flex align-items-center">
                                <div class="product-thumbnail">
                                    <a href="shop-details.html"><img src="/theme/img/bg-img/4.jpg" alt=""></a>
                                </div>
                                <div class="product-info">
                                    <a href="shop-details.html">Cactus Flower</a>
                                    <p>$10.99</p>
                                </div>
                            </div>

                            <!-- Single Best Seller Products -->
                            <div class="single-best-seller-product d-flex align-items-center">
                                <div class="product-thumbnail">
                                    <a href="shop-details.html"><img src="/theme/img/bg-img/5.jpg" alt=""></a>
                                </div>
                                <div class="product-info">
                                    <a href="shop-details.html">Tulip Flower</a>
                                    <p>$11.99</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>CONTACT</h5>
                            </div>

                            <div class="contact-information">
                                <p><span>Address:</span> 505 Silk Rd, New York</p>
                                <p><span>Phone:</span> +1 234 122 122</p>
                                <p><span>Email:</span> info.deercreative@gmail.com</p>
                                <p><span>Open hours:</span> Mon - Sun: 8 AM to 9 PM</p>
                                <p><span>Happy hours:</span> Sat: 2 PM to 4 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="border-line"></div>
                    </div>
                    <!-- Copywrite Text -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite-text">
                            <p>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                        </div>
                    </div>
                    <!-- Footer Nav -->
                    <div class="col-12 col-md-6">
                        <div class="footer-nav">
                            <nav>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Service</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->



    <script>
    function displayResults(suggestions) {
    let resultDiv = $('#searchResults');
    resultDiv.empty();

    if (suggestions.length === 0) {
        resultDiv.append('<center class="no-results">Product Not Found</center>');
        return;
    }

    for (let suggestion of suggestions) {
        imageUrl = "{{ asset('images/') }}" + '/' + suggestion.image;
        let suggestionItem = `
        <div class="search-suggestion">
            <a href="/products/${suggestion.slug}">
                <img width="40" height="40" src="${imageUrl}"  alt="${suggestion.productName}" class="suggestion-image">
                <div class="suggestion-details">
                    <div class="suggestion-info">
                        <span class="suggestion-name">${suggestion.productName}</span>
                        <span class="suggestion-price">Rs.${suggestion.discountPrice}</span>
                    </div>
                </div>
            </a>
        </div>
        `;
        resultDiv.append(suggestionItem);
    }
}

$(document).ready(function () {
    let searchInput = $('#searchInput');

    // Handle keyup event on search input
    searchInput.on('keyup', function () {
        let query = searchInput.val();
        if (query.length > 0) {
            $.ajax({
                url: '/search',
                method: 'GET',
                data: {
                    query: query
                },
                success: function (response) {
                    let suggestions = response.suggestions;
                    displayResults(suggestions);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            // If search input is empty, clear the results
            $('#searchResults').empty();
        }
    });
});

</script>

<script>
    const quantityInput = document.getElementById('quantity-input');
    const addToCartButton = document.getElementById('add-to-cart-button');
    const maxQuantity = {{$product->quantity}};
    const quantityAlert = document.getElementById('quantity-alert');

    addToCartButton.addEventListener('click', (e) => {
        let selectedQuantity = parseInt(quantityInput.value);
        if (selectedQuantity > maxQuantity) {
            e.preventDefault();
            quantityAlert.textContent = 'Sorry, you can only add up to ' + maxQuantity + ' items to the cart.';
        } else {
            quantityAlert.textContent = '';
        }
    });
</script>



<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            loop: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 3
                },
                768: {
                    items: 4
                },
                992: {
                    items: 5
                }
            }
        });
    });
</script>


<!-- content -->




    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="/theme/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/theme/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/theme/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="/theme/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="/theme/js/active.js"></script>


</body>

</html>