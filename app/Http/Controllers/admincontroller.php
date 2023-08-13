<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\order_status;
use App\Models\order_details;

class admincontroller extends Controller
{
    public function order()
    {
        $orderStatusNames = order_status::oldest()->take(4)->get();
        $pendingorder = order::select('orders.*', 'order_status.orderstatus as status_name')
        ->join('order_statuses', 'orders.order_status', '=', 'order_statuses.id')
        ->leftJoin('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.*', 'users.name as user_name')
        ->where('order_status','1') 
        ->get();
        $acceptorder = order::select('orders.*', 'order_statuses.orderstatus as status_name')
        ->leftJoin('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.*', 'users.name as user_name')
        ->join('order_statuses', 'orders.order_status', '=', 'order_statuses.id')
        ->where('order_status','2')
        ->get();
        $completeorder = order::select('orders.*', 'order_statuses.orderstatus as status_name')
        ->join('order_statuses', 'orders.order_status', '=', 'order_statuses.id')
        ->leftJoin('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.*', 'users.name as user_name')
        ->where('order_status','3')
        ->get();
        $rejectorder = order::select('orders.*', 'order_status.orderstatus as status_name')
        ->join('order_statuses', 'orders.order_status', '=', 'order_statuses.id')
        ->leftJoin('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.*', 'users.name as user_name')
        ->where('order_status','4')
        ->get();
        $cancelorder = order::select('orders.*', 'order_status.orderstatus as status_name')
        ->join('order_statuses', 'orders.order_status', '=', 'order_statuses.id')
        ->leftJoin('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.*', 'users.name as user_name')
        ->where('order_status','5')
        ->get();
        return view('orders', compact('orderStatusNames', 'pendingorder','acceptorder','completeorder','rejectorder','cancelorder'));
    }

     public function updateOrderStatus(Request $request, $orderId)
   {
       $newStatus = $request->input('order_status');
   
       // Validate the input here if needed...
   
       // Update the order status in the 'orders' table
       $order = order::find($orderId);
       if (!$order) {
           return response()->json(['message' => 'Order not found'], 404);
       }
   
       // Assuming the 'order_status' column in the 'orders' table references the 'id' column in the 'order_statuses' table
       $order->order_status = $newStatus;
       $order->save();
   
       return response()->json(['message' => 'Order status updated successfully'], 200);
   }

   public function orderdetails($id)
   {
       $orderdetail = order::join('order_details', 'orders.id', '=', 'order_details.order_id')
           ->leftJoin('users', 'orders.user_id', '=', 'users.id')
           ->leftJoin('order_statuses', 'orders.order_status', '=', 'order_statuses.id') // Join with order_statuses table
           ->select('order_details.product_name', 'order_details.product_image', 'order_details.quantity', 'order_details.price',
               'orders.subtotal', 'orders.shipping_charges', 'orders.total', 'orders.full_name', 'orders.address',
               'orders.email', 'orders.phone', 'orders.payment_type',
                 'orders.customer_notes','orders.created_at','order_statuses.orderstatus as o_status',
               'users.name as user_name', 'users.email as user_email')
           ->where('orders.id', $id) // Filter by the specific order ID
           ->get();
   
       return view('order_details', compact('orderdetail'));
   }
}
