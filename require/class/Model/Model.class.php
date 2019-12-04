<?php

namespace Model;

class Model
{

    /**
     * @var object Model\Database
     */
    protected $database = null;

    /**
     * @var integer id of table
     */
    protected $identifier = 'id';

    /**
     * @var array $values
     */
    protected $values;

    /**
     * @var string $table / table of the model in db
     */
    protected $table = '';

    /**
     * @method __construct
     */
    public function __construct()
    {
        $this->database = new Database();
    }

    /**
     * @method       __get
     * @param string $column_name
     * @return       $value[index]
     */
    public function __get( $column_name )
    {
        if( array_key_exists($column_name, $this->values) ){
            return $this->values[$column_name];
        }
    }

    /**
     * @method          __set
     * @param string    $column_name
     * @param undefined $value
     * @return void
     */
    public function __set( $column_name, $value )
    {
        $this->values[$column_name] = $value;
    }

    /**
     * @param array $params (set data)
     */
    public function fill( $params )
    {
        $this->set_internal_data($params);
    }

    /**
     * @method save data filled in database
     */
    public function save()
    {
        if( isset($this->values[ $this->identifier] ) ){
            $this->database->update( $this->values, $this->table, $this->identifier );
            echo "ok";
        } else {
            echo "ok";
            $this->values[$this->identifier] = $this->database->insert( $this->values, $this->table );
        }
    }

    /**
     * @param array  $params
     * @param string $table
     */
    public function create(array $params)
    {
        $this->values[$this->identifier] = $this->database->insert($params, $this->table);

        $this->set_internal_data($params);
    }

    /**
     * @return array fetched by PDO
     */
    public function all()
    {
        if (!$registers = $this->database->select($this->table)->get()){
            return [];
        }

        // Trate if is a unique ocurrence
        if (!is_array(end($registers))){
            return array($registers);
        }

        return $registers;
    }

    /**
     * @param array/integer $params
     * @param array $paramsSupp
     */
    public function find($params, array $paramsSupp = [])
    {
        // Verify if is passed a ID ou a Array
        if (!is_array($params)) {
            $paramsSupp[] = [$this->identifier, '=', $params];
        } else {
            $paramsSupp = $params;
        }

        $data =  $this->database->select($this->table)
                                ->where($paramsSupp)
                                ->get();


        if ($data) {
            $this->set_internal_data($data);

            return $data;
        }

        return false;
    }


    public function delete( $id = false )
    {

        $id = (!$id) ? $this->values[$this->identifier] : $id;

        $query = "DELETE FROM {$this->table} WHERE {$this->identifier}=:id";

        $this->database->raw_execute($query, array(
            'id' => $id
        ));
        
        $this->values = [];
    }


    /**
     * @param array $params
     */
    private function set_internal_data($params)
    {

        foreach($params as $column => $value){
            $this->{$column} = $value;
        }

    }

    public function debug(){
        echo get_class($this) . '<br>';
        echo '----------------------------------<br>';
        foreach ($this->values as $index => $value) {
            echo "<b>{$index}</b> = {$value} <br>";
        }
        exit();
    }

    public function status()
    {
        return $this->values;
    }

}

?>
