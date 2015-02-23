<?php 

	abstract class Car {
		public $petrol;

		function startEngine() {
			echo 'Двигатель завелся!';
		}
		abstract function stopEngine();
	}

	class InjectorCar extends Car {
		function stopEngine () {
			echo 'Двигатель остановился!';
		}
	}

	$megaCar = new InjectorCar();
	$megaCar->startEngine();
	$megaCar->stopEngine();


	interface Menu {
		function showMenu($name);
		function priceMenu();
	}
	interface User {
		function showName($name);
	}

	class ShowForUser implements Menu, User {
		private $price = 10;

		function __construct($name) {
			$this->showMenu($name);
		}
		function priceMenu() {
			echo '<br />Menu Price: '.$this->price.'<br />';
		}
		function showName ($name) {
			echo 'Your name: '. $name;
		}
		function showMenu($name) {
			$this->priceMenu();
			$this->showName($name);
		}

	}
	$user1 = new ShowForUser('John');

?>