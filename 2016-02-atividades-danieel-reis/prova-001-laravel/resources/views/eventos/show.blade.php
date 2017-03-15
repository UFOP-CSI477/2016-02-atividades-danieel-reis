@extends('layout.dashboard')
@section('content')
<title>Eventos esportivos</title>
<h1>Dados do Evento</h1>
<div align="center">
  <p>{{ $evento->nome }}</p>
  <p>Preço: R${{ $evento->preco }}</p>
  <p>Data: {{ $evento->data }} <p><br>

  <div class="form-group">
    <div class="col-sm-5" align="center" style=""></div>
    <div class="col-sm-1" align="center" style="">
        <a href="/registros/create"><img src="/img/btnok.png" width="45" height="45"></a><br>
    </div>
    <div class="col-sm-1" align="center" style="">
      <a href="/eventos"><img src="/img/btnant.png" width="45" height="45" onClick="JavaScript: window.history.back();"></a><br>
    </div>
    <div class="col-sm-2" align="center" style=""></div>
    <div class="col-sm-1" align="center" style="">
        @if(Auth::check())
            @if(Auth::user()->type == 2)
                {{ csrf_field() }}
                <a href="/eventos/{{ $evento->id }}/edit"><img src="/img/btnedit.png" width="45" height="45"></a>
            @endif
        @endif
    </div>
    <div class="col-sm-1" align="center" style="">
        @if(Auth::check())
            @if(Auth::user()->type == 2)
                <a href="/eventos" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                  <img src="/img/btndelete.png" width="45" height="45">
                </a>
                <form id="delete-form" action="/eventos/{{ $evento->id }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                </form>
            @endif
        @endif
    </div>
</div>
@stop
