<?php

use Illuminate\Database\Seeder;

class StatusVagasTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //ABERTA
        DB::table('status_vagas')->insert([
            'descricao' => 'ABERTA'
        ]);

        //CANCELADA
        DB::table('status_vagas')->insert([
            'descricao' => 'CANCELADA'
        ]);

        //REABERTA
        DB::table('status_vagas')->insert([
            'descricao' => 'REABERTA'
        ]);
    }

}
