<?php
namespace App\Helper;

final class IntHelper {

    private function __construct() {}

    public static function tryParse(mixed $value): null | int {
        if (!is_numeric($value))
            return null;
        $floatVal = floatval($value);
        $intVal = intval($value);
        return $floatVal == $intVal ? $intVal : null;
    }
}
