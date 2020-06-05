<?php


namespace App\Components;

use DateTimeZone;

abstract class DateTime extends \DateTime
{
    function __construct(string $time = "now")
    {
        parent::__construct($time, new DateTimeZone("UTC"));
    }

    protected function getMonthName(): string
    {
        return $this->format('F');
    }

    protected function isWeekend(): bool
    {
        return $this->getDayNumber() >= 6;
    }

    protected function getDayNumber(): int
    {
        return $this->format('N');
    }
}