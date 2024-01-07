<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
{
    $source = $request->route()->getName(); // Get the route name (admin.categories or buyer.categories)

    $data = Categories::all();

    if ($source == 'admin.categories') {
        return view('admin.categories', ['categories' => $data])->with('title', 'Categories');
    } elseif ($source == 'buyer.categories') {
        return view('buyer.categories', ['categories' => $data])->with('title', 'Categories');
    }

    // Handle other cases or set a default view
}

    public function show($id){
        $data = Categories::find($id);
        return ;
    }

    public function edit($id){
        $category = Categories::where('id', $id)->firstOrFail();
        return view('admin.edit', ['category' => $category]);
    }
    public function update(Request $request, $id){
        //butang d update logic
        $category = Categories::where('id', $id)->firstOrFail();
        $validated = $request->validate([
            "title" => ['required', 'max:30'],
            "description" => ['required', 'max:100']
        ]);
        $category->update($validated);
        return redirect('/admin/categories')->with('message', 'Updated Successfully');

    }
}

