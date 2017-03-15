@extends('layout.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inserir Registro</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="/registros">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" value={{ Auth::id() }} />

                        <div class="form-group">
                            <label for="evento_id" class="col-md-4 control-label">Evento</label>

                            <div class="col-md-6">
                                <select id="evento_id" class="form-control" name="evento_id" required>
                                    @foreach ($eventos as $evento)
                                        <option value="{{ $evento->id }}">{{ $evento->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
                            <label for="data" class="col-md-4 control-label">Data (aaaa-mm-dd h:m:s)</label>

                            <div class="col-md-6">
                                <input id="data" type="text" class="form-control" name="data" required>

                                @if ($errors->has('data'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </div>

                        <input type="hidden" name="pago" value=0 />
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
