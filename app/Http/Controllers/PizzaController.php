<?php

namespace App\Http\Controllers;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
  public function getPizza(){
    $pizzaArr = Pizza::all();
    //dump($pizzaArr);

    return $pizzaArr;

  }
}
