<?php
  session_start();
  include('../class/autoload.php');

  use Models\Cliente;
  $cliente     = new Cliente();
  use Models\Telefone;
  $telefone    = new Telefone();
  use Models\Email;
  $email     = new Email();

  $telefone->getTelefoneByCliente($_POST['id']);
  foreach($telefone as $tel){
    $telD = new Telefone();
    $telD->find($tel["id"]);
    $telD->delete();
  }

  $email->getEmailByCliente($_POST['id']);
  foreach($email as $mail){
    $mailD = new Email();
    $mailD->find($mail["id"]);
    $mailD->delete();
  }

  $cliente->find($_POST['id']);
  $cliente->delete();

  echo "ok";
?>
