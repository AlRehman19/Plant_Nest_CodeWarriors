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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" href="/theme/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="/theme/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- feedback -->

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<style>
        #feedback-form-wrapper #floating-icon > button {
    position: fixed;
    right: 0;
    top: 50%;
    transform: rotate(-90deg) translate(50%, -50%);
    transform-origin: right;
    z-index: 50;

    }

   
    
    .modal {
    transition: opacity 0.5s ease-in-out;
    opacity: 0;
    }

    /* Set opacity to 1 when modal is shown */
    .modal.show {
    opacity: 1;
    }

    .star-rating {
    display: inline-block;
    font-size: 0; /* Remove extra space between inline-block elements */
}

.star {
    display: inline-block;
    font-size: 24px;
    cursor: pointer;
    color: #ccc;
}

.star.active {
    color: #f39c12; /* Active star color */
}



</style>
<!-- AOS Library CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha384-DEJzEL9u1lF+2bPxOn4oK5N0CS4Rc1OtEGJ78qz/Inw1oKOyFqjNtVzgW7nxV2P1" crossorigin="anonymous">

<!-- AOS Library JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha384-Dj6ntq5htPhArsQbS+7aGw9xiPEm5g4+0pD3flWzU8Z66TVm0UfDH1YwO8zGAMbG" crossorigin="anonymous"></script>




    
<!-- feedback end -->

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


@media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}

.horizontal-timeline .items {
border-top: 2px solid #ddd;
}

.horizontal-timeline .items .items-list {
position: relative;
margin-right: 0;
}

.horizontal-timeline .items .items-list:before {
content: "";
position: absolute;
height: 8px;
width: 8px;
border-radius: 50%;
background-color: #ddd;
top: 0;
margin-top: -5px;
}

.horizontal-timeline .items .items-list {
padding-top: 15px;
}

/* Rest of the styles from the previous example */




  </style>

     

</head>

<body>
    <!-- Preloader -->
    <!-- <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="theme/img/core-img/leaf.png" alt="">
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
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="infodeercreative@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: codewarriors@aptechgdn.net</span></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: +92 320 205 147 9</span></a>
                            </div>

                            <div class="top-header-meta d-flex">
    @if(auth()->check())
    <!-- Language Dropdown -->
    <div class="language-dropdown">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle mr-30" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('profile.show') }}">Manage Account</a>
                <a class="dropdown-item" href="{{url('dashboard')}}">Dashboard</a>
                <a class="dropdown-item" href="{{url('checkout')}}">Checkout</a>
                <!-- <a class="dropdown-item" href="{{url('logout')}}">Logout</a> -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item" class="btn" style="color:white;">Logout</button>
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
            </a>                         
        </span></span></a>
    </div>
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
                        <a href="index.html" class="nav-brand"><img style="height:80px;" src="/theme/img/core-img/Untitled-5.png" alt=""></a>

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
                                    <li><a href="{{url('contact')}}">Contact</a></li>
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
            <input type="search" name="search" id="searchInput" placeholder="I am looking for.....">
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

<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card border-top border-bottom border-3" style="border-color: #70c745 !important;">
                    <div class="card-body p-5">

                        <p class="lead fw-bold mb-5" style="color: #70c745;">Purchase Receipt</p>
                        <b class="lead fw-bold mb-5" style="background-color: #70c745; float:right;text-transform:uppercase; padding:5px;color:white;"><b>{{$orderdetail[0]->o_status}}</b></b>

                        <div class="row">
                            <div class="col mb-3">
                                <p class="small text-muted mb-1">Date</p>
                                <p>{{ $orderdetail[0]->created_at }}</p>
                            </div>
                            <div class="col mb-3">
                                <p class="small text-muted mb-1">Order No.</p>
                                <p>#00{{ $orderdetail[0]->order_id }}</p>
                            </div>
                        </div>

                            <!-- Loop through order details -->
                            @foreach($orderdetail as $item)
                            <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                                <div class="row">
                                    <div class="col-md-8 col-lg-9">
                                        <p>{{ $item->product_name }}   * {{$item->quantity}}</p>
                                    </div>
                                    <div class="col-md-4 col-lg-3">
                                        <p>{{ $item->subtotal }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="row my-4">
                                <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
                                    <p class="lead fw-bold mb-0" style="color: #70c745;"> Rs.    {{ $orderdetail[0]->total }}</p>
                                </div>
                            </div>
                    



            </div>
            </div>
            </div>
            </div>
            </div>
</section>




























  
    <div id="feedback-form-wrapper">
        <div id="floating-icon">
          <button type="button" class="btn-sm rounded-0" style="background-color: #70c745;" data-toggle="modal" data-target="#exampleModal">
            Feedback
          </button>
      
        </div>
        <div id="feedback-form-modal" class="six">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-aos="fade-up" data-aos-duration="1000">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Feedback Form</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
   
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">How likely you would like to recommand us to your friends?</label>
                      <div class="rating-input-wrapper d-flex justify-content-between mt-2">
                        </div>
                        <div class="star-rating">
    <span class="star" data-value="1"><i class="fa fa-star"></i></span>
    <span class="star" data-value="2"><i class="fa fa-star"></i></span>
    <span class="star" data-value="3"><i class="fa fa-star"></i></span>
    <span class="star" data-value="4"><i class="fa fa-star"></i></span>
    <span class="star" data-value="5"><i class="fa fa-star"></i></span>
</div>
<form action="{{ route('store-feedback') }}" method="POST" id="feedback-form">
    @csrf
                        <input type="hidden" name="rating" id="rating">
                        <?php
                         $userId = Auth::id();
                        ?>
                        <input type="hidden" value="{{ $userId }}" name="userid" class="form-control"  >

                     
                    </div>
                  
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"  >close</button>
                    <button type="submit" class="btn btn-secondary" style="background-color: #70c745; color: white; border: none;">Submit</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>   
<br><br><br><br>


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
                                    <a href="shop-details.html"><img src="theme/img/bg-img/4.jpg" alt=""></a>
                                </div>
                                <div class="product-info">
                                    <a href="shop-details.html">Cactus Flower</a>
                                    <p>$10.99</p>
                                </div>
                            </div>

                            <!-- Single Best Seller Products -->
                           
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>CONTACT</h5>
                            </div>

                            <div class="contact-information">
                                <p><span>Address:</span> Garden West Shoe Market Karachi, Pakistan</p>
                                <p><span>Phone:</span> +92 320 205 147 9</p>
                                <p><span>Email:</span> codewarriors@aptechgdn.net</p>
                                <p><span>Open days:</span> Mon - Sun</p>
                                <p><span>Open hours:</span> 24 hours</p>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="{{url('/')}}" target="_blank">Code Warrior</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                        </div>
                    </div>
                    <!-- Footer Nav -->
                    <div class="col-12 col-md-6">
                        <div class="footer-nav">
                            <nav>
                                <ul>
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('shop')}}">Shop</a></li>
                                    <li><a href="#">Service</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="{{url('contact')}}">Contact</a></li>
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
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating');
    const feedbackForm = document.getElementById('feedback-form');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            ratingInput.value = value;

            // Remove active class from all stars
            stars.forEach(s => s.classList.remove('active'));

            // Add active class to selected stars
            for (let i = 0; i < value; i++) {
                stars[i].classList.add('active');
            }
        });
    });

    feedbackForm.addEventListener('submit', function(event) {
        if (!ratingInput.value) {
            event.preventDefault();
            alert('Please select a rating before submitting.');
        }
    });
});
</script>





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