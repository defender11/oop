<?php 

	class User {
		public $name;
		public $login;
		public $password;

		public function showInfo($name, $login, $passw) {
			$this->name = $name;
			$this->login = $login;
			$this->password = $passw;

			echo $this->name." ".$this->login." ".$this->password.' <br /> <hr />';
		}
	}

	$user1 = new User();
	$user2 = new User();
	$user3 = new User();

	$user1->showInfo("Jack", "jk2", "23fkdjl234DASklj");
	$user2->showInfo("Jack1", "jk2", "23fkdjl234DASklj");
	$user3->showInfo("Jack4", "jk2", "23fkdjl234fsadfDASklj");
?>