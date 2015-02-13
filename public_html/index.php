<?php 
	header("Content-type: text/html;charset=utf-8");
	class Animal{
		public $name;
		public $age = 0;

		function sayHello($word) {
			echo $this->name." сказал ".$word;
			$this->drawBr();
		}
		function drawBr() {
			echo "<br />";
		}
	}

	$cat = new Animal();
	$dog = new Animal();

	$cat->name = "Murzik";
	$dog->name = "Tuzik";

	$cat->sayHello('Мяу');
	$dog->sayHello('Гав');

?>