
<?php
	
	class A{
		public $num;
		function __construct(){
			$this->num = 1;
			echo $this->num;
		}
	}
	class B extends A{
		public function __construct(){
			parent::__construct();
			$this->num = $this->num+1;
			echo $this->num;
		}
	} 
	
	$n1 = new A();
	echo "<pre>".var_dump($n1)."<pre>";
	
	$n2 = new A();
	
	$n3 = new A();
	$n5 = new B();
	
	//$n2 = new B();
	//$n3 = new B();
	
	
	
?>