<?php
	abstract class Car {
		public $petrol;

		function startEngine() {
			echo 'Двигатель завелся!';
		}
		abstract function stopEngine();
	}
?>