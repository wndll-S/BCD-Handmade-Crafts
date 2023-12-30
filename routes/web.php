<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
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
Route::get('buyer/login', function () {
    return view('buyer/login');
});

Route::get('buyer/home', function () {
    return view('buyer/home');
});

Route::get('buyer/handmade-crafts', function () {
    return view('buyer/handmade_crafts');
});

Route::get('buyer/category', function () {
    return view('buyer/categories');
});

Route::get('buyer/bookmarks', function () {
    return view('buyer/bookmarks');
});

Route::get('buyer/account', function () {
    return view('buyer/account');
});

Route::get('category', [CategoryController::class, 'index']);



//pang tawag sng isa ka function sa isa ka controller
Route::get('/user', [UserController::class, 'index']);

Route::get('/user/{id}', [UserController::class, 'show']);

/* nd ma access kun nd authenticated ang user tungod sa middleware
Route::get('/user/{id}', [UserController::class, 'show'])->middleware('auth'); */

//ang name() is alias tapos ang sa sulod nya amo na ang e call ni middleware(auth) pro depende sa gin set
//sa login ma redirect kun waay naka log in ang user tapos may middleware nga 'auth'
//Route::get('/login', [UserController::class, 'index'])->name('login');

/* Route::get('/', function () {
    return view('home');
}); */ 




