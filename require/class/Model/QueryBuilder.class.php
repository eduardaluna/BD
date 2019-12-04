<?php 

namespace Model;

class QueryBuilder
{

    /**
     * @param array  $params
     * @return array
     */
    public function make_separate_string(array $params)
    {

        $column_name = [];
        $column_bind = [];

        foreach( $params as $column => $value ){
            $column_name[] = $column;
            $column_bind[] = ":{$column}";
        }

        return array(
            'column_name' => implode(', ', $column_name),
            'column_bind' => implode(', ', $column_bind)
        );

    }

    /**
     * @param array    $params
     * @return string
     */
    public function make_collate_string(array $params)
    {
        $column_has_bind = [];

        $cont = 0;

        foreach($params as $column){

            if( !is_array($column) ){
                $cont++;

                if ($cont === 3) {
                    $column_has_bind[] = "'$column'";
                } else {
                    $column_has_bind[] = $column;
                }

                continue;
            }

            $column_has_bind[] = $this->make_unique_param($column[0], $column[1]);
        }

        $string_has_bind = implode(' ', $column_has_bind);

        return $string_has_bind;
    }

    /**
     * @param string  $column
     * @param string  $operate
     * @return string binding_param
     */
    private function make_unique_param($column, $operate = '=')
    {
        return "{$column}{$operate}:{$column}";
    }

    /**
     * @param array   $params
     * @return string update params
     */
    public function make_collate_string_update( array $params )
    {
        $string_params = [];

        foreach($params as $column => $value){
            $string_params[] = $this->make_unique_param($column);
        }

        return implode(', ', $string_params);
    }

    /**
     * @param array  $param
     * @return array $helper_params / binded params
     */
    public function make_collate_bind_params(array $params)
    {

        $helper_params = [];

        foreach($params as $column){

            if( is_array($column) ){
                $helper_params[":{$column[0]}"] = $column[2];
            }

        }

        return $helper_params;

    }


    /**
     * @param array  $params
     * @return array binded_params
     */
    public function bind_params(array $params)
    {

        $binded_param = [];

        foreach($params as $column => $value){
            $binded_param[":{$column}"] = $value ? "{$value}" : null;
        }

        return $binded_param;

    }


    /**
     * @param  array  $params
     * @return string $query
     */
    public function make_insert_query( array $params, $table )
    {
        $prepared_strings = $this->make_separate_string($params);

        $query = "INSERT INTO {$table}({$prepared_strings['column_name']}) VALUES({$prepared_strings['column_bind']});";

        return $query;
    }


    /**
     * @param array   $params
     * @return string WHERE CLOSURE
     */
    public function make_where_closure(array $params)
    {
        $closure = $this->make_collate_string($params);
        return "WHERE {$closure}";
    }

}

?>
