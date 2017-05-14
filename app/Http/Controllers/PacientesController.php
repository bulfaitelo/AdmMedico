<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pacientes;
use Session;

class PacientesController extends Controller
{
    public function index(){
    	$pacientes = Pacientes::all();
    	return view('index', array('pacientes' => $pacientes, 'busca' => null));
    }

    public function show($id){
    	$paciente = Pacientes::find($id);
    	return view('show', array('paciente' => $paciente));
    }

    public function store(Request $request){
    	
    }
    public function edit($id){
    	
    }



}
