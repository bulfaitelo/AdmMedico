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
	<h1>{{ $paciente->nome_paciente}}</h1>
	<div class="row">
		<div class="col-md-8"><b># {{ $paciente->cod_paciente }}</b></div>				
		<div class="col-md-3"><b>Data de cadastro: {{ date('d/m/Y' ,strtotime($paciente->created_at))}}</b></div>				
	</div>
	<b></b>
	
	<hr>
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
	<hr>
	<button type="button" class="btn btn-right btn-success btn-lg"><b class="glyphicon glyphicon-plus" ></b> Nova Consulta </button>
	<h2>Ultimas Consultas</h2>
	<!-- Main component for a primary marketing message or call to action -->
	@foreach($paciente->ficha as $ficha)
		<div class="row">
			<h4>Data: {{ date('d/m/Y' ,strtotime($ficha->created_at)) }}</h4>			
		    <div class="col-md-12 info-consultas "><p>
		    {{$ficha->queixa}}
		    </p></div>		
		</div>
	@endforeach	
@endsection