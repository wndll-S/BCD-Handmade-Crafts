<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
