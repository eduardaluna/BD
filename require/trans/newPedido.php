<?php
  session_start();
  include('../class/autoload.php');

  use Models\Pedido;
  $inst     = new Pedido();

  if(@$_POST['id']){
    $inst->find($_POST['id']);
  }
  
  $inst->fill([
      'Cliente_id'      => $_POST['cliente'],
      'dataPedido'      => $_POST['dataPedido'],
      'modoEncomenda'   => $_POST['modoEncomenda'],
      'dataEntrega'     => $_POST['dataEntrega'],
      'status'          => $_POST['status']
  ]);
  $inst->save();
  

?>
