@extends('layout.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adicionar Produto</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/produtos') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ old('name') }}" required autofocus>

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
                                <input id="preco" type="text" class="form-control" name="preco" value="{{ old('preco') }}" required autofocus>

                                @if ($errors->has('preco'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('preco') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('imagem') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" for="imagem">Imagem</label>
                            <div class="col-md-6">
                                <input id="imagem" name="imagem" type="file" placeholder="placeholder" class="form-control input-md">
                            </div>

                            @if ($errors->has('imagem'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('imagem') }}</strong>
                                </span>
                            @endif
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
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
