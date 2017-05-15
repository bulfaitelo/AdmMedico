<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pacientes;
use App\FichaPaciente;
use Session;

class PacientesController extends Controller
{
    public function index(Request $request){
        if($request->input('busca')){
            $pacientes = Pacientes::where(
            'nome_paciente', 'LIKE', 
            '%'.$request->input('busca').'%')->orwhere('cod_paciente', 'LIKE', '%'.$request->input('busca').'%')->paginate(40);
            return view('pacientes.index', array('pacientes'=>$pacientes, 'busca'=>$request->input('busca')));
        }else{
        	$pacientes = Pacientes::paginate(40);
        	return view('pacientes.index', array('pacientes' => $pacientes, 'busca' => null));            
        }
    }

    public function show($id){
    	$paciente = Pacientes::find($id);
        $ficha_paciente = FichaPaciente::find($id);
    	return view('pacientes.show', array('paciente' => $paciente, 'idade' => $this->idade($paciente->data_nascimento)));
    }

    public function store(Request $request){
    	
    }
    public function edit($id){
    	
    }

    /*Retornar a idade */
    public function idade($nascimento){    	
		$date = new \DateTime($nascimento); 
		$interval = $date->diff( new \DateTime(date('Y-m-d')) ); 
		return $interval->format( '%Y Anos' );     	
    }

}
