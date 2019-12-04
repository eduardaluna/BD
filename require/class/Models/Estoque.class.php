<?php

namespace Models;

use Model\Model;
use Helpers\Validate;

class Estoque extends Model
{
    protected $table = 'estoque';
    protected $identifier = 'id';

    public function getEstoqueById($id){
        $estoques = $this->database->select($this->table)->where(['id','=',$id])->getAll();
      return $estoques;
    }
}
?>
