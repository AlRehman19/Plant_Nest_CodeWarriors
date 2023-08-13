<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\usercontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if($user->Role == 0)
        {
            return view('dashboard');
        }
        else
        {
            return view('userscreen');
        }
       
    })->name('dashboard'); 


    Route::get('/addcategory',[productcontroller::class,'category'])->name('addcategory');
    Route::post('/category',[productcontroller::class,'categorystore']);
    Route::delete('/addcategory/{id}', [productcontroller::class,'deletecategory'])->name('category.delete');
    
    Route::get('/addspecies', [ProductController::class, 'species'])->name('addspecies');
    Route::post('/species', [ProductController::class, 'speciesstore'])->name('addspecies.store');
    Route::delete('/species/{id}', [ProductController::class, 'deletespecies'])->name('species.delete');

    Route::get('/addproduct', [ProductController::class, 'product'])->name('addproduct');
    Route::post('/products', [ProductController::class, 'productstore']);

    Route::get('/editproduct/{id}',[ProductController::class,  'edit'])->name('product.edit');
    Route::put('/editproduct/{id}',[ProductController::class,  'update'])->name('product.update');

    Route::delete('/addproduct/{id}',[ProductController::class, 'deleteProduct'])->name('products.delete');

    //accessrios
    Route::get('/addaccessrios', [ProductController::class, 'accessrios'])->name('addaccessrios');
    Route::post('/accessrios', [ProductController::class, 'accessoriesstore']);
    Route::get('/editaccessrios/{id}', [ProductController::class, 'editaccessrios'])->name('accessrios.edit');

    Route::put('/editaccessrios/{id}',[ProductController::class,  'updateaccessrios'])->name('accessrios.update');
    Route::delete('/accessrios/{id}', [ProductController::class, 'deleteaccessory'])->name('accessrios.delete');

    //add to cart
    Route::get('/shopping-cart', [ProductController::class, 'bookCart'])->name('shopping.cart');
    Route::get('/book/{id}',  [ProductController::class,'addBooktoCart'])->name('addbook.to.cart');
    Route::get('/addcart', [ProductController::class, 'bookCart2'])->name('book.cart');
    Route::post('/add-book-to-cart/{slug}', [ProductController::class, 'addBooktoCart2'])->name('addbook.to.cart2');


    Route::get('/viewcart',[ProductController::class,'viewcart'])->name('cart');
    Route::get('/checkout',[ProductController::class,'checkout']);
    Route::get('/flush-cart',[ProductController::class, 'flushCart'])->name('flush.cart');
    
Route::get('/cart/delete/{id}',[ProductController::class, 'deleteCartItem'])->name('cart.delete');
Route::post('cart/update/{id}',[ProductController::class, 'cartUpdate'])->name('cart.update');

Route::get('/products/{slug}', [ProductController::class,'show'])->name('product.show');

        Route::get('/search', [ProductController::class,'search'])->name('search');



Route::post('/process-order',[ProductController::class, 'processOrder'])->name('order.process');
// Route::get('/order/confirmation/{order_id}',[ProductController::class, 'orderConfirmation'])->name('order.confirmation');



    Route::get('/',[userController::class,  'index']);

    Route::get('/shop', [userController::class, 'shop']);

    Route::get('viewcontact',[usercontroller::class,  'viewcontact']);
    Route::get('viewfeedback',[usercontroller::class,  'viewfeedback']);


    Route::get('/blog', [userController::class, 'blog']);
    Route::get('/aboutus', [userController::class, 'aboutus']);






    Route::post('get-products-by-categories', [userController::class, 'getProductsByCategories'])->name('get.products.by.categories');
    Route::post('get-products-by-price-range', [userController::class, 'getProductsByPriceRange'])->name('get.products.by.price.range');
    Route::post('get-products-by-sorting', [userController::class, 'getProductsBySorting'])->name('get.products.by.sorting');
   
    Route::get('contact',[usercontroller::class, 'contact']);
    Route::post('/store-message', [usercontroller::class, 'storeMessage'])->name('store-message');

    Route::post('/store-feedback', [userController::class, 'storeFeedback'])->name('store-feedback');


    Route::get('/view-order-details/{id}', [userController::class, 'vieworderdetails'])->name('vieworderdetails');

    Route::post('/submit-review', [userController::class, 'submitReview'])->name('submit-review');

    Route::post('/cancel-order/{orderId}', [userController::class,'cancelorderbyuser'])->name('cancel-order');



    // admincontroller
    Route::get('/orders',[admincontroller::class,'order']);
    Route::post('/update-order-status/{orderId}',[admincontroller::class, 'updateOrderStatus']);

    Route::get('/orderdetails/{id}',[admincontroller::class, 'orderdetails'])->name('orderdetails');




});

    
