@extends('layout.dashboard')
@section('content')
<title>PetShop</title>

@if(Session::has('info'))
    <br>
    <div class="col-md-4 col-md-offset-4 alert alert-danger" align="center">{{ Session::get('info') }}</div>
@endif

<table class="table">
  <tr>
    <th>ID Compra</th>
    <th>ID Usuário</th>
    <th>ID Produto</th>
    <th>Quantidade</th>
    <th>Data</th>
  </tr>
  @foreach ($compras as $c)
    <tr>
      <td>{{ $c->id }}</p>
      <td><a href="/users/{{ $c->id_user }}">{{ $c->id_user }}</a></td>
      <td><a href="/produtos/{{ $c->id_produto }}">{{ $c->id_produto }}</a></td>
      <td>{{ $c->quantidade }}</td>
      <td>{{ $c->data }}</td>
    </tr>
  @endforeach
</table>
@stop
