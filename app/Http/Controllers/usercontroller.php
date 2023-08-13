<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\species;
use App\Models\product;
use App\Models\order;
use App\Models\user;
use App\Models\order_status;
use App\Models\order_details;
use App\Models\contact; 
use App\Models\feedback;
use App\Models\productreview;
use Auth;
use DB;
use Str;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function index()
    {
        // $userId = Auth::id();
        $categories = Category::all();
        // $feedback = feedback::join('users', 'feedback.user_id', '=', 'users.id')
        //     ->where('feedback.user_id', $userId)
        //     ->select('feedback.*', 'users.username', 'users.email','users.id')
        //     ->get();
        // Assuming you have a 'products' relationship defined in your Category model

        $newarivals = Product::latest()->take(4)->get();
      
        return view('index', compact('categories','newarivals'));
    }

    public function shop()
    { 
        $shopcards = Product::join('species', 'products.species', '=', 'species.id')
        ->select('products.*', 'species.name as species_name')
        ->get();
        $categories = Category::all();

        $categoryData = [];
        foreach ($categories as $category) {
            $productCount = Product::where('category', $category->id)->count();
            $categoryData[] = [
                'category_name' => $category->name,
                'product_count' => $productCount,
            ];
        }

        $minDiscountPrice = Product::min('discountPrice');
        $maxDiscountPrice = Product::max('discountPrice');

        
        return view('shop',compact('shopcards','categoryData','minDiscountPrice','maxDiscountPrice'));
    }


    public function getProductsByCategories(Request $request)
    {
        $selectedCategories = $request->input('categories');

        if (empty($selectedCategories)) {
            $products = Product::all();
        } else {
            $products = Product::whereIn('category', function ($query) use ($selectedCategories) {
                $query->select('id')
                    ->from('categories')
                    ->whereIn('name', $selectedCategories);
            })->get();
        }
        
        return response()->json(['products' => $products]);
    }

    public function getProductsByPriceRange(Request $request)
            {
                $minPrice = $request->input('min_price');
                $maxPrice = $request->input('max_price');

                $products = Product::whereBetween('discountPrice', [$minPrice, $maxPrice])->get();
                return response()->json(['products' => $products]);
            }

            public function getProductsBySorting(Request $request)
            {
                $sortOption = $request->input('sort_option');
            
                switch ($sortOption) {
                    case 'new_arrivals':
                        $products = Product::orderBy('created_at', 'desc')->get();
                        break;
                    case 'alphabetical_a_z':
                        $products = Product::orderBy('productName', 'asc')->get();
                        break;
                    case 'alphabetical_z_a':
                        $products = Product::orderBy('productName', 'desc')->get();
                        break;
                    case 'price_low_high':
                        $products = Product::orderBy('discountPrice', 'asc')->get();
                        break;
                    case 'price_high_low':
                        $products = Product::orderBy('discountPrice', 'desc')->get();
                        break;
                    default:
                        $products = Product::all();
                        break;
                }
            
                return response()->json(['products' => $products]);
            }
            
            public function contact()
            {
                $userId = Auth::id();
                return view('contact', compact('userId'));
            }

            public function storeMessage(Request $request)
            {
                // Validate the form data

                $validatedData = $request->validate([

                    'subject' => 'required|max:255',

                    'userid' => 'required',

                    'message' => 'required|max:500',
                ]);



                // Create a new message instance and store it in the database

                $contact = new contact();
                $contact->user_id = $validatedData['userid'];
                $contact->subject = $validatedData['subject'];
                $contact->message = $validatedData['message'];
                $contact->save();



                // Redirect or respond as needed

                return redirect()->back()->with('success', 'Message sent successfully! We will get in touch with you shortly.');

            }



            
    public function viewcontact()
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        $contacts = Contact::join('users', 'contacts.user_id', '=', 'users.id')
            ->where('contacts.user_id', $userId)
            ->select('contacts.*', 'users.username', 'users.email','users.id')
            ->get();

        return view('viewcontact', compact('contacts'));
    }

    public function storeFeedback(Request $request)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);
    
        $feedback = new Feedback();
        $feedback->feedback = $validatedData['rating'];
        $feedback->user_id = $request->userid;
        $feedback->save();
    
        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
    

            
    public function viewfeedback()
    {
       

        $contacts = feedback::join('users', 'feedback.user_id', '=', 'users.id')
            ->select('feedback.*', 'users.username', 'users.email','users.id')
            ->get();

        return view('viewfeedback', compact('contacts'));
    }

    public function vieworderdetails($id){


        $orderdetail = order::join('order_details', 'orders.id', '=', 'order_details.order_id')
        ->leftJoin('users', 'orders.user_id', '=', 'users.id')
        ->leftJoin('order_statuses', 'orders.order_status', '=', 'order_statuses.id')
        ->select('order_details.product_name', 'order_details.product_image', 'order_details.quantity', 'order_details.price',
                   'orders.subtotal', 'orders.shipping_charges', 'orders.total', 'orders.full_name', 'orders.address',
                   'orders.email', 'orders.phone', 'orders.payment_type',
                     'orders.customer_notes','orders.created_at','order_statuses.orderstatus as o_status',
                   'users.name as user_name', 'users.email as user_email','orders.id','orders.id as order_id')
               ->where('orders.id', $id) // Filter by the specific order ID
               ->get();
    
        return view('user_order_details',compact('orderdetail'));
     }
    
    
    
     public function submitReview(Request $request)
        {
            $request->validate([
                'order_id' => 'required',
                'product_id' => 'required',
                'user_id' => 'required',
               
                'review_content' => 'required',
            ]);
    
            // Create a new ProductReview instance and save it to the database
            productreview::create([
                'order_id' => $request->order_id,
                'product_id' => $request->product_id,
                'user_id' => $request->user_id,
               
                'review_content' => $request->review_content,
            ]);
    
            return redirect()->back()->with('success', 'Review submitted successfully!');
        }

        public function aboutus()
        {
            return view('aboutus');
        }

        public function blog()
        {
            return  view ('blog');
        }

        public function cancelorderbyuser($orderId){
            $affectedRows = Order::where('id', $orderId)->update(['order_status' => 5]);
            
            if ($affectedRows) {
                return redirect()->back()->with('success', 'Order cancelled successfully!');
            } else {
                return redirect()->back()->with('error', 'Error cancelling order.');
            }
        }




    
}
