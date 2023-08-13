<!-- resources/views/order_confirmation.blade.php -->
@extends('layouts.header_footer')

@section('theme')

    <div class="container">
        <h1>Order Confirmation</h1>
        <p>Thank you for your order! Your order ID is: {{ $order_id }}</p>
        <!-- Display other order details here -->
    </div>
@endsection
