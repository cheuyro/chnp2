<?php

namespace GrishaPopov;

class MyLog extends \core\LogAbstract implements \core\LogInterface{
	protected $log = array();

	public static function log($str) {
	//	if (isset($str))		
			self::Instance()->log[] = $str; //date('[d-m-Y H:i:s] ').
	}
	
	public function _write(){
		echo implode("\n", self::Instance()->log)."\n";
	}
	
	public static function write(){
		self::Instance()->_write();
	}
	
}

//file_put_contents("../log",$log . PHP_EOL, FILE_APPEND);
