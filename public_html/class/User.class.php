<?php
	class User extends AUser {
		public $name;
		public $login;
		public $password;
		public static $count = 0;

		public function showInfo() {
			echo '<br /><br />Name: '.$this->name."<br />Login: ".$this->login."<br /> Password: ".$this->password."\n";
		}

		public function __construct($name, $login, $passw) {
			$this->name = $name;
			$this->login = $login;
			$this->password = $passw;
			++self::$count;
		}

		public function __destruct() {
			echo "Пользыватель ".$this->name." удален <br />";
		}


		public function __clone(){
			$this->name = "Guest";
			$this->login = "Guest";
			$this->password = '0000';
			++self::$count;
		}
	}
?>