<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeometricProgression extends Controller {
    
    public function __invoke() {
        return response()->json('Geometric Progression');
    }
}
