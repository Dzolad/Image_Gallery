<?php
function class_autoloader($class) {
	$class = strtolower($class);
	$path = "includes/classes/{$class}_class.php";
	
	if(is_file($path) && !class_exists($class)) {
		require_once($path);
	}
}

spl_autoload_register('class_autoloader');
?>