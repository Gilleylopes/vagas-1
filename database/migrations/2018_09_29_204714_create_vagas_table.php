<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateVagasTable.
 */
class CreateVagasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('vagas', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_status_vagas');
            $table->string('titulo');
            $table->string('descricao');
            $table->string('funcao');
            $table->string('qualificacao');
            $table->string('cidade');
            $table->string('uf');

            $table->timestamps();

            $table->foreign('id_status_vagas')->references('id')->on('status_vagas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('vagas', function(Blueprint $table) {
            $table->dropForeign('vagas_id_status_vagas_foreign');
        });

        Schema::drop('vagas');
    }

}
