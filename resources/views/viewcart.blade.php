@extends('layouts.header_footer')

@section('theme')
<br><br>
   <!-- ##### Breadcrumb Area Start ##### -->
   <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        
  

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->






    <!-- ##### Cart Area Start ##### -->
    <div class="cart-area section-padding-0-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                @if(session('cart') && count(session('cart')) > 0)
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    
                                    <th>TOTAL</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $total = 0 @endphp
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                            @php
                                                // Calculate the total price for each product
                                         
                                                $image = isset($details['image']) ? asset('images/' . $details['image']) : '';
                                                $subtotal = $details['price'] * $details['quantity'];
                                                $total += $subtotal;
                                            @endphp
                            

                                <tr>
                           

                                    <td class="cart_product_img">
                                    @if($image)
                                        <a href="#"><img width="70" height="70" style="border: 1px solid black;" src="{{ $image }}" alt="Plant Image"></a>
                                        @endif
                                    </td>
                                    <td class="price"><span>{{ $details['name'] }}</span></td>


                                    </td>
                                    <td class="price"><span>Rs.  {{ $details['price'] }}</span></td>
                                         

                        <td class="qty">
                            <div class="quantity">
                                <span class="qty-minus dec qtybutton" onclick="var effect = document.getElementById('qty-{{ $id }}'); var qty = effect.value; if (!isNaN(qty) && qty > 1) effect.value--; return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                <input type="number" class="qty-text cart-quantity-input" id="qty-{{ $id }}" step="1" min="1" max="99" name="quantity" data-id="{{ $id }}" data-quantity="{{ $details['quantity'] }}" value="{{ $details['quantity'] }}">
                                <span class="qty-plus inc qtybutton" onclick="var effect = document.getElementById('qty-{{ $id }}'); var qty = effect.value; if (!isNaN(qty)) effect.value++; return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                        </td>
                                    <td class="total_price"><span>{{ $subtotal }}</span></td>

                                    <td class="action"><a href="{{ route('cart.delete', $id) }}"><i class="fa fa-close"></i></a></td>
                                </tr>
                                @endforeach
                                    @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Coupon Discount -->
                <div class="col-12 col-lg-6">
               <a href="{{url('flush-cart')}}">   <button class="btn btn-danger">Delete all Carts</button></a>  
                </div>

                <!-- Cart Totals -->
                <div class="col-12 col-lg-6">
                    <div class="cart-totals-area mt-70">
                        <h5 class="title--">Cart Total</h5>
                        <div class="subtotal d-flex justify-content-between">
                            <h5>Subtotal</h5>
                            <h5>Rs.  {{ $total }}</h5>
                        </div>
                        <div class="shipping d-flex justify-content-between">
                            <h5>Shipping</h5>
                            @php
                                         
                                            $shippingCharge = $total >= 4000 ? 0 : 300;
                                            $totalWithShipping = $total + $shippingCharge;
                                        @endphp
                                        <div>
                                            
                                         <b>   <span style="color: {{ $total >= 4000 ? '#70c745' : 'black' }}">
                                                @if($total >= 4000)
                                                    Free 
                                                @else
                                                    Rs.  {{ $shippingCharge }}
                                                @endif
                                            </span>
</div></b>
                        </div>
                        <div class="total d-flex justify-content-between">
                            <h5>Total</h5>
                            <h5>Rs.  {{ $totalWithShipping }}</h5>
                        </div>
                        <div class="checkout-btn">
                            <a href="{{url('checkout')}}" class="btn alazea-btn w-100">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @else
    <div class="empty-cart-message text-center">
                    <p>Your cart is empty. Continue shopping to add items.</p>
                    <a href="{{ url('/') }}" class="btn alazea-btn">Continue Shopping</a>
                </div>
                @endif
                </div>
        </div>
    </div>
</div>
    <!-- ##### Cart Area End ##### -->





   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--  -->
<script>
$(document).ready(function() {
    // Increase quantity
    $(document).on('click', '.qtybutton.inc', function() {
        var input = $(this).siblings('input.cart-quantity-input');
        var quantity = parseInt(input.val());
        if (quantity < 10) {
            input.val(quantity);
            updateCartQuantity(input);
        }
    });

    // Decrease quantity
    $(document).on('click', '.qtybutton.dec', function() {
        var input = $(this).siblings('input.cart-quantity-input');
        var quantity = parseInt(input.val());
        if (quantity > 1) {
            input.val(quantity);
            updateCartQuantity(input);
        }
    });

    // Quantity input change event
    $(document).on('input', '.cart-quantity-input', function() {
        var input = $(this);
        var newQuantity = parseInt(input.val());
        if (newQuantity >= 1 && newQuantity <= 10) {
            updateCartQuantity(input);
        } else {
            // If input value is less than 1 or greater than 10, set it to 1
            input.val(newQuantity);
            updateCartQuantity(input);
        }
    });

    function updateCartQuantity(input) {
        var id = input.data('id');
        var newQuantity = input.val();
        // Perform an AJAX request to update the cart with the new quantity
        $.ajax({
            url: "{{ route('cart.update', ['id' => ':id']) }}".replace(':id', id),
            method: "POST",
            data: {
                id: id,
                quantity: newQuantity,
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                // Refresh the page after successful update
                location.reload();
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
});
</script>





<script>
$(document).ready(function() {
    $('.li-product-remove a').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    location.reload(); // Refresh the page after successful deletion
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});
</script>


@endsection