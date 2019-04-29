@extends('layouts.app')

@section('content')

<div id="container" style="text-align: center;">
	<h2>Editar Produto</h2>
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
	<form method="get" action="{{url('updateProduto')}}">
		<input type="text" name="nome" placeholder="Nome do Produto" value="{{$pegaProduto->nome}}" maxlength="50" required="required">

		<input type="text" name="preco" placeholder="Valor do Produto" value="{{$pegaProduto->preco}}" maxlength="32" required="required">

		<input type="hidden" name="id" value="{{$pegaProduto->id}}">
		
		<input type="submit" value="Enviar" class="btn btn-primary">
	</form>
</div>

@endsection

