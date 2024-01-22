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
        $seller = Craftspeople::find($id);
        return view('admin.edit', ['seller' => $seller]);
    }
    public function update(Request $request, $id){
        //butang d update logic
        $seller = Craftspeople::find($id);
        $validated = $request->validate([
            "account_status" => 'required|in:Activated,Declined,Pending,Suspended',
        ]);
        $seller->update($validated);
        return redirect('/admin/accounts')->with('message', 'Updated Successfully');
    }
    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);
        if(auth('buyer')->attempt($validated)){
            $request->session()->regenerate();
            return redirect('/home')->with(['message' => 'Welcome back!']);
        }
        else if(auth('seller')->attempt($validated)){
            $request->session()->regenerate();
            return redirect('/seller/home')->with(['message' => 'Welcome back!']);
        }
        return back()->withErrors(['email' => 'Login Failed'])
                     ->onlyInput('email');
    }
    public function logout(Request $request){
        $guard = null;

        if (auth()->guard('buyer')->check()) {
            $guard = 'buyer';
        } elseif (auth()->guard('admin')->check()) {
            $guard = 'admin';
        } elseif (auth()->guard('seller')->check()) {
            $guard = 'seller';
        }
    
        if ($guard) {
            auth()->guard($guard)->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            $message = 'Logout Successful!';
            return redirect("/{$guard}/login")->with('message', $message);
        }
    
        return redirect('/');
        
    }
}
