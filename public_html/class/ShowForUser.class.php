<?php
	class ShowForUser implements Menu, IUser {
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
?>