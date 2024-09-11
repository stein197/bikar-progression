<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArithmeticProgression extends Controller {
    
    public function __invoke() {
        return response()->json('Arithmetic Progression');
    }
}
