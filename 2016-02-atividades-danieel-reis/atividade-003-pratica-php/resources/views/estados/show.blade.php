@extends('layout.dashboard')
@section('content')

<h1>Dados do Estado</h1>
<div align="center">
    <form method="post" action="/estados/{{$estado->id}}">
        {{method_field('DELETE')}}
        {{csrf_field()}}

        Nome: {{ $estado->nome }} <br>
        Sigla: {{ $estado->sigla }} <br>

        <br><br>
        @if(Auth::check())
           @if(Auth::user()->type == 2)
               <a href="/estados/{{$estado->id}}/edit" class="btn btn-primary fa fa-edit"> Editar </a>
               <button type="submit" class="btn btn-danger fa fa-eraser"> Excluir </button>
           @endif
        @endif
        <a href="/estados" class="btn btn-primary fa fa-mail-reply"> Voltar </a>
    </form>
</div>
@endsection
