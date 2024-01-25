<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookmarksController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\CraftspeopleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckSellerAccountStatus;

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
/* Route::post();
    Route::delete();
    Route::put();
    Route::get(); 

    Route::match(['get','post','delete','put'],'/', function(){
        return '<h1>Hello World!</h1>';
    });

    Route::any('/', function () {
        return '<h1>Hello World!</h1>';
    });
*/

/*  Common routes naming conventions
    index = show all data
    show = show a single data
    create = show a form to add a new data
    store = store a data
    edit = show a form to edit a data
    update = update a data
    destroy = delete a data 
*/


//admin routes
Route::middleware(['auth:admin', 'App\Http\Middleware\RevalidateBackHistory'])->group(function () {
    Route::get('/admin/accounts', [AccountController::class, 'index']);
    Route::get('/admin/handmade-crafts', [ProductsController::class, 'index'])->name('admin.handmade_crafts');
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/admin/category/{id}', [CategoryController::class, 'edit']);
    Route::get('/admin/transactions', [TransactionsController::class, 'index']);
    Route::get('/admin/dashboard', [DashboardController::class, 'admin']);
    Route::get('/accounts/{id}', [AccountController::class, 'show']);
    Route::get('/admin/handmade-crafts/{id}', [ProductsController::class, 'show']);
    Route::put('/update/craftspeople/{id}', [AccountController::class, 'update']);
    Route::put('/update/category/{id}', [CategoryController::class, 'update']);
    Route::put('/update/product/{id}', [ProductsController::class, 'update']);
    Route::get('/admin/dashboard/reports', [DashboardController::class, 'report'])->name('report');

    //waay pa ni na himo sa controller
    Route::delete('/delete/category/{id}', [CategoryController::class, 'destroy']);
    Route::delete('/delete/buyer/{id}', [BuyerController::class, 'destroy']);
});
Route::get('/admin', [AdminController::class, 'admin']);
Route::post('/login/admin', [AdminController::class, 'process']);





// seller routes
Route::middleware(['auth:seller', 'App\Http\Middleware\RevalidateBackHistory', 'check.seller.account'])->group(function(){
    Route::get('/seller/dashboard', [DashboardController::class, 'seller'])->name('dashboard');
    Route::get('/seller/orders', [TransactionsController::class, 'orders']);
    Route::put('/order/edit/{id}', [TransactionsController::class, 'update']);
    Route::post('/store/product', [ProductsController::class, 'store']);
    Route::get('/seller/products', [ProductsController::class, 'index'])->name('seller.products');
    Route::get('/products/add', function () {
        return view('seller.add_product');
    });
    Route::get('/edit/product/{id}', [ProductsController::class, 'edit']);
    Route::put('/update/product/{id}', [ProductsController::class, 'change']);
});
Route::middleware(['auth:seller', 'App\Http\Middleware\RevalidateBackHistory'])->group(function(){
    Route::get('/pending', [CraftspeopleController::class, 'pending'])->name('pending');
});

Route::get('/seller/login', function () {
    return view('seller.login')->with('title', 'Seller Login');
});
Route::get('/seller/register', function () {
    return view('seller.register')->with('title', 'Seller Sign Up');
});

//mga same controller nga file under CraftspeopleController
Route::controller(CraftspeopleController::class)->group(function(){
    Route::post('/seller/login/process', 'process');
    Route::post('/store/seller', 'store');
});

//buyer routes
// Your routes that require the 'buyer' guard authentication go here
Route::middleware(['auth:buyer', 'App\Http\Middleware\RevalidateBackHistory'])->group(function () {
    Route::get('/home', function () {
        return view('buyer.home')->with('title', 'Home');
    });
    Route::get('/handmade-crafts', [ProductsController::class, 'index'])->name('buyer.handmade_crafts');
    Route::get('/bookmarks', [BookmarksController::class, 'displayBookmarks']);
    Route::get('/category', [CategoryController::class, 'index'])->name('buyer.categories');;
    Route::get('/account', [BuyerController::class, 'index']);
    Route::get('/orders', [TransactionsController::class, 'orders']);
    Route::get('/handmade-crafts/order/{id}', [TransactionsController::class, 'create']);
    Route::post('/store/transaction', [TransactionsController::class, 'store']);
});



Route::get('/login', function () {
    return view('buyer.login')->with(['role' => 'buyer', 'title' => 'Local Handmade Crafts Online Store']);
})->name('login');


//mga same controller nga file under BuyerController
Route::controller(BuyerController::class)->group(function(){
    Route::post('/store/buyer','store');
    Route::get('/register', 'register');
    Route::post('/login/process',  'process');
});

Route::post('/logout', [AccountController::class, 'logout'])->name('logout');


Route::get('/', function(){
    return view('index')->with('title', 'Local Handmade Crafts Online Store');
});

/* nd ma access kun nd authenticated ang user tungod sa middleware
Route::get('/user/{id}', [UserController::class, 'show'])->middleware('auth'); */

//ang name() is alias tapos ang sa sulod nya amo na ang e call ni middleware(auth) pro depende sa gin set
//sa login ma redirect kun waay naka log in ang user tapos may middleware nga 'auth'
//Route::get('/login', [UserController::class, 'index'])->name('login');
 


// Route::get('/', function () {
//     return view('index');
// });


