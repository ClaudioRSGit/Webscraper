<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\User;
use App\Http\Controllers\Product;
use App\Http\Controllers\Role;
use App\Http\Controllers\Category;
use App\Http\Controllers\Market;
use App\Http\Controllers\FiltersController;
use App\Http\Controllers\ScrapingController;
use App\Http\Controllers\Image;
use App\Http\Controllers\PendingProduct;
use App\Http\Controllers\ProductMarketPrice;
use App\Http\Controllers\PriceHistory;
use App\Http\Controllers\WishLists;
use App\Http\Controllers\Product_Wishlist;

Route::post('/auth',[Auth::class,'auth']);
Route::get('/auth/logout',[Auth::class,'logout']);
Route::get('/auth/verify',[Auth::class,'verify']);
Route::post('/register', [Auth::class, 'register']);

Route::get('/scrape', 'ScrapingController@scrape');

//queries
Route::get('/products/search/{query}', 'ProductController@searchByTitle');

//filters
// Route::get('/filter-products', 'FiltersController@index');
Route::get('/products', 'FiltersController@index');
//Route::get('/products', 'ProductController@index');

//get routes
Route::get('/users', 'UserController@index');
Route::get('/user/{id}', 'UserController@getUserById');
Route::get('/product/{id}', 'ProductController@getProductById');
Route::get('/images', 'ImageController@index');
Route::get('/roles', 'RoleController@index');
Route::get('/categories', 'CategoryController@index');
Route::get('/markets', 'MarketController@index');
Route::get('/pendingProducts', 'PendingProductController@index');
Route::get('/productMarketPrices', 'ProductMarketPriceController@index');
Route::get('/priceHistoryById/{id}', 'PriceHistoryController@priceHistoryById');
Route::get('/wishlists', 'WishListsController@index');
Route::get('/wishlists/{id}', 'WishListsController@show');
Route::get('/product-wishlists', 'Product_WishlistController@index');
Route::get('/product-wishlists/{id}', 'Product_WishlistController@show');
Route::get('/user/{userId}/wishlist', 'WishListsController@userWishList');

//post routes
Route::post('/createCategory', 'CategoryController@store');
Route::post('/createUser', 'UserController@store');
Route::post('/createRole', 'RoleController@store');
Route::post('/createMarket', 'MarketController@store');
Route::post('/createProduct', 'ProductController@store');
Route::post('/productMarketPrices', 'ProductMarketPriceController@store');
Route::post('/createPendingProduct', 'PendingProductController@store');

//destroy routes
Route::delete('/destroyUser/{id}', 'UserController@destroy');
Route::delete('/destroyCategory/{id}', 'CategoryController@destroy');
Route::delete('/destroyRole/{id}', 'RoleController@destroy');
Route::delete('/destroyMarket/{id}', 'MarketController@destroy');
Route::delete('/destroyProduct/{id}', 'ProductController@destroy');
Route::delete('/destroyPendingProduct/{id}', 'PendingProductController@destroy');
Route::delete('/wishlists/{id}', 'WishListsController@destroy');
Route::delete('/wishlist/{wishlistId}/product/{productId}', 'Product_WishlistController@removeFromWishlist');

//put routes
Route::put('/updateUser/{id}', 'UserController@update');
Route::put('/updateProduct/{id}', 'ProductController@update');
Route::put('/updateRole/{id}', 'RoleController@update');
Route::put('/updateMarket/{id}', 'MarketController@update');
Route::put('/updateCategory/{id}', 'CategoryController@update');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => ['api']], function ($api) {
// });
