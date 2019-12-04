<?php

namespace Models;

use Model\Model;
use Helpers\Validate;

class Fornecedor extends Model
{
    protected $table = 'fornecedor';
    protected $identifier = 'documento';

    public function getFornecedorByDocumento($id){
      $fornecedores = $this->database->select($this->table)->where(['documento','=',$id])->getAll();
    return $fornecedores;
  }
}
?>
