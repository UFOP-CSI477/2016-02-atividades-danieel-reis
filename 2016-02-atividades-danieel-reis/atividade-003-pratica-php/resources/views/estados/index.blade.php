@extends('layout.dashboard')
@section('content')

<h1>Lista de Estados</h1>
@if(Auth::check())
   @if(Auth::user()->type == 2)
      <a href="/estados/create" class="btn btn-primary fa fa-user-plus"> Adicionar </a>
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
      <th>Sigla</th>
    </tr>
  </thead>
<tbody>
    @foreach ($estados as $e)
      <tr>
          <td><a href="/estados/{{ $e->id }}">{{ $e->nome }}</a></td>
          <td>{{ $e->sigla }}</td>
      </tr>
    @endforeach
    </tbody>
</table>
@endsection
