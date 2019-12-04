<?php
    @$url = explode('/',$_GET['url']);
    $pagina = !empty($url[0]) ? $url[0] : 'home';
    $parametro = !empty($url[1]) ? $url[1] : null;
    $parametro2 = !empty($url[2]) ? $url[2] : null;

    include('require/class/autoload.php');

    require_once "header.php";
                if (file_exists($pagina.'.php')) {
                    include $pagina.'.php';
                } else {
                    include '404.php';
                }
	require_once "footer.php";
?>
