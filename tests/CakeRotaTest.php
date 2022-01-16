<?php

use App\Models\{ CakeRota, Employee };

class CakeRotaTest extends TestCase
{
    private bool $omitElapsed = false;
    private bool $validateDateOfBirth = false;

    public function test_cake_rota_in_2020_with_1_day_off()
    {
        $cakeRota = new CakeRota($this->omitElapsed, $this->validateDateOfBirth);

        $this->assertSame(
            [
                [
                    CakeRota::DATE_KEY        => '2020-01-03',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Nigel',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-03-03',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Leon',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-06-23',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Mary',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-06-29',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Dave',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-07-07',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Rob',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-07-15',
                    CakeRota::SMALL_CAKES_KEY => 0,
                    CakeRota::LARGE_CAKES_KEY => 1,
                    CakeRota::BIRTHDAY_OF_KEY => 'Sam, Kate',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-07-22',
                    CakeRota::SMALL_CAKES_KEY => 0,
                    CakeRota::LARGE_CAKES_KEY => 1,
                    CakeRota::BIRTHDAY_OF_KEY => 'Alex, Jen',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-07-24',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Pete',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-10-15',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Steve',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-12-28',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Hal',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-12-30',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Bob',
                ],
            ],
            $cakeRota->generate(
                [
                    [
                        Employee::FIRST_NAME_KEY    => 'Rob',
                        Employee::DATE_OF_BIRTH_KEY => '1950-07-05',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Dave',
                        Employee::DATE_OF_BIRTH_KEY => '1986-06-26',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Bob',
                        Employee::DATE_OF_BIRTH_KEY => '1985-12-26',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Nigel',
                        Employee::DATE_OF_BIRTH_KEY => '1985-01-01',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Leon',
                        Employee::DATE_OF_BIRTH_KEY => '1985-02-29',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Hal',
                        Employee::DATE_OF_BIRTH_KEY => '1985-12-24',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Sam',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-13',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Kate',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-14',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Alex',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-20',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Jen',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-21',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Pete',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-22',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Steve',
                        Employee::DATE_OF_BIRTH_KEY => '1992-10-14',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Mary',
                        Employee::DATE_OF_BIRTH_KEY => '1989-06-21',
                    ],
                ],
                2020
            )->all()
        );
    }

    public function test_cake_rota_in_2020_with_2_days_off()
    {
        $cakeRota = new CakeRota($this->omitElapsed, $this->validateDateOfBirth);

        $this->assertSame(
            [
                [
                    CakeRota::DATE_KEY        => '2020-01-06',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Nigel',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-03-04',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Leon',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-06-24',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Mary',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-06-30',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Dave',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-07-08',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Rob',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-07-16',
                    CakeRota::SMALL_CAKES_KEY => 0,
                    CakeRota::LARGE_CAKES_KEY => 1,
                    CakeRota::BIRTHDAY_OF_KEY => 'Sam, Kate',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-07-23',
                    CakeRota::SMALL_CAKES_KEY => 0,
                    CakeRota::LARGE_CAKES_KEY => 1,
                    CakeRota::BIRTHDAY_OF_KEY => 'Alex, Jen',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-07-27',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Pete',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-10-16',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Steve',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-12-29',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Hal',
                ],
                [
                    CakeRota::DATE_KEY        => '2020-12-31',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Bob',
                ],
            ],
            $cakeRota->generate(
                [
                    [
                        Employee::FIRST_NAME_KEY    => 'Dave',
                        Employee::DATE_OF_BIRTH_KEY => '1986-06-26',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Rob',
                        Employee::DATE_OF_BIRTH_KEY => '1950-07-05',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Nigel',
                        Employee::DATE_OF_BIRTH_KEY => '1985-01-01',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Bob',
                        Employee::DATE_OF_BIRTH_KEY => '1985-12-26',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Leon',
                        Employee::DATE_OF_BIRTH_KEY => '1985-02-29',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Hal',
                        Employee::DATE_OF_BIRTH_KEY => '1985-12-24',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Sam',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-13',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Kate',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-14',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Alex',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-20',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Jen',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-21',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Pete',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-22',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Steve',
                        Employee::DATE_OF_BIRTH_KEY => '1992-10-14',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Mary',
                        Employee::DATE_OF_BIRTH_KEY => '1989-06-21',
                    ],
                ],
                2020,
                2
            )->all()
        );
    }

    public function test_cake_rota_in_2021_with_1_day_off()
    {
        $cakeRota = new CakeRota($this->omitElapsed, $this->validateDateOfBirth);

        $this->assertSame(
            [
                [
                    CakeRota::DATE_KEY        => '2021-01-05',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Nigel',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-03-02',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Leon',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-06-22',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Mary',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-06-29',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Dave',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-07-06',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Rob',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-07-15',
                    CakeRota::SMALL_CAKES_KEY => 0,
                    CakeRota::LARGE_CAKES_KEY => 1,
                    CakeRota::BIRTHDAY_OF_KEY => 'Sam, Kate',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-07-22',
                    CakeRota::SMALL_CAKES_KEY => 0,
                    CakeRota::LARGE_CAKES_KEY => 1,
                    CakeRota::BIRTHDAY_OF_KEY => 'Alex, Jen',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-07-26',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Pete',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-10-15',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Steve',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-12-27',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Hal',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-12-29',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Bob',
                ],
            ],
            $cakeRota->generate(
                [
                    [
                        Employee::FIRST_NAME_KEY    => 'Leon',
                        Employee::DATE_OF_BIRTH_KEY => '1985-02-29',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Rob',
                        Employee::DATE_OF_BIRTH_KEY => '1950-07-05',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Dave',
                        Employee::DATE_OF_BIRTH_KEY => '1986-06-26',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Bob',
                        Employee::DATE_OF_BIRTH_KEY => '1985-12-26',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Nigel',
                        Employee::DATE_OF_BIRTH_KEY => '1985-01-01',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Hal',
                        Employee::DATE_OF_BIRTH_KEY => '1985-12-24',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Sam',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-13',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Kate',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-14',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Alex',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-20',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Jen',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-21',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Pete',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-22',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Steve',
                        Employee::DATE_OF_BIRTH_KEY => '1992-10-14',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Mary',
                        Employee::DATE_OF_BIRTH_KEY => '1989-06-21',
                    ],
                ],
                2021
            )->all()
        );
    }

    public function test_cake_rota_in_2021_with_2_days_off()
    {
        $cakeRota = new CakeRota($this->omitElapsed, $this->validateDateOfBirth);

        $this->assertSame(
            [
                [
                    CakeRota::DATE_KEY        => '2021-01-06',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Nigel',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-03-03',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Leon',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-06-23',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Mary',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-06-30',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Dave',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-07-07',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Rob',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-07-16',
                    CakeRota::SMALL_CAKES_KEY => 0,
                    CakeRota::LARGE_CAKES_KEY => 1,
                    CakeRota::BIRTHDAY_OF_KEY => 'Sam, Kate',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-07-23',
                    CakeRota::SMALL_CAKES_KEY => 0,
                    CakeRota::LARGE_CAKES_KEY => 1,
                    CakeRota::BIRTHDAY_OF_KEY => 'Alex, Jen',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-07-26',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Pete',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-10-18',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Steve',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-12-28',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Hal',
                ],
                [
                    CakeRota::DATE_KEY        => '2021-12-30',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Bob',
                ],
            ],
            $cakeRota->generate(
                [
                    [
                        Employee::FIRST_NAME_KEY    => 'Leon',
                        Employee::DATE_OF_BIRTH_KEY => '1985-02-29',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Rob',
                        Employee::DATE_OF_BIRTH_KEY => '1950-07-05',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Dave',
                        Employee::DATE_OF_BIRTH_KEY => '1986-06-26',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Bob',
                        Employee::DATE_OF_BIRTH_KEY => '1985-12-26',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Nigel',
                        Employee::DATE_OF_BIRTH_KEY => '1985-01-01',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Hal',
                        Employee::DATE_OF_BIRTH_KEY => '1985-12-24',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Sam',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-13',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Kate',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-14',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Alex',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-20',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Jen',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-21',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Pete',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-22',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Steve',
                        Employee::DATE_OF_BIRTH_KEY => '1992-10-14',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Mary',
                        Employee::DATE_OF_BIRTH_KEY => '1989-06-21',
                    ],
                ],
                2021,
                2
            )->all()
        );
    }

    public function test_cake_rota_in_2023_with_1_day_off()
    {
        $cakeRota = new CakeRota($this->omitElapsed, $this->validateDateOfBirth);

        $this->assertSame(
            [
                [
                    CakeRota::DATE_KEY        => '2023-01-03',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Nigel',
                ],
                [
                    CakeRota::DATE_KEY        => '2023-03-02',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Leon',
                ],
                [
                    CakeRota::DATE_KEY        => '2023-06-22',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Mary',
                ],
                [
                    CakeRota::DATE_KEY        => '2023-06-27',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Dave',
                ],
                [
                    CakeRota::DATE_KEY        => '2023-07-06',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Rob',
                ],
                [
                    CakeRota::DATE_KEY        => '2023-07-17',
                    CakeRota::SMALL_CAKES_KEY => 0,
                    CakeRota::LARGE_CAKES_KEY => 1,
                    CakeRota::BIRTHDAY_OF_KEY => 'Sam, Kate',
                ],
                [
                    CakeRota::DATE_KEY        => '2023-07-24',
                    CakeRota::SMALL_CAKES_KEY => 0,
                    CakeRota::LARGE_CAKES_KEY => 1,
                    CakeRota::BIRTHDAY_OF_KEY => 'Alex, Jen',
                ],
                [
                    CakeRota::DATE_KEY        => '2023-07-26',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Pete',
                ],
                [
                    CakeRota::DATE_KEY        => '2023-10-17',
                    CakeRota::SMALL_CAKES_KEY => 1,
                    CakeRota::LARGE_CAKES_KEY => 0,
                    CakeRota::BIRTHDAY_OF_KEY => 'Steve',
                ],
                [
                    CakeRota::DATE_KEY        => '2023-12-28',
                    CakeRota::SMALL_CAKES_KEY => 0,
                    CakeRota::LARGE_CAKES_KEY => 1,
                    CakeRota::BIRTHDAY_OF_KEY => 'Hal, Bob',
                ],
            ],
            $cakeRota->generate(
                [
                    [
                        Employee::FIRST_NAME_KEY    => 'Hal',
                        Employee::DATE_OF_BIRTH_KEY => '1985-12-23',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Leon',
                        Employee::DATE_OF_BIRTH_KEY => '1985-02-29',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Rob',
                        Employee::DATE_OF_BIRTH_KEY => '1950-07-05',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Dave',
                        Employee::DATE_OF_BIRTH_KEY => '1986-06-26',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Bob',
                        Employee::DATE_OF_BIRTH_KEY => '1985-12-26',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Nigel',
                        Employee::DATE_OF_BIRTH_KEY => '1985-01-01',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Sam',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-13',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Kate',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-14',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Alex',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-20',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Jen',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-21',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Pete',
                        Employee::DATE_OF_BIRTH_KEY => '1970-07-22',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Steve',
                        Employee::DATE_OF_BIRTH_KEY => '1992-10-14',
                    ],
                    [
                        Employee::FIRST_NAME_KEY    => 'Mary',
                        Employee::DATE_OF_BIRTH_KEY => '1989-06-21',
                    ],
                ],
                2023
            )->all()
        );
    }
}
