<?php

include_once('../grisha/Grisha_PopovException.php');

include_once('../core/EquationInterface.php');
include_once('../core/LogInterface.php');
include_once('../core/LogAbstract.php');

include_once('../grisha/MyLog.php');
require_once '../grisha/Line.php';
require_once '../grisha/Cube.php';

class CubeTest extends PHPUnit\Framework\TestCase {

	protected $objCube;

    protected function setUp(): void
    {
        $this->objCube = new GrishaPopov\Cube();
    }

    protected function tearDown(): void
    {
        $this->objCube = NULL;
    }


    # ТЕСТЫ КЛАССА CUBE

     /**
    * @dataProvider providerPower3
    * Обычное выполнение без исключений
    */
    public function testPower3($a, $b, $c, $d)
    {
        $this->assertEquals($d, $this->objCube->solve($a, $b, $c));
    }
   
    public function providerPower3()
    {
        return array(
            array(2, 6, 3, array(-0.63, -2.37)),
            array(1, 4, 2, array(-0.59, -3.41)),
            array(2, 4, 2, array(-1)),
        );
    }

    /**
    * @dataProvider providerPower4
    * Выполнение с вызовом исключения
    */
    public function testPower4($a, $b, $c)
    {
        $this->expectException(GrishaPopov\Grisha_PopovException::class);
        $this->objCube->solve($a, $b, $c);
    }
   
    public function providerPower4()
    {
        return array(
            array(6, 2, 5),
            array(21, 8, 3),
            array(1000, 1, 2),
            array(0, 0, 0),
        );
    }
}
