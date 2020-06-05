<?php


namespace App\Payroll\Schedule;

use App\Components\DateTime;

class BaseDate extends DateTime implements ScheduleDateInterface
{
    public function __construct(string $time = "now")
    {
        parent::__construct($time);

        $this->setLastWorkingDay();
    }

    public static function getLabel()
    {
        return 'Base Date';
    }

    private function setLastWorkingDay()
    {
        $this->modify('last day of this month');

        if ($this->isWeekend()) {
            $this->modify('last friday');
        }
    }

    public function __toString()
    {
        return $this->format('d/m/Y');
    }
}