<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\IntHelper;

class Progression extends Controller {

    protected array $required = [];

    public function __invoke() {
        $req = request();
        foreach ($this->required as $k => $v) {
            $val = $req->query(is_int($k) ? $v : $k);
            if (!is_int($k) && $v === 'float')
                continue;
            // $val = $req->query($v);
            if (IntHelper::tryParse($val) === null)
                return response()->json([
                    'error' => 1, // TODO: Magic number
                    'msg' => "The value '{$val}' of the property '{$v}' is not an integer"
                ]);
        }
        return null;
    }
}
