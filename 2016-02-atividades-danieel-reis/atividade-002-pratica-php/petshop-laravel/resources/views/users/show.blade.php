@extends('layout.dashboard')
@section('content')
<title>PetShop</title>
<h1>Dados do Usuário</h1>

<div align="center">
  <p>ID: {{ $user->id }}</p>
  <p>Nome: {{ $user->name }}</p>
  <p>Email: {{ $user->email }}</p>
  <p>Tipo:
    @if($user->type == 1) Cliente @endif
    @if($user->type == 2) Administrador @endif
    @if($user->type == 3) Operador @endif
  </p>
  <!-- <a href="/users/{{$user->id}}/edit" class="btn btn-primary fa fa-edit"> Editar </a> -->

  <!-- <a href="/users">Voltar</a> -->
</div>
@stop
