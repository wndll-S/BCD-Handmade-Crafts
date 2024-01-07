<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $source = $request->route()->getName();
        $data = Products::with('category')->get();
        $categories = Categories::with('products')->get();
        if($source == 'admin.handmade_crafts'){
            return view($source, ['categories' => $categories], ['products' => $data])->with('title', 'Handmade Crafts');
        }
        elseif($source == 'buyer.handmade_crafts'){
            return view($source, ['categories' => $categories], ['products' => $data])->with('title', 'Handmade Crafts');
        }
    }
    public function show($id){
    }
}
