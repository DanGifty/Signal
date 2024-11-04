<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VourcherController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('fetchwhensuccess',[VourcherController::class,'fetchOnWhenSuccess']);

// Route::any('{slug}',function () {
//     return view('welcome');
// });
