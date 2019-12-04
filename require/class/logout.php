
<?php
session_start();
unset($_SESSION['log_01:13']);
unset($_SESSION['nome']);
unset($_SESSION['email']);
unset($_SESSION['img']);
unset($_SESSION['logado']);
unset($_SESSION['order']);
session_destroy();
?>
<script>location.href='/';</script>

<?php exit('Redirecionando...'); ?>
