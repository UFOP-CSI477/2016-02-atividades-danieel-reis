@extends('layout.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Registro</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="/registros/{{ $registro->id }}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" value="{{ $registro->user_id }}" />

                        <div class="form-group">
                            <label for="evento_id" class="col-md-4 control-label">Evento</label>

                            <div class="col-md-6">
                                <select id="evento_id" class="form-control" name="evento_id" required>
                                    @foreach ($eventos as $evento)
                                        @if($evento->id == $registro->evento_id)
                                            <option selected="true" value="{{ $evento->id }}">{{ $evento->nome }}</option>
                                        @else
                                            <option value="{{ $evento->id }}">{{ $evento->nome }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
                            <label for="data" class="col-md-4 control-label">Data (aaaa-mm-dd h:m:s)</label>

                            <div class="col-md-6">
                                <input id="data" type="text" class="form-control" value="{{ $registro->data }}" name="data" required>

                                @if ($errors->has('data'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>

                        <input type="hidden" name="pago" value="{{ $registro->pago }}" />
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
