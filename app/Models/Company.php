<?php

namespace App\Models;

class Company
{
    /**
     * Return a list of office closure dates.
     *
     * @return array
     */
    public static function getClosureDates(): array
    {
        return [
            'New Year\'s Day' => '01/01',
            'Christmas Day'   => '25/12',
            'Boxing Day'      => '26/12',
        ];
    }
}
