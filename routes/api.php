<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/chatgpt/ask', function (Request $request) {
    $answer = chatgpt($request->question);

    return response()->json([
        'answer' => $answer
    ], 200);
});