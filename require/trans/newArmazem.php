<?php
  session_start();
  include('../class/autoload.php');

  use Models\Armazem;
  $inst     = new Armazem();

  if(@$_POST['id']){
    $inst->find($_POST['id']);
  }

  $inst->fill([
      'nome'            => $_POST['nome'],
      'endereco'        => $_POST['endereco'],
      'tamanho'         => $_POST['tamanho']
  ]);
  $inst->save();

?>
