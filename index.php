
<?php

class Line {
	private $x;
		
	/*
		@param int $a,$b
		@return array
	*/
	public function mathLine($a,$b){
		$this->x = array(abs(round(-$b/$a,2)));
		return $this->x;
	}
}

class Cube extends Line{
	private $obj1;
	
	public function __construct($obj1) {
		$this->obj1 = $obj1;
	}
	
	/*
		@param int $a,$b,$c
		@return int
	*/
	protected function mathD($a,$b,$c){
		return pow($b,2)-4*$a*$c;
	}
	
	/*
		@param int $a,$b,$c
		@return array
	*/
	public function mathCube($a,$b,$c){		
		if ($a!=0){
			$d = $this->mathD($a,$b,$c);
			if ($d>0){
				$this->x = array(
								round((-$b+sqrt($d))/$a*2,2),
								round((-$b-sqrt($d))/$a*2,2)
								);
			} elseif ($d==0) {
				$this->x = array(round((-b)/2*$a,2));
			}
		} elseif ($a == 0) {
			$this->x = $this->mathLine($b,$c);
		}
		return $this->x;
	}
}

class C extends Cube {
	private $obj2;
	private $obj3;
	public function __construct($obj1,$obj2,$obj3) {
		$this->obj2 = $obj2;
		$this->obj3 = $obj3;
 		parent::__construct($obj1);
	}

}

$ob1 = new Line();
$ob3 = new Line();
$ob5 = new Cube($ob3);
$ob4 = new Cube($ob5);
$ob2 = new C($ob1,$ob3,$ob4);


//echo $ob1->mathLine(3,8)."<br>";

list($x1,$x2) = $ob5->mathCube(2,5,1);
echo $x1."<br>".$x2;



//echo '<pre>';
//var_dump($ob5);
//echo '</pre>';
?>