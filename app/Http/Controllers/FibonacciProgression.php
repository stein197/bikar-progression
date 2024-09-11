<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FibonacciProgression extends Controller {
    
    public function __invoke() {
        return response()->json('Fibonacci Progression');
    }
}
