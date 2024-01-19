<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Buyer;
use Carbon\Carbon;
class BuyerController extends Controller
{
    public function index(){
        $data = Buyer::all();
        return view('buyer.account', ['account' => $data])->with('title', 'Account Details');
    }
    public function store(Request $request){
        // dd($request);
        $validated = $request->validate([
            "first_name" => ['required', 'min:3'],
            "last_name" => ['required', 'min:2'],
            "email" => ['required', 'email', Rule::unique('buyer', 'email')],
            "password" => 'required | confirmed | min:6'
        ]);
        $validated['id'] = $this->generateCustomId();
        $validated['password'] = bcrypt($validated['password']);
        $validated['created_at'] = Carbon::now();

        $buyer = Buyer::create($validated);
        auth()->guard('buyer')->login($buyer);
        return redirect('/home');
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
        return back()->withErrors(['email' => 'Login Failed'])
                     ->onlyInput('email');
    }
    public function register(){
        return view('buyer.register')->with('title', 'Account Registration');
    }
    public function destroy(Request $request, $id){
        $data = Buyer::find($id);
        $data->delete();
    }
    private function generateCustomId()
    {
        // Generate a unique ID starting with 'B' followed by 10 numbers
        return 'B' . str_pad(mt_rand(1, 9999999999), 10, '0', STR_PAD_LEFT);
    }
}
