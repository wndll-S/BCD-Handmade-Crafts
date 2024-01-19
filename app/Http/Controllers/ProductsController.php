<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Contracts\Session\Session;

class ProductsController extends Controller
{
    public function index(Request $request, Session $session)
    {   
        $seller_id = auth()->guard('seller')->id();
        $source = $request->route()->getName();
        $data = Products::with('category')->get();
        //para ma display ang product nga associated sa seller kag ang category nga associated sa said product
        $seller_products = Products::orderBy('id')
                        ->where('craftspeople_id', $seller_id)
                        ->with('category', 'craftspeople')
                        ->get();
        // dd($seller_products);
        $categories = Categories::with('products')->get();
        if($source == 'admin.handmade_crafts'){
            return view($source, ['categories' => $categories], ['products' => $data])->with('title', 'Handmade Crafts');
        }
        elseif($source == 'buyer.handmade_crafts'){
            return view($source, ['categories' => $categories], ['products' => $data])->with('title', 'Handmade Crafts');
        }
        elseif($source == 'seller.products'){
            return view($source, ['categories' => $categories], ['products' => $seller_products])->with('title', 'Your Handmade Crafts');
        }
    }
    public function show($id){
    }
}
