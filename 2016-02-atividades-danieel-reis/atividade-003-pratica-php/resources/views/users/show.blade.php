@extends('layout.dashboard')
@section('content')
<h1>Dados do Usuário</h1>

<div align="center">
  <p>ID: {{ $user->id }}</p>
  <p>Nome: {{ $user->name }}</p>
  <p>Email: {{ $user->email }}</p>
  <p>Tipo:
    @if($user->type == 1) Usuário @endif
    @if($user->type == 2) Administrador @endif
  </p>
  <!-- <a href="/users/{{$user->id}}/edit" class="btn btn-primary fa fa-edit"> Editar </a> -->
</div>
@stop
