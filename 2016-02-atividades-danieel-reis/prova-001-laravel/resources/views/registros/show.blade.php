@extends('layout.dashboard')
@section('content')
<title>Eventos esportivos</title>
<h1>Dados do Registro</h1>
<div align="center">
  <p>{{ $registro->nome }}</p>
  <p>Data: {{ $registro->data }}</p>
  <p>Pago: {{ $registro->pago }} <p><br>

  <div class="form-group">
    <div class="col-sm-6" align="center" style=""></div>
    <div class="col-sm-1" align="center" style="">
      <input type="button" class="btn btn-primary" href="/registros" value="Voltar" onClick="JavaScript: window.history.back();">
    </div>
    <div class="col-sm-2" align="center" style=""></div>
    <div class="col-sm-1" align="center" style="">
        @if(Auth::check())
            @if(Auth::user()->type == 2)
                {{ csrf_field() }}
                <!-- <button type="button" class="btn btn-primary" href="/registros/{{ $registro->id }}/edit"><img src="/img/edit.jpeg" width="20" height="20">  Editar</button> -->
                <a href="/registros/{{ $registro->id }}/edit"><img src="/img/edit.jpeg" width="20" height="20">  Editar</a>
            @endif
        @endif
    </div>
    <div class="col-sm-1" align="center" style="">
        @if(Auth::check())
            @if(Auth::user()->type == 2)
                <form class="form-horizontal" role="form" method="POST" action="/registros/{{ $registro->id }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary" href="/registros"><img src="/img/btndelete.png" width="20" height="20">  Excluir</button>
                </form>
            @endif
        @endif
    </div>
</div>
@stop
