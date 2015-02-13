<?php 
	class Animal{
		public $name;
		public $age = 0;

		function sayHello() {
			echo $this->name." Hello";
		}
	}

	$cat = new Animal();
	$dog = new Animal();

	$cat->name = "Murzik";
	$dog->name = "Tuzik";

	echo $cat->name;
	echo $dog->name;

	$cat->sayHello();

?>