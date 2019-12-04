<?php

namespace Models;

use Model\Model;
use Helpers\Validate;

class Produto extends Model
{
    protected $table = 'produto';
    protected $identifier = 'id';

    public function getProdutoById($id){
        $produtos = $this->database->select($this->table)->where(['id','=',$id])->getAll();
      return $produtos;
    }
}
?>
