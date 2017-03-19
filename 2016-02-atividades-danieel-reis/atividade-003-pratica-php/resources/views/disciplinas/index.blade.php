@extends('layout.dashboard')
@section('content')

<h1>Lista de Disciplinas</h1>
@if(Auth::check())
   @if(Auth::user()->type == 2)
      <a href="/disciplinas/create" class="btn btn-primary fa fa-user-plus"> Adicionar </a>
   @endif
@endif

@if(Session::has('info'))
    <br>
    <div class="col-md-4 col-md-offset-4 alert alert-danger" align="center">{{ Session::get('info') }}</div>
@endif

<table class="table table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Código</th>
      <th>Carga Horária</th>
    </tr>
  </thead>
<tbody>
    @foreach ($disciplinas as $d)
      <tr>
          <td><a href="/disciplinas/{{ $d->id }}">{{ $d->nome }}</a> </td>
          <td>{{ $d->codigo }}</td>
          <td>{{ $d->carga}}</td>
      </tr>
    @endforeach
    </tbody>
</table>
@endsection
