<?php
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
?>