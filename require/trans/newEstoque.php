<?php
  session_start();
  include('../class/autoload.php');

  use Models\Estoque;
  use Models\Armazem;
  $inst     = new Estoque();
  $armazem = new Armazem();

  if(@$_POST['id']){
    $inst->find($_POST['id']);
  }

  $inst->fill([
      'codigo'          => $_POST['codigo'],
      'armazem_id'      => $_POST['armazem_id']
  ]);
  $inst->save();
  

?>
