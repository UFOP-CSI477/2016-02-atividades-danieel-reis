@extends('layout.dashboard')
@section('content')

<h1>Dados do Aluno</h1>
<div align="center">
    <form method="post" action="/alunos/{{$aluno->id}}">
        {{method_field('DELETE')}}
        {{csrf_field()}}

        Nome: {{ $aluno->nome }} <br>
        Cidade: <a href="/cidades/{{ $aluno->cidade->id }}">{{ $aluno->cidade->nome }}</a><br>
        Rua: {{ $aluno->rua }} <br>
        Numero: {{ $aluno->numero }} <br>
        Bairro: {{ $aluno->bairro }} <br>
        CEP : {{ $aluno->cep }} <br>
        Email: {{ $aluno->mail }} <br>

        <br><br>
        @if(Auth::check())
           @if(Auth::user()->type == 2)
               <a href="/alunos/{{$aluno->id}}/edit" class="btn btn-primary fa fa-edit"> Editar </a>
               <button type="submit" class="btn btn-danger fa fa-eraser"> Excluir </button>
           @endif
        @endif
        <a href="/alunos" class="btn btn-primary fa fa-mail-reply"> Voltar </a>
    </form>
</div>
@endsection
