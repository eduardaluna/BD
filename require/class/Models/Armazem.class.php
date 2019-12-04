<?php

namespace Models;

use Model\Model;
use Helpers\Validate;

class Armazem extends Model
{
    protected $table = 'armazem';
    protected $identifier = 'id';

    public function getArmazemById($id){
        $armazens = $this->database->select($this->table)->where(['id','=',$id])->getAll();
      return $armazens;
    }
}
?>
