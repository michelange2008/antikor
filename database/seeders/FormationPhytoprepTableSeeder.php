<?php

namespace Database\Seeders;

use DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class FormationPhytoprepTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = "/database/seeders/csvs/formation_phytoprep.csv";
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
