@extends('layouts.admin')

@section('admin')


<?php
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\order;
use App\Models\order_status;
use App\Models\order_details;
use Illuminate\Support\Facades\DB;


$totalUsers = User::where('role', 1)->count();
$activeUsers = User::where('role', 1)->where('status', 1)->count();
$inactiveUsers = User::where('role', 1)->where('status', 0)->count();

$fetechusers = User::where('role', 1)->get();

$chartData = Category::select('categories.name as category_name', DB::raw('COUNT(products.id) as product_count'))
        ->leftJoin('products', 'categories.id', '=', 'products.category')
        ->groupBy('categories.id', 'categories.name')
        ->get();


        $ordersData = Order::select('order_status', DB::raw('COUNT(*) as count'))
        ->groupBy('order_status')
        ->get();

        $inStockCount = Product::where('quantity', '>', 0)->count();
        $outOfStockCount = Product::where('quantity', '=', 0)->count();
        
        $productCounts = [
            'inStock' => $inStockCount,
            'outOfStock' => $outOfStockCount,
        ];
        

?>
<main>
    <style>
         canvas {
            width: 100%;
        max-width: 800px;
    }
    .chart-container{
        width: 100%;
       
    }
    </style>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                   


                        <div class="row shadow ">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 border ">
            <div id="piechart_3d" class="chart-container " style="height: 300px;"></div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 border">
            <div class="chart-container ">
           
            <canvas id="productStatusChart" width="300" style="height: 300px;"></canvas>
            </div>
        </div>
    </div>
    <br><br>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Product Count by Category
                                    </div>
                                    <div class="card-body"><canvas id="categoryChart"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Order Status
                                    </div>
                                    <div class="card-body"> <canvas id="orderStatusChart" width="400" height="200"></canvas></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               ALL USERS
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>NAME</th>
                                            <th>EAMIL</th>
                                            <th>Number</th>
                                            <th>User Name</th>
                                            <th>ROLE</th>
                                            <th>STATUS</th>
                                            <th>CREATE DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($fetechusers as $fetechuser)
                                    <tr>
                          
                                <td>
                                    {{ $fetechuser->id }}
                                </td>
                                <td>
                                    {{ $fetechuser->name }}
                                </td>
                                <td>
                                    {{ $fetechuser->email }}
                                </td>
                                <td>
                                    {{ $fetechuser->number }}
                                </td>
                                <td>
                                    {{ $fetechuser->username }}
                                </td>
                                                        <td>
                                    @if($fetechuser->Role == 1)
                                        User
                                    @endif
                                </td>
                                <td>
                                    @if($fetechuser->status == 1)
                                       <strong style="color:green">Active</strong> 
                                    @else
                                    <span style="color:red">Inactive</span> 
                                    @endif
                                </td>
                                <td>
                                    {{ $fetechuser->created_at }}
                                </td>

                            
                        </tr>
                        @endforeach     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 
<script type="text/javascript">

google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ["Task", "All Users"],
      ["Total", {{ $totalUsers }}],
      ["Inactive", {{$inactiveUsers}}],
      ["Active", {{$activeUsers}}],
     
   
    ]);

    var options = {
      title: "ALL USERS",
      is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById("piechart_3d"));
    chart.draw(data, options);
  }
</script>


<!-- order status -->
<script>
        var ctx = document.getElementById("orderStatusChart").getContext("2d");
        
        // Assuming you passed the ordersData from your controller
        var ordersData = @json($ordersData);
        
        var labels = ordersData.map(item => {
            if (item.order_status == 1) {
                return 'Pending';
            } else if (item.order_status == 2) {
                return 'Processing';
            } else if (item.order_status == 3) {
                return 'Completed';
            } else if (item.order_status == 4) {
                return 'Rejected';
            }
        });
        
        var counts = ordersData.map(item => item.count);
        
        var data = {
            labels: labels,
            datasets: [{
                label: "Order Count",
                data: counts,
                fill: false,
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 2,
                pointBackgroundColor: "rgba(75, 192, 192, 1)",
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        };
        
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };
        
        var lineChart = new Chart(ctx, {
            type: "line",
            data: data,
            options: options
        });
    </script>

    <!-- product based on category -->

<script>
    var ctx = document.getElementById("categoryChart").getContext("2d");

    var chartData = @json($chartData);

    var labels = chartData.map(item => item.category_name);
    var counts = chartData.map(item => item.product_count);

    var data = {
        labels: labels,
        datasets: [{
            label: "Product Count",
            data: counts,
            backgroundColor: "rgba(0, 128, 0, 0.5)", // Area fill color
            borderColor: "rgba(0, 128, 0, 1)", // Line color
            borderWidth: 2
        }]
    };

    var options = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                grid: {
                    display: false
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: "rgba(0, 0, 0, 0.1)"
                }
            }
        }
    };

    var categoryChart = new Chart(ctx, {
        type: "bar",
        data: data,
        options: options
    });
</script>

<!-- productcount -->

<script>
        var ctx = document.getElementById("productStatusChart").getContext("2d");
        
        // Assuming you passed the productCounts from your controller
        var productCounts = @json($productCounts);
        
        var labels = ['In Stock', 'Out of Stock'];
        
        var data = {
            labels: labels,
            datasets: [{
                data: [productCounts.inStock, productCounts.outOfStock],
                backgroundColor: ["rgba(75, 192, 192, 0.5)", "rgba(255, 99, 132, 0.5)"],
                borderWidth: 1
            }]
        };
        
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top'
                }
            }
        };
        
        var pieChart = new Chart(ctx, {
            type: "pie",
            data: data,
            options: options
        });
    </script>

@endsection