<?php

namespace App\Models;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;

class Employee
{
    const FIRST_NAME_KEY    = 0;
    const DATE_OF_BIRTH_KEY = 1;

    const DATE_OF_BIRTH_FORMAT = 'Y-m-d';

    /**
     * Tracks an employee's first name.
     *
     * @var string
     */
    private string $employeeFirstName;

    /**
     * Tracks an employee's date of birth.
     *
     * @var string|null
     */
    private ?string $employeeDateOfBirth;

    /**
     * Create a new employee instance.
     *
     * @param  array $employeeDetails
     * @return void
     */
    public function __construct(array $employeeDetails)
    {
        $this->employeeFirstName   = $employeeDetails[static::FIRST_NAME_KEY] ?? 'Nameless';
        $this->employeeDateOfBirth = $employeeDetails[static::DATE_OF_BIRTH_KEY] ?? null;
    }

    /**
     * Return the first name of an employee.
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->employeeFirstName;
    }

    /**
     * Return the date of birth of an employee.
     *
     * @param  boolean $validate
     * @return CarbonImmutable|null
     */
    public function getDateOfBirth(bool $validate = true): ?CarbonImmutable
    {
        $employeeDateOfBirth = $this->employeeDateOfBirth;

        if ($validate) {
            $date = \DateTime::createFromFormat(static::DATE_OF_BIRTH_FORMAT, $employeeDateOfBirth);

            if (!$date || $date->format(static::DATE_OF_BIRTH_FORMAT) !== $employeeDateOfBirth) {
                return null;
            }
        }

        return Date::parse($employeeDateOfBirth);
    }
}
