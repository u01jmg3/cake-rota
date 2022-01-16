# Overview

This is a small PHP command-line utility to keep track of when cake should be bought for an employee's birthday.

# Requirements

- [Composer Package Manager](https://getcomposer.org/)
- PHP: `^8.0.2`
- The following PHP extensions are required that may not be enabled by default.
  - `ext-fileinfo`
  - `ext-gd`
  - `ext-openssl`

# Setup

```sh
$ composer install
```

# Generating a Cake Rota 🎂

Example birthdays are stored in [`resources/birthdays.txt`](/resources/birthdays.txt). This file is used as input, and upon executing the command, the output is stored in the [`resources/`](/resources) directory. The source and destination can be changed via the `--input-file` and `--output-path` arguments respectively. An example is outlined below.

When running the `php artisan cake:rota` command, you will be prompted to specify the following information:

- The year to generate the cake rota for.
- The number of days off employees are being granted to celebrate their birthday.

```sh
# No arguments are required to generate a cake rota by default
$ php artisan cake:rota

# Specify --input-file to use your own input file
$ php artisan cake:rota --input-file="path\to\input\file.txt"

# Specify --output-path to use your own output path
$ php artisan cake:rota --output-path="path\to\output"

# Specify --no-ascii to disable ASCII art
$ php artisan cake:rota --no-ascii
```

Please note if a cake rota has been generated for a given year, you will be asked to confirm if you want to overwrite the file if you attempt to recreate the rota for the same year.

<img alt="Demo" src="https://user-images.githubusercontent.com/1266205/149681573-a1085c01-adc6-4761-add9-65320a673e27.gif">

# Running the Test Suite

## Using [Pest](https://github.com/pestphp/pest)

```sh
$ composer pest
```

<img alt="Pest" src="https://user-images.githubusercontent.com/1266205/149680990-0618028b-8053-45b6-b433-f4321f118047.png" width="60%">

# Assumptions

The following assumptions were made when designing the console command:

- Employees with a birthday of the 29<sup>th</sup> of February are assigned a birthday of the 1<sup>st</sup> of March on non-leap-years.
- If an invalid birthday is provided in the input file, the script will silently skip that employee and they will receive no cake.

# Improvements

- Implement a way of identifying employees with the same first name - using an employee's ID or email address as a unique identifier is one way of solving this.
- Instead of silently skipping invalid dates, provide better error handling and suggest corrective action when the script is run, to ensure employees are not deprived of cake.
- Instead of returning a cake rota as a Laravel Collection, design and apply an appropriate data structure.
- Consider caching cake rotas to prevent repeatedly executing the same code. Make sure to invalidate any cache if the input changes.
  - Alternatively, make use of a database to store the results.
- Consider simplifying the format of the output. As the current rules allow only one small or large cake per day, the "Number of Small Cakes" and "Number of Large Cakes" columns can be consolidated into "Size of Cake".
- Consider upgrading from [Lumen](https://github.com/laravel/lumen-framework) to [Laravel](https://github.com/laravel/framework) to add the ability to write [console command tests](https://laravel.com/docs/8.x/console-tests) out of the box.
- Consider implementing [localisation](https://laravel.com/docs/8.x/localization) in the console text and output.

# Considerations

- If the company experiences rapid growth and ends up with enough employees to schedule a cake day for every possible day during the year, cake mania will ensue. In this instance, cake rotas should be set up for each department, or swapped out for hummus/crudité days.
