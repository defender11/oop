<?php 
	function __autoload($name) {
		require "class/$name.class.php";
	}

	$megaCar = new InjectorCar();
	$megaCar->startEngine();
	$megaCar->stopEngine();

	$user1 = new ShowForUser('John');
?>