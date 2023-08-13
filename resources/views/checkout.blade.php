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
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->
   
    @if (session('message'))
        <div class="alert alert-success" >{{ session('message') }}</div>
        
    @endif
    @if (session('insufficientStockMessage'))
    <div class="alert alert-danger">
        {{ session('insufficientStockMessage') }}
    </div>
@endif
    <!-- ##### Checkout Area Start ##### -->
    <form action="{{ route('order.process') }}" method="POST">
            @csrf
    <div class="checkout_area mb-100">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-7">
                    <div class="checkout_details_area clearfix">
                        <h5>Billing Details</h5>
                     
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label for="first_name">Full Name *</label>
                                    <input type="text" class="form-control @error('billing_name') is-invalid @enderror" name="billing_name" id="first_name" value="">
                                    @error('billing_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address *</label>
                                    <input type="email" name="billing_email" class="form-control @error('billing_email') is-invalid @enderror" id="email_address" value="">
                                    @error('billing_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="phone_number">Phone Number *</label>
                                    <input type="number" name="billing_phone" class="form-control @error('billing_phone') is-invalid @enderror" id="phone_number" min="0" value="">
                                    @error('billing_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="company">Address *</label>
                                    <input type="text" name="billing_address" class="form-control @error('billing_email') is-invalid @enderror" id="address" value="">
                                    @error('billing_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                               
                               
                                <div class="col-md-12 mb-4">
                                    <label for="order-notes">Order Notes</label>
                                    <textarea class="form-control" name="customer_notes" id="order-notes" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                               
                            </div>
                       
                    </div>
                </div>
                @if(session('cart') && count(session('cart')) > 0)
                <div class="col-12 col-lg-4 shadow">
    <div class="checkout-content">
        @if(session('cart'))
            <h5 class="title--">Your Order</h5>
            @php
                $total = 0;
                $shippingCharge = 0;
            @endphp
            <div class="products">
                @foreach(session('cart') as $id => $details)
                    @php
                        // Calculate the total price for each product
                        $subtotal = $details['price'] * $details['quantity'];
                        $total += $subtotal;

                        // Calculate shipping charge
                        if ($total < 4000) {
                            $shippingCharge = 25;
                        }
                    @endphp
                    <div class="products-data"style="padding:20px 0;">
                        <h5>Products:</h5>
                        <div class="single-products d-flex justify-content-between align-items-center">
                            <p>{{ $details['name'] }} × {{ $details['quantity'] }}</p>
                            <h5>Rs.  {{ $subtotal }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="subtotal d-flex justify-content-between align-items-center">
                <h5>Subtotal</h5>
                <h5>Rs.  {{ $total }}</h5>
            </div>
            <div class="shipping d-flex justify-content-between align-items-center">
                <h5>Shipping</h5>
                <h5 style="color: {{ $total >= 4000 ? '#70c745' : 'black' }}">
                    @if($total >= 4000)
                        Free
                    @else
                        Rs.  {{ $shippingCharge }}
                    @endif
                </h5>
            </div>
            <div class="order-total d-flex justify-content-between align-items-center">
                <h5>Order Total</h5>
                <h5>Rs.  {{ $total + $shippingCharge }}</h5>
            </div>
            <div class="cod-section mt-30">
                <a href="#" id="cod-link" class="h4"><b>COD</b></a>
                <div id="cod-radio">
                    <input type="radio" class=" @error('billing_phone') is-invalid @enderror" id="cash-on-delivery"name="payment_type" name="payment-method" value="cod" required>
                    <label for="cash-on-delivery"><b>Cash on Delivery</b></label>
                    @error('payment_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                </div>
            </div>
            <div class="checkout-btn mt-30">
            <input value="Place order" class="btn alazea-btn w-100" type="submit">
            </div>
        @endif
    </div>
</div>
@else
    <p>No add to cart Products...</p>

@endif
            </div>
        </div>
    </div>
    </form>
    <!-- ##### Checkout Area End ##### -->

    
    @endsection