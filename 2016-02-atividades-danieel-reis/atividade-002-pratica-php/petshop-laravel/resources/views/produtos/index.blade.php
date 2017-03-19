@extends('layout.dashboard')
@section('content')
<title>PetShop</title>

@if(Auth::check() && Auth::user()->type == 2)
    <a href="/produtos/create"><img src="img/add.png" width="45" height="45"></a><br>
@endif

@if(Session::has('info'))
    <br>
    <div class="col-md-8 col-md-offset-2 alert alert-danger" align="center">{{ Session::get('info') }}</div>
@endif

<div class="container">
  @foreach ($produtos as $p)
    <div class="col-sm-4" align="center" style="">
      <img src="{{URL::asset($p->imagem)}}"  width="150" height="150"><br>
      <a href="/produtos/{{ $p->id }}">{{ $p->nome }}</a><br>
      <p>De: R${{ round($p->preco * 1.23 * 100) / 100 }}</p>
      <p>Por: R${{ $p->preco }} <p><br>
    </div>
  @endforeach
</div>
@stop
