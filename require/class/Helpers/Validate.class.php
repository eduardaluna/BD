<?php 

namespace Helpers;

use Helpers\Rules;

class Validate
{

    private static $errors = [];

    public static function validator(array $params, array $values)
    {

        foreach ($params as $attribute => $term) {
            $terms = explode('|', $term);

            $value = self::get_value($values, $attribute);

            self::validate_term($attribute, $value, $terms);
        }

        if (count(self::$errors) > 0) {
            self::make_session_errors();
            self::make_session_inputs($values);

            return self::$errors;
        } 
        
        return false;
    }

    private function make_session_errors()
    {
        if (!$_SESSION) {
            session_start();
        }

        $_SESSION['errors_validate'] = self::$errors;
    }

    private function make_session_inputs(array $values)
    {
        if (!$_SESSION) {
            session_start();
        }

        $_SESSION['inputs_validate'] = $values;
    }

    public function get_errors()
    {
        if (!$_SESSION) {
            session_start();
        }  

        if (isset($_SESSION['errors_validate'])) {
            $errors = $_SESSION['errors_validate'];
            unset($_SESSION['errors_validate']);

            return $errors;
        }

        return false;
    }

    public function get_inputs()
    {
        if (!$_SESSION) {
            session_start();
        }  

        if (isset($_SESSION['inputs_validate'])) {
            $inputs = $_SESSION['inputs_validate'];
            unset($_SESSION['inputs_validate']);

            return $inputs;
        }

        return false;
    }

    private static function get_value(array $values, $attribute)
    {
        if (strpos($attribute, '.')) {
            $arr = explode('.', $attribute);

            return $values[$arr[0]][$arr[1]];
        }

        return $values[$attribute];
    }

    private static function validate_term($attribute, $value, $terms)
    {
        foreach ($terms as $term) {
            $init_str = substr($term, 0, 3);

            if ($init_str == 'max' || $init_str == 'min' || $init_str == 'siz') {
                $dual_term = explode(':', $term);

                $error = Rules::{$dual_term[0]}($value, $dual_term[1]);
            } else {
                $error = Rules::{$term}($value);
            }

            if ($error === true) {
                return true;
            }

            if ($error) {
                self::$errors[$attribute] = $error;

                return true;
            }
        }
    }

}

?>