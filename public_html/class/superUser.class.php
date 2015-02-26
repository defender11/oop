<?php
	class superUser extends User implements ISuperUser {
 		public $role;
		public static $count1 = 0;

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
 			--parent::$count;
 		}
 		public function showInfo() {
 			parent::showInfo();
 			echo "<br />Role: ".$this->role."<br />";
 			echo "<hr />";
 		}
 }
?>