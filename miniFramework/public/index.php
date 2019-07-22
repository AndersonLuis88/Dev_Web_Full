<?php
	require_once "../vendor/autoload.php";

	$route = new \App\Route;

	echo 'Mini Framework';
	echo '<hr>';
	print_r($route->getUrl());

?>