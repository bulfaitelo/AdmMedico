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
	<a href="{{ url('/pacientes/' . $paciente->id) }}">
		<h1>{{ $paciente->nome_paciente}}</h1>
	</a>
	@if(Session::has('mensagem'))
		<div class="alert alert-success">{{Session::get('mensagem')}}</div>
	@endif

	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>

	@endif

{{Form::open(['action'=>'FichaController@store'])}}
{{Form::hidden('paciente_id', $paciente->id)}}
	<h3>{{ date('d/m/Y') }}</h3>
	<div class="row">
		<div class="form-group col-md-12">
			{{Form::label('consultas', 'Observações')}}
			{{Form::textArea('consultas', '', ['class'=>'form-control', 'placeholder'=>'Observações', 'rows'=>'10'])}}		
		</div>
	</div>
		{{Form::submit('Salvar', ['class'=> 'btn btn-default'])}}
{{Form::close()}}

@endsection