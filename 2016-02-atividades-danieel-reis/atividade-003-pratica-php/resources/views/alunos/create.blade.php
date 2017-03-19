@extends('layout.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><b>Adicionar Aluno<b></div>
                <div class="panel-body">

                    <form method="post" action="/alunos/">
                        {{csrf_field()}}

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="nome" class="col-md-4 control-label"> Nome </label>
                                    <input type="text" class="form-control" name="nome" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('rua') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="rua" class="col-md-4 control-label"> Rua </label>
                                    <input type="text" class="form-control" name="rua" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('rua'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rua') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="numero" class="col-md-4 control-label"> Numero </label>
                                    <input type="text" class="form-control" name="numero" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('numero'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('numero') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="bairro" class="col-md-4 control-label"> Bairro </label>
                                    <input type="text" class="form-control" name="bairro" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('bairro'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('bairro') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('cidade_id') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="evento_id" class="col-md-4 control-label"> Cidade </label>

                                    <select id="cidade_id" class="form-control" name="cidade_id" required>
                                        @foreach($cidades as $c)
                                            <option value="{{ $c->id }}">{{ $c->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="cep" class="col-md-4 control-label"> Cep </label>
                                    <input type="text" class="form-control" name="cep" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('cep'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cep') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('mail') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="mail" class="col-md-4 control-label"> Email </label>
                                    <input type="email" class="form-control" name="mail" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('mail'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mail') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-6">
                                    <button type="submit" class="btn btn-primary fa fa-check"> Salvar </button>
                                    <a href="/alunos" class="btn btn-primary fa fa-mail-reply"> Voltar </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
