<?php 
	class Test {
		private $date = array();

		public function __set($n, $v) {
			$this->date[$n] = $v;
		}

		public function __get($n) {
			if(array_key_exists($n, $this->data)) {
				return $this->data[$n];
			}
		}
	}


 ?>