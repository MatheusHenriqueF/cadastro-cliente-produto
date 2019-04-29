@extends('layouts.app')

@section('content')

<div id="container" style="text-align: center;">
	<h2>Cadastrar nova Pessoa</h2>
<div>
	<p style="color: red;">
		@php
		if(isset($errors) && count($errors) > 0){
				foreach($errors->all() as $linha){
				echo $linha."<br>";
			}
		}
		@endphp
	</p>
</div>
@if (Session::has('msg'))
    <div class="alert alert-success">
        <ul>
            <li>{!! Session::get('msg') !!}</li>
        </ul>
    </div>
@endif
@if (Session::has('msgError'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! Session::get('msgError') !!}</li>
        </ul>
    </div>
@endif
	<form method="get" action="{{url('cadastrarClienteApply')}}" maxlength="32">
		<input type="text" name="nome" placeholder="Digite o nome aqui..." value="{{old('nome')}}">
		<input type="number" name="cpf" placeholder="Exemplo: 05441993162" value="{{old('cpf')}}">
		<input type="date" name="data_nascimento" placeholder="Exemplo: 1997-12-25" value="{{old('data_nascimento')}}">
		<input type="submit" value="Enviar" class="btn btn-primary">
	</form>
</div>

@endsection

