@extends('layout.dashboard')
@section('content')
<title>PetShop</title>

<table class="table">
  <tr>
    <th>ID Compra</th>
    <th>ID Produto</th>
    <th>Quantidade</th>
    <th>Data</th>
  </tr>
  @foreach ($compras as $c)
    <tr>
      <td>{{ $c->id }}</p>
      <td><a href="/produtos/{{ $c->id_produto }}">{{ $c->id_produto }}</a></td>
      <td>{{ $c->quantidade }}</td>
      <td>{{ $c->data }}</td>
    </tr>
  @endforeach
</table>
@stop
