<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class TransactionsController extends Controller
{
    public function index(){
        $data = Transactions::orderBy('transaction_id', 'desc')
            ->with('products', 'buyers')
            ->paginate(10);
        return view('admin.transactions', ['transactions' => $data])->with('title', 'Transactions');
    }
}
