<?php
  session_start();
  include('../class/autoload.php');

  use Models\Fornecedor;
  $fornecedor    = new Fornecedor();

  $fornecedor->find($_POST['documento']);
  $fornecedor->delete();

  echo "ok";
?>
