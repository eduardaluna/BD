<?php

function my_autoload ($className) {
	$className = str_replace('\\', '/', $className);

	include(__DIR__ . "/" . $className . ".class.php");
}

spl_autoload_register("my_autoload");

?>
