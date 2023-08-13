@extends('layouts.user')

@section('user')

<?php

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\order;
use App\Models\order_status;
use App\Models\order_details;
use Illuminate\Support\Facades\DB;


$myOrders = DB::table('orders')
->join('order_details', 'orders.id', '=', 'order_details.order_id') 
->leftJoin('order_statuses', 'orders.order_status', '=', 'order_statuses.id')
->select(
    'order_details.product_image',
    'order_details.product_name',
    'orders.created_at',
    'orders.total',
    'order_statuses.orderstatus',
    'orders.order_status',
    'orders.id',
    'order_details.product_id',
    'orders.user_id'

)
->get();



// if (Auth::check()) {
//     $user = Auth::user();
    
    // $myOrders = DB::table('orders')
        // ->join('order_details', 'orders.id', '=', 'order_details.order_id')
        // ->join('order_statuses', 'orders.order_status', '=', 'order_statuses.id')
        // ->select(
        //     'orders.created_at',
        //     'order_details.product_image',
        //     'order_details.product_name',
        //     'orders.total',
        //     'order_statuses.orderstatus'
        // )
        // ->where('orders.user_id', $user->id)
        // ->get();

//     return view('dashboard', compact('myOrders'));
// } else {
//     // Handle user not authenticated
//     return redirect()->route('login');
// }

            
?>
<div class="container">
    <div class="row">
        
        <div class="col-md-4 col-lg-4 offset-md-4">
            <canvas id="pieChart" height="200px"></canvas>
        </div>
   
        </div>

    </div>
 
    @if (session('success'))
        <div class="alert alert-success" >{{ session('success') }}</div>
        
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="row">



        <div class="col-md-1"></div>
    <div class="col-md-10 col-lg-10  ">
        <h3>MY ORDERS( {{ count($myOrders) }})</h3>
    <div class="table-responsive">
        <table id="example" class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>S.NO</th>
                    <th>ORDER CREATED</th>
                    <th>IMAGE</th>
                    <th>NAME</th>
                    <th>TOTAL</th>
                    <th>STATUS</th>
                    
                    <th>ACTION</th>
                    <th>VIEW</th>
                </tr>
            </thead>
            <tbody>
            @php
            $counter = 1;
        @endphp
            @foreach($myOrders as $order)
                <tr>
                <td>{{ $counter }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td><img width="50" height="50" src="{{ asset('images/'.$order->product_image) }}" alt="productimage"></td>
                    <td>{{ $order->product_name }}</td>
                    <td>{{ $order->total }}</td>
                   
                    <td>
                        @if($order->order_status == 1)
                            <p style="color:gold">PENDING</p>
                        @elseif($order->order_status == 2)
                        <p style="color:blue">IN-PROCESS</p>
                        @elseif($order->order_status == 3)
                        <p style="color:green">DELIVERED</p>
                        @elseif($order->order_status == 4)
                        <p style="color:red">REJECT</p>
                       
                        @elseif($order->order_status == 5)
                        <p style="color:red">CANCELED</p>
                        @endif
                    </td>
                    <td>
                    @if($order->order_status == 1 || $order->order_status == 2)
                <form action="{{ route('cancel-order', ['orderId' => $order->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Cancel Order</button>
                </form>
          
                        @elseif($order->order_status == 3)
                        <button class="btn btn-primary" onclick="openProductReviewModal()">Review</button>


                        @elseif($order->order_status == 4)
                           <a href="{{url('contact')}}">Contact Us</a> 
                         @elseif($order->order_status == 5)
                           <p>CANCELED</p> 
                        @endif
                    </td>
                   
                    <td>
    <a href="{{ route('vieworderdetails', ['id' => $order->id]) }}" title="View detail" class="text-black">
        <i class="fa fa-eye"></i>
    </a>
</td>
                </tr>
                @php
                $counter++;
            @endphp
                @endforeach
               
            </tbody>
        </table>
    </div>
    </div>
    </div>

</div>


<div class="modal fade" id="productReviewModal" tabindex="-1" aria-labelledby="productReviewModalLabel" aria-hidden="true" data-aos-duration="1000">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productReviewModalLabel">Write a Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('submit-review') }}" method="POST">
    @csrf
    @foreach($myOrders as $order)
    <input type="hidden" name="order_id" value="{{ $order->id }}">
    <input type="hidden" name="product_id" value="{{ $order->product_id }}">
    <input type="hidden" name="user_id" value="{{ $order->user_id }}">
@endforeach
    <div class="mb-3">
        <label for="reviewContent" class="form-label">Review Content</label>
        <textarea class="form-control" id="reviewContent" name="review_content" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit Review</button>
</form>

            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
        // Get order status counts
        var pendingCount = 0;
        var processCount = 0;
        var completeCount = 0;
        var rejectCount = 0;
        var cancelCount = 0;

        @foreach($myOrders as $order)
            @if($order->order_status == 1)
                pendingCount++;
            @elseif($order->order_status == 2)
                processCount++;
            @elseif($order->order_status == 3)
                completeCount++;
            @elseif($order->order_status == 4)
                rejectCount++;
                @elseif($order->order_status == 5)
                cancelCount++;
            @endif
        @endforeach

        // Pie Chart Data
        var pieData = {
            labels: ['Pending', 'Process', 'Complete', 'reject','cancel'],
            datasets: [{
                data: [pendingCount, processCount, completeCount, rejectCount,cancelCount],
                backgroundColor: ['#FFCE56', '#36A2EB', '#70C745', '#FF5733','#ebebeb']
            }]
        };

        // Pie Chart Initialization
        var pieChart = new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: pieData
        });
    </script>


<script>
    function openProductReviewModal() {
        $('#productReviewModal').modal('show');
    }
</script>
<script>
    function closeModal() {
        $('#closeModal').modal('hide');
    }
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>



<script>
    $(document).ready(function() {
        $('#submitReviewForm').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '{{ route('submit-review') }}',
                data: formData,
                success: function(response) {
                    $('#productReviewModal').modal('hide');
                    alert(response.success);
                },
                error: function(xhr) {
                    alert('Error submitting review');
                }
            });
        });
    });
</script>





@endsection