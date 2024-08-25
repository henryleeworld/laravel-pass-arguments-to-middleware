<?php

use App\Http\Middleware\RequestWithToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware([
    RequestWithToken::with([
        'isOn' => true,
    ]),
]);
