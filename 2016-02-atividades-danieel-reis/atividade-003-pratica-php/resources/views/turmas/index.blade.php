@extends('layout.dashboard')
@section('content')

<h1>Lista de  Turmas</h1>
@if(Auth::check())
   @if(Auth::user()->type == 2)
      <a href="/turmas/create" class="btn btn-primary fa fa-user-plus"> Adicionar </a>
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
      <th>Disciplina</th>
    </tr>
  </thead>
<tbody>
    @foreach ($turmas as $t)
      <tr>
          <td><a href="/turmas/{{ $t->id }}">{{ $t->nome }}</a> </td>
          <td><a href="/disciplinas/{{ $t->disciplina->id }}">{{ $t->disciplina->nome }}</a></td>
      </tr>
    @endforeach
    </tbody>
</table>
@endsection
