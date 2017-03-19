@extends('layout.dashboard')
@section('content')
<h1>Lista de Usuários</h1>

<table class="table">
  <tr>
    <th>#</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Tipo</th>
  </tr>

  @foreach ($users as $u)
  <tr>
    <td>{{$u->id}}</td>
    <td><a href="/users/{{ $u->id }}">{{ $u->name }}</a></td>
    <td>{{$u->email}}</td>
    <td>
        @if($u->type == 1) Usuário @endif
        @if($u->type == 2) Administrador @endif
    </td>
  </tr>
  @endforeach
</table>
@stop
