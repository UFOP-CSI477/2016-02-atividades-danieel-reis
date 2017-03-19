@extends('layout.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><b>Editar Turma<b></div>
                <div class="panel-body">

                    <form method="post" action="/turmas/{{$turma->id}}">
                        {{method_field('PATCH')}}
                        {{csrf_field()}}

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="nome" class="col-md-4 control-label"> Nome </label>
                                    <input type="text" class="form-control" name="nome" value="{{ $turma->nome }}" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('disciplina_id') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="disciplina_id" class="col-md-4 control-label"> Disciplina </label>

                                    <select id="disciplina_id" class="form-control" name="disciplina_id" required>
                                        @foreach($disciplinas as $d)
                                            @if($d->id == $turma->disciplina_id )
                                                <option selected="true" value="{{ $d->id }}">{{ $d->nome }}</option>
                                            @else
                                                <option value="{{ $d->id }}">{{ $d->nome }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-6">
                                    <button type="submit" class="btn btn-primary fa fa-check"> Salvar </button>
                                    <a href="/turmas" class="btn btn-primary fa fa-mail-reply"> Voltar </a>
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
