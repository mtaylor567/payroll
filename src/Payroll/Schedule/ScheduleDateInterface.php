<?php


namespace App\Payroll\Schedule;;


interface ScheduleDateInterface
{
    public static function getLabel();

    public function __toString();
}