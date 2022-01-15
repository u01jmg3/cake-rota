<?php

namespace App\Models;

use Carbon\CarbonImmutable;
use Cmixin\BusinessDay;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;

class CakeRota
{
    const SMALL_CAKE = 'small';
    const LARGE_CAKE = 'large';

    const DATE_KEY        = 'cake_date';
    const SMALL_CAKES_KEY = 'small_cakes';
    const LARGE_CAKES_KEY = 'large_cakes';
    const BIRTHDAY_OF_KEY = 'employee_names';

    /**
     * Whether to exclude cake days that have already occurred.
     *
     * @var bool
     */
    private bool $omitElapsed;

    /**
     * Whether to validate an employee's date of birth.
     *
     * @var bool
     */
    private bool $validateDateOfBirth;

    /**
     * Track a birthday that has previously been parsed.
     *
     * @var string
     */
    private string $previouslyParsedBirthday;

    /**
     * Whether the check for coinciding birthdays should be skipped
     * once a match is found before moving on to find the next match.
     *
     * @var bool
     */
    private bool $skipCheck = false;

    /**
     * Create a new cake rota.
     *
     * @param  bool $omitElapsed
     * @param  bool $validateDateOfBirth
     * @return void
     */
    public function __construct(bool $omitElapsed = true, bool $validateDateOfBirth = true)
    {
        BusinessDay::enable('Carbon\CarbonImmutable', '', Company::getClosureDates());
        Date::use(CarbonImmutable::class);

        $this->omitElapsed         = $omitElapsed;
        $this->validateDateOfBirth = $validateDateOfBirth;
    }

    /**
     * Generate a cake rota based on company policy given a list of employee birthdays.
     *
     * @param  array $employeeDetails
     * param   int   $year
     * param   int   $daysUntilCake
     * @return Collection
     */
    public function generate(array $employeeDetails, int $year, int $daysUntilCake = 1): Collection
    {
        $cakeRota = collect();

        collect($employeeDetails)->mapInto(Employee::class)
            ->sortBy(function ($employee) use ($year) {
                return $employee->getDateOfBirth($this->validateDateOfBirth)?->setYear($year)->toDateString();
            })
            ->each(function ($employee) use ($cakeRota, $daysUntilCake, $year) {
                $birthday      = $employee->getDateOfBirth($this->validateDateOfBirth)?->setYear($year);
                $sizeOfCake    = static::SMALL_CAKE;
                $birthdayNames = collect($employee->getFirstName());

                if (!$birthday?->isBusinessDay()) {
                    $daysUntilCake++;
                }

                $cakeDay = $birthday?->addBusinessDays($daysUntilCake);

                if (isset($this->previouslyParsedBirthday)) {
                    if ($this->skipCheck) {
                        $this->skipCheck = false;
                    } elseif (!$this->skipCheck) {
                        $doBirthdaysCoincide = $birthday?->diffInDays($this->previouslyParsedBirthday) === 1;
                        $doCakeDaysCoincide  = $doBirthdaysCoincide ? false : $cakeRota->contains(static::DATE_KEY, $cakeDay?->toDateString());

                        if ($doBirthdaysCoincide || $doCakeDaysCoincide) {
                            $sizeOfCake      = static::LARGE_CAKE;
                            $this->skipCheck = true;

                            $birthdayNames->prepend(collect($cakeRota->last())->get(static::BIRTHDAY_OF_KEY));
                            $cakeRota->pop();
                        }
                    }
                }

                if ($cakeRota->contains(static::DATE_KEY, $cakeDay?->subDay(1)->toDateString())) {
                    // Must impose a cake-free day after a cake day
                    $cakeDay = $cakeDay?->addBusinessDays(1);
                }

                if ($cakeDay !== null && ($cakeDay->isFuture() || !$this->omitElapsed)) {
                    $cakeRota->push([
                        static::DATE_KEY        => $cakeDay?->toDateString(),
                        static::SMALL_CAKES_KEY => (int) ($sizeOfCake === static::SMALL_CAKE),
                        static::LARGE_CAKES_KEY => (int) ($sizeOfCake === static::LARGE_CAKE),
                        static::BIRTHDAY_OF_KEY => $birthdayNames->join(', '),
                    ]);

                    $this->previouslyParsedBirthday = $birthday;
                }
            });

        return $cakeRota;
    }
}
