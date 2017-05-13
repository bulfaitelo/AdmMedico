<?php

use App\FichaPaciente;
use Illuminate\Database\Seeder;

class FichaPacienteSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FichaPaciente::insert(['paciente_id' => 1, 'queixa' => 'ta doendo muito!']);
        FichaPaciente::insert(['paciente_id' => 2, 'queixa' => 'ta doendo muito 123!']);
        FichaPaciente::insert(['paciente_id' => 3, 'queixa' => 'ta doendo mudasdito 123!']);
        FichaPaciente::insert(['paciente_id' => 2, 'queixa' => 'ta doedndo muadasdassdadadsadsadito 123!']);
        FichaPaciente::insert(['paciente_id' => 3, 'queixa' => 'ta doendo asdasdmasdasdasdito 123!']);
        FichaPaciente::insert(['paciente_id' => 3, 'queixa' => 'ta doendoasdadadas muito 123!']);
    }
}
