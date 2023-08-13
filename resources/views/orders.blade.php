@extends('layouts.admin')

@section('admin')

<style>
/* Product Area */
.product-area {
    padding-top: 60px;
    padding-bottom: 50px;
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
    color: #ff6a00;
    font-weight: bold;
}
.product-area .tab-content {
    padding: 20px;
    border: 1px solid #ddd;
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

<div class="container-fluid px-4">
    <h1 class="mt-4">Orders</h1>
</div>

<div class="product-area pt-60 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active shadow btn btn-outline-warning" data-toggle="tab" href="#pending"><span >Pending</span></a></li>
                        <li><a data-toggle="tab" class="shadow btn btn-outline-primary" href="#accepted"><span >In Process</span></a></li>
                        <li><a data-toggle="tab" class="shadow btn btn-outline-success" href="#complete"><span >Complete</span></a></li>
                        <li><a data-toggle="tab" class="shadow btn btn-outline-danger" href="#rejected"><span >Reject</span></a></li>
                        <li><a data-toggle="tab" class="shadow btn btn-outline-danger" href="#cancel"><span >Canceled</span></a></li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <!-- pending -->
            <div id="pending" class="tab-pane active show" role="tabpanel">
                <div class="container-fluid shadow">
                    <div class="table-responsive">
                        <table id="orderpending" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Order Created</th>
                                    <th>Customer Id</th>
                                    <th>Subtotal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendingorder as $porder)
                                    <tr>
                                        <td>{{$porder->id}}</td>
                                        <td>{{$porder->created_at->format('d-m-Y')}}</td>
                                        <td>{{ $porder->user_name}}</td>
                                        
                                        <td>{{$porder->subtotal}}</td>
                                        <td>
                                            <select name="order_status" id="order_status_{{$porder->id}}" data-order-id="{{$porder->id}}">
                                                @foreach($orderStatusNames as $statusName)
                                                    <option value="{{ $statusName->id }}" {{ $statusName->id == $porder->order_status ? 'selected' : '' }}>
                                                        {{ $statusName->orderstatus }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <a href="{{ route('orderdetails', ['id' => $porder->id]) }}" title="View detail " class="text-black">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- accepted -->
            <div id="accepted" class="tab-pane" role="tabpanel">
                <div class="container-fluid shadow">
                    <div class="table-responsive">
                        <table id="orderaccepted" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Order Created</th>
                                    <th>Customer Id</th>
                                    <th>Subtotal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($acceptorder as $aorder)
                                    <tr>
                                        <td>{{$aorder->id}}</td>
                                        <td>{{$aorder->created_at->format('d-m-Y')}}</td>
                                        <td>{{ $aorder->user_name}}</td>
                                        <td>{{$aorder->subtotal}}</td>
                                        <td>
                                            <select name="order_status" id="order_status_{{$aorder->id}}" data-order-id="{{$aorder->id}}">
                                                @foreach($orderStatusNames as $statusName)
                                                    <option value="{{ $statusName->id }}" {{ $statusName->id == $aorder->order_status ? 'selected' : '' }}>
                                                        {{ $statusName->orderstatus }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <a href="{{ route('orderdetails', ['id' => $aorder->id]) }}" title="View detail " class="text-black">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- complete -->
            <div id="complete" class="tab-pane" role="tabpanel">
                <div class="container-fluid shadow">
                    <div class="table-responsive">
                        <table id="ordercomplete" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Order Created</th>
                                    <th>Customer Id</th>
                                    <th>Subtotal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($completeorder as $corder)
                                    <tr>
                                        <td>{{$corder->id}}</td>
                                        <td>{{$corder->created_at->format('d-m-Y')}}</td>
                                        <td>{{ $corder->user_name}}</td>
                                         <td>{{$corder->subtotal}}</td>
                                        <td>
                                            <select name="order_status" id="order_status_{{$corder->id}}" data-order-id="{{$corder->id}}">
                                                @foreach($orderStatusNames as $statusName)
                                                    <option value="{{ $statusName->id }}" {{ $statusName->id == $corder->order_status ? 'selected' : '' }}>
                                                        {{ $statusName->orderstatus }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <a href="{{ route('orderdetails', ['id' => $corder->id]) }}" title="View detail " class="text-black">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- rejected -->
            <div id="rejected" class="tab-pane" role="tabpanel">
                <div class="container-fluid shadow">
                    <div class="table-responsive">
                        <table id="orderrejected" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Order Created</th>
                                    <th>Customer Id</th>
                                    <th>Subtotal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rejectorder as $rorder)
                                    <tr>
                                        <td>{{$rorder->id}}</td>
                                        <td>{{$rorder->created_at->format('d-m-Y')}}</td>
                                        <td>{{ $rorder->user_name}}</td>
                                          <td>{{$rorder->subtotal}}</td>
                                        <td>
                                            <select name="order_status" id="order_status_{{$rorder->id}}" data-order-id="{{$rorder->id}}">
                                                @foreach($orderStatusNames as $statusName)
                                                    <option value="{{ $statusName->id }}" {{ $statusName->id == $rorder->order_status ? 'selected' : '' }}>
                                                        {{ $statusName->orderstatus }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <a href="{{ route('orderdetails', ['id' => $rorder->id]) }}" title="View detail " class="text-black">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <!-- cancel -->

        <div id="cancel" class="tab-pane  " role="tabpanel">
                <div class="container-fluid shadow">
                    <div class="table-responsive">
                        <table id="ordercancel" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Order Created</th>
                                    <th>Customer Id</th>
                                    <th>Subtotal</th>
                                    <th>View</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cancelorder as $corder)
                                    <tr>
                                        <td>{{$corder->id}}</td>
                                        <td>{{$corder->created_at->format('d-m-Y')}}</td>
                                        <td>{{ $corder->user_name}}</td>
                                        
                                        <td>{{$corder->subtotal}}</td>
                                        
                                        <td>
                                            <a href="{{ route('orderdetails', ['id' => $corder->id]) }}" title="View detail " class="text-black">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize DataTable for each tab
        $('#orderpending').DataTable();
        $('#orderaccepted').DataTable();
        $('#ordercomplete').DataTable();
        $('#orderrejected').DataTable();
        $('#ordercancel').DataTable();

        // Function to update the order status
        function updateOrderStatus(orderId, newStatus) {
            $.ajax({
                url: '/update-order-status/' + orderId,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    order_status: newStatus
                },
                success: function(response) {
                    alert(response.message); // Show success message in an alert
                    location.reload(); // Reload the page on success
                },
                error: function(xhr) {
                    alert('Error occurred while updating order status');
                    // Reset the dropdown value to the previous status if an error occurs
                    var previousStatus = $('#order_status_' + orderId).data('previous-status');
                    $('#order_status_' + orderId).val(previousStatus);
                }
            });
        }

        // Save the previous status in the data attribute when the page loads
        $('select[name="order_status"]').each(function() {
            $(this).data('previous-status', $(this).val());
        });

        // Add event listener to the dropdowns for each row in each tab
        $('select[name="order_status"]').change(function() {
            var orderId = $(this).data('order-id');
            var newStatus = $(this).val();

            // Show a confirmation dialog
            if (confirm('Do you want to update the order status?')) {
                updateOrderStatus(orderId, newStatus);
            } else {
                // If the user clicks "Cancel" on the confirmation dialog, reset the dropdown value to the previous status
                var previousStatus = $(this).data('previous-status');
                $(this).val(previousStatus);
            }
        });

        // Function to disable options based on the selected status
        function disableOptions(selectedStatus, dropdown) {
            var pendingOption = dropdown.find('option[value="1"]');
            var processOption = dropdown.find('option[value="2"]');
            var completeOption = dropdown.find('option[value="3"]');
            var rejectOption = dropdown.find('option[value="4"]');

            switch (selectedStatus) {
                case '1': // Pending
                    completeOption.prop('disabled', true);
                    rejectOption.prop('disabled', true);
                    break;
                case '2': // Process
                    pendingOption.prop('disabled', true);
                    break;
                case '3': // Complete
                    pendingOption.prop('disabled', true);
                    processOption.prop('disabled', true);
                    rejectOption.prop('disabled', true);
                    break;
                case '4': // Reject
                    pendingOption.prop('disabled', true);
                    processOption.prop('disabled', true);
                    completeOption.prop('disabled', true);
                    break;
                default:
                    // Enable all options if the selected status is not recognized
                    pendingOption.prop('disabled', false);
                    processOption.prop('disabled', false);
                    completeOption.prop('disabled', false);
                    rejectOption.prop('disabled', false);
                    break;
            }
        }

        // Disable options based on the initial status on page load for each tab
        $('select[name="order_status"]').each(function() {
            var selectedStatus = $(this).val();
            disableOptions(selectedStatus, $(this));
        });

        // Add event listener to the dropdowns for each row in each tab
        $('select[name="order_status"]').change(function() {
            var selectedStatus = $(this).val();
            disableOptions(selectedStatus, $(this));
        });
    });
</script>
@endsection