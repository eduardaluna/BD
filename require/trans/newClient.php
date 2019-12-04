<?php
  session_start();
  include('../class/autoload.php');

  use Models\Cliente;
  use Models\Telefone;
  use Models\Email;
  $inst     = new Cliente();
  $telefone = new Telefone();
  $email = new Email();

  if(@$_POST['id']){
    $inst->find($_POST['id']);
  }

  $inst->fill([
      'nome'            => $_POST['nome'],
      'cpf'             => $_POST['cpf'],
      'limiteDeCredito' => $_POST['limite'],
      'estado'          => $_POST['estado'],
      'pais'            => $_POST['pais'],
      'dataCadastro'    => date("Y-m-d"),
      'cidade'          => $_POST['cidade']
  ]);
  $inst->save();
  
  if(empty(@$_POST['id'])){
    $telefone->fill([
      'Cliente_id'   => $inst->id,
      'numero'       => $_POST['phone']
    ]);

    $email->fill([
      'Cliente_id'   => $inst->id,
      'numero'       => $_POST['email']
    ]);
  }

?>
