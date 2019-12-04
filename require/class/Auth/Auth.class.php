<?php 

namespace Auth;

class Auth
{
    protected static $remCookieName = 'rememberMe';

    public static function checkPersistLogin()
    {
        if (isset($_COOKIE[self::$remCookieName])) {
            $token = $_COOKIE[self::$remCookieName];

            $funcionario = new \Models\Funcionario();
            
            $funcionario->find(['remember_token', '=', $token]);
            // get funcionario here
        } else {
            return false;
        }
    }

    public static function setPersistLogin($idfuncionario)
    {
        $funcionario = new \Models\Funcionario();
        $funcionario->find($idfuncionario);

        $hash = self::makeHash(array(
            'username' => $funcionario->username,
            'password' => $funcionario->password
        ));

        $funcionario->remember_token = $hash;
        $funcionario->save();

        setcookie(self::$remCookieName, $hash, time() + 3600 * 12); //login por 12 horas
    }

    private static function makeHash(array $data)
    {
        $hash = md5($data['username']);
        $hash .= substr($data['password'], 0, rand(1,100));

        return $hash;
    }
}

?>