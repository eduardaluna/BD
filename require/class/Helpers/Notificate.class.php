<?php 

namespace Helpers;

// This class use session, not static vars

class Notificate
{
    public static function verify_session()
    {
        if (!$_SESSION) {
            session_start();
        }
    }

    private static function set_message($message)
    {
        $_SESSION['message_notificate'] = $message;
    }

    private static function get_message()
    {
        if (isset($_SESSION['message_notificate'])) {
            $message = $_SESSION['message_notificate'];
            unset($_SESSION['message_notificate']);

            return $message;
        } else {
            return false;
        }
    }

    public static function hasMessage()
    {
        self::verify_session();
    
        if (isset($_SESSION['message_notificate'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function message($message = false)
    {
        self::verify_session();

        if ($message) {
            self::set_message($message);

            return false;
        } 

        return self::get_message();
    }
}

?>