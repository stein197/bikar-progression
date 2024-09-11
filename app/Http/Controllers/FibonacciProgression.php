<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FibonacciProgression extends Progression {
    
    protected array $required = ['size'];
    
    public function __invoke() {
        $result = parent::__invoke();
        if ($result)
            return $result;
        $req = request();
        $size = (int) $req->query('size');
        return response()->json([
            'error' => 0,
            'msg' => '',
            'data' => [...$this->fibo($size)]
        ]);
    }

    private function fibo(int $size) {
        $prev = 0;
        $cur = 1;
        for ($i = 0; $i < $size; $i++) {
            yield $cur;
            $tmp = $cur;
            $cur = $prev + $cur;
            $prev = $tmp;
        }
    }
}
