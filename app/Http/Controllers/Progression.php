<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\IntHelper;

class Progression extends Controller {

    protected array $required = [];

    public function __invoke() {
        $req = request();
        foreach ($this->required as $propName) {
            $val = $req->query($propName);
            if (IntHelper::tryParse($val) === null)
                return response()->json([
                    'error' => 1, // TODO: Magic number
                    'msg' => "The value '{$val}' of the property '{$propName}' is not an integer"
                ]);
        }
        return null;
    }
}
