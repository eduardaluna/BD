<?php
  session_start();
  include('../class/autoload.php');

  use Models\Pedido;
  $pedido   = new Pedido();

  $pedido->find($_POST['id']);
  $pedido->delete();

  echo "ok";
?>
