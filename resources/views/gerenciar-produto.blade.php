@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Produtos Cadastrados</h2>        
<a href="cadastrarProduto"><button class="btn btn-primary" style="float: left;">Cadastrar</button></a>
  <table class="table">
    <thead>
      <tr style="text-align: center;">
        <th>Nome</th>
        <th>Preço</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>

@foreach ($produtos as $linha)
      <tr style="text-align: center;">
        <td>{{$linha->nome}}</td>
        <td>{{'R$'.number_format($linha->preco, 2, ',','.')}}</td>
        <td><a href='{{url("/{$linha->id}/editarProduto")}}'><i class="fa fa-pencil" style="padding: 5px; color: white; background-color: #4286f4;"></i></a> - <a href='{{url("/{$linha->id}/deletarProduto")}}'><i class="fa fa-trash" style="padding: 5px; color: white; background-color: red;"></i></a></td>
        </tr>
@endforeach
    </tbody>
  </table>
{!! $produtos->links() !!}
@endsection