<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookmarksController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
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


Route::get('/', function () {
    return view('index');
});
//admin routes
Route::get('/admin', [AdminController::class, 'admin']);
Route::get('/admin/accounts', [AccountController::class, 'index']);
Route::get('/admin/handmade-crafts', [ProductsController::class, 'index'])->name('admin.handmade_crafts');
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
Route::get('/admin/category/{id}', [CategoryController::class, 'edit']);
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard')->with('title', 'Dashboard');
});
Route::post('/login/admin', [AdminController::class, 'process']);
Route::get('/accounts/{id}', [AccountController::class, 'show']);
Route::put('/update/craftspeople/{id}', [AccountController::class, 'update']);
Route::put('/update/category/{id}', [CategoryController::class, 'update']);
//waay pa ni na himo sa controller
Route::delete('/delete/category/{id}', [CategoryController::class, 'destroy']);
Route::delete('/delete/buyer/{id}', [BuyerController::class, 'destroy']);



// seller routes
Route::get('/seller/login', function () {
    return view('seller.login');
});

Route::get('/seller/register', function () {
    return view('seller.register');
});

Route::get('seller/home', function () {
    return view('seller/home');
});

//buyer routes
// Your routes that require the 'buyer' guard authentication go here
Route::middleware(['auth:buyer', 'App\Http\Middleware\RevalidateBackHistory'])->group(function () {
    Route::get('buyer/home', function () {
        return view('buyer/home')->with('title', 'Home');
    });
    Route::get('/buyer/handmade-crafts', [ProductsController::class, 'index'])->name('buyer.handmade_crafts');
    Route::get('/buyer/bookmarks', [BookmarksController::class, 'displayBookmarks']);
    Route::get('/buyer/category', [CategoryController::class, 'index'])->name('buyer.categories');;
    Route::get('/buyer/account', [BuyerController::class, 'index']);
});

Route::get('buyer/login', function () {
    return view('buyer/login')->with(['role' => 'buyer', 'title' => 'BCD Handmade Crafts']);
})->name('login');

Route::post('/store', [BuyerController::class, 'store']);
Route::get('/buyer/register', [BuyerController::class, 'register']);
Route::post('/logout', [AccountController::class, 'logout']);
Route::post('/login/process', [BuyerController::class, 'process']);


//pang tawag sng isa ka function sa isa ka controller
Route::get('/user', [UserController::class, 'index']);

Route::get('/user/{id}', [UserController::class, 'show']);

/* nd ma access kun nd authenticated ang user tungod sa middleware
Route::get('/user/{id}', [UserController::class, 'show'])->middleware('auth'); */

//ang name() is alias tapos ang sa sulod nya amo na ang e call ni middleware(auth) pro depende sa gin set
//sa login ma redirect kun waay naka log in ang user tapos may middleware nga 'auth'
//Route::get('/login', [UserController::class, 'index'])->name('login');
 




