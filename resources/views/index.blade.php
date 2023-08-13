@extends('layouts.header_footer')

@section('theme')
      <style>
/* Product Area */
.product-area {
    padding-top: 60px;
    padding-bottom: 50px;
    background:#f2f4f5;
}
.product-area .li-product-tab {
    margin-bottom: 30px;
}
.product-area .li-product-menu {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}
.product-area .li-product-menu li {
    margin-right: 20px;
}
.product-area .li-product-menu li a {
    text-decoration: none;
    color: #333;
    font-size: 16px;
}
.product-area .li-product-menu li a.active {
    color: #70c745;
    font-weight: bold;
}

.product-area .tab-content .product-active {
    display: flex;
    flex-wrap: wrap;
}
.product-area .single-product-wrap {
    width: 100%;
    padding: 20px;
    border: 1px solid #ddd;
}
.product-area .single-product-wrap .product-image {
    position: relative;
}
.product-area .single-product-wrap .product-image img {
    max-width: 100%;
}
.product-area .single-product-wrap .sticker {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: #ff6a00;
    color: #fff;
    padding: 5px 10px;
    font-size: 12px;
    border-radius: 3px;
}
.product-area .single-product-wrap .product_desc {
    margin-top: 15px;
}
.product-area .single-product-wrap .product_desc .product-review {
    display: flex;
    justify-content: space-between;
}
.product-area .single-product-wrap .product_desc .product-review h5 {
    margin: 0;
}
.product-area .single-product-wrap .product_desc .product-review h5 a {
    text-decoration: none;
    color: #333;
}
.product-area .single-product-wrap .product_desc .rating-box {
    /* Add your rating styles here */
}
.product-area .single-product-wrap .product_desc h4 {
    margin: 10px 0;
}
.product-area .single-product-wrap .product_desc .price-box {
    margin-top: 10px;
}
.product-area .single-product-wrap .product_desc .price-box .new-price {
    font-size: 16px;
    font-weight: bold;
    color: #333;
}
.product-area .single-product-wrap .product_desc .price-box .old-price {
    font-size: 12px;
    color: #777;
    text-decoration: line-through;
}
.product-area .single-product-wrap .add-actions {
    margin-top: 10px;
}
.product-area .single-product-wrap .add-actions ul {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}
.product-area .single-product-wrap .add-actions ul li {
    margin-right: 10px;
}
.product-area .single-product-wrap .add-actions ul li a {
    text-decoration: none;
    color: #333;
}
.product-area .single-product-wrap .add-actions ul li a i {
    margin-right: 5px;
}

</style>






<!-- <style>
body {
    margin: 0;
    padding: 0;
    background: #ddd;
    font-family: 'Lato', sans-serif;
      transition: 1s;
  }
  
  .item {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 240px;
    height: 340px;
    background: #fff;
    -webkit-box-shadow: 0 5px 15px rgba(0,0,0,0.25);
    box-shadow: 0 5px 15px rgba(0,0,0,0.25);
    border-radius: 5px;
    overflow: hidden;
    transition: 1s;
  }
  
  /* .item .img-box {
    /* height: 100%;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    transition: 1s; */
   */
  
  .item .img-box img {
    
    width: 100%;
  }
  
  .details {
    position: absolute;
    bottom: -135px;
    width: 100%;
    background: #fff;
    padding: 10px;
    padding-top: 0;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-box-shadow: 0 0 0 rgba(0,0,0,0);
    box-shadow: 0 0 0 rgba(0,0,0,0);
    transition: 1s;
  }
  
  
  
  .details h2 {
    margin: 0;
    padding: 0;
    padding-bottom: 25px;
    width: 100%;
    font-size: 16px;
  }
  
  .details h2 span {
    font-size: 12px;
    color: #bbb;
    font-weight: normal;
  }
  
  .details .price {
    position: absolute;
    top: 0;
    right: 25px;
    font-weight: bold;
    font-size: 20px;
  }
  
  label {
    display: block;
    margin-top: 5px;
    font-weight: bold;
    font-size: 14px;
  }
  
  ul {
    display: -webkit-flex;
    display: -ms-flex;
    display: flex;
    margin: 0;
    padding: 0;
  }
  
  ul li {
    list-style: none;
    margin: 5px 5px 0;
    font-size: 12px;
    font-weight: normal;
    color: #bbb;
    transition: 0.7s;
  }
  
  ul li:hover {
    cursor: pointer;
    color: #333;
    transition: 0.7s;
  }
  
  ul li:first-child {
    margin-left: 0;
  }
  
  ul.colors li {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    cursor: pointer;
  }
  
  ul.colors li:hover {
    box-shadow: 1px 1px 1px rgba(0,0,0,0.5);
  }
  
  ul.colors li:nth-child(1) {
    background: #9F8A42;
  }
  
  ul.colors li:nth-child(2) {
    background: #ACAEA9;
  }
  
  ul.colors li:nth-child(3) {
    background: #cd7f32;
  }
  
  a {
    display: block;
    padding: 5px;
    color: #fff;
    margin: 15px 0 0;
    background: #333;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    transition: 1s;
  }
  
  a:hover {
    background: #666;
    transition: 1s;
  }
  
  
  .item:hover .details {
    overflow: visible;
    bottom: 0;
    box-shadow: 0 5px 15px rgba(0,0,0,0.25);
    transition: 1s;
  }
  
  .item:hover .img-box {
    position: absolute;
    bottom: 60px;
    transition: 3s;
  }
  
  .item:hover h2, .item:hover .price {
    padding-top: 20px;
    padding-bottom: 0;
  }
  
</style> -->

<!-- cardstyle -->

<style>
    <style>
    .product-card1 {
  border: 1px solid #e0e0e0;
  transition: transform 0.3s;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  overflow: hidden;
  position: relative;
}

.product-card1:hover {
  transform: translateY(-5px);
}

.product-card1 img {
  height: 200px;
  object-fit: cover;
}

.discount-label {
  position: absolute;
  top: 0;
  left: 0;
  background-color: #e74c3c;
  color: white;
  padding: 5px 10px;
  font-size: 14px;
}

.product-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: rgba(0, 0, 0, 0.7);
  opacity: 0;
  transition: opacity 0.3s;
}

.product-card1:hover .product-overlay {
  opacity: 1;
}

.product-overlay h5,
.product-overlay p {
  color: white;
  margin: 5px 0;
}

.product-buttons button {
  margin: 5px;
}

</style>
</style>


<!-- endcardstyle -->

<section class="hero-area">
        <div class="hero-post-slides owl-carousel">

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(theme/img/bg-img/1.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2>Plants exist in the weather and light rays that surround them</h2>
<p>
Plants Nest is a sustainable and eco-friendly initiative that promotes a new perspective on plant ownership. With a commitment to recycling and environmental responsibility, Plants Nest offers an innovative approach to acquiring and nurturing plants. Our platform empowers individuals to embrace plant ownership through affordable means, fostering a connection with nature while contributing to a more sustainable future. Join us in creating a greener world, one plant at a time, with Plants Nest.</p>                                <div class="welcome-btn-group">
                                    <a href="{{url('shop')}}" class="btn alazea-btn mr-30">GET STARTED</a>
                                    <a href="{{url('contact')}}" class="btn alazea-btn active">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(theme/img/bg-img/2.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2>Plants exist in the weather and light rays that surround them</h2>
<p>
Plants Nest is a sustainable and eco-friendly initiative that promotes a new perspective on plant ownership. With a commitment to recycling and environmental responsibility, Plants Nest offers an innovative approach to acquiring and nurturing plants. Our platform empowers individuals to embrace plant ownership through affordable means, fostering a connection with nature while contributing to a more sustainable future. Join us in creating a greener world, one plant at a time, with Plants Nest.</p>                                <div class="welcome-btn-group">
                                    <a href="{{url('shop')}}" class="btn alazea-btn mr-30">GET STARTED</a>
                                    <a href="{{url('contact')}}" class="btn alazea-btn active">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Hero Area End ##### -->


<!-- new portion -->
<div class="product-area pt-60 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#flowering"><span >Flowering</span></a></li>
                        <li><a data-toggle="tab" href="#non-flowering"><span >Non-Flowering</span></a></li>
                        <li><a data-toggle="tab" href="#indoor"><span >Indoor</span></a></li>
                        <li><a data-toggle="tab" href="#outdoor"><span >Outdoor</span></a></li>
                        <li><a data-toggle="tab" href="#succulents"><span >Succelents</span></a></li>
                        <li><a data-toggle="tab" href="#medicinal"><span >Medicinal</span></a></li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-content">

       
            <!-- flowering -->
            <?php
$Flowering = DB::table('products')
->join('species', 'products.species', '=', 'species.id')
->where('products.category', '1')
->select('products.productName','products.quantity','products.id', 'products.costPrice','products.discountPrice','products.discount' ,'products.image', 'species.name as speciesName')
->limit(4)
->get();





    ?>
            <div id="flowering" class="tab-pane active show" role="tabpanel">
                <div class="row">
            @foreach($Flowering as $Flowering)
            
            <div class="col-6 col-sm-6 col-lg-3 col-md-4">
                    <div class="single-product-area mb-50 wow fadeInUp " data-wow-delay="100ms">
                        <!-- Product Image -->
                        <div class="product-img">
                        <img src="{{ asset('images/'.$Flowering->image) }}" style="height: 300px;" class="card-img-top shadow" alt="Product 1">
                            <!-- Product Tag -->
                            <div class="product-tag">@if($Flowering->quantity == 0)
                                            
                                        @endif
                                        @if($Flowering->quantity == 0)
                                        <!-- If quantity is 0, do not display any sticker -->
                                    @elseif($Flowering->discount > 0)
                                        <a href="">{{- $Flowering->discount }}%</a> 
                                    @else
                                       <a href="">NEW</a>
                                    @endif
                            </div>
                          
                                            
                                               
                            <div class="product-meta d-flex">
                            @if($Flowering->quantity == 0)
                            <button class="btn btn-warning wishlist">
                <i class="icon_heart_alt"></i>
              </button>
              <button class="btn btn-success" style="background:red;" href="#">
                Out Of Stock
              </button>
                                
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                @else
                                <button class="btn btn-warning wishlist">
                <i class="icon_heart_alt"></i>
              </button>
              <button class="btn btn-success add-to-cart" style="background:#70c745" href="{{ route('addbook.to.cart', $Flowering->id) }}">
                 Add to Cart
              </button>
                                
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                              
                                @endif
                            </div>
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="shop-details.html">
                            <h5 class="card-title">{{$Flowering->productName}}</h5>
                            </a>
                            <div class="price-box">
                                                @if($Flowering->discount > 0)
                                                <span class="old-price" style="font-size:15px;text-decoration: line-through;">${{$Flowering->costPrice}}</span>
                                                <span class="new-price"  style="color:#70c745"><b> Rs:   {{$Flowering->costPrice}}</b></span>
                                                @else
                                                <span class="new-price"  style="color:#70c745"><b> Rs:   {{$Flowering->costPrice}}</b></span>
                                                @endif
                                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>

            <!-- non-flowering -->
            <?php
$nonflowering = DB::table('products')
->join('species', 'products.species', '=', 'species.id')
->where('products.category', '2')
->select('products.productName','products.quantity','products.id', 'products.costPrice','products.discountPrice','products.discount' ,'products.image', 'species.name as speciesName')
->limit(4)
->get();

    ?>
            <div id="non-flowering" class="tab-pane" role="tabpanel">
            <div class="row">
            @foreach($nonflowering as $nonflowering)
            
            <div class="col-6 col-sm-6 col-lg-3 col-md-4">
                    <div class="single-product-area mb-50 wow fadeInUp " data-wow-delay="100ms">
                        <!-- Product Image -->
                        <div class="product-img">
                        <img src="{{ asset('images/'.$nonflowering->image) }}" style="height: 300px;" class="card-img-top shadow" alt="Product 1">
                            <!-- Product Tag -->
                            <div class="product-tag">@if($nonflowering->quantity == 0)
                                            
                                        @endif
                                        @if($nonflowering->quantity == 0)
                                        <!-- If quantity is 0, do not display any sticker -->
                                    @elseif($nonflowering->discount > 0)
                                        <a href="">{{- $nonflowering->discount }}%</a> 
                                    @else
                                       <a href="">NEW</a>
                                    @endif
                            </div>
                          
                                            
                                               
                            <div class="product-meta d-flex">
                            @if($nonflowering->quantity == 0)
                            <button class="btn btn-warning wishlist">
                <i class="icon_heart_alt"></i>
              </button>
              <button class="btn btn-success" style="background:red;" href="#">
                Out Of Stock
              </button>
                                
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                @else
                                <button class="btn btn-warning wishlist">
                <i class="icon_heart_alt"></i>
              </button>
              <button class="btn btn-success add-to-cart" style="background:#70c745" href="{{ route('addbook.to.cart', $nonflowering->id) }}">
                 Add to Cart
              </button>
                                
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                              
                                @endif
                            </div>
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="shop-details.html">
                            <h5 class="card-title">{{$nonflowering->productName}}</h5>
                            </a>
                            <div class="price-box">
                                                @if($nonflowering->discount > 0)
                                                <span class="old-price" style="font-size:15px;text-decoration: line-through;">${{$nonflowering->costPrice}}</span>
                                                <span class="new-price"  style="color:#70c745"><b> Rs   {{$nonflowering->costPrice}}</b></span>
                                                @else
                                                <span class="new-price"  style="color:#70c745"><b> Rs   {{$nonflowering->costPrice}}</b></span>
                                                @endif
                                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>

            <!-- indoor -->
            <?php
$indoor = DB::table('products')
->join('species', 'products.species', '=', 'species.id')
->where('products.category', '3')
->select('products.productName','products.quantity','products.id', 'products.costPrice','products.discountPrice','products.discount' ,'products.image', 'species.name as speciesName')
->limit(4)
->get();
    ?>
            <div id="indoor" class="tab-pane" role="tabpanel">
            <div class="row">
            @foreach($indoor as $indoor)
            
            <div class="col-6 col-sm-6 col-lg-3 col-md-4">
                    <div class="single-product-area mb-50 wow fadeInUp " data-wow-delay="100ms">
                        <!-- Product Image -->
                        <div class="product-img">
                        <img src="{{ asset('images/'.$indoor->image) }}" style="height: 300px;" class="card-img-top shadow" alt="Product 1">
                            <!-- Product Tag -->
                            <div class="product-tag">@if($indoor->quantity == 0)
                                            
                                        @endif
                                        @if($indoor->quantity == 0)
                                        <!-- If quantity is 0, do not display any sticker -->
                                    @elseif($indoor->discount > 0)
                                        <a href="">{{- $indoor->discount }}%</a> 
                                    @else
                                       <a href="">NEW</a>
                                    @endif
                            </div>
                          
                                            
                                               
                            <div class="product-meta d-flex">
                            @if($indoor->quantity == 0)
                            <button class="btn btn-warning wishlist">
                <i class="icon_heart_alt"></i>
              </button>
              <button class="btn btn-success" style="background:red;" href="#">
                Out Of Stock
              </button>
                                
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                @else
                                <button class="btn btn-warning wishlist">
                <i class="icon_heart_alt"></i>
              </button>
              <button class="btn btn-success add-to-cart" style="background:#70c745" href="{{ route('addbook.to.cart', $indoor->id) }}">
                 Add to Cart
              </button>
                                
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                              
                                @endif
                            </div>
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="shop-details.html">
                            <h5 class="card-title">{{$indoor->productName}}</h5>
                            </a>
                            <div class="price-box">
                                                @if($indoor->discount > 0)
                                                <span class="old-price" style="font-size:15px;text-decoration: line-through;">${{$indoor->costPrice}}</span>
                                                <span class="new-price"  style="color:#70c745"><b> Rs:   {{$indoor->costPrice}}</b></span>
                                                @else
                                                <span class="new-price"  style="color:#70c745"><b> Rs:   {{$indoor->costPrice}}</b></span>
                                                @endif
                                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>

            <!-- outdoor -->
            <?php
$outdoor = DB::table('products')
->join('species', 'products.species', '=', 'species.id')
->where('products.category', '4')
->select('products.productName','products.quantity','products.id', 'products.costPrice','products.discountPrice','products.discount' ,'products.image', 'species.name as speciesName')
->limit(4)
->get();
    ?>
            <div id="outdoor" class="tab-pane" role="tabpanel">
            <div class="row">
            @foreach($outdoor as $outdoor)
            
            <div class="col-6 col-sm-6 col-lg-3 col-md-4">
                    <div class="single-product-area mb-50 wow fadeInUp " data-wow-delay="100ms">
                        <!-- Product Image -->
                        <div class="product-img">
                        <img src="{{ asset('images/'.$outdoor->image) }}" style="height: 300px;" class="card-img-top shadow" alt="Product 1">
                            <!-- Product Tag -->
                            <div class="product-tag">@if($outdoor->quantity == 0)
                                            
                                        @endif
                                        @if($outdoor->quantity == 0)
                                        <!-- If quantity is 0, do not display any sticker -->
                                    @elseif($outdoor->discount > 0)
                                        <a href="">{{- $outdoor->discount }}%</a> 
                                    @else
                                       <a href="">NEW</a>
                                    @endif
                            </div>
                          
                                            
                                               
                            <div class="product-meta d-flex">
                            @if($outdoor->quantity == 0)
                            <button class="btn btn-warning wishlist">
                <i class="icon_heart_alt"></i>
              </button>
              <button class="btn btn-success" style="background:red;" href="#">
                Out Of Stock
              </button>
                                
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                @else
                                <button class="btn btn-warning wishlist">
                <i class="icon_heart_alt"></i>
              </button>
              <button class="btn btn-success add-to-cart" style="background:#70c745" href="{{ route('addbook.to.cart', $outdoor->id) }}">
                 Add to Cart
              </button>
                                
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                              
                                @endif
                            </div>
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="shop-details.html">
                            <h5 class="card-title">{{$outdoor->productName}}</h5>
                            </a>
                            <div class="price-box">
                                                @if($outdoor->discount > 0)
                                                <span class="old-price" style="font-size:15px;text-decoration: line-through;">${{$outdoor->costPrice}}</span>
                                                <span class="new-price"  style="color:#70c745"><b> Rs:   {{$outdoor->costPrice}}</b></span>
                                                @else
                                                <span class="new-price"  style="color:#70c745"><b> Rs:   {{$outdoor->costPrice}}</b></span>
                                                @endif
                                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>


            <!-- succulents -->
            <?php
$succulents = DB::table('products')
->join('species', 'products.species', '=', 'species.id')
->where('products.category', '5')
->select('products.productName','products.quantity','products.id', 'products.costPrice','products.discountPrice','products.discount' ,'products.image', 'species.name as speciesName')
->limit(4)
->get();
    ?>
            <div id="succulents" class="tab-pane" role="tabpanel">
            <div class="row">
            @foreach($succulents as $succulents)
            
            <div class="col-6 col-sm-6 col-lg-3 col-md-4">
                    <div class="single-product-area mb-50 wow fadeInUp " data-wow-delay="100ms">
                        <!-- Product Image -->
                        <div class="product-img">
                        <img src="{{ asset('images/'.$succulents->image) }}" style="height: 300px;" class="card-img-top shadow" alt="Product 1">
                            <!-- Product Tag -->
                            <div class="product-tag">@if($succulents->quantity == 0)
                                            
                                        @endif
                                        @if($succulents->quantity == 0)
                                        <!-- If quantity is 0, do not display any sticker -->
                                    @elseif($succulents->discount > 0)
                                        <a href="">{{- $succulents->discount }}%</a> 
                                    @else
                                       <a href="">NEW</a>
                                    @endif
                            </div>
                          
                                            
                                               
                            <div class="product-meta d-flex">
                            @if($succulents->quantity == 0)
                            <button class="btn btn-warning wishlist">
                <i class="icon_heart_alt"></i>
              </button>
              <button class="btn btn-success" style="background:red;" href="#">
                Out Of Stock
              </button>
                                
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                @else
                                <button class="btn btn-warning wishlist">
                <i class="icon_heart_alt"></i>
              </button>
              <button class="btn btn-success add-to-cart" style="background:#70c745" href="{{ route('addbook.to.cart', $succulents->id) }}">
                 Add to Cart
              </button>
                                
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                              
                                @endif
                            </div>
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="shop-details.html">
                            <h5 class="card-title">{{$succulents->productName}}</h5>
                            </a>
                            <div class="price-box">
                                                @if($succulents->discount > 0)
                                                <span class="old-price" style="font-size:15px;text-decoration: line-through;">${{$succulents->costPrice}}</span>
                                                <span class="new-price"  style="color:#70c745"><b> Rs:   {{$succulents->costPrice}}</b></span>
                                                @else
                                                <span class="new-price"  style="color:#70c745"><b> Rs:   {{$succulents->costPrice}}</b></span>
                                                @endif
                                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>


            <!-- medicinal -->
            <?php
$medicinal = DB::table('products')
->join('species', 'products.species', '=', 'species.id')
->where('products.category', '6')
->select('products.productName','products.quantity','products.id', 'products.costPrice','products.discountPrice','products.discount' ,'products.image', 'species.name as speciesName')
->limit(4)
->get();
    ?>
            <div id="medicinal" class="tab-pane" role="tabpanel">
            <div class="row">








            
            @foreach($medicinal as $medicinal)
            
            <div class="col-6 col-sm-6 col-lg-3 col-md-4">
            <div class="card">
  <img class="card-img-top" src="{{ asset('images/'.$medicinal->image) }}" alt="Card image">
  <div class="product-tag">@if($medicinal->quantity == 0)
                                            
                                            @endif
                                            @if($medicinal->quantity == 0)
                                            <!-- If quantity is 0, do not display any sticker -->
                                        @elseif($medicinal->discount > 0)
                                            <a href="">{{- $medicinal->discount }}%</a> 
                                        @else
                                           <a href="">NEW</a>
                                        @endif
                                </div>
  <div class="card-body">
    <h4 class="card-title">{{$medicinal->productName}}</h4>
    @if($medicinal->quantity == 0)
    <a href="#" class="btn btn-primary">Out Of Stock</a>
    @else
    <a href="#" class="btn btn-primary">Add to cart</a>
    @endif
    <a href="#" class="btn btn-primary">  @if($medicinal->discount > 0)
                                                <span class="old-price" style="font-size:15px;text-decoration: line-through;">${{$medicinal->costPrice}}</span>
                                                <span class="new-price"  style="color:#70c745"><b> Rs:   {{$medicinal->costPrice}}</b></span>
                                                @else
                                                <span class="new-price"  style="color:#70c745"><b> Rs:   {{$medicinal->costPrice}}</b></span>
                                                @endif</a>
  </div>
</div>







@endforeach
                  
    </div>
   
</div>
<!-- end new portion -->
    <!-- ##### Service Area Start ##### -->
    <section class="our-services-area bg-gray section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>OUR SERVICES</h2>
                        <p>We provide the perfect service for you.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-lg-5">
                    <div class="alazea-service-area mb-100">

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <img src="theme/img/core-img/s1.png" alt="">
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>Plants Care</h5>
                                <p>In Aenean purus, pretium sito amet sapien denim moste consectet sedoni urna placerat sodales.service its.</p>
                            </div>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="300ms">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <img src="theme/img/core-img/s2.png" alt="">
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>Pressure Washing</h5>
                                <p>In Aenean purus, pretium sito amet sapien denim moste consectet sedoni urna placerat sodales.service its.</p>
                            </div>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="500ms">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <img src="theme/img/core-img/s3.png" alt="">
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>Tree Service &amp; Trimming</h5>
                                <p>In Aenean purus, pretium sito amet sapien denim moste consectet sedoni urna placerat sodales.service its.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="alazea-video-area bg-overlay mb-100">
                        <img src="theme/img/bg-img/23.jpg" alt="">
                        <a href="http://www.youtube.com/watch?v=7HKoqNJtMTQ" class="video-icon">
                            <i class="fa fa-play" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Service Area End ##### -->


            

    <!-- ##### Portfolio Area Start ##### -->
    <section class="alazea-portfolio-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>OUR CATALOG</h2>
                        <p>We devote all of our experience and efforts for creation</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alazea-portfolio-filter">
                        <div class="portfolio-filter">
                            <button class="btn active" data-filter="*">All</button>
                            <button class="btn" data-filter=".design">Coffee Design</button>
                            <button class="btn" data-filter=".garden">Garden</button>
                            <button class="btn" data-filter=".home-design">Home Design</button>
                            <button class="btn" data-filter=".office-design">Office Design</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row alazea-portfolio">

                <!-- Single Portfolio Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item design home-design wow fadeInUp" data-wow-delay="100ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(theme/img/bg-img/16.jpg);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="img/bg-img/16.jpg" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 1">
                            <div class="port-hover-text">
                                <h3>Minimal Flower Store</h3>
                                <h5>Office Plants</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single Portfolio Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden wow fadeInUp" data-wow-delay="200ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(theme/img/bg-img/17.jpg);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="img/bg-img/17.jpg" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 2">
                            <div class="port-hover-text">
                                <h3>Minimal Flower Store</h3>
                                <h5>Office Plants</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single Portfolio Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden design wow fadeInUp" data-wow-delay="300ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(theme/img/bg-img/18.jpg);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="img/bg-img/18.jpg" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 3">
                            <div class="port-hover-text">
                                <h3>Minimal Flower Store</h3>
                                <h5>Office Plants</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single Portfolio Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden office-design wow fadeInUp" data-wow-delay="400ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(theme/img/bg-img/19.jpg);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="img/bg-img/19.jpg" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 4">
                            <div class="port-hover-text">
                                <h3>Minimal Flower Store</h3>
                                <h5>Office Plants</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single Portfolio Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item design office-design wow fadeInUp" data-wow-delay="100ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(theme/img/bg-img/20.jpg);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="img/bg-img/20.jpg" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 5">
                            <div class="port-hover-text">
                                <h3>Minimal Flower Store</h3>
                                <h5>Office Plants</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single Portfolio Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden wow fadeInUp" data-wow-delay="200ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(theme/img/bg-img/21.jpg);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="img/bg-img/21.jpg" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 6">
                            <div class="port-hover-text">
                                <h3>Minimal Flower Store</h3>
                                <h5>Office Plants</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single Portfolio Area -->
                <div class="col-12 col-lg-6 single_portfolio_item home-design wow fadeInUp" data-wow-delay="300ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(theme/img/bg-img/22.jpg);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="img/bg-img/22.jpg" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 7">
                            <div class="port-hover-text">
                                <h3>Minimal Flower Store</h3>
                                <h5>Office Plants</h5>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Portfolio Area End ##### -->

    <!-- ##### Testimonial Area Start ##### -->
    <section class="testimonial-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel">

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-thumb">
                                        <img src="theme/img/bg-img/13.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-content">
                                        <!-- Section Heading -->
                                        <div class="section-heading">
                                            <h2>TESTIMONIAL</h2>
                                            <p>Some kind words from clients about Alazea</p>
                                        </div>
                                        <p>“Alazea is a pleasure to work with. Their ideas are creative, they came up with imaginative solutions to some tricky issues, their landscaping and planting contacts are equally excellent we have a beautiful but also manageable garden as a result. Thank you!”</p>
                                        <div class="testimonial-author-info">
                                            <h6>Mr. Nick Jonas</h6>
                                            <p>CEO of NAVATECH</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-thumb">
                                        <img src="theme/img/bg-img/14.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-content">
                                        <!-- Section Heading -->
                                        <div class="section-heading">
                                            <h2>TESTIMONIAL</h2>
                                            <p>Some kind words from clients about Alazea</p>
                                        </div>
                                        <p>“Alazea is a pleasure to work with. Their ideas are creative, they came up with imaginative solutions to some tricky issues, their landscaping and planting contacts are equally excellent we have a beautiful but also manageable garden as a result. Thank you!”</p>
                                        <div class="testimonial-author-info">
                                            <h6>Mr. Nazrul Islam</h6>
                                            <p>CEO of NAVATECH</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-thumb">
                                        <img src="theme/img/bg-img/15.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-content">
                                        <!-- Section Heading -->
                                        <div class="section-heading">
                                            <h2>TESTIMONIAL</h2>
                                            <p>Some kind words from clients about Alazea</p>
                                        </div>
                                        <p>“Alazea is a pleasure to work with. Their ideas are creative, they came up with imaginative solutions to some tricky issues, their landscaping and planting contacts are equally excellent we have a beautiful but also manageable garden as a result. Thank you!”</p>
                                        <div class="testimonial-author-info">
                                            <h6>Mr. Jonas Nick</h6>
                                            <p>CEO of NAVATECH</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Testimonial Area End ##### -->

    <!-- ##### Product Area Start ##### -->

    <!-- ##### Product Area End ##### -->

   

    <!-- ##### Subscribe Area Start ##### -->
    <section class="subscribe-newsletter-area" style="background-image: url(theme/img/bg-img/subscribe.png);">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading mb-0">
                        <h2>Join the Newsletter</h2>
                        <p>Subscribe to our newsletter</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="subscribe-form">
                        <form action="#" method="get">
                            <input type="email" name="subscribe-email" id="subscribeEmail" placeholder="Enter your email">
                            <button type="submit" class="btn alazea-btn">SUBSCRIBE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscribe Side Thumbnail -->
        <div class="subscribe-side-thumb wow fadeInUp" data-wow-delay="500ms">
            <img class="first-img" src="theme/img/core-img/leaf.png" alt="">
        </div>
    </section>
    <!-- ##### Subscribe Area End ##### -->

 


    
     

@endsection