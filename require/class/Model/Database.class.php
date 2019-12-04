<?php

namespace Model;

class Database
{

    /**
     * @var PDO
     */
    private $conn;

    /**
     * @var object Model\QueryBuilder
     */
    private $builder;

    /**
     * @var string $query
     */
    private $query = null;

    /**
     * @var array $binded_param
     */
    private $binded_param = [];

    /**
     * @var object statement
     */
    private $stmt;


    /**
     * @method __construct
     */
    public function __construct()
    {
        $this->conn = ConnectionFactory::getFactory()->getConnection();
        $this->builder = BuilderFactory::getFactory()->getBuilder();
    }

    /**
     * @param array  $params
     * @param string $table
     * @param bool   $group_insert / verify if is a group insert
     */
    public function insert(array $params, $table)
    {
        $this->query = $this->builder->make_insert_query($params, $table);
        $this->binded_param = $this->builder->bind_params($params);

        $this->execute_stmt($this->query, $this->binded_param);

        return $this->conn->lastInsertId();

    }

    /**
     * @param array    $params
     * @param string   $table
     * @method update  data
     */
    public function update(array $params, $table, $identifier = 'id')
    {
        $prepared_string = $this->builder->make_collate_string_update( $params );

        $this->query = "UPDATE {$table} SET {$prepared_string} WHERE {$identifier}=:{$identifier}";

        $this->execute_stmt($this->query, $this->builder->bind_params($params));
    }


    /**
     * @param string $table
     * @return void
     */
    public function select($table){

        $database = new Database();
        $database->setQuery("SELECT * FROM {$table}");
        return $database;

    }

    /**
     * @param string $query
     * @param array  binded params
     */
    public function raw_execute($query, array $binded_params = [], $is_select = false)
    {
        $this->query = $query;

        if (count($binded_params) > 0) {
            $binded_params = $this->builder->bind_params($binded_params);
        }

        $this->execute_stmt( $query, $binded_params );

        // If is defined with a select
        if($is_select)
            return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);

        if( $this->stmt->errorCode() === null )
            echo true;
        else
            echo false;
    }

    /**
     * @param array   $params
     * @return object Database
     */
    public function where(array $params)
    {
        $where_closure = $this->builder->make_where_closure($params);
        $binded_param  = $this->builder->make_collate_bind_params($params);

        $database = new Database();
        $database->setQuery($this->query . ' ' . $where_closure);
        $database->set_binded_param($binded_param);

        return $database;
    }

    /**
     * @param string $index
     * @return object Database
     */
    public function groupBy($index)
    {
        $aditional_closure = "GROUP BY $index";

        $database = new Database();
        $database->setQuery($this->query . ' ' . $aditional_closure);

        return $database;
    }

    public function orderBy($index)
    {
        $aditional_closure = "ORDER BY $index";

        $database = new Database();
        $database->setQuery($this->query . ' ' . $aditional_closure);

        return $database;
    }

    /**
     * @return array fetched
     */
    public function get()
    {
        $this->execute_stmt($this->query, $this->binded_param);

        if($this->stmt->rowCount() == 1)
            return $this->stmt->fetch(\PDO::FETCH_ASSOC);
        else if($this->stmt->rowCount() > 1)
            return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
        else
            return false;
    }

    public function getAll()
    {
        $this->execute_stmt($this->query, $this->binded_param);

        if($this->stmt->rowCount() != 0)
            return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
        else
            return [];
    }


    /**
     * @param string $query
     * @param array $params
     * @return void
     */
    public function execute_stmt($query, array $params = [])
    {
        if(count($params) == 0)
            $params = $this->binded_param;

        $this->stmt = $this->conn->prepare(
            $this->query
        );

        $this->stmt->execute($params);

        $this->binded_param = [];
    }



    // ------------- GETTERS E SETTERS
    public function setQuery($query)
    {
        $this->query = $query;
    }

    public function set_binded_param(array $params)
    {
        $this->binded_param = array_merge($this->binded_param, $params);
    }

}

?>
