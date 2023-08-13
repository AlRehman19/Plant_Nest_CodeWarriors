@extends('layouts.admin')

@section('admin')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
         <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
 

<style>
body{
    background:#F7F7F7;
}
.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}
.text-reset {
    --bs-text-opacity: 1;
    color: inherit!important;
}
a {
    color: #5465ff;
    text-decoration: none;
}
</style>
@php
                                    $order = $orderdetail[0]; // Assuming there's only one order
                                @endphp


<div class="container-fluid">

<div class="container">
  <!-- Title -->
  <div class="d-flex justify-content-between align-items-center py-3">
  <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order Deatils</h2>

  </div>

  <!-- Main content -->
  <div class="row">
    <div class="col-lg-8">
      <!-- Details -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="mb-3 d-flex justify-content-between">
            <div>
           
              <span class="me-3">{{$order->created_at->format('d-m-Y')}}</span>
              <span class="badge rounded-pill bg-info">{{$order->o_status}}</span>
              
            </div>
          </div>
          <div class="shadow table-responsive">
          <table class="table table-bordered table-hover">
          <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Prduct Name</th>
                    <th> Product Quantity</th>
                    <th>Product Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach($orderdetail as $order)
              <tr>
          
                <td>
                      <img src="{{asset ('images/' . $order->product_image) }}" alt="" width="50" class="img-fluid">
                      </td>
                     <td>
                      <h6 class="small mb-0">{{ $order->product_name }}</h6>
                    </td>
                <td> {{ $order->quantity }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->quantity * $order->price }}</td>

                @endforeach
              </tr>
            </tbody>
            <tfoot>
    @php
        $subtotals = 0;
        $shippingCharges = 0;
    @endphp

    @foreach($orderdetail as $order)
        @php
            $subtotals += $order->subtotal;
          
        @endphp
    @endforeach
    @php
           
            $shippingCharges += $order->shipping_charges;
        @endphp

    <tr>
        <td class="text-end" colspan="4">Subtotal</td>
        <td class="text-end">{{$subtotals}}</td>
    </tr>
    <tr>
        <td class="text-end" colspan="4">Shipping</td>
        <td class="text-end">{{$shippingCharges}}</td>
      
    </tr>
  

    <tr class="fw-bold">
        <td class="text-end" colspan="4">TOTAL</td>
        <td class="text-end">{{$subtotals + $shippingCharges}}</td>
    </tr>
</tfoot>
          </table>
          </div>
        </div>
      </div>
      <!-- Payment -->
      <div class="card mb-4 shadow">
        <div class="card-body">
          <div class="row">
     
            <div class="col-lg-6">
              <h3 class="h4"><b>Payment Method</b></h3>
              Order Type: <span class="badge bg-success rounded-pill">{{$order->payment_type}}</span></p>
              Total:  <span class="badge bg-success rounded-pill">{{$order->total}}</span></p>
              
            </div>
            <div class="col-lg-6">
              <h3 class="h4"><b>Billing address </b></h3>
              <address>
                Name: <b>{{$order->full_name}}</b> <br>
                Address: <b>{{$order->address}}</b><br>
                Email: <b>{{$order->email}}</b><br>
                <abbr title="Phone">Phone:</abbr><b>{{$order->phone}}</b>
              </address>
            </div>

            
            </div>
        </div>
      </div>
    </div>
    
   
    <div class="col-lg-4">
        <!-- Customer Notes -->
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="h4"><b>Customer Notes</b></h3>
                <p>{{ $order->customer_notes }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <!-- Shipping information -->
            <div class="card-body">
                <h3 class="h4"><b>Customer Details</b></h3>
                <hr>
                <address>
    @if ($order->user_name && $order->user_email)
        Name: <b>{{ $order->user_name }}</b><br>
        Email: <b>{{ $order->user_email }}</b>
    @else
        <span style="color:red;">Guest</span>
    @endif
</address>
            </div>
        </div>
    </div>







    
  </div>
</div>
  </div>


     <!-- Include Bootstrap JS and jQuery -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="/assets/demo/chart-area-demo.js"></script>
        <script src="/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="/js/datatables-simple-demo.js"></script>

@endsection