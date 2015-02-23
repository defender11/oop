<?php 
	abstract class AUser {
		abstract function showInfo();
	}

	class User extends AUser {
		public $name;
		public $login;
		public $password;
		static $count = 0;

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
		}
	}

	$user1 = new User("Jack Lek", "jk2", "23DASklj");
	$user1->showInfo();

	$user2 = new User("Mike Dow", "md", "23fkdjzxc%");
	$user2->showInfo();

	$user3 = new User("Jacka Dasv", "dav", "23fkdjzx@DA");
	$user3->showInfo();
  
	$user4 = clone $user1;

	interface ISuperUser {
		function getInfo();
	}

	class superUser extends User implements ISuperUser {
 		public $role;
		static $count1 = 0;

		public function getInfo() {
			$arr = [];
			foreach ($this as $k => $v) {
				$arr[$k] = $v;
			}
			return $arr;
		}

 		public function __construct($name, $login, $passw, $role) {
 			parent::__construct($name, $login, $passw);
 			$this->role = $role;
 			++self::$count1;
 		}
 		public function showInfo() {
 			parent::showInfo();
 			echo "<br />Role: ".$this->role."<br />";
 			echo "<hr />";
 		}
 } 

 $user = new superUser('Admin User', "root", "sad2@zd$s", "Adm");
 $user->showInfo();
 var_dump($user->getInfo());
 echo "<hr />";

 echo 'Всего обычных пользователей: '.User::$count;
 echo 'Всего супер-пользователей: '.superUser::$count1;
?>