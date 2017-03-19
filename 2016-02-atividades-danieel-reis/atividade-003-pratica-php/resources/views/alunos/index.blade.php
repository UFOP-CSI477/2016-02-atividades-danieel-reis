@extends('layout.dashboard')
@section('content')

<h1>Lista de Alunos</h1>
@if(Auth::check())
   @if(Auth::user()->type == 2)
      <a href="/alunos/create" class="btn btn-primary fa fa-user-plus"> Adicionar </a>
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
      <th>Cidade</th>
    </tr>
  </thead>
<tbody>
    @foreach ($alunos as $a)
      <tr>
          <td><a href="/alunos/{{ $a->id }}">{{ $a->nome }}</a></td>
          <td>{{ $a->cidade->nome }}</td>
      </tr>
    @endforeach
    </tbody>
</table>
@endsection
