<?php 

	class User {
		public $name;
		public $login;
		public $password;

		public function showInfo() {
			echo '<br /><br />Name: '.$this->name."<br />Login: ".$this->login."<br /> Password: ".$this->password."\n";
		}

		public function __construct($name, $login, $passw) {
			$this->name = $name;
			$this->login = $login;
			$this->password = $passw;
		}

		public function __destruct() {
			echo "Пользыватель ".$this->name." удален <br />";
		}

		// public function showInfo1() {
		// 	echo '<p>Name: '.$this->name."<br />Login: ".$this->login."<br /> Password: ".$this->password.' </p><br />';
		// }

		public function __clone(){
			$this->name = "Guest";
			$this->login = "Guest";
			$this->password = '0000';
		}
	}

	$user1 = new User("Jack Lek", "jk2", "23DASklj");
	$user1->showInfo();

	$user2 = new User("Mike Dow", "md", "23fkdjzxc%");
	$user2->showInfo();

	$user3 = new User("Jacka Dasv", "dav", "23fkdjzx@DA");
	$user3->showInfo();


	$user4 = clone $user1;

 class superUser extends User {
 		public $role;

 		public function __construct($name, $login, $passw, $role) {
 			parent::__construct($name, $login, $passw);
 			$this->role = $role;
 		}
 		public function showInfo() {
 			parent::showInfo();
 			echo "<br />Role: ".$this->role."<br />";
 		}
 } 

 $user = new superUser('Admin User', "root", "sad2@zd$s", "Adm");
 $user->showInfo();
?>