<?php 
	function __autoload($name) {
		require "class/$name.class.php";
	}

	$user1 = new User("Jack Lek", "jk2", "23DASklj");
	$user1->showInfo();

	$user2 = new User("Mike Dow", "md", "23fkdjzxc%");
	$user2->showInfo();

	$user3 = new User("Jacka Dasv", "dav", "23fkdjzx@DA");
	$user3->showInfo();
  
	$user4 = clone $user1;

	$user = new superUser('Admin User', "root", "sad2@zd$s", "Adm");
	$user1 = new superUser('Admin User', "root", "sad2@zd$s", "Adm");
	$user2 = new superUser('Admin User', "root", "sad2@zd$s", "Adm");
	$user3 = new superUser('Admin User', "root", "sad2@zd$s", "Adm");
	$user->showInfo();
	var_dump($user->getInfo());
	echo "<hr />";

	echo 'Всего обычных пользователей: '.User::$count;
	echo 'Всего супер-пользователей: '.superUser::$count1;
?>