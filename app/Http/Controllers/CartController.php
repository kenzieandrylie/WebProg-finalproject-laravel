<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Games;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function index(){
        $cart = Cart::all();

        return view('cart',compact('cart'));
    }

    //add
    public function addCart(Request $request){
        $game = Games::find($request->id);
        $cart = Session::get('cart');

        if(!isset($cart[$game['id']])){
            $cart[$game['id']] = [
                'idx' => $game['id'],
                'qty' => 1,
                'title' => $game->title,
                'price' => $game->price,
                'image' => $game->image
            ];
        }
        else{
            $cart[$game['id']]['qty'] += 1;
        }

        Session::put('cart',$cart);

        // dd(Session::get('cart'));
        session()->flash('suksesaddtocart','Product added to cart successfully!');

        return redirect('/');
    }

    //delete
    public function deleteCart($id){
        $cart = Session::get('cart');

        foreach($cart as $c){
            if($c['idx'] == $id){
                unset($cart[$id]);
            }
        }
        Session::put('cart',$cart);

        return redirect()->back();
    }

    //update quantity
    public function updateCart(Request $request, $id){
        $cart = Session::get('cart');

        foreach($cart as $c){
            if($c['idx'] == $id){
                $cart[$id]['qty'] = $request->quantity;
            }
        }

        Session::put('cart',$cart);

        // dd($cart);

        return back();
    }

    // Checkout
    public function checkout(){
        if(Session::has('cart')){
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->save();

            $cart = Session::get('cart');
            foreach($cart as $c){
                $transactionDetail = new TransactionDetail();
                $transactionDetail->transaction_id  = $transaction->id;
                $transactionDetail->game_id  = $c['idx'];
                $transactionDetail->qty  = $c['qty'];
                $transactionDetail->save();
            }
            Session::forget('cart');
        }

        $transaction = Transaction::where('user_id',Auth::user()->id)->get();
        // dd($transaction);

        return view('/transactionHistory',compact('transaction'));
    }

}
