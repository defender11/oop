<?php 
	function __autoload($n){
		include "class/$n.class.php";
	}


	function fo(array $n) {}

	fo("1");
 ?>fasf