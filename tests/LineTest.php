<?php

include_once('../grisha/Grisha_PopovException.php');

include_once('../core/EquationInterface.php');
include_once('../core/LogInterface.php');
include_once('../core/LogAbstract.php');

include_once('../grisha/MyLog.php');
require_once '../grisha/Line.php';

class LineTest extends PHPUnit\Framework\TestCase {

	protected $objLine;

    protected function setUp(): void
    {
        $this->objLine = new GrishaPopov\Line();
    }

    protected function tearDown(): void
    {
        $this->objLine = NULL;
    }


    # ТЕСТЫ КЛАССА LINE

    /**
    * @dataProvider providerPower1
    * Обычное выполнение без исключений
    */
    public function testPower1($a, $b, $c)
    {
        $this->assertEquals($c, $this->objLine->mathLine($a, $b));
    }
   
    public function providerPower1()
    {
        return array(
            array(2, 2, -1),
            array(8, 3, -0.38), // -0.375 ~ -0.38
            array(2, 15, -7.5),
        );
    }

    /**
    * @dataProvider providerPower2
    * Выполнение с вызовом исключения
    */
    public function testPower2($a, $b)
    {
        $this->expectException(GrishaPopov\Grisha_PopovException::class);
        $this->objLine->mathLine($a, $b);
    }
   
    public function providerPower2()
    {
        return array(
            array(0, 1000),
            array(0, 1234567),
            array(0, 0),
        );
    }
}
