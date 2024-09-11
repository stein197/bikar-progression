<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeometricProgression extends Progression {
    
    protected array $required = ['start', 'ratio' => 'float', 'size'];
    
    public function __invoke() {
        $result = parent::__invoke();
        if ($result)
            return $result;
        $req = request();
        [$start, $ratio, $size] = [
            (int) $req->query('start'),
            (float) $req->query('ratio'),
            (int) $req->query('size')
        ];
        $result = [];
        for ($i = 0, $val = $start; $i < $size; $i++, $val *= $ratio)
            $result[] = $val;
        return response()->json([
            'error' => 0,
            'msg' => '',
            'data' => $result
        ]);
    }
}
