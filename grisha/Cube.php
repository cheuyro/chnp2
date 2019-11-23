<?php

namespace GrishaPopov;

class Cube extends \GrishaPopov\Line implements \core\EquationInterface{
	protected function mathD($a,$b,$c){
		return pow($b,2)-4*$a*$c;
	}
	
	public function solve($a,$b,$c){	
		if ($a!=0){
			MyLog::log("Eto kvadratnoe yravnenie");	
			$d = $this->mathD($a,$b,$c);
			if ($d>0){
				$this->x = array(
								round((-$b+sqrt($d))/$a*2,2),
								round((-$b-sqrt($d))/$a*2,2)
								);
			} elseif ($d==0) {
				$this->x = array(round((-b)/2*$a,2));
			} elseif ($d < 0) {
				throw new Grisha_PopovException("Discriminant < 0, net reshenii", 1);
			}
			
		} elseif ($a == 0) {
			$this->x = array($this->mathLine($b,$c));
		}
		return $this->x;
	}
}

