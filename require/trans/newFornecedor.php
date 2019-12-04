<?php
  session_start();
  include('../class/autoload.php');

  use Models\Fornecedor;
  $inst     = new Fornecedor();

  if(@$_POST['documento']){
    $inst->find($_POST['documento']);
  }

  $inst->fill([
      'nome'            => $_POST['nome'],
      'documento'       => $_POST['documento'],
      'tipoDeFornecedor'=> $_POST['tipoDeFornecedor'],
      'localidade'      => $_POST['localidade']
  ]);
  $inst->save();

?>
