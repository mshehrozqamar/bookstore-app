<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    function listOrder(){
        $orders = Order::all();
        return view('orders', ['orders'=>$orders]);
    }

    function deleteOrder($id){
        Order::where('id', $id)->delete();
        return redirect()->back();
    }

    function orderDetails($id){
        $orders = OrderDetail::where('order_id', $id)->get();
        return view('view-order', ['orders'=>$orders]);
    }

    function orderConfirm($id){
        $orders = OrderDetail::where('order_id', $id)->get();
        foreach($orders as $order){
            $order->book->quantity = $order->book->quantity - $order->quantity;
            $order->book->save();
        }
        $order->order->status = "Confirmed";
        $order->order->save();
        return redirect()->back();
    }
}
