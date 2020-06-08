<?php


namespace App\Tests\Unit\Payroll;

use PHPUnit\Framework\TestCase;
use App\Payroll\Schedule\Schedule;

class ScheduleTest extends TestCase
{
    /**
     * @test
     */
    function calculateListOutput_isArray_hasExpectedRowCount_hasExpectedValues()
    {
        $monthRowCount = 5;
        $labelRowCount = 1;
        $testDate = new \DateTime('2018-07-20');

        $list = Schedule::calculateList($testDate, $monthRowCount);
        
        $this->assertIsArray($list);
        $this->assertEquals($monthRowCount + $labelRowCount, count($list));

        $expectedArray = [
            ["Month","Base Date","Bonus Date"],
            ["July","31/07/2018","12/07/2018"],
            ["August","31/08/2018","14/08/2018"],
            ["September","28/09/2018","12/09/2018"],
            ["October","31/10/2018","12/10/2018"],
            ["November","30/11/2018","12/11/2018"]
        ];

        $this->assertSame($expectedArray, $list);

        return $list;
    }

    /**
     * @test
     */
    function calculateListInvalidInput1_ThrowsException()
    {
        $this->expectException(\Exception::class);
        Schedule::calculateList(new \DateTime('99-99-99'), 5);
    }
}