@extends('layout.dashboard')
@section('content')
<title>Eventos esportivos</title>
<h1>Dados do Usuário</h1>

<div align="center">
  <p>ID: {{ $user->id }}</p>
  <p>Nome: {{ $user->name }}</p>
  <p>Email: {{ $user->email }}</p>
  <p>Tipo:
    @if($user->type == 1) Atleta @endif
    @if($user->type == 2) Administrador @endif
  </p>
  <a href=/users/edit>Editar</a><br>

  <!-- <a href="/users">Voltar</a> -->
</div>
@stop
