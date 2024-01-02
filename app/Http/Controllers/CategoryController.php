<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Categories::all();
        return view('buyer.categories', ['categories' => $data]);
    }

    public function show($id){
        $data = Categories::find($id);
        return ;
    }
}

