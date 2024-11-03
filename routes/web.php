<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderlistController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminusersController;
use App\Http\Controllers\AdminordersController;
use App\Http\Middleware\LogMiddleware;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'home.index')->name('productssa')->middleware('auth');
Route::get('products', [ProductsController::class, 'index'])->name('products')->middleware('auth');
Route::get('products/{product}', [ProductsController::class, 'show'])->name('products.show')->middleware('auth')->whereNumber('product');
Route::get('products/{product}/add', [ProductsController::class, 'show_add'])->name('products.show_add')->middleware('auth');
Route::get('products/search', [ProductsController::class, 'search'])->name('products.search')->middleware('auth');
Route::get('products/filter', [ProductsController::class, 'filter'])->name('products.filter')->middleware('auth');

Route::get('register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'store'])->name('login.store')->middleware('guest');

Route::get('profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::post('profile', [ProfileController::class, 'store'])->name('profile.store')->middleware('auth');

Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist')->middleware('auth');
Route::post('wishlist', [WishlistController::class, 'store'])->name('wishlist.store')->middleware('auth');
Route::get('wishlist/{order}/del', [WishlistController::class, 'index_del'])->name('wishlist_del')->middleware('auth');

Route::get('orderlist', [OrderlistController::class, 'index'])->name('orderlist')->middleware('auth');
Route::get('orderlist/{product}/del', [OrderlistController::class, 'index_del'])->name('orderlist_del')->middleware('auth');
Route::get('orderlist/order', [OrderlistController::class, 'index_order'])->name('orderlist_order')->middleware('auth');


Route::prefix('admin')->middleware('auth')->group( function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('table', [AdminController::class, 'table'])->name('admin.table');

    Route::get('table/users', [AdminController::class, 'table_users'])->name('admin.table_users');
    Route::get('table/users/o', [AdminController::class, 'table_users_o'])->name('admin.table_users_o');
    Route::get('table/users/search', [AdminController::class, 'table_users_search'])->name('admin.table_users_search');
    Route::get('table/users/{user_id}', [AdminController::class, 'table_users_user'])->name('admin.table_users_user')->middleware('auth');
    Route::post('table/users/{user_id}', [AdminController::class, 'store_table_users_user'])->name('admin.table_users_user.store')->middleware('auth');
    Route::get('table/users/{user_id}/o', [AdminController::class, 'table_users_user_o'])->name('admin.table_users_user_o')->middleware('auth');

    Route::get('table/graph', [AdminController::class, 'table_graph'])->name('admin.table_graph');
    Route::get('table/graph/cat', [AdminController::class, 'table_graph_cat'])->name('admin.table_graph_cat');
    Route::get('table/graph/usr', [AdminController::class, 'table_graph_usr'])->name('admin.table_graph_usr');
    Route::get('table/graph/usr_act', [AdminController::class, 'table_graph_usr_act'])->name('admin.table_graph_usr_act');
    Route::get('table/graph/usr_val', [AdminController::class, 'table_graph_usr_val'])->name('admin.table_graph_usr_val');

    Route::get('table/products', [AdminController::class, 'table_products'])->name('admin.table_products');
    Route::post('table/products', [AdminController::class, 'store_table_products'])->name('admin.table_products.store');
    Route::get('table/products/search', [AdminController::class, 'table_products_search'])->name('admin.table_products_search');
    Route::get('table/products/{prod_id}', [AdminController::class, 'table_products_prod'])->name('admin.table_products_prod')->middleware('auth');
    Route::post('table/products/{prod_id}', [AdminController::class, 'store_table_products_prod'])->name('admin.table_products_prod.store')->middleware('auth');

    Route::get('table/categories', [AdminController::class, 'table_categories'])->name('admin.table_categories');
    Route::get('table/categories/{category_id}', [AdminController::class, 'table_categories_category'])->name('admin.table_categories_category');
    Route::post('table/categories/{category_id}', [AdminController::class, 'store_table_categories_category'])->name('admin.table_categories_category.store');


    Route::get('products', [AdminController::class, 'index'])->name('admin.products');
    Route::get('products/create', [AdminController::class, 'create'])->name('admin.products.create');
    Route::post('products', [AdminController::class, 'store'])->name('admin.products.store');
    Route::get('products/{product}', [AdminController::class, 'show'])->name('admin.products.show');
    Route::get('products/{product}/edit', [AdminController::class, 'edit'])->name('admin.products.edit');
    Route::put('products/{product}', [AdminController::class, 'update'])->name('admin.products.update');
    Route::delete('products/{product}', [AdminController::class, 'delete'])->name('admin.products.delete');

    Route::get('userprofiles', [AdminusersController::class, 'index'])->name('admin.userprofiles');
    Route::get('userprofiles/{userprofile}', [AdminusersController::class, 'show'])->name('admin.userprofiles.show');

    Route::get('userorders', [AdminordersController::class, 'index'])->name('admin.userorders');
    Route::get('userorders/{userid}/{userorder}', [AdminordersController::class, 'show'])->name('admin.userorders.show');
    Route::post('userorders/{userid}/{userorder}', [AdminordersController::class, 'delete'])->name('admin.userorders.delete');


});



Route::view('/about', 'home.about')->name('about');
Route::view('/contact', 'home.contact')->name('contact');
Route::view('orderlist/order_com', 'orderlist.order_com')->name('order_com');
Route::get('exit', [ProductsController::class, 'exit'])->name('products.exit');

//Route::fallback(function () {
 //   return view('home.error');
//});
