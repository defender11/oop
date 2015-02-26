<?php 
	header("Content-type: text/html;charset=utf-8");
	
	function __autoload($temp) {
		require "class/$temp.class.php";
	}

	$cat = new Animal(1);
	$dog = new Animal();
	$cats = new Animal(1,2);

	$cat->name = "Murzik";
	$dog->name = "Tuzik";

	$cat->sayHello('Мяу');
	$dog->sayHello('Гав');

?>