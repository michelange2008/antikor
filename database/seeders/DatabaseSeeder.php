<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Phytoproduit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // EspecesTableSeeder::class,
            // FormationsTableSeeder::class,
            // EspecesFormationsTableSeeder::class,
            // PhytotypesTableSeeder::class,
            // PhytounitesTableSeeder::class,
            // PhytoproduitsTableSeeder::class,
            PhytoprepsTableSeeder::class,
            // PhytoprepPhytoproduitTableSeeder::class,
            // FormationPhytoprepTableSeeder::class,
        ]);
    }
}
