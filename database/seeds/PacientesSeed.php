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
        Pacientes::insert(['nome_paciente' => 'test_1', 'data_nascimento' => '1988-07-08', 'cod_paciente'=> '10', 'sexo'=>'masculino', 'estado_civil' => 'Solteiro', 'cpf'=> '126.135.168-83']);
        Pacientes::insert(['nome_paciente' => 'test_2', 'data_nascimento' => '1978-07-08', 'cod_paciente'=> '11', 'sexo'=>'Feminino', 'estado_civil' => 'Casado', 'cpf'=> '126.135.118-82']);
        Pacientes::insert(['nome_paciente' => 'test_3', 'data_nascimento' => '1968-07-08', 'cod_paciente'=> '12', 'sexo'=>'masculino', 'estado_civil' => 'hue', 'cpf'=> '121.125.368-83']);
    }
}
