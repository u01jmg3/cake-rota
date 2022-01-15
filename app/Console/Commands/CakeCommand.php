<?php

namespace App\Console\Commands;

use App\Models\CakeRota;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\{ Collection, Str };
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\{ IOFactory, Spreadsheet };

class CakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cake:rota
                            {--input-file= : (Optional) absolute filepath of the text file containing employee birthdays}
                            {--output-path= : (Optional) absolute path of the location where the cake rota should be saved to}
                            {--no-ascii : (Optional) argument to disable the ASCII art}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Given a list of birthdays, discover when everyone will be enjoying a birthday cake';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $inputFile     = $this->option('input-file') ?? resource_path('birthdays.txt');
        $outputPath    = $this->option('output-path') ?? resource_path();
        $showAsciiCake = $this->option('no-ascii') === false;

        $doesInputFileExist  = file_exists($inputFile);
        $doesOutputPathExist = is_dir($outputPath);

        if ($doesInputFileExist && $doesOutputPathExist) {
            $currentYear  = date('Y');
            $nextYear     = $currentYear + 1;
            $twoYearsTime = $currentYear + 2;

            $year = $this->choice('Which year would you like to generate a cake rota for?', [1 => $currentYear, 2 => $nextYear, 3 => $twoYearsTime], 1);

            $daysUntilCake = $this->choice('How many days off should an employee get to celebrate their birthday?', [1 => 1, 2 => 2, 3 => 3], 1);

            $fileContents = IOFactory::load($inputFile);
            $fileArray    = $fileContents->getActiveSheet()->toArray();

            $cakeRota = (new CakeRota)->generate($fileArray, $year, $daysUntilCake);

            if ($showAsciiCake) {
                $this->line(File::get(resource_path('ascii-cake.txt')));
            }

            $headers = [
                'Date',
                'Number of Small Cakes',
                'Number of Large Cakes',
                'Names of People Getting Cake',
            ];

            $this->table($headers, $cakeRota);

            $outputFile          = Str::finish($outputPath, DIRECTORY_SEPARATOR) . "cake-rota-{$year}.csv";
            $doesOutputFileExist = file_exists($outputFile);
            $overwriteOutputFile = null;

            if ($doesOutputFileExist) {
                $overwriteOutputFile = $this->choice("A cake rota already exists at \"{$outputFile}\". Do you want to overwrite it?", [1 => 'y', 2 => 'n'], 1);
            } else {
                $this->newLine();
            }

            if (!$doesOutputFileExist || $overwriteOutputFile === 'y') {
                $cakeRotaWithHeaders = $cakeRota->prepend($headers);

                $this->generateCsvFile($cakeRotaWithHeaders, $outputFile);

                if (file_exists($outputFile)) {
                    if ($this->option('input-file') === null) {
                        $this->line("The list of birthdays was loaded from \"{$inputFile}\".");
                        $this->newLine();
                    }

                    $this->info("The cake rota has been generated at \"{$outputFile}\".");
                } else {
                    $this->error("There was a problem saving the cake rota at \"{$outputFile}\". Please try a different --output-path=");
                }
            }
        } else {
            if (!$doesInputFileExist) {
                $this->error('The specified input filepath does not exist. Please correct --input-file= and then try again.');
            }

            if (!$doesOutputPathExist) {
                $this->error('The specified output path does not exist. Please correct --output-path= and then try again.');
            }
        }
    }

    /**
     * Save a cake rota as a CSV file.
     *
     * @param  Collection $cakeRota
     * @param  string     $outputFile
     * @return void
     */
    private function generateCsvFile(Collection $cakeRota, string $outputFile)
    {
        $spreadsheet = new Spreadsheet();
        $worksheet   = $spreadsheet->getActiveSheet();

        $worksheet->fromArray($cakeRota->toArray(), null, 'A1', true);

        $writer = new Csv($spreadsheet);

        $writer->save($outputFile);
    }
}
