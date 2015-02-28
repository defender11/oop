<?php 
	function __autoload($n){
		include "class/$n.class.php";
	}

	$test = new Test();
	echo $test->Name = "Mike Slavotski";
 ?>