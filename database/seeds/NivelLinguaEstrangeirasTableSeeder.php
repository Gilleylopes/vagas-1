<?php

use Illuminate\Database\Seeder;

class NivelLinguaEstrangeirasTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //NENHUM
        DB::table('nivel_lingua_estrangeiras')->insert([
            'descricao' => 'NENHUM'
        ]);

        //BASICA
        DB::table('nivel_lingua_estrangeiras')->insert([
            'descricao' => 'BÁSICO'
        ]);

        //INTERMEDIARIA
        DB::table('nivel_lingua_estrangeiras')->insert([
            'descricao' => 'INTERMEDIARIO'
        ]);

        //AVANCADA
        DB::table('nivel_lingua_estrangeiras')->insert([
            'descricao' => 'AVANCADO'
        ]);

        //FLUENTE
        DB::table('nivel_lingua_estrangeiras')->insert([
            'descricao' => 'FLUENTE'
        ]);
    }

}
