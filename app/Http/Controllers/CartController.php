<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CheckoutEmail;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class CartController extends Controller
{
    //
    function addToCart($id){
        $book = Book::find($id);
        $carts = Cart::all();
        foreach($carts as $cart){
            if($cart->name == $book->name){
                if($cart->quantity == $cart->max_quantity){
                    return redirect('home');
                }
                else{
                    $cart->quantity = $cart->quantity + 1;
                    $cart->save();
                    return redirect('home');
                }
            }
        }
        if($book->quantity == 0){
            return redirect('home');
        }
        else{
            $cart = new Cart;
            $cart->name = $book->name;
            $cart->discription = 'Author: '.$book->author. ' Publisher: '. $book->publisher;
            $cart->picture = $book->picture;
            $cart->quantity = 1;
            $cart->max_quantity = $book->quantity;
            $cart->price = $book->price;
            $cart->save();
            return redirect('home');
        }
    }

    function listCart(){
        if(Cart::exists()){
            $cart = Cart::all();
            return view('cart', ['carts'=>$cart]);
        }
        else{
            FacadesAlert::warning('Opps!', 'Cart is Empty');
            return redirect('home');
        }
        

    }

    function deleteItem($id){
        Cart::Destroy($id);
        return redirect('/cart');
    }

    function decrement($id){
        $cart = Cart::find($id);
        if($cart->quantity == 1){
            Cart::destroy($id);
            return redirect('/cart');
        }
        elseif($cart->quantity > 1){
            $cart->quantity = $cart->quantity - 1;
            $cart->save();
            return redirect('/cart');

        }
        else{
            return redirect('/cart');
        }
    }

    function increment($id){
        $cart = Cart::find($id);
        if($cart->quantity == $cart->max_quantity){
            return redirect('/cart');
        }
        else{
            $cart->quantity = $cart->quantity + 1;
            $cart->save();
            return redirect('/cart');
        }
    }

    function checkout(){
        $carts = Cart::all();
        foreach($carts as $cart){
            $books = Book::where('name', $cart->name)->get();
            foreach($books as $book){
                $book->quantity = $book->quantity - $cart->quantity;
                $book->save();
            }
        }
        Cart::truncate();
        return redirect('/send-mail');
    }

    function sendMail(){
        $to = Auth::user()->email;
        $subject = "Checkout Complete";
        $msg = "You have completed the checkout successfully.";
        Mail::to($to)->send(new CheckoutEmail($msg, $subject));
        FacadesAlert::success('Congratulatiions', 'Checkout Completed Successfully');
        return redirect('home');


    }
    
}
