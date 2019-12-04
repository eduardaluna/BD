<?php
  session_start();
  include('../class/autoload.php');

  use Models\Estoque;
  $estoque    = new Estoque();

  $estoque->find($_POST['id']);
  $estoque->delete();

  echo "ok";
?>
