@extends('layout.dashboard')
@section('content')
<title>Eventos esportivos</title>

@if(Auth::check())
    <a href="/registros/create"><img src="/img/btnadd.png" width="45" height="45"></a><br>
@endif

<table class="table">
  <tr>
    <th>#</th>
    <th>Evento</th>
    <th>Data</th>
    <th>Status do Pagamento</th>
    @if(Auth::check() && Auth::user()->type == 2)
        <th></th>
        <th></th>
    @endif
  </tr>
  @foreach ($registros as $r)
    <tr>
      <td>{{ $r->id }}</p>
      <td><a href="/eventos/{{ $r->evento_id }}">{{ $r->evento_id }}</a></td>
      <td>{{ $r->data }}</td>
      <td>
          @if($r->pago == 1)
              Pago
          @else
              Aguardando pagamento
          @endif
      </td>
      @if(Auth::check())
          <td><a href="/registros/{{ $r->id }}/edit"><img src="/img/btnedit.png" width="20" height="20"></a></td>
          <form id="delete-form" action="/registros/{{ $r->id }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
          </form>

          <td><a href="/registros" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
            <img src="/img/btndelete.png" width="20" height="20">
          </a></td>
      @endif
    </tr>
  @endforeach
</table>
@stop
