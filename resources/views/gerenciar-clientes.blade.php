@extends('layouts.app')

@section('content')

<div class="container">
  <h2>Clientes Cadastrados</h2>        
<a href="cadastrarCliente"><button class="btn btn-primary" style="float: left;">Cadastrar</button></a>
<form style="float: right;" action="buscaCliente" method="get">
  <input type="text" name="busca" required="required">
  <input type="submit" name="" value="Pesquisar">
</form>

  <table class="table">
    <thead>
      <tr style="text-align: center;">
        <th>Nome</th>
        <th>CPF</th>
        <th>Nascimento</th>
        <th>Data de Criação</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
@foreach ($pessoa as $linha)
      <tr style="text-align: center;">
        <td>{{$linha->nome}}</td>
        <td>{{substr($linha->cpf, 0, 3).'.'.substr($linha->cpf, 3, 3).'.'.substr($linha->cpf, 6, 3).'-'.substr($linha->cpf, 9, 2)}}</td>
        <td>{{$linha->data_nascimento}}</td>
        <td>{{$linha->created_at}}</td>
        <td><a href='{{url("/{$linha->id}/editarCliente")}}'><i class="fa fa-pencil" style="padding: 5px; color: white; background-color: #4286f4;"></i></a> - <a href='{{url("/{$linha->id}/deletarCliente")}}'><i class="fa fa-trash" style="padding: 5px; color: white; background-color: red;"></i></a></td>
      </tr>
@endforeach
    </tbody>
  </table>
{!! $pessoa->links() !!}
@endsection