<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class AltypeSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = "/database/seeders/csvs/altypes.csv";
        $this->truncate= false;
        $this->timestamps = false;
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