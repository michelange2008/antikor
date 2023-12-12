<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class DocumentFormationSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = "/database/seeders/csvs/document_formation.csv";
        $this->timestamps = false;
        $this->truncate= false;
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

