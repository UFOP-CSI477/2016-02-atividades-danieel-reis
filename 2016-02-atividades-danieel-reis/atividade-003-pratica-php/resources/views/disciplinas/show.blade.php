@extends('layout.dashboard')
@section('content')

<h1>Dados da Disciplina</h1>
<div align="center">
    <form method="post" action="/disciplinas/{{$disciplina->id}}">
        {{method_field('DELETE')}}
        {{csrf_field()}}

        Nome: {{ $disciplina->nome }} <br>
        Codigo: {{ $disciplina->codigo }} <br>
        Carga Horária: {{ $disciplina->carga }} <br>

        <br><br>
        @if(Auth::check())
           @if(Auth::user()->type == 2)
               <a href="/disciplinas/{{$disciplina->id}}/edit" class="btn btn-primary fa fa-edit"> Editar </a>
               <button type="submit" class="btn btn-danger fa fa-eraser"> Excluir </button>
           @endif
        @endif
        <a href="/disciplinas" class="btn btn-primary fa fa-mail-reply"> Voltar </a>
    </form>
</div>
@endsection
