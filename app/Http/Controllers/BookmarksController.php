<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;
class BookmarksController extends Controller
{
    public function displayBookmarks(){
        /// Retrieve bookmarks associated with the authenticated user
            $bookmarks = Bookmark::where('buyer_id', auth('buyer')->id())
            ->with('product')
            ->get();
        
        // Pass the data to the view
        return view('buyer.bookmarks')->with('title', 'Bookmarks');
        //return view('buyer.bookmarks', ['bookmarks' => $bookmarks]);
    }
    public function show($id){
        $data = Bookmark::find($id);
        return view('buyer.bookmarks', ['bookmarks' => $data]);
    }
}
