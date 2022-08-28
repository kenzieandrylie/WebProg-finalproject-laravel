<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function index(){
        $transaction = Transaction::where("user_id", Auth::user()->id)->get();

        return view('transactionHistory', compact('transaction'));
    }

    public function transactionDetail(Request $request){
        $transaction = Transaction::find($request->id);

        return view('transactionDetail', compact('transaction'));
    }
}
