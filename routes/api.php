<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OrderController;

Route::get('/pizza',[PizzaController::class,'getPizza']);
Route::post('/order',[OrderController::class,'checkOrder']);
