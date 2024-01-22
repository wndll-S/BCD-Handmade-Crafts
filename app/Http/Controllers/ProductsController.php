<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(Request $request)
    {   
        $seller_id = auth()->guard('seller')->id();
        $source = $request->route()->getName();
        $data = Products::all();
        //para ma display ang product nga associated sa seller kag ang category nga associated sa said product
        $seller_products = Products::orderBy('id')
                        ->where('craftspeople_id', $seller_id)
                        ->with('category', 'craftspeople')
                        ->get();
        // dd($seller_products);
        $categories = Categories::with('products')->get();
        $products = Products::orderBy('created_at', 'desc')->paginate(10);
        if($source == 'admin.handmade_crafts'){
            return view($source, ['categories' => $categories, 'products' => $data, 'data' => $products])->with('title', 'Handmade Crafts');
        }
        elseif($source == 'buyer.handmade_crafts'){
            return view($source, ['category' => $categories])->with('title', 'Handmade Crafts');
        }
        elseif($source == 'seller.products'){
            return view($source, ['categories' => $categories], ['products' => $seller_products])->with('title', 'Your Handmade Crafts');
        }
    }
    
    public function store(Request $request)
    {
        $seller_id = auth()->guard('seller')->id();
        
        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'price' => 'required',
            'quantity' => 'required',
            'status' => 'required',
        ]);
        $validated['id'] = $this->generateCustomId();
        $validated['craftspeople_id'] = $seller_id;
        $validated['created_at'] = now();
        $validated['updated_at'] = now();
        
        $image = $request->file('image_url');

        // Ensure that a file is uploaded
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // Move the file to the public directory
            $image->move(public_path('images/products'), $imageName);

            $validated['image_url'] = 'images/products/' . $imageName;
            $product = Products::create($validated);

            // Redirect or perform any other action here
            return redirect('/seller/products')->with('message', 'Successfully added a Product');
        } else { 
            // Handle case where no file is uploaded
            return redirect()->back()->withErrors(['image_url' => 'The image field is required.']);
        }
    }
    public function show($id){
        $products = Products::find($id);
        return view('admin.view-product', ['product' => $products]);
    }
    public function update(Request $request, $id){
        $product = Products::find($id);
        $validated = $request->validate([
            'status' => 'Required|in:Active,Pending,Deleted,Declined,Suspended'
        ]);
        $validated['updated_at'] = Carbon::now();
        $product->update($validated);
        return redirect('/admin/handmade-crafts')->with('message', 'Successfully made changes!');
    }
    private function generateCustomId()
    {
        // Generate a unique ID starting with 'B' followed by 10 numbers
        return 'P' . str_pad(mt_rand(1, 9999999999), 10, '0', STR_PAD_LEFT);
    }
}
