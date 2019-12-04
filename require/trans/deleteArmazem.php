<?php
  session_start();
  include('../class/autoload.php');

  use Models\Armazem;
  $armazem    = new Armazem();

  $armazem->find($_POST['id']);
  $armazem->delete();

  echo "ok";
?>
