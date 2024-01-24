<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function admin(){
        
        return view('admin.login')->with(['role' => 'admin', 'title' => 'Admin login']);
    }
    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);
        if(auth('admin')->attempt($validated)){
            $request->session()->regenerate();
            return redirect('/admin/dashboard')->with(['message' => 'Welcome back!', ]);
        }
        return back()->withErrors(['email' => 'Login Failed'])
                     ->onlyInput('email');
    }
    public function add(){
        // $validated = $request->validated([
        //     "username" => 'required',
        //     "email" => ['required', 'email'],
        //     "password" => 'required'
        // ]);
        $validated['created_at'] = Carbon::now();
        $validated['updated_at'] = Carbon::now();
        $validated['username'] = 'admin';
        $validated['email'] = 'admin@bcdhandmadecrafts.com';
        $validated['password'] = bcrypt('qwerty');
        $admin = Admin::create($validated);
        auth()->guard('admin')->login($admin);
        return redirect('/admin/dashboard');
    }
}
