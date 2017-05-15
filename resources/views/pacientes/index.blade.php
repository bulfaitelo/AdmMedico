@extends('layouts.app')
@section('title', 'Listagem de Pacientes')
@section('home', 'active')
@section('content')
	<h1>Listagem de todos os pacientes</h1>
	{{Form::open(array('method'=>'get'))}}
	<div class="row">
		<div class="col-lg-12">
			<div class="input-group">
				{{Form::text('busca', $busca,['class'=>'form-control', 'placeholder'=>'Buscar por Nome ou Código '])}}
				<span class="input-group-btn">
					{{Form::submit('Buscar', ['class'=>'btn btn-default'])}}
				</span>
			</div>
		</div>
	</div>
	{{Form::close()}}
	@if(Session::has('mensagem'))
		<div class="alert alert-success">{{Session::get('mensagem')}}</div>
	@endif
	<div class="row">
		<hr>
	</div>
	<div class="row">
		<table class="table table-striped">
		<thead> 
			<tr>
				<th>#</th>
				<th>Paciente</th>
				<th>Cidade</th>
				<th>Telefone</th>
				<th>Atendimentos</th>
				
			</tr>
		</thead>
		@foreach($pacientes as $paciente)
		<tbody>
			<tr>
				<th scope="row">{{ $paciente->id }}</th>
				<td><b>{{$paciente->nome_paciente}}</b></td>
				<td>{{$paciente->cidade}}</td>
				<td>{{$paciente->tel_residencial}} / {{$paciente->tel_celular}}</td>
				<td> {{ count($paciente->ficha) }}</td>
				<td><a href="{{ url('pacientes/'. $paciente->id) }}"><button type="button" class=" navbar-right btn btn-info">Ver Detalhes</button></a></td>	

			</tr>			
		</tbody>
		@endforeach  		
		</table>
	</div>	
{{$pacientes->appends(['busca' => $busca])->links() }}	
@endsection