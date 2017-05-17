@extends('layouts.app')
@section('title', 'Dados do Paciente')
@section('header')
	<style>
		.info-consultas {
			border-color: silver;
			border-style: solid;
			border-radius: 5px;
			margin-bottom: 30px;
			padding: 10px;
		}
		.info-consultas p {
			font-size: 18px;
		}
		.btn-right {
			float: right;
		}
	</style>
@endsection
@section('content')	
	<a href="{{url('pacientes/'. $paciente->id.'/edit')}}">
		<button type="button" class="btn btn-right btn-info btn-lg"><b class="glyphicon glyphicon-edit" ></b> Editar Paciente </button>		
	</a>
		<button type="button" style="margin-right: 6px; " data-toggle='modal' data-target='.modal_exclude'  class="btn btn-right btn-danger btn-lg"><b class="glyphicon glyphicon-remove" ></b> Excluir Paciente </button>		
	<div class='modal fade modal_exclude' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
	  <div class='modal-dialog modal-sm'>
	    <div class='modal-content'>
	    	<div class='modal-header'>
	    		<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	    		<h4 class='modal-title'>Excluir</h4>
	    	</div>
	    	<div class='modal-body' >
	    		<p>Realmente Deseja excluir este Paciente ?</p>
	    	</div>
	    	<div class='modal-footer' >
				{{Form::open(['route'=>['pacientes.destroy', $paciente->id], 'method' => 'DELETE'])}}
					<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>
					<button type='submit' class='btn btn-danger'><span class='glyphicon glyphicon-trash' > </span> Excluir</button>				
				{{Form::close()}}				
	    	</div>										     
	    </div>
	  </div>
	</div>
	
	
	<h1>{{ $paciente->nome_paciente}}</h1>
	<div class="row">
		<div class="col-md-8"><b># {{ $paciente->cod_paciente }}</b></div>				
		<div class="col-md-3"><b>Data de cadastro: {{ date('d/m/Y' ,strtotime($paciente->created_at))}}</b></div>				
	</div>
	<b></b>
	
	<hr>
	@if(Session::has('mensagem'))
		<div class="alert alert-success">{{Session::get('mensagem')}}{{ Session::forget('mensagem') }}</div>
	@endif
	<div class="row">
		<div class="col-md-3"><h3>Nascido: <b>{{ date('d/m/Y' ,strtotime($paciente->data_nascimento)) }}</b></h3></div>
		<div class="col-md-3"><h3>Idade: <b>{{ $idade }}</b></h3></div>
		<div class="col-md-3"><h3>Natural: <b>{{ $paciente->natural }}</b></h3></div>		
		<div class="col-md-3"><h3>Profissão: <b>{{ $paciente->profissao }}</b></h3></div>
	</div>
	<div class="row">
		<div class="col-md-3">
			@if($paciente->sexo == 1)
				<h3>Sexo: Masculino</h3>
			@else
				<h3>Sexo: Feminino</h3>
			@endif
		</div>
		<div class="col-md-3"><h3>Estado Civil: <b>{{ $paciente->estado_civil }}</b></h3></div>
		<div class="col-md-3"><h3>CPF: <b>{{ $paciente->cpf }}</b></h3></div>		
	</div>
	<div class="row">
		<div class="col-md-7"><h3>Endereço: <b>{{ $paciente->endereco }}</b></h3></div>
		<div class="col-md-2"><h3>Estado: <b>{{ $paciente->estado }}</b></h3></div>
		<div class="col-md-3"><h3>CEP: <b>{{ $paciente->cep }}</b></h3></div>
	</div>
	<div class="row">
		<div class="col-md-6"><h3>Bairro: <b>{{ $paciente->bairro }}</b></h3></div>
		<div class="col-md-5"><h3>Cidade: <b>{{ $paciente->cidade }}</b></h3></div>		
	</div>
	<div class="row">
		<div class="col-md-4"><h3>Telefone: <b>{{ $paciente->tel_residencial }}</b></h3></div>		
		<div class="col-md-4"><h3>Celular: <b>{{ $paciente->tel_celular }}</b></h3></div>		
		<div class="col-md-4"><h3>Comercial: <b>{{ $paciente->tel_comercial }}</b></h3></div>		
	</div>
	<div class="row">
		<div class="col-md-6"><h3>E-mail: <b>{{ $paciente->email }}</b></h3></div>		
	</div>
	<div class="row">
		<div class="col-md-8">
			<h3>Observações</h3>
			<b>{!! nl2br(e($paciente->observacoes)) !!}</b>
		</div>
	</div>
	<hr>
	<a href="{{ url('/pacientes/ficha/'. $paciente->id) }}">
		<button type="button" class="btn btn-right btn-success btn-lg"><b class="glyphicon glyphicon-plus" ></b> Nova Consulta </button>		
	</a>
	<div class="row">
		<div class="col-md-8">
			<h2>Ultimas Consultas</h2>		
		</div>
	</div>
	<!-- Main component for a primary marketing message or call to action -->
	@foreach($paciente->ficha as $ficha)
		<div class="row">
			<div class="col-md-12">

				<button type="button" style="margin-right: 6px; " data-toggle='modal' data-target='.modal_exclude{{$ficha->id}}'  class="btn btn-right btn-danger"><b class="glyphicon glyphicon-remove" ></b> Excluir Consulta </button>		
					<div class='modal fade modal_exclude{{$ficha->id}}' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
					  <div class='modal-dialog modal-sm'>
					    <div class='modal-content'>
					    	<div class='modal-header'>
					    		<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					    		<h4 class='modal-title'>Excluir</h4>
					    	</div>
					    	<div class='modal-body' >
					    		<p>Realmente Deseja excluir essa Consulta ?</p>
					    	</div>
					    	<div class='modal-footer' >
								{{Form::open(['route'=>['ficha.destroy', $ficha->id], 'method' => 'DELETE'])}}
									<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>
									<button type='submit' class='btn btn-danger'><span class='glyphicon glyphicon-trash' > </span> Excluir</button>				
								{{Form::close()}}				
					    	</div>										     
					    </div>
					  </div>
					</div>
				<h4>Data: {{ date('d/m/Y' ,strtotime($ficha->created_at)) }}</h4>			
			    <div class="col-md-12 info-consultas "><p>		     	
				{!! nl2br(e($ficha->queixa)) !!}
			    </p></div>						
			</div>
		</div>
	@endforeach	
@endsection