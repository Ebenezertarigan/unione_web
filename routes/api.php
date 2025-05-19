<?php

use Illuminate\Support\Facades\Route;

Route::get('/test-api', function () {
    return response()->json(['message' => 'API is working!']);
});

Route::get('/test-api/{id}', function ($id) {
    return response()->json(['message' => 'API is working!', 'id' => $id]);
});