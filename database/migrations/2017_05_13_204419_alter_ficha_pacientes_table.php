<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFichaPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_pacientes', function (Blueprint $table) {
            $table->foreign('paciente_id')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_pacientes', function (Blueprint $table) {
            $table->dropForeign('ficha_pacientes_paciente_id_foreign');           
            $table->dropForeign('ficha_pacientes_paciente_id_foreign');           
        });
    }
}
