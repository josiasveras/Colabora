<?php

	 require_once "../vendor/autoload.php";

	 $route = new \App\Route;
	 echo "Está funcionando";
	 echo "</br>";
	// print_r($route->getUrl());
	 echo "</br>";
	 echo "<pre>";
	 print_r($route->getRoutes());
	 echo "</pre>";
?>
