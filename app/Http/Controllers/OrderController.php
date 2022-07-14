<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Order_pizza;
use Response;

class OrderController extends Controller
{
  public function checkOrder(Request $req){
    $order = new Order();
    $order->name = $req->name;
    $order->phone = $req->phone;
    $order->street = $req->street;
    $order->house = $req->house;
    $order->apartment = $req->apartment;
    $order->save();

    $pizzaArr = $req->orderedPizza;
    foreach ($pizzaArr as $pizza) {
        $orderPizza = new Order_pizza();
        $orderPizza->count = $pizza['count'];
        $orderPizza->order_id = $order->id;
        $orderPizza->pizza_id = $pizza['id'];
        $orderPizza->save();
    }

    return Response::json(
      [
        'status'=>'ok',
        'orderId'=>$order->id,
      ],200);
  }
}
