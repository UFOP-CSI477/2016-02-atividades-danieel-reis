@extends('layout.dashboard')
@section('content')
<title>Eventos esportivos</title>

@if(Auth::check())
    @if(Auth::user()->type == 2)
        <a href="/eventos/create"><img src="img/btnadd.png" width="45" height="45"></a><br>
    @endif
@endif

<table class="table">
  <tr>
    <th>Nome</th>
    <th>Preço</th>
    <th>Data</th>
  </tr>
  @foreach ($eventos as $e)
    <tr>
      <td><a href="/eventos/{{ $e->id }}">{{ $e->nome }}</a></td>
      <td>R${{ $e->preco }}</td>
      <td>{{ $e->data }}</td>
    </tr>
  @endforeach
</table>
@stop
