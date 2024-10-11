<?php

namespace App\Services\Common;

class DateService
{

    public static function dateToMonth(string $month): string {
        return match($month) {
            '1' => 'Enero',
            '2' => 'Febrero',
            '3' => 'Marzo',
            '4' => 'Abril',
            '5' => 'Mayo',
            '6' => 'Junio',
            '7' => 'Julio',
            '8' => 'Agosto',
            '9' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre',
        };
    }

    public static function articleFormatDate(\Carbon\Carbon $date) {
        $month = self::dateToMonth($date->month);
        $year = $date->year;

        return $date->day . ' de ' . $month . ' ' . $date->year;
    }
}
