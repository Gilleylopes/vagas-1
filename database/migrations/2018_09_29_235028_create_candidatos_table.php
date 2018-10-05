<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCandidatosTable.
 */
class CreateCandidatosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('candidatos', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_vaga');
            $table->unsignedInteger('id_status_candidatos');
            $table->string('nome');
            $table->string('email');
            $table->string('telefone');
            $table->string('url_linkedin');
            $table->string('url_github');
            $table->integer('id_nivel_lingua_estrangeira')->unsined();
            $table->string('salario');
            $table->text('carta_apresentacao');
            $table->string('file_name');
            $table->timestamps();

            $table->foreign('id_vaga')->references('id')->on('vagas');
            $table->foreign('id_status_candidatos')->references('id')->on('status_candidatos');
            $table->foreign('id_nivel_lingua_estrangeira')->references('id')->on('nivel_lingua_estrangeiras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('candidatos', function(Blueprint $table) {
            $table->dropForeign('candidatos_id_status_candidatos_foreign');
            $table->dropForeign('candidatos_id_nivel_lingua_estrangeira_foreign');
        });

        Schema::drop('candidatos');
    }

}
