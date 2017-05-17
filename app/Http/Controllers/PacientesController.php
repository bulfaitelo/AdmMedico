<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pacientes;
use App\FichaPaciente;
use Session;

class PacientesController extends Controller
{

    /*
    home page listagem de pacientes
    */
    public function index(Request $request){
        if($request->input('busca')){
            $pacientes = Pacientes::where(
            'nome_paciente', 'LIKE', 
            '%'.$request->input('busca').'%')->orwhere('cod_paciente', 'LIKE', '%'.$request->input('busca').'%')->orderBy('nome_paciente', 'asc')->paginate(40);
            return view('pacientes.index', array('pacientes'=>$pacientes, 'busca'=>$request->input('busca')));
        }else{
            // $pacientes = Pacientes::paginate(40);
        	$pacientes = Pacientes::orderBy('nome_paciente', 'asc')->paginate(40);
        	return view('pacientes.index', array('pacientes' => $pacientes, 'busca' => null));            
        }
    }
    /*
    destalhes do paciente
    */
    public function show($id){

        if($id == 'ficha'){
            return redirect('/pacientes');
        }
    	$paciente = Pacientes::find($id);       
    	return view('pacientes.show', array('paciente' => $paciente, 'idade' => $this->idade($paciente->data_nascimento)));
    }

    /*
    Adicionando um novo paciente
    */
    public function create(){
        $paciente = Pacientes::all()->max('cod_paciente');
        return view('pacientes.create', array('cod_paciente' => $paciente));
    }

    /*
        Salvando um novo paciente 
    */
    public function store(Request $request){
        $this->validate( $request, [
            'nome_paciente' => 'required',
            'cod_paciente' => 'int|unique:pacientes',
            'data_nascimento' => 'date',  
        ]);
        $paciente = new Pacientes();

        $paciente->nome_paciente = $request->input('nome_paciente');
        $date = \DateTime::createFromFormat('d/m/Y', $request->input('data_nascimento'));
        $paciente->data_nascimento = $date->format('Y-m-d');
        $paciente->sexo = $request->input('sexo');
        $paciente->cpf = $request->input('cpf');
        $paciente->profissao = $request->input('profissao');
        $paciente->endereco = $request->input('endereco');
        $paciente->estado = $request->input('estado');
        $paciente->cidade = $request->input('cidade');
        $paciente->bairro = $request->input('bairro');
        $paciente->tel_residencial = $request->input('tel_residencial');
        $paciente->tel_comercial = $request->input('tel_comercial');
        $paciente->tel_celular = $request->input('tel_celular');
        $paciente->email = $request->input('email');
        $paciente->cep = $request->input('cep');
        $paciente->observacoes = $request->input('observacoes');
        $paciente->estado_civil = $request->input('estado_civil');
        $paciente->naturalidade = $request->input('naturalidade');
        $paciente->created_at = $request->input('created_at');
        $paciente->cod_paciente = $request->input('cod_paciente');
        if($paciente->save()){
            // Session::flash('mensagem', "Paciente Cadastrado com Sucesso!");
            $request->session()->put('mensagem', 'Paciente Cadastrado com Sucesso!');
            return redirect('/');
            // return redirect()->back();
        }

    }

    /*
        tela de edição do firmulario.
    */
    public function edit($id){
    	$paciente = Pacientes::find($id);
        return view('pacientes.edit', array('paciente'=> $paciente));
    }

    public function update($id, Request $request){
        $this->validate( $request, [
            'nome_paciente' => 'required',
            'data_nascimento' => 'date',    
        ]);

        $paciente = Pacientes::find($id);

        $paciente->nome_paciente = $request->input('nome_paciente');
        $date = \DateTime::createFromFormat('d/m/Y', $request->input('data_nascimento'));
        $paciente->data_nascimento = $date->format('Y-m-d');
        $paciente->sexo = $request->input('sexo');
        $paciente->cpf = $request->input('cpf');
        $paciente->profissao = $request->input('profissao');
        $paciente->endereco = $request->input('endereco');
        $paciente->estado = $request->input('estado');
        $paciente->cidade = $request->input('cidade');
        $paciente->bairro = $request->input('bairro');
        $paciente->tel_residencial = $request->input('tel_residencial');
        $paciente->tel_comercial = $request->input('tel_comercial');
        $paciente->tel_celular = $request->input('tel_celular');
        $paciente->email = $request->input('email');
        $paciente->cep = $request->input('cep');
        $paciente->observacoes = $request->input('observacoes');
        $paciente->estado_civil = $request->input('estado_civil');
        $paciente->naturalidade = $request->input('naturalidade');
        $paciente->created_at = $request->input('created_at');
        $paciente->cod_paciente = $request->input('cod_paciente');
        if($paciente->save()){
            Session::flash('mensagem', "Paciente Atualizado com Sucesso!");            
            return redirect()->back();
        }

    }

       public function destroy($id){
        $paciente = Pacientes::find($id);
        $ficha = FichaPaciente::where('paciente_id', $id);
        $ficha->delete();        
        $paciente->delete();

        Session::put('mensagem', 'Pacietne Excluido com sucesso.');
        return redirect('/');
    }


    /*Retornar a idade */
    public function idade($nascimento){    	
		$date = new \DateTime($nascimento); 
		$interval = $date->diff( new \DateTime(date('Y-m-d')) ); 
		return $interval->format( '%Y Anos' );     	
    }

}
