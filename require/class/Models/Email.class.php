<?php

namespace Models;

use Model\Model;
use Helpers\Validate;

class Email extends Model
{
    protected $table = 'email';
    protected $identifier = 'id';

    public function getEmailByCliente($cliente_id){
        $telefones = $this->database->select($this->table)->where(['Cliente_id','=',$cliente_id])->getAll();
        return $telefones;
    }
    
}
?>