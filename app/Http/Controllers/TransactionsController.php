<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use Illuminate\Support\Str;
class TransactionsController extends Controller
{
    public function index(){
        $data = Transactions::orderBy('transaction_id', 'desc')
            ->with('products', 'buyers')
            ->paginate(10);
        return view('admin.transactions', ['transactions' => $data])->with('title', 'Transactions');
    }
    public function create($id){
        $product = Products::find($id);
        // dd($product);
        return view('buyer.order_form', ['product' => $product]);
    }
    public function store(Request $request){

        $validated = $request->validate([
            'buyer_id' => 'required',
            'product_id' => 'required',
            'total_quantity' => 'required',
            'total_amount' => 'required|max:999999',
            'payment_method' => 'required|in:cod,gcash,bank_transfer',
            'shipping_address' => 'required',
            'status' => 'required|in:pending,processing,out-for-delivery,completed,cancelled',
        ]);
        $validated['transaction_id'] = Str::uuid();
        Transactions::create($validated);
        return redirect('/handmade-crafts')->with('message', 'Successfully Ordered a Handmade Craft');
    }
    public function orders(){
        if(auth()->guard('buyer')->check()){
            $buyer = auth()->guard('buyer')->user()->id;
            $buyer_orders = Transactions::where('buyer_id', $buyer)->get();
            return view('buyer.orders', ['order' => $buyer_orders]);
        }
        elseif( auth()->guard('seller')->check()){
            $seller = auth()->guard('seller')->user()->id;
            $seller_orders = Transactions::whereHas('products', function ($query) use ($seller) {
                $query->where('craftspeople_id', $seller);
            })->get();
            // dd($seller_orders);
            return view('seller.orders', ['order' => $seller_orders]);
        }
    }
    public function update(Request $request, $id){
        $updated = Transactions::find($id);
       
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,out-for-delivery,completed,cancelled'
        ]);
        $validated['updated_at'] = Carbon::now();
        $updated->update($validated);
        return redirect('/seller/orders')->with('message', 'Successfully Updated!');
    }
}
