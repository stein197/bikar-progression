<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArithmeticProgression;
use App\Http\Controllers\GeometricProgression;
use App\Http\Controllers\FibonacciProgression;

Route::get('/progression/arithmetic', ArithmeticProgression::class);
Route::get('/progression/geometric', GeometricProgression::class);
Route::get('/progression/fibonacci', FibonacciProgression::class);
