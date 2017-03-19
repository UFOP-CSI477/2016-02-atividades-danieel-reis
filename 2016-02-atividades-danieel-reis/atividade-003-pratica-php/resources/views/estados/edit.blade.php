@extends('layout.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><b>Adicionar Estado<b></div>
                <div class="panel-body">

                    <form method="post" action="/estados/{{$estado->id}}">
                        {{method_field('PATCH')}}
                        {{csrf_field()}}

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="nome" class="col-md-4 control-label"> Nome </label>
                                    <input type="text" class="form-control" name="nome" value="{{ $estado->nome }}" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('sigla') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="sigla" class="col-md-4 control-label"> Sigla </label>
                                    <input type="text" class="form-control" name="sigla" value="{{ $estado->sigla }}" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('sigla'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sigla') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-6">
                                    <button type="submit" class="btn btn-primary fa fa-check"> Salvar </button>
                                    <a href="/disciplinas" class="btn btn-primary fa fa-mail-reply"> Voltar </a>
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
