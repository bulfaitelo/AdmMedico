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
            $table->increments('id');
            $table->string('cod_paciente');
            $table->string('paciente');
            $table->date('data_nascimento');
            $table->string('natural');
            $table->string('rg');
            $table->string('cpf', 20)->unique();
            $table->string('sexo');
            $table->string('estado_civil');
            $table->string('profissao');
            $table->string('endreco');
            $table->string('estado', 2);
            $table->string('cidade');
            $table->string('bairro');
            $table->string('cep');
            $table->string('tel_residencial');
            $table->string('tel_celular');
            $table->string('tel_comercial');
            $table->string('email');
            $table->string('web_page');
            $table->string('indicado_id');
            $table->string('convenio');
            $table->string('re_consultas');
            $table->text('observações');
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
