<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
class ProductsController extends Controller
{
    public function index(){
        $data = Products::with('category')->get();
        $categories = Categories::with('products')->get();
        return view('buyer.handmade_crafts', ['categories' => $categories], ['products' => $data]);
    }
    public function show($id){
    }
}
