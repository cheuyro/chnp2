<?php

namespace GrishaPopov;

class Line {
	private $x;
		
	public function mathLine($a,$b){
		MyLog::log("Eto lineinoe yravnenie");
		echo $a.$b;
		if ($a==0){
			throw new Grisha_PopovException('Delenie na 0');
		} else {
			$this->x = round(-$b/$a,2);
			return $this->x;
		}
	}
}

?>