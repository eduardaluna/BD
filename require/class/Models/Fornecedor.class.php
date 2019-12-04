<?php

namespace Models;

use Model\Model;
use Helpers\Validate;

class Fornecedor extends Model
{
    protected $table = 'fornecedor';
    protected $identifier = 'id';

    public function getFornecedorById($id){
        $fornecedores = $this->database->select($this->table)->where(['id','=',$id])->getAll();
      return $fornecedores;
    }
}
?>
