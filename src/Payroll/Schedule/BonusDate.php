<?php


namespace App\Payroll\Schedule;

use App\Components\DateTime;

class BonusDate extends DateTime implements ScheduleDateInterface
{
    public function __construct(string $time = "now")
    {
        parent::__construct($time);

        $this->setPayDay();
    }

    public function setPayDay()
    {
        $this->setDate($this->format('Y'), $this->format('m'), 12);

        if ($this->isWeekend()) {
            $this->modify('next tuesday');
        }
    }

    public static function getLabel()
    {
        return 'Bonus Date';
    }

    public function __toString()
    {
        return $this->format('d/m/Y');
    }
}