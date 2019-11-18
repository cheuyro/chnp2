<?php

namespace GrishaPopov;

ini_set('display_errors',1);
error_reporting(-1);

class Grisha_PopovException extends \RuntimeException{
}

include_once('core/EquationInterface.php');
include_once('core/LogIntefrace.php');
include_once('core/LogAbstract.php');

include_once('grisha/MyLog.php');

include_once('grisha/Line.php');
include_once('grisha/Cube.php');


try {
	echo "Vvedite 3 chisla (with space)\n";

	$nums = explode(" ", fgets(STDIN));
	
	if (count($nums) < 2 || count($nums) > 3){
		throw new Grisha_PopovException('Takogo yravnenia ne cycectvyet'); //, 1);
	}

	$a = (float)$nums[0];
	$b = (float)$nums[1];
	if (count($nums) > 2){
		$c = (float)$nums[2];
	}
		
	

	if (!isset($c)){
		MyLog::log('Vvedeno yravnenie '.$a.'X-'.$b.'=0');
		$objLine = new Line();
		//$lineCor
		MyLog::log('Koren: '.$objLine->mathLine($a,$b));
	} else {
		MyLog::log('Vvedeno yravnenie '.$a.'X^2+'.$b.'X+'.$c.'=0');
		$objLine = new Cube();
		$logLine = '';
		if ($nums[0] != 0){
			list($num1,$num2) = $objLine->mathCube($a,$b,$c);
			$logLine = 'Korni: x1 = '.$num1.', x2 = '.$num2;
		}else{
			list($num1) = $objLine->mathCube($a,$b,$c);
			$logLine = 'Koren: x1 = '.$num1;
		}
		MyLog::log($logLine);
	}
} catch (Grisha_PopovException $e) {
	MyLog::log('Custom Error: '.$e->GetMessage());
}

MyLog::write();


