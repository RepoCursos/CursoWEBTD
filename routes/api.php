<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/json', function() {
    $canales = [
        [
            'nombre' => 'WEBTD',
            'edad' => 24,
            'curso' => 'Laravel, Js, HTML, CSS'
        ],
        [
            'nombre' => 'WEBTD tips',
            'edad' => 24,
            'curso' => 'Tips #shorts'
        ]
    ];
    return response()->json(['data' => $canales], 200);
});