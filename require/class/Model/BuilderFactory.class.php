<?php 

namespace Model;

class BuilderFactory
{

    /**
     * @var bool or object
     */
    private static $factory = false;

    /**
     * @var object
     */
    private $builder;

    /**
     * @method construct
     */
    protected function __construct()
    {
        $this->builder = new QueryBuilder();
    }

    /**
     * @return object Model\BuilderFactory
     */
    public static function getFactory()
    {
        if( !self::$factory )
            self::$factory = new BuilderFactory();

        return self::$factory;
    }

    /**
     * @return QueryBuilder
     */
    public function getBuilder()
    {
        return $this->builder;
    }

}

?>