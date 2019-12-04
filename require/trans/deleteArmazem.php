<?php
  session_start();
  include('../class/autoload.php');

  use Models\Armazem;
  $armazem    = new Armazem();
  use Models\Estoque;
  $estoque    = new Estoque();

  if(empty($estoque->getEstoqueByArmazem($_POST['id']))){
    $armazem->find($_POST['id']);
    $armazem->delete();
    echo "ok";
  } else {
    echo "Não é possível remover um armazém que possui estoques.";
  }
  
?>
