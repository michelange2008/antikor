<?php

namespace Database\Seeders;

use DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class PhytoprepsTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = "/database/seeders/csvs/phytopreps.csv";
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
