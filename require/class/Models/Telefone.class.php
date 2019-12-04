<?php

namespace Models;

use Model\Model;
use Helpers\Validate;

class Telefone extends Model
{
    protected $table = 'telefone';
    protected $identifier = 'id';

    public function getTelefoneByCliente($cliente_id){
        $telefones = $this->database->select($this->table)->where(['Cliente_id','=',$cliente_id])->getAll();
    return $telefones;
}
}

?>