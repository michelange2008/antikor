<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class ObjectifpedagoSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = "/database/seeders/csvs/objectifpedagos.csv";
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
