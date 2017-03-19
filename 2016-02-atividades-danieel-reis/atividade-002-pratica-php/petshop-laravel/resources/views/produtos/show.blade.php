@extends('layout.dashboard')
@section('content')
<title>PetShop</title>
<h1>Dados do Produto</h1>
<div align="center">
  <p><img src="{{URL::asset($produto->imagem)}}" width="150" height="150"></p><br>
  <p>{{ $produto->nome }}</p>
  <p>De: R${{ round($produto->preco * 1.23 * 100) / 100 }}</p>
  <p>Por: R${{ $produto->preco }} <p><br>

  <div class="form-group">
    <div class="col-sm-5" align="center" style=""></div>
    <div class="col-sm-1" align="center" style="">
      <form class="form-horizontal" role="form" method="POST" action="/carrinho">
          {{ csrf_field() }}

          <input type="hidden" name="id_user" value="{{ Auth::id() }}" />
          <input type="hidden" name="id_produto" value="{{ $produto->id }}" />
          <div class="form-group">
              <select class="form-control" name="quantidade" value="Quantidade">
                  @for ($i = 1; $i <= 20; $i++)
                      <option value={{ $i }}>{{ $i }}</option>
                  @endfor
              </select>
          </div>
          <?php
            date_default_timezone_set('America/Sao_Paulo');
            $date = date('Y-m-d H:i');
          ?>
          <input type="hidden" name="data" value="{{ $date }}" />
          <input type="hidden" name="imagem" value="{{ $produto->imagem }}" />
          <input type="hidden" name="preco" value="{{ $produto->preco }}" />

          <button type="submit" class="btn btn-primary fa fa-check" href="/carrinho">  Comprar</button>
      </form>
    </div>
    <div class="col-sm-1" align="center" style="">
      <input type="button" class="btn btn-primary fa fa-mail-reply" href="/produtos" value="  Voltar" onClick="JavaScript: window.history.back();">
    </div>
    <div class="col-sm-2" align="center" style=""></div>
    <div class="col-sm-1" align="center" style="">
        @if(Auth::check())
            @if(Auth::user()->type == 2)
                <form class="form-horizontal" role="form" method="POST" action="/produtos/{{ $produto->id }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary fa fa-eraser" href="/eventos">  Excluir</button>
                </form>
            @endif
        @endif
    </div>
    <div class="col-sm-1" align="center" style="">
        @if(Auth::check())
            @if(Auth::user()->type == 2 || Auth::user()->type == 3)
                {{ csrf_field() }}
                <a class="btn btn-primary fa fa-edit" href="/produtos/{{ $produto->id }}/edit">  Editar</a>
            @endif
        @endif
    </div>
</div>
@stop
