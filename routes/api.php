<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post(config('chatgpt.internal_api_route'), function (Request $request) {
    $answer = chatgpt($request->question);

    return response()->json([
        'answer' => $answer
    ], 200);
});