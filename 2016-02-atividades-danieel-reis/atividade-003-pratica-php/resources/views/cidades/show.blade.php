@extends('layout.dashboard')
@section('content')

<h1>Dados da Cidade</h1>
<div align="center">
    <form method="post" action="/cidades/{{$cidade->id}}">
        {{method_field('DELETE')}}
        {{csrf_field()}}

        Nome: {{ $cidade->nome }} <br>
        Estado: <a href="/estados/{{ $cidade->estado_id }}">{{ $cidade->estado->nome }} </a><br>

        <br><br>
        @if(Auth::check())
           @if(Auth::user()->type == 2)
               <a href="/cidades/{{$cidade->id}}/edit" class="btn btn-primary fa fa-edit"> Editar </a>
               <button type="submit" class="btn btn-danger fa fa-eraser"> Excluir </button>
           @endif
        @endif
        <a href="/cidades" class="btn btn-primary fa fa-mail-reply"> Voltar </a>
    </form>
</div>
@endsection
