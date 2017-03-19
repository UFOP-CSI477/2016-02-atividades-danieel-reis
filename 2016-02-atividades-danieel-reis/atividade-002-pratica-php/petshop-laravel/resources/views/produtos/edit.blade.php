@extends('layout.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Produto</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/produtos/{{ $produto->id }}">
                      {{ method_field('PATCH') }}
                      {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ $produto->nome }}" required autofocus>

                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('preco') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Preço</label>

                            <div class="col-md-6">
                                <input id="preco" type="text" class="form-control" name="preco" value="{{ $produto->preco }}" required autofocus>

                                @if ($errors->has('preco'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('preco') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="imagem">Nova Imagem</label>
                            <div class="col-md-6">
                                <input id="imagem" name="imagem" type="file" placeholder="placeholder" class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                              <p><img src="{{URL::asset($produto->imagem)}}" width="150" height="150"></p><br>
                            </div>
                        </div>


                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <input type="button" class="btn btn-primary" href="/produtos" value="Voltar" onClick="JavaScript: window.history.back();">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
