<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Craftspeople;
use App\Models\Buyer;
class CraftspeopleController extends Controller
{
    public function pending(){
        return view('seller.pending_account');
    }
    public function store(Request $request){
        $validated = $request->validate([
            "first_name" => ['required', 'min:3'],
            "last_name" => ['required', 'min:2'],
            "name_ext" => ['min:1', 'max:4'],
            "email" => ['required', 'email', Rule::unique('craftspeople', 'email')],
            "address" => ['required'],
            "mobile_number" => ['required'],
            "password" => 'required | confirmed | min:6',
            "account_status" => 'required|in:Activated,Declined,Pending,Suspended',
            "image_url" => 'required',
        ]);
        $validated['id'] = $this->generateCustomId();
        $validated['password'] = bcrypt($validated['password']);
        $validated['created_at'] = Carbon::now();
        $craftspeople = Craftspeople::create($validated);
        auth()->guard('seller')->login($craftspeople);
        return redirect('/seller/dashboard');
    }
    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);
        $source = $request->route()->getName();
        if(auth('seller')->attempt($validated)){
            $request->session()->regenerate();
            return redirect('/seller/dashboard')->with(['message' => 'Welcome back!']);
        }
        return back()->withErrors(['email' => 'Login Failed'])
                     ->onlyInput('email');
    }
    private function generateCustomId()
    {
        // Generate a unique ID starting with 'B' followed by 10 numbers
        return 'C' . str_pad(mt_rand(1, 9999999999), 10, '0', STR_PAD_LEFT);
    }
}
