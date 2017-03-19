@extends('layout.dashboard')
@section('content')

<h1>Lista de Cidades</h1>
@if(Auth::check())
   @if(Auth::user()->type == 2)
      <a href="/cidades/create" class="btn btn-primary fa fa-user-plus"> Adicionar </a>
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
      <th>Estado</th>
    </tr>
  </thead>
<tbody>
    @foreach ($cidades as $c)
      <tr>
        <td><a href="/cidades/{{ $c->id }}">{{ $c->nome }}</a></td>
        <td>{{ $c->estado->nome }}</td>
      </tr>
    @endforeach
    </tbody>
</table>
@endsection
