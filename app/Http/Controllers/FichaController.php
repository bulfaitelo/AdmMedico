<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pacientes;
use App\FichaPaciente;
use Session;


class FichaController extends Controller
{

    public function index(){
    	return redirect('/pacientes');
    }
	


	public function show($id){
        $paciente = Pacientes::find($id);
        return view('pacientes.ficha', array('paciente'=> $paciente));
    }

    public function store(Request $request){
    	
    	$this->validate($request, [
    		'consultas' => 'required', 
    	]);
    	
    	$ficha = new FichaPaciente();
    	$ficha->queixa = $request->input('consultas');
    	$ficha->paciente_id = $request->input('paciente_id');    	
    	if($ficha->save()){ 
            $request->session()->put('mensagem', 'Consulta Salva com Sucesso!');        
            return redirect('pacientes/' . $request->input('paciente_id'));
        }
    }

    function destroy($id){    	
    	$ficha = FichaPaciente::find($id);
    	$paciente_id = $ficha->paciente_id;
        $ficha->delete();
        Session::put('mensagem', 'Consulta Excluida com sucesso.');
        return redirect('/pacientes/'. $paciente_id);
    }
  
    
}
