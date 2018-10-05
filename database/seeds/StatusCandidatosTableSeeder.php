<?php

use Illuminate\Database\Seeder;

class StatusCandidatosTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //INSCRITO
        DB::table('status_candidatos')->insert([
            'descricao' => 'INSCRITO'
        ]);

        //SELECIONADO
        DB::table('status_candidatos')->insert([
            'descricao' => 'SELECIONADO'
        ]);

        //NÃO SELECIONADO
        DB::table('status_candidatos')->insert([
            'descricao' => 'NÃO SELECIONADO'
        ]);
    }

}
