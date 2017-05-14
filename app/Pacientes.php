<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
	public function ficha(){
		return $this->hasMany(FichaPaciente::class, 'paciente_id');
	}
}
