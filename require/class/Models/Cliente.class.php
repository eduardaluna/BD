<?php

namespace Models;

use Model\Model;
use Helpers\Validate;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $identifier = 'id';

    public function getClientById($id){
        $clientes = $this->database->select($this->table)->where(['id','=',$id])->getAll();
      return $clientes;
    }

    public function getClientByCpf($email){
            $clientes = $this->database->select($this->table)->where(['cpf','=',$email])->getAll();
        return $clientes;
    }

    public function validateStore(array $values)
    {
        $valid_params = array(
            'cpf'     => 'required|min:9',
            'nome'   => 'required|min:9',
        );
        return Validate::validator($valid_params, $values);
    }
}
?>
