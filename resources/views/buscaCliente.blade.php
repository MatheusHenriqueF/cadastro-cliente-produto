@extends('layouts.app')

@section('content')

<div class="container">
  <h2>Clientes Cadastrados</h2>        
<a href="cadastrarPessoa"><button class="btn btn-primary" style="float: left;">Cadastrar</button></a>
<form style="float: right;" action="buscaCliente" method="get">
  <input type="text" name="busca">
  <input type="submit" name="" value="Pesquisar">
</form>

  <table class="table">
    <thead>
      <tr>
        <th style="text-align: center;">Nome</th>
        <th style="text-align: center;">CPF</th>
        <th style="text-align: center;">Nascimento</th>
        <th style="text-align: center;">Data de Criação</th>
        <th style="text-align: center;">Ação</th>
      </tr>
    </thead>
    <tbody>
@foreach ($localizar_cliente as $linha)
      <tr style="text-align: center;">
        <td>{{$linha->nome}}</td>
        <td>{{$linha->cpf}}</td>
        <td>{{$linha->data_nascimento}}</td>
        <td>{{$linha->created_at}}</td>
        <td><a href='{{url("/{$linha->id}/edit4286f4arCliente")}}'><i class="fa fa-pencil" style="padding: 5px; color: white; background-color: #;"></i></a> - <a href='{{url("/{$linha->id}/deletarCliente")}}'><i class="fa fa-trash" style="padding: 5px; color: white; background-color: red;"></i></a></td>
      </tr>
@endforeach 
    </tbody>
  </table>
@endsection