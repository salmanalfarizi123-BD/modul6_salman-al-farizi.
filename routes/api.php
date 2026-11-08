<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BukuController as ApiBukuController;
use Illuminate\Http\Request;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// SOLUSI OTOMATIS: Jika ada yang mengakses /api/buku, alihkan langsung ke /buku (web)
Route::get('/buku', function () {
    return redirect('/buku');
});

Route::get('/buku/{id}', function ($id) {
    return redirect("/buku/{$id}");
});

