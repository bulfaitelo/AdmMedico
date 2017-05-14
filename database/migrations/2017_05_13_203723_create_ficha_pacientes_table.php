<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_pacientes', function (Blueprint $table) {

            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->smallInteger('paciente_id');
            $table->text('queixa')->nullable();           
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_pacientes');
    }
}
