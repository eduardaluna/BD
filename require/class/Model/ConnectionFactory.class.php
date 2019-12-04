<?php

namespace Model;

class ConnectionFactory
{
    /**
     * @var bool or object
     */
    private static $factory = false;

    /**
     * @var object
     */
    private $conn;

    /**
     * @var array $credentials credentials to make connection
     */
    private $credentials = [
        'host' => 'localhost',
        'db_name' => 'esquemarelacional',
        'user' => 'root',
        'password' => '1234'
    ];
    /**
     * @method construct
     */
    protected function __construct()
    {
        $this->conn = new \PDO(
            "mysql:dbname=" . $this->credentials['db_name'] . ";host=" . $this->credentials['host'] . ";",
            $this->credentials['user'],
            $this->credentials['password'],
            array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
    }

    /**
     * @return object Model\ConnectionFactory
     */
    public static function getFactory()
    {
        if( !self::$factory )
            self::$factory = new ConnectionFactory();

        return self::$factory;
    }

    /**
     * @return PDO $this->conn
     */
    public function getConnection()
    {
        return $this->conn;
    }

}

?>
