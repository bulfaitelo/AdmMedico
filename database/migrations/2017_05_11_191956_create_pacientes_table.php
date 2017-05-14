<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->engine = 'MyISAM';            
            $table->increments('id');
            $table->string('cod_paciente')->nullable();
            $table->string('nome_paciente')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('natural')->nullable();
            $table->string('cpf', 20)->unique()->nullable();
            $table->tinyInteger('sexo')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('profissao')->nullable();
            $table->string('endreco')->nullable();
            $table->string('estado', 2)->nullable();
            $table->string('cidade')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep')->nullable();
            $table->string('tel_residencial')->nullable();
            $table->string('tel_celular')->nullable();
            $table->string('tel_comercial')->nullable();
            $table->string('email')->nullable();
            $table->string('web_page')->nullable();
            $table->string('indicado_nome')->nullable();
            $table->string('convenio')->nullable();
            $table->string('re_consultas')->nullable();
            $table->text('observações')->nullable();
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
        Schema::dropIfExists('pacientes');
    }
}
