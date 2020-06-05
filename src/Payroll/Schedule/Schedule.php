<?php


namespace App\Payroll\Schedule;


class Schedule
{
    /**
     * Calculate payroll schedule from start date to duration in months
     *
     * @param \DateTime $scheduleDate
     * @param int $durationMonths
     * @return array
     * @throws \Exception
     */
    public static function calculateList(\DateTime $scheduleDate, int $durationMonths): array
    {
        $scheduleList = [
            [
                Month::getLabel(),
                BaseDate::getLabel(),
                BonusDate::getLabel()
            ]
        ];

        for ($month = 0; $month < $durationMonths; $month++) {

            $date = $scheduleDate->format('Y-m-d');

            $scheduleList[] = [
                (string)new Month($date),
                (string)new BaseDate($date),
                (string)new BonusDate($date),
            ];

            $scheduleDate = $scheduleDate->modify('next month');
        }

        return $scheduleList;
    }
}