<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Craftspeople;
use App\Models\Transactions;
use Carbon\Carbon;
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
    public function seller(){
        $authenticated_seller = auth()->guard('seller')->user()->id;
        // Get product ids owned by the authenticated seller
        $product_ids = Products::where('craftspeople_id', $authenticated_seller)->pluck('id');

        // Get transactions associated with those product ids
        $transactions = Transactions::whereIn('product_id', $product_ids)->get();

        // products owned by the authenticated seller
        $products = Products::whereIn('id', $product_ids)->get();

        //number of unique buyers that bought seller's products
        $buyer_ids = $transactions->pluck('buyer_id')->unique();

        //gross profit
        $revenue = $transactions->pluck('total_amount')->sum();

        //total sold units
        $units = $transactions->pluck('total_quantity')->sum();

        //product nga pinakadamo na baligya nga unit
        // Create variables to track the largest quantity and corresponding product
        $maxQuantity = 0;
        $maxQuantityProductId = null;
        $productQuantities = [];

        foreach ($transactions as $transaction) {
            $product_id = $transaction->product_id;
            $total_quantity = $transaction->total_quantity;

            // Sum up total_quantity if product_id already exists in the array
            if (isset($productQuantities[$product_id])) {
                $productQuantities[$product_id] += $total_quantity;
            } else {
                // Initialize total_quantity for the product_id
                $productQuantities[$product_id] = $total_quantity;
            }

            // Track the product with the largest quantity
            if ($total_quantity > $maxQuantity) {
                $maxQuantity = $total_quantity;
                $maxQuantityProductId = $product_id;
            }
        }
        // dd($productQuantities);
        return view('seller.home', 
        [
            'products' => $products,
            'transactions' => $transactions,
            'buyer_ids' => $buyer_ids,
            'revenue' =>$revenue,
            'units' => $units,
            'product_quantity' =>  $productQuantities,
            'maxQuantityProductId' => $maxQuantityProductId,
            'maxQuantity' => $maxQuantity,
            'title' => 'Dashboard'
        ]);
}
    public function report(Request $request){
        $from_date = Carbon::parse($request->from_date);
        $to_date = Carbon::parse($request->to_date)->endOfDay();
        $total_buyers = Buyer::all();
        $total_sellers = Craftspeople::all();
        $range = [$from_date , $to_date];
        $buyers = Buyer::whereBetween('created_at', $range)->get();
        $categories = Categories::whereBetween('created_at', $range)->get(); 
        $seller = Craftspeople::whereBetween('created_at', $range)->get(); 
        $products = Products::whereBetween('created_at', $range)->get(); 
        $transactions = Transactions::whereBetween('created_at', $range)->get();
        return view('admin.report', ['buyers' => $buyers, 
                                        'category' => $categories,
                                        'seller' => $seller,
                                        'products' => $products,
                                        'transactions' => $transactions,
                                        'from' => $from_date,
                                        'to' => $to_date,
                                        'total_buyers' => $total_buyers,
                                        'total_sellers' => $total_sellers,
                                        'title' => 'Report',
                                    ]);
    }
}
