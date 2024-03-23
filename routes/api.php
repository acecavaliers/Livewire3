<?php

use App\Http\Controllers\Api\V1\CustomerCtrlr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'V1'],function(){
    Route::apiResource('customers',CustomerCtrlr::class);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
