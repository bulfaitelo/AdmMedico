@extends('layouts.app')
@section('title', 'Dados do Paciente')
@section('create', 'active')
@section('content')
	<h1>Cadastrar novo paciente</h1>

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

{{Form::open(['action'=>'PacientesController@store'])}}
<div class="row">
	<div class="form-group col-md-2">
		{{Form::label('cod_paciente', 'Cod')}}
		{{Form::text('cod_paciente', $cod_paciente+1, ['class'=>'form-control', 'placeholder'=>'Código'])}}
	</div>		
	<div class="form-group col-md-10">		
		{{Form::label('nome_paciente', 'Nome do Paciente')}}
		{{Form::text('nome_paciente', '', ['class'=>'form-control', 'placeholder'=>'Nome'])}}
	</div>
</div>
<div class="row">
	<div class="form-group col-md-2">		
		{{Form::label('data_nascimento', 'Data Nascimento')}}
		{{Form::text('data_nascimento', '', ['class'=>'form-control', 'placeholder'=>'__/__/____'])}}
	</div>
	<div class="form-group col-md-3">
		{{Form::label('sexo', 'Sexo')}}
		{{Form::select('sexo', ['1'=> 'Masculino', '2'=> 'Feminino'], '', ['class'=> 'form-control'])}}		
	</div>
	<div class="form-group col-md-3">
		{{Form::label('naturalidade', 'Natural')}}
		{{Form::text('naturalidade', '', ['class'=>'form-control', 'placeholder'=>'Naturalidade'])}}		
	</div>
	<div class="form-group col-md-4">
		{{Form::label('profissao', 'Profissão')}}
		{{Form::text('profissao', '', ['class'=>'form-control', 'placeholder'=>'Profissão'])}}			
	</div>
</div>
<div class="row">
	<div class="form-group col-md-2">
		{{Form::label('cpf', 'CPF')}}
		{{Form::text('cpf', '', ['class'=>'form-control', 'placeholder'=>'CPF'])}}			
	</div>
	<div class="form-group col-md-3">
		{{Form::label('estado_civil', 'Estado Civil')}}
		{{Form::select('estado_civil', ['0'=> 'Selecione', '3'=> 'Solteiro', '4'=> 'Casado', '5'=> 'Separado', '6' => 'Outro'], '', ['class'=> 'form-control'])}}			
	</div>
	<div class="form-group col-md-7">
		{{Form::label('email', 'E-mail')}}
		{{Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Email'])}}	
	</div>
</div>
<div class="row">
	<div class="form-group col-md-7">
		{{Form::label('endereco', 'Endereço')}}
		{{Form::text('endereco', '', ['class'=>'form-control', 'placeholder'=>'Endereço'])}}		
	</div>
	<div class="form-group col-md-2">
		{{Form::label('estado', 'Estado')}}
		{{Form::text('estado', '', ['class'=>'form-control', 'placeholder'=>'Estado', 'maxlength'=>'2'])}}	
	</div>
	<div class="form-group col-md-2">
		{{Form::label('cep', 'CEP')}}
		{{Form::text('cep', '', ['class'=>'form-control', 'placeholder'=>'CEP'])}}
	</div>
</div>
<div class="row">
	<div class="form-group col-md-7">
		{{Form::label('bairro', 'Bairro')}}
		{{Form::text('bairro', '', ['class'=>'form-control', 'placeholder'=>'Bairro'])}}
	</div>
	<div class="form-group col-md-4">
		{{Form::label('cidade', 'Cidade')}}
		{{Form::text('cidade', '', ['class'=>'form-control', 'placeholder'=>'Cidade'])}}
	</div>
</div>
<div class="row">
	<div class="form-group col-md-3">
		{{Form::label('tel_residencial', 'Telefone Residencial')}}
		{{Form::text('tel_residencial', '', ['class'=>'form-control', 'placeholder'=>'Telefone Residencial'])}}
	</div>
	<div class="form-group col-md-3">
		{{Form::label('tel_celular', 'Telefone Celular')}}
		{{Form::text('tel_celular', '', ['class'=>'form-control', 'placeholder'=>'Telefone Celular'])}}		
	</div>
	<div class="form-group col-md-3">
		{{Form::label('tel_comercial', 'Telefone Comercial')}}
		{{Form::text('tel_comercial', '', ['class'=>'form-control', 'placeholder'=>'Telefone Comercial'])}}		
	</div>
</div>
<div class="row">
	<div class="form-group col-md-12">
		{{Form::label('observacoes', 'Observações')}}
		{{Form::textArea('observacoes', '', ['class'=>'form-control', 'placeholder'=>'Observações', 'rows'=>'3'])}}		
	</div>
	<div class="form-group col-md-12">	
		{{Form::submit('Salvar', ['class'=> 'btn btn-default'])}}
	</div>
</div>
{{Form::close()}}	
@endsection