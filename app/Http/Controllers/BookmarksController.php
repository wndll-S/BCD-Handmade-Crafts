<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;
class BookmarksController extends Controller
{
    public function index(){
        $userId = auth()->guard('buyer')->id();

        // Retrieve bookmarks associated with the authenticated user
        $bookmarks = Bookmark::where('buyer_id', $userId)->with('product')->get();

        // Iterate through bookmarks and retrieve associated product's category and craftspeople
        foreach ($bookmarks as $bookmark) {
            $category = $bookmark->product->category;
            $craftspeople = $bookmark->product->craftspeople;

            // Now, you can access $category and $craftspeople for each bookmark
        }

        // You can pass the data to a view and return the view
        return view('buyer.bookmarks', compact('bookmarks'));
    }
    public function show($id){
        $data = Bookmark::find($id);
        return view('buyer.bookmarks', ['bookmarks' => $data]);
    }
}
