<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\accessory;
use App\Models\species;
use App\Models\product;
use App\Models\order;
use App\Models\order_detail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cart;
use DB;
use Str;
class productcontroller extends Controller
{
    public function category(){
        $categories = category::all();
        return view('addcategory',['categories'=>$categories]);
    }


    public function categorystore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',

        ]);

        // Store the data in the database
        $category = new category();
        $category->name = $request->name;


        $category->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'category added successfully!');
    }

    public function deletecategory($id)
    {
        $categoryInProducts = DB::table('products')->where('category', $id)->exists();

    if ($categoryInProducts) {
        // Category is associated with products, display an error message
        return redirect()->route('addcategory')->with('error', 'Cannot delete category. It is associated with one or more products.');
    }
        // Find the category by its ID
        $category = category::findOrFail($id);
    
        // Delete the category
        $category->delete();
    
        // Redirect back to the category listing page with a success message
        return redirect()->route('addcategory')->with('success', 'category deleted successfully!');
    }




    
    public function species()
    {
        $species = Species::join('categories', 'species.category_id', '=', 'categories.id')
        ->select('species.*', 'categories.name as category_name')
        ->get();
        $categories = category::all();
    
        return view('addspecies', ['species' => $species, 'categories' => $categories]);
    }
    
    public function speciesstore(Request $request)
    {
        $request->validate([
            'speciesName' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
        ]);
    
        $species = new species();
        $species->name = $request->speciesName;
        $species->category_id = $request->category;
    
        $species->save();
    
        return redirect()->back()->with('success', 'Species added successfully!');
    }

    public function deletespecies($id)
        {
            $speciesInProducts = DB::table('products')->where('species', $id)->exists();

        if ($speciesInProducts) {
            // species is associated with products, display an error message
            return redirect()->route('addspecies')->with('error', 'Cannot delete species. It is associated with one or more products.');
        }
            // Find the category by its ID
            $species = species::findOrFail($id);

            // Delete the species
            $species->delete();

            // Redirect back to the species listing page with a success message
            return redirect()->route('addspecies')->with('success', 'species deleted successfully!');
        }



        public function product(){
            $products = product::select('products.*', 'categories.name as category_name', 'species.name as species_name')
            ->join('categories', 'products.category', '=', 'categories.id')
            ->join('species', 'products.species', '=', 'species.id')
            ->latest()
            ->get();
            $species = species::all();
            $categories = category::all();
            return view('addproduct', ['products'=>$products,'species'=>$species,'categories'=>$categories]);
        }


        public function productstore(Request $request)
        {
            // Validate the form data
            $request->validate([
                'productName' => 'required|string|max:255',
                'costPrice' => 'required|numeric',
    
               
                'description' => 'required|string',
                'species' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Update the allowed image types and size
                'quantity' => 'required|numeric|min:1',
             
            ]);
         // Store the data in the database
         $costPrice = $request->costPrice;
         $featured = $request->has('feature') ? $request->input('feature') : '0';
         $discount = $request->has('discount') ? $request->input('discount') : '0';
         $discountedPrice = $costPrice - ($costPrice * $discount / 100);
 
         $product = new product();
         $product->productName = $request->productName;
         // Create a slug from the productName
         $slug = Str::slug($request->productName);
         $product->slug = $slug;
         $product->costPrice = $costPrice;
         $product->discountPrice = $discountedPrice;
         $product->discount = $discount;
         $product->description = $request->description;
         $product->species = $request->species;
         $product->category = $request->category;
 
         // Handle image upload and store the image path in the database
        //  if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('products', 'public');
        //     $product->image = $imagePath;
        // }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        
            $product->image = $name; // Save only image name in the database
            $product->quantity = $request->quantity;
            $product->featured = $featured;
        
            $product->save();
        
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Product added successfully!');
        }
     }

     public function deleteProduct($id)
     {
         // Find the product by its ID
         $product = product::findOrFail($id);
     
         // Delete the product
         $product->delete();
     
         // Redirect back to the product listing page with a success message
         return redirect()->route('addproduct')->with('success', 'Product deleted successfully!');
     }


     public function edit($id)
     {
         $editproduct = product::findOrFail($id);
         $species = species::all(); // Assuming you have a Brand model and 'brands' table
         $categories = category::all(); // Assuming you have a Category model and 'categories' table
         return view('edit_product', compact('editproduct', 'species', 'categories'));
     }
     
     public function update(Request $request, $id)
     {
         $request->validate([
             'productName' => 'required|string|max:255',
             'costPrice' => 'required|numeric',
             'discount' => 'required|numeric',
             'description' => 'required|string',
             'species' => 'required|string|max:255',
             'category' => 'required|string|max:255',
             'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);
     
         $product = product::findOrFail($id);
         $product->productName = $request->productName;
         $product->costPrice = $request->costPrice;
         $product->discountPrice = $request->costPrice - ($request->costPrice * $request->discount / 100);
         $product->discount = $request->discount;
         $product->description = $request->description;
         $product->species = $request->species;
         $product->category = $request->category;
     
         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        
            $product->image = $name; // Save only image name in the database
     
         $product->save();
     
         return redirect()->route('addproduct', $product->id)->with('success', 'Product updated successfully!');
     }
    }
     

    public function bookCart()
    {
        return view('index');
    }
    public function addBooktoCart($id)
    {
        $book = product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id"=>$book->id,
                "name" => $book->productName,
                "quantity" => 1,
                "price" => $book->discountPrice,
                "image" => $book->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Item has been added to cart!');
    }

    public function bookCart2()
    {
        return view('index');
    }

    public function addBooktoCart2($slug, Request $request)
    {
        $book = Product::where('slug', $slug)->firstOrFail();
        $cart = session()->get('cart', []);
    
        $selectedQuantity = $request->input('quantity', 1); // Default to 1 if quantity is not provided
    
        if (isset($cart[$slug])) {
            $cart[$slug]['quantity'] += $selectedQuantity;
        } else {
            $cart[$slug] = [
                "id" => $book->id,
                "name" => $book->productName,
                "quantity" => $selectedQuantity,
                "price" => $book->discountPrice,
                "image" => $book->image
            ];
        }
    
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Item has been added to cart!');
    }
    
    



    
    public function viewcart(){
        return View('viewcart');
    }

    public function deleteCartItem($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        session()->flash('success', 'Item has been removed from the cart successfully.');
    
        return redirect()->back();
    }
    
    public function cartUpdate($id, Request $request)
    {
        // Get the new quantity value from the request
        $newQuantity = $request->input('quantity');
    
        // Update the cart item's quantity
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            if ($newQuantity >= 1 && $newQuantity <= 10) {
                $cart[$id]['quantity'] = $newQuantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Cart updated successfully.');
            }
        }
    
        return response()->json(['success' => true]);
    }


    public function checkout(){
       
        return View('checkout');
    }

    public function flushCart()
    {
        Session::forget('cart');
        return redirect()->back()->with('success', 'Cart has been flushed!');
    }

    public function processOrder(Request $request)
{
    // Validate user input
    $validatedData = $request->validate([
        'billing_name' => 'required|string|max:255',
        'billing_address' => 'required|string|max:255',
        'billing_email' => 'required|email|max:255',
        'billing_phone' => 'required|string|max:20',
        'payment_type' => 'required',
        // Add other billing related fields validation
    ]);

    // Retrieve the cart items from the session
    $cartItems = session('cart');

    foreach ($cartItems as $cartItem) {
        $product = Product::find($cartItem['id']); // Assuming "Product" is your model for products
        if ($product) {
            // Check if the ordered quantity exceeds available stock
            $orderedQuantity = $cartItem['quantity'];
            $availableQuantity = $product->quantity;
    
            if ($orderedQuantity > $availableQuantity) {
                // Handle insufficient stock
                $insufficientStockMessage = "Insufficient stock for product: {$product->productName}";
                return redirect()->back()->with("insufficientStockMessage", $insufficientStockMessage);
            } 
            else if ($orderedQuantity <= $availableQuantity) {
                // Update the product quantity
                $product->quantity -= $orderedQuantity;
                $product->save();
            }
            else {
                // This block will only execute if orderedQuantity is negative or invalid
                $invalidQuantityMessage = "Invalid ordered quantity for product: {$product->productName}";
                return redirect()->back()->with("invalidQuantityMessage", $invalidQuantityMessage);
            }
        }
    }

    // Calculate the order subtotal (including shipping charges)
    $subtotal = 0;
    foreach ($cartItems as $cartItem) {
        $subtotal += $cartItem['price'] * $cartItem['quantity'];
    }

    // Calculate shipping charges (you can implement your own shipping logic here)
    if ($subtotal > 4000) {
        $shippingCharges = 0;
    } else {
        $shippingCharges = 300;
    }

    // Create the order in the database
    $order = new order();
    $order->user_id = auth()->user() ? auth()->user()->id : null;
    $order->order_status = '1';
    $order->full_name = $validatedData['billing_name'];
    $order->address = $validatedData['billing_address'];
    $order->email = $validatedData['billing_email'];
    $order->phone = $validatedData['billing_phone'];
    $order->customer_notes = $request->customer_notes;
    $order->payment_type = $validatedData['payment_type'];
    $order->subtotal = $subtotal;
    $order->shipping_charges = $shippingCharges;
    $order->total = $subtotal + $shippingCharges;
    $order->save();

   
    foreach ($cartItems as $cartItem) {
        $orderDetail = new order_detail();
        $orderDetail->order_id = $order->id;
        $orderDetail->product_id = $cartItem['id'];
        $orderDetail->product_name = $cartItem['name']; // Set the product name
        $orderDetail->product_image = $cartItem['image']; // Set the product image (if available)
        $orderDetail->quantity = $cartItem['quantity'];
        $orderDetail->price = $cartItem['price'];
        // Set other order item related fields
        $orderDetail->save();
    }

    


    // Clear the cart after placing the order
    session()->forget('cart');

    // Redirect to the order confirmation page with the order ID
    return redirect()->back()->with("message", 'Thank You For Order..');
 
}
// public function orderConfirmation($orderId)
//     {
//         // Retrieve order details from the database using the $orderId
//         $order = order::findOrFail($orderId);

//         // Pass order data to the view
//         return view('order_confirmation', ['order_id' => $order->id]);
//     }


public function show($slug)
        {
            $product = product::select('products.*', 'categories.name as category_name', 'species.name as species_name')
            ->leftJoin('categories', 'products.category', '=', 'categories.id')
            ->leftJoin('species', 'products.species', '=', 'species.id')
            ->where('products.slug', $slug)
            ->firstOrFail();
            
            $categoryId = $product->category;

            
            $relatedProducts = Product::where('category', $categoryId)
                ->where('id', '!=', $product->id)
                  ->get();
                 

                  if (!$product) {
                      abort(404); // Handle the case if the product is not found
                  }

                  $orderCount = DB::table('order_details')
                  ->join('orders', 'order_details.order_id', '=', 'orders.id')
                  ->where('order_details.product_id', $product->id)
                  ->where('orders.order_status', 3)
                  ->sum('order_details.quantity');

            return view('product_details', compact('product', 'relatedProducts','orderCount'));
        }
        
        public function search(Request $request)
        {
            $query = $request->input('query');
            $suggestions = product::where('productName', 'LIKE', "%{$query}%")->get();
        
            return response()->json(['suggestions' => $suggestions]);
        }


        public function accessrios(){
            $products = accessory::all();
            
            
            $species = species::all();
            $categories = category::all();
            return view('addaccessrios', ['products'=>$products,'species'=>$species,'categories'=>$categories]);
        }
    

        public function accessoriesstore(Request $request)
        {
            // Validate the form data
            $request->validate([
                'productName' => 'required|string|max:255|unique:accessories',
                
                'costPrice' => 'required|numeric',
    
               
                'description' => 'required|string',
               
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Update the allowed image types and size
                'quantity' => 'required|numeric|min:1',
             
            ]);
         // Store the data in the database
         $costPrice = $request->costPrice;
         $featured = $request->has('feature') ? $request->input('feature') : '0';
         $discount = $request->has('discount') ? $request->input('discount') : '0';
         $discountedPrice = $costPrice - ($costPrice * $discount / 100);
 
         $product = new accessory();
         $product->productName = $request->productName;
         // Create a slug from the productName
         $slug = Str::slug($request->productName);
         $product->slug = $slug;
         $product->costPrice = $costPrice;
         $product->discountPrice = $discountedPrice;
         $product->discount = $discount;
         $product->description = $request->description;
    
 
         // Handle image upload and store the image path in the database
        //  if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('products', 'public');
        //     $product->image = $imagePath;
        // }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        
            $product->image = $name; // Save only image name in the database
            $product->quantity = $request->quantity;
            $product->featured = $featured;
        
            $product->save();
        
            // Redirect back with a success message
            return redirect()->back()->with('success', 'accessories added successfully!');
        }
     }


     public function deleteaccessory($id)
     {
         // Find the product by its ID
         $product = accessory::findOrFail($id);
     
         // Delete the product
         $product->delete();
     
         // Redirect back to the product listing page with a success message
         return redirect()->route('addaccessrios')->with('success', 'accessory deleted successfully!');
     

}

public function editaccessrios($id)
{
    $editproduct = accessory::findOrFail($id);

    return view('edit_accessrios', compact('editproduct'));
}

public function updateaccessrios(Request $request, $id)
{
    $request->validate([
        'productName' => 'required|string|max:255',
        'costPrice' => 'required|numeric',
        'discount' => 'required|numeric',
        'description' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = accessory::findOrFail($id);
    $product->productName = $request->productName;
    $product->costPrice = $request->costPrice;
    $product->discountPrice = $request->costPrice - ($request->costPrice * $request->discount / 100);
    $product->discount = $request->discount;
    $product->description = $request->description;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
   
        $product->image = $name; // Save only image name in the database
    }

    $product->save();

    return redirect()->route('addaccessrios')->with('success', 'Accessory updated successfully!');
}



}