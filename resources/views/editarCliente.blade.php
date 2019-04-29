@extends('layouts.app')

@section('content')

<div id="container" style="text-align: center;">
	<h2>Editar Cadastro</h2>
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
	<form method="get" action="{{url('updateCliente')}}">
		<input type="text" name="nome" placeholder="Nome da Categoria" value="{{$pegaPessoa->nome}}" maxlength="50" required="required">
		<input type="text" name="cpf" placeholder="Nome da Categoria" value="{{$pegaPessoa->cpf}}" maxlength="12" required="required">
		<input type="text" name="data_nascimento" placeholder="Nome da Categoria" value="{{$pegaPessoa->data_nascimento}}" maxlength="15" required="required">
		<input type="hidden" name="id" value="{{$pegaPessoa->id}}">
		<input type="submit" value="Enviar" class="btn btn-primary">
	</form>
</div>

@endsection

