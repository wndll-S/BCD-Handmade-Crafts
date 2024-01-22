<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Craftspeople;
use App\Models\Transactions;

class DashboardController extends Controller
{
    public function admin(){
        $buyers = Buyer::all(); 
        $categories = Categories::all(); 
        $seller = Craftspeople::all(); 
        $products = Products::all(); 
        $transactions = Transactions::all();
        return view('admin.dashboard', ['buyers' => $buyers, 
                                        'category' => $categories,
                                        'seller' => $seller,
                                        'products' => $products,
                                        'transactions' => $transactions,
                                        'title' => 'Dashboard',
                                    ]);
    }
}
