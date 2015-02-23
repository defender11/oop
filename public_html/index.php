<?php 
	header("Content-type: text/html;charset=utf-8");
	class MyExceptionOne extends Exception{
		function __construct($msg) {
			parent::__construct($msg);
		}
	}
	class MyExceptionTwo extends Exception{
		function __construct($msg) {
			parent::__construct($msg);
		}
	}	
	class Animal{
		public $name;
		public $age = 0;

		function sayHello($word) {
			echo $this->name." сказал ".$word;
			$this->drawBr();
		}
		function drawBr() {
			echo "<br />";
		}
		function __construct($x=0, $y=0) {
			try {
				if(!$x)
					throw new MyExceptionOne("Нет 1 параметра! <br />");
				if(!$y)
					throw new MyExceptionTwo("Нет 2 параметра! <br />");
				echo "Object #$num created<br />";
			} catch (MyExceptionOne $e) {
				echo $e->getMessage();
			} catch (MyExceptionTwo $e) {
				echo $e->getMessage();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
	}

	$cat = new Animal(1);
	$dog = new Animal();
	$cats = new Animal(1,2);

	$cat->name = "Murzik";
	$dog->name = "Tuzik";

	$cat->sayHello('Мяу');
	$dog->sayHello('Гав');

?>