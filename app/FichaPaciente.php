<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaPaciente extends Model
{
    public function paciente(){
		return $this->belongsTo(Paciente::class, 'id');
	}
}
