<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
class AccountController extends Controller
{
    public function index(){
        $data = Buyer::all();
        return view('buyer.account', ['account' => $data]);
    }
    public function show($id){
        $data = Buyer::find($id);
        return view('buyer.account', ['account' => $data]);
    }
}
