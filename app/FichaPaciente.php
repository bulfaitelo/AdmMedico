<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaPaciente extends Model
{
	public function ficha(){
		return $this->hasMany(Paciente::class);
	}
}
