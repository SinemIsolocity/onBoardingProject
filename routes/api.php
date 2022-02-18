<?php

use Illuminate\Http\Request;


use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Resources\ProductCollection;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Http\Resources\ProductImageResource;
use App\Models\ProductImage;
use App\Http\Resources\InventoryResource;
use App\Models\Inventory;
use App\Http\Resources\ShipmentResource;
use App\Models\Shipment;
use App\Events\ProductUpdateEvent;

use\Illuminate\Support\Facades\Log;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/users/me', '\App\Api\Controllers\SessionController@currentUser');
    Route::get('/logout', '\App\Api\Controllers\SessionController@logout');

    Route::apiResource('/users', '\App\Api\Controllers\UserController');
    Route::put('/users/{slug}/update-password', '\App\Api\Controllers\UserController@changePassword');

    Route::get('/avatars', '\App\Api\Controllers\AvatarsController@get');
    Route::post('/avatars', '\App\Api\Controllers\AvatarsController@upload');
    Route::put('/avatars', '\App\Api\Controllers\AvatarsController@update');
    Route::delete('/avatars', '\App\Api\Controllers\AvatarsController@delete');
});

/**
 * Password reset endpoints
 */
Route::post('/forgot-password', '\App\Api\Controllers\PasswordResetController@forgotPassword');
Route::post('/reset-password', '\App\Api\Controllers\PasswordResetController@resetPassword');

/**
 * These endpoints return JWT's, so make sure to wrap them in the encrypt cookies
 * middleware.
 */
Route::group(['middleware' => ['encryptCookies']], function () {
    Route::post('/login', '\App\Api\Controllers\SessionController@login');
    Route::post('/signup', '\App\Api\Controllers\UserController@signup');
});

/**
 * These endpoints are about Product's CRUD operations.
 */

Route::get('/products/search/{name}','ProductsController@search'); 
Route::resource('products', ProductsController::class);

Route::get('/product-image/search/{id}','ProductImageController@search'); 
Route::resource('product-image', ProductImageController::class);

Route::get('/inventory/search/{id}','InventoryController@search'); 
Route::resource('inventory', InventoryController::class);

Route::get('/order/search/{product_id}','OrderController@search'); 
Route::resource('order', OrderController::class);

Route::get('/shipment/search/{id}','ShipmentController@search'); 
Route::resource('shipment', ShipmentController::class);

Route::get('/json', function(){
    $product = Product::find(1);
    return new ProductResource($product);
}); 

Route::get('/json-products', function(){
    $products = Product::paginate(2);
    return new ProductCollection($products);
});

Route::get('/json-order', function(){
    $order = Order::find(1);
    return new OrderResource($order);
});
/* Route::get('/json-order/{id}', function(){
    $order = Order::findOrFail($id);
    return new OrderResource($order);
}); */

Route::get('/json-image', function(){
    $image = ProductImage::find(1);
    return new ProductImageResource($image);
});


Route::get('/json-inventory', function(){
    $inventory = inventory::find(1);
    return new InventoryResource($inventory);
});
Route::get('/json-shipment', function(){
    $shipment = shipment::find(1);
    return new ShipmentResource($shipment);
});






Route::get('/test/{name}', function($name){
    Log::info('/test in api.php');
    event(new ProductUpdateEvent($name));
});



Route::get('/product-order', function(){
    $products=Product::with('order')->get();
    return $products;
});

Route::get('/productimg', function(){
    $products=Product::with('productImages')->get();
    return $products;
});