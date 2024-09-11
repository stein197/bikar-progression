<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helper\IntHelper;

class ArithmeticProgression extends Progression {

    protected array $required = ['start', 'increment', 'size'];
    
    public function __invoke() {
        $result = parent::__invoke();
        if ($result)
            return $result;
        $req = request();
        [$start, $increment, $size] = [
            (int) $req->query('start'),
            (int) $req->query('increment'),
            (int) $req->query('size')
        ];
        $result = [];
        for ($i = 0, $val = $start; $i < $size; $i++, $val += $increment)
            $result[] = $val;
        return response()->json([
            'error' => 0,
            'msg' => '',
            'data' => $result
        ]);
    }
}
