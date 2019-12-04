<?php
function get_token_id() {
  $cripto = new Cripto();
      if(isset($_SESSION['token_id'])) {
              return $_SESSION['token_id'];
      } else {
              $token_id = $cripto->setCripto(mt_rand());
              $_SESSION['token_id'] = $token_id;
              return $token_id;
      }
}
function get_rand_token() {
  $cripto = new Cripto();
  $token_id = $cripto->setCripto(mt_rand());
  return $token_id;
}
?>
