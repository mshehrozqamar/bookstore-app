<?php

namespace App\Http\Controllers;

use App\Mail\CheckoutEmail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    //
    function addToCart($id){
        $carts = Cart::all();
        foreach($carts as $cart){
            if($cart->user_id == Auth::user()->id && $cart->book_id == $id){
                $cart->quantity = $cart->quantity + 1;
                $cart->save();
                return redirect()->back();
            }
        }
        $new_cart = new Cart();
        $new_cart->user_id = Auth::user()->id;
        $new_cart->book_id = $id;
        $new_cart->quantity = 1;
        $new_cart->save();
        return redirect()->back();
    }
    function listCart(){
        $user = Auth::user();
        $carts = $user->cart;
        if($carts == null){
            return redirect()->back();
        }
        return view('cart',['carts'=>$carts]);
    }
    function increment($id){
        $carts = Cart::where('id', $id)->get();
        foreach($carts as $cart){
            if($cart->quantity == $cart->book->quantity)
            {
                return redirect()->back();
            }
            else{
                $cart->quantity = $cart->quantity + 1;
                $cart->save();
                return redirect()->back();
            }
        }
    }
    function decrement($id){
        $carts = Cart::where('id', $id)->get();
        foreach($carts as $cart){
            if($cart->quantity == 1){
                return redirect()->back();
            }
            else{
                $cart->quantity = $cart->quantity - 1;
                $cart->save();
                return redirect()->back();
            }
        }
    }
    function removeFromCart($id){
        $carts = Cart::where('id', $id)->get();
        foreach($carts as $cart){
            $cart->delete();
            return redirect()->back();
        }
    }

    function cartCheckout(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $order = Order::create([
            'user_id'=>Auth::user()->id,
            'status'=>'Pending'
        ]);
        foreach($carts as $cart){
            OrderDetail::create([
                'order_id'=>$order->id,
                'book_id'=>$cart->book->id,
                'quantity'=>$cart->quantity
            ]);
            $cart->delete();
        }
        $msg = "Checkout Completed Successfully. Thank you so much for shoping from our Book Store.";
        $subject = "Checkout Complete";
        Mail::to(Auth::user()->email)->send(new CheckoutEmail($msg, $subject));
        Alert::success('Congratulations!', 'Checkout Complete.');
        return redirect('home');
    }

}
