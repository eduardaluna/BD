<?php
if($_SERVER["REQUEST_URI"] != "/adm/" && $_SERVER["REQUEST_URI"] != "/adm/home/" && $_SERVER["REQUEST_URI"] != "/adm/?erro=1" && $_SERVER["REQUEST_URI"] != "/adm/?erro=2"){
  if(empty($_SESSION['log_01:13']) || $_SESSION['log_01:13'] != "4530631"){
    echo "<script>location.href='/adm/?erro=2';</script>";
  }
}
?>
