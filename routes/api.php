<?php

use Illuminate\Http\Request;


use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Resources\ProductCollection;

use App\Http\Resources\OrderResource;
use App\Models\Order;

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

// Route::get('/products', 'ProductsController@index');

Route::get('/products/search/{name}','ProductsController@search'); 
Route::resource('products', ProductsController::class);

/* Route::get('/product-image', function(){
    return ProductImage::all();
}); */

/* Route::post('/product-image', function(){
    return ProductImage::create([
        'product_id' => '1',
        'name' => 'Product 1',
        'original_name' => 'original product 1',
        'mime_type' => 'png',
        'size' => '250'

    ]);
}); */
Route::get('/product-image/search/{name}','ProductImageController@search'); 
Route::resource('product-image', ProductImageController::class);

Route::get('/inventory/search/{name}','InventoryController@search'); 
Route::resource('inventory', InventoryController::class);

Route::get('/order/search/{name}','OrderController@search'); 
Route::resource('order', OrderController::class);

Route::get('/shipment/search/{name}','ShipmentController@search'); 
Route::resource('shipment', ShipmentController::class);

Route::get('/json', function(){
    $product = Product::find(1);
    return new ProductResource($product);
});

/* Route::get('/json-products', function(){
    $products = Product::all();
    return new ProductCollection($products);
}); */
Route::get('/json-products', function(){
    $products = Product::paginate(2);
    return new ProductCollection($products);
});

Route::get('/json-order', function(){
    $order = Order::find(1);
    return new OrderResource($order);
});

Route::get('/json-order/{id}', function($id){
    return new OrderResource(Order::findOrFail($id));
});



Route::get('/test/{name}', function($name){
    Log::info('/test in api.php');
    //ProductUpdateEvent::dispatch($name);
    event(new ProductUpdateEvent($name));
});