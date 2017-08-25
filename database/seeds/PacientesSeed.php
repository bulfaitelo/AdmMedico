<?php

use App\Pacientes;
use Illuminate\Database\Seeder;

class PacientesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pacientes::insert(['nome_paciente' => 'test_1', 'data_nascimento' => '1999-07-08', 'cod_paciente'=> '10', 'sexo'=>'1', 'estado_civil' => 'Solteiro', 'cpf'=> '116.135.168-81']);
        Pacientes::insert(['nome_paciente' => 'test_2', 'data_nascimento' => '1978-07-08', 'cod_paciente'=> '11', 'sexo'=>'2', 'estado_civil' => 'Casado', 'cpf'=> '136.135.118-89']);
        Pacientes::insert(['nome_paciente' => 'test_3', 'data_nascimento' => '1968-07-08', 'cod_paciente'=> '12', 'sexo'=>'1', 'estado_civil' => 'hue', 'cpf'=> '121.125.368-80']);
    }
}
