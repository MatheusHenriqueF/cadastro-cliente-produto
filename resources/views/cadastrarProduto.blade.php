@extends('layouts.app')

@section('content')

<div id="container" style="text-align: center;">
	<h2>Cadastro de Produto</h2>
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
	<form method="get" action="{{url('cadastrarProdutoApply')}}">
		<input type="text" name="nome" placeholder="Nome do Produto" value="{{old('nome')}}">
		<input type="number" name="preco" placeholder="Preço do Produto">

		@php
			$codigo = rand(2,999999);
		@endphp

		<input type="hidden" name="codigo" value="{{$codigo}}">

		<input type="submit" value="Enviar" class="btn btn-primary">
	</form>
</div>
@endsection

