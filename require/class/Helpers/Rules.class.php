<?php 

namespace Helpers;

class Rules
{

    public static function required($value)
    {
        if ($value == null || $value == '') {
            return 'Este campo é obrigatório';
        } else {
            return false;
        }
    }

    public static function max($value, $max)
    {
        if (strlen($value) > $max) {
            return 'Este campo não pode ter mais que ' . $max . ' caracteres';
        } else {
            return false;
        }
    }

    public static function min($value, $min)
    {
        if (strlen($value) < $min) {
            return 'Este campo não pode ter menos que ' . $min . ' caracteres';
        } else {
            return false;
        }
    }

    public static function siz($value, $size)
    {
        if (strlen($value) != $size) {
            return 'Este campo deve conter ' . $size . ' caracteres';
        } else {
            return false;
        }
    }

    public function nullable($value)
    {
        if ($value == null || $value == '') {
            return true;
        } else {
            return false;
        }
    }
}

?>