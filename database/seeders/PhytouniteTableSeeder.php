<?php

namespace Database\Seeders;

use DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class PhytouniteTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = "/database/seeders/csvs/phytounites.csv";
        $this->timestamps = false;
        $this->truncate = false;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Recommended when importing larger CSVs
         DB::disableQueryLog();
         parent::run();
     }
}
