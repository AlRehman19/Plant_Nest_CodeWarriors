@extends('layouts.header_footer')

@section('theme')

 
 <br><br>
 <!-- ##### Breadcrumb Area Start ##### -->
 <div class="breadcrumb-area">
    

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->
    <section class="shop-page section-padding-0-100">
        <div class="container">
            <div class="row">
                <!-- Shop Sorting Data -->
                <div class="col-12">
                    <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                        <!-- Shop Page Count -->
                        <div class="shop-page-count">
                            <p>Showing 1–9 of 72 results</p>
                        </div>
                        <!-- Search by Terms -->
                        <div class="search_by_terms">
                            <form action="#" method="post" class="form-inline">
                                <select class="custom-select widget-title">
                                  <option selected>Short by Popularity</option>
                                  <option value="1">Short by Newest</option>
                                  <option value="2">Short by Sales</option>
                                  <option value="3">Short by Ratings</option>
                                </select>
                                <select class="custom-select widget-title">
                                  <option selected>Show: 9</option>
                                  <option value="1">12</option>
                                  <option value="2">18</option>
                                  <option value="3">24</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" >
                <!-- Sidebar Area -->
                <div class="col-12 col-md-4 col-lg-3 ">
                    <div class="shop-sidebar-area">

                <!-- price -->
                    <div class="shop-widget price mb-50">
        <h4 class="widget-title">Prices</h4>
        <div class="widget-desc">
            <div class="slider-range">
                <div id="price-slider"></div>
                <input type="text" id="price-range" readonly>
            </div>
            <button class="btn btn-primary mt-3" id="applyPriceFilter">Apply</button>
            <p id="price-filter-message"></p>
        </div>
    </div>


                        <!-- Shop Widget -->
                        <div class="shop-widget catagory mb-50">
                        <h4 class="widget-title">CATEGORIES</h4>
                        <div class="widget-desc">
                            @foreach ($categoryData as $data)
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input category-checkbox" id="customCheck{{ $data['category_name'] }}" data-category-name="{{ $data['category_name'] }}">
                                    <label class="custom-control-label" for="customCheck{{ $data['category_name'] }}">{{ $data['category_name'] }}<span class="text-muted">({{ $data['product_count'] }})</span></label>
                                </div>
                            @endforeach
                            <button class="btn btn-primary mt-3" id="showAllProductsBtn">Show All Products</button>
                        </div>
                    </div>
                                            <!-- Shop Widget -->
                                     <!-- Shop Widget - Sorting Options -->
<div class="shop-widget sort-by mb-50">
    <h4 class="widget-title">Sort by</h4>
    <div class="widget-desc">
        <!-- New Arrivals -->
        <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
            <input type="checkbox" class="custom-control-input sort-checkbox" id="customCheck7" data-sort="new_arrivals">
            <label class="custom-control-label" for="customCheck7">New arrivals</label>
        </div>
        <!-- Alphabetically, A-Z -->
        <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
            <input type="checkbox" class="custom-control-input sort-checkbox" id="customCheck8" data-sort="alphabetical_a_z">
            <label class="custom-control-label" for="customCheck8">Alphabetically, A-Z</label>
        </div>
        <!-- Alphabetically, Z-A -->
        <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
            <input type="checkbox" class="custom-control-input sort-checkbox" id="customCheck9" data-sort="alphabetical_z_a">
            <label class="custom-control-label" for="customCheck9">Alphabetically, Z-A</label>
        </div>
        <!-- Price: Low to High -->
        <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
            <input type="checkbox" class="custom-control-input sort-checkbox" id="customCheck10" data-sort="price_low_high">
            <label class="custom-control-label" for="customCheck10">Price: low to high</label>
        </div>
        <!-- Price: High to Low -->
        <div class="custom-control custom-checkbox d-flex align-items-center">
            <input type="checkbox" class="custom-control-input sort-checkbox" id="customCheck11" data-sort="price_high_low">
            <label class="custom-control-label" for="customCheck11">Price: high to low</label>
        </div>
    </div>
</div>

                        <!-- Shop Widget -->
                       
                    </div>
                </div>

                <!-- All Products Area -->
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop-products-area">
                    <div class="row" id="productListing">

                            <!-- Single Product Area -->
                            
                            @foreach($shopcards as $shopcard)
                            <div class="col-12 col-sm-6 col-lg-4 mb-5">
                                <a href="{{url('products/'. $shopcard->slug)}}">
                                    <div class="card">
                                        <img style="height:200px;" src="{{ asset('images/'.$shopcard->image) }}" alt="">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$shopcard->productName}}</h5>
                                            
                                            <div class="price-box">
                                                @if($shopcard->discount > 0)
                                                <span class="old-price" style="font-size:15px;text-decoration: line-through;">${{$shopcard->costPrice}}</span>
                                                <span class="new-price" style="color:#70c745"><b> $    {{$shopcard->discountPrice}}</b></span>
                                                @else
                                                <span class="new-price"  style="color:#70c745"><b> $   {{$shopcard->costPrice}}</b></span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                      

                            
                        </div>
                        <br>

                        <!-- Pagination -->
                        <!-- <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </nav> -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Area End ##### -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- category -->
<script>
$(document).ready(function() {
    var productListing = $('#productListing'); // Reference to the product listing <div>

    // Function to load products based on selected categories
    function loadProductsByCategories(categories) {
        productListing.empty(); // Clear existing product listing

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('get.products.by.categories') }}",
            method: 'POST',
            data: { categories: categories },
            success: function(response) {
                if (response.products.length > 0) {
                    // Loop through products and append them to the product listing
                    for (var i = 0; i < response.products.length; i++) {
                        var product = response.products[i];
                        var productHtml = '<div class="col-12 col-sm-6 col-lg-4 mb-5">' +
                  '<a href="{{ url("products/") }}/' + product.slug + '">' +
                  '<div class="card">' +
                  '<img style="height:200px;" src="{{ asset("images/") }}/' + product.image + '" alt="">' +
                  '<div class="card-body">' +
                  '<h5 class="card-title">' + product.productName + '</h5>' +
                  
                  '<div class="price-box">' +
                  '<span class="old-price" style="font-size:15px;text-decoration: line-through;">$' + (product.discount > 0 ? product.costPrice : '') + '</span>' +
                  '<span class="new-price" style="color:#70c745"><b> $' + (product.discount > 0 ? product.discountPrice : product.costPrice) + '</b></span>' +
                  '</div>' +
                  '</div>' +
                  '</div>' +
                  '</a>' +
                  '</div>';

                        productListing.append(productHtml);
                    }
                } else {
                    productListing.append('<p>No products available.</p>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Checkbox change event
    $('.category-checkbox').on('change', function() {
        var selectedCategories = [];
        $('.category-checkbox:checked').each(function() {
            selectedCategories.push($(this).data('category-name'));
        });
        loadProductsByCategories(selectedCategories);
    });

    // Show All Products button click event
    $('#showAllProductsBtn').on('click', function() {
        $('.category-checkbox').prop('checked', false);
        loadProductsByCategories([]);
    });
});
</script>

<!-- category end -->


<!-- price -->

<script>
    $(document).ready(function() {
        var minDiscountPrice = <?php echo $minDiscountPrice; ?>;
        var maxDiscountPrice = <?php echo $maxDiscountPrice; ?>;
        
        // Initialize the price slider
        $("#price-slider").slider({
            range: true,
            min: minDiscountPrice,
            max: maxDiscountPrice,
            values: [minDiscountPrice, maxDiscountPrice],
            slide: function(event, ui) {
                $("#price-range").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        
        // Initial price range label
        $("#price-range").val("$" + minDiscountPrice + " - $" + maxDiscountPrice);
        
        // Apply price filter
        $("#applyPriceFilter").on("click", function() {
            var minValue = $("#price-slider").slider("values", 0);
            var maxValue = $("#price-slider").slider("values", 1);
            loadProductsByPriceRange(minValue, maxValue);
        });
        
        // Load products within a price range
        function loadProductsByPriceRange(minValue, maxValue) {
            var productListing = $("#productListing");
            productListing.empty();
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('get.products.by.price.range') }}",
                method: "POST",
                data: { min_price: minValue, max_price: maxValue },
                success: function(response) {
                    if (response.products.length > 0) {
                        for (var i = 0; i < response.products.length; i++) {
                            var product = response.products[i];
                            var productHtml = '<div class="col-12 col-sm-6 col-lg-4 mb-5">' +
                  '<a href="{{ url("products/") }}/' + product.slug + '">' +
                  '<div class="card">' +
                  '<img style="height:200px;" src="{{ asset("images/") }}/' + product.image + '" alt="">' +
                  '<div class="card-body">' +
                  '<h5 class="card-title">' + product.productName + '</h5>' +
                  
                  '<div class="price-box">';
                        if (product.discount > 0) {
                            productHtml += '<span class="old-price" style="font-size:15px;text-decoration: line-through;">$' + product.costPrice + '</span>' +
                                        '<span class="new-price" style="color:#70c745"><b> $' + product.discountPrice + '</b></span>';
                        } else {
                            productHtml += '<span class="new-price" style="color:#70c745"><b> $' + product.costPrice + '</b></span>';
                        }
                        productHtml += '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</a>' +
                                    '</div>';
                        productListing.append(productHtml);

                        }
                        $("#price-filter-message").text("Showing products in the selected price range.");
                    } else {
                        productListing.append('<p></p>');
                        $("#price-filter-message").text("No products available in the selected price range.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
</script>



<!-- sort -->

<script>
    $(document).ready(function() {
        // ... Other scripts ...

        // Checkbox change event for sorting options
        $('.sort-checkbox').on('change', function() {
            var sortOption = $(this).data('sort');
            loadProductsBySorting(sortOption);
        });

        // Function to load products based on selected sorting
        function loadProductsBySorting(sortOption) {
            var productListing = $('#productListing');
            productListing.empty(); // Clear existing product listing
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('get.products.by.sorting') }}",
                method: 'POST',
                data: { sort_option: sortOption },
                success: function(response) {
                    if (response.products.length > 0) {
                        for (var i = 0; i < response.products.length; i++) {
                            // Generate product card HTML and append to productListing
                            var product = response.products[i];
                            var productHtml = '<div class="col-12 col-sm-6 col-lg-4 mb-5">' +
                                              '<a href="{{ url("products/") }}/' + product.slug + '">' +
                                              '<div class="card">' +
                                              '<img style="height:200px;" src="{{ asset("images/") }}/' + product.image + '" alt="">' +
                                              '<div class="card-body">' +
                                              '<h5 class="card-title">' + product.productName + '</h5>' +
                                              
                                              '<div class="price-box">';
                        if (product.discount > 0) {
                            productHtml += '<span class="old-price" style="font-size:15px;text-decoration: line-through;">$' + product.costPrice + '</span>' +
                                        '<span class="new-price" style="color:#70c745"><b> $' + product.discountPrice + '</b></span>';
                        } else {
                            productHtml += '<span class="new-price" style="color:#70c745"><b> $' + product.costPrice + '</b></span>';
                        }
                        productHtml += '</div>' +
                                              '</div>' +
                                              '</div>' +
                                              '</a>' +
                                              '</div>';
                            productListing.append(productHtml);
                        }
                        $("#price-filter-message").text("Showing products sorted by " + sortOption);
                    } else {
                        productListing.append('<p>No products available.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
</script>


    @endsection