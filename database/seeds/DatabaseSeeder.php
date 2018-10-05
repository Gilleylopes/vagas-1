<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(StatusVagasTableSeeder::class);
         $this->call(NivelLinguaEstrangeirasTableSeeder::class);
         $this->call(StatusCandidatosTableSeeder::class);
    }
}
