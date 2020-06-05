<?php


namespace App\Payroll\Schedule;

use App\Components\DateTime;


class Month extends DateTime implements ScheduleDateInterface
{
    public function __toString()
    {
        return $this->getMonthName();
    }

    public static function getLabel()
    {
        return 'Month';
    }
}