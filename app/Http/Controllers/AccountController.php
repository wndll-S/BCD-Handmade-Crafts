<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Models\Craftspeople;
use Illuminate\Support\Facades\DB;
class AccountController extends Controller
{
    public function index(){
        $buyers = DB::table('buyer')->orderBy('created_at', 'desc')->paginate(10);
        $sellers = DB::table('craftspeople')->orderBy('created_at', 'desc')->Paginate(10);
        return view('admin.accounts',['sellers' => $sellers, 'buyers' => $buyers])->with('title', 'Account Details');
    }
    public function show($id){
        $seller = Craftspeople::where('id', $id)->firstOrFail();
        return view('admin.edit', ['seller' => $seller]);
    }
    public function update(Request $request, $id){
        //butang d update logic
        $seller = Craftspeople::where('id', $id)->firstOrFail();
        $validated = $request->validate([
            "account_status" => 'required|in:Activated,Declined,Pending,Suspended',
        ]);
        $seller->update($validated);
        return redirect('/admin/accounts')->with('message', 'Updated Successfully');

    }
    public function logout(Request $request){
        $message = 'Logout Successful!';
        if(auth('buyer')){
            auth('buyer')->logout();
            $request->session()->regenerate();
            $request->session()->invalidate();
            return redirect('/buyer/login')->with('message', $message);
        }
        else if(auth('admin')){
            auth('admin')->logout();
            $request->session()->regenerate();
            $request->session()->invalidate();
            return redirect('/admin')->with('message', $message);
        }
        else if(auth('seller')){
            auth('seller')->logout();
            $request->session()->regenerate();
            $request->session()->invalidate();
            return redirect('/seller/login')->with('message', $message);
        }
        
    }
}
