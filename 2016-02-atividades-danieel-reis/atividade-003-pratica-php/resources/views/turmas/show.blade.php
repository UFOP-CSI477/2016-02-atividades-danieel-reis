@extends('layout.dashboard')
@section('content')

<h1>Exibir Turma</h1>
<div align="center">
    <form method="post" action="/turmas/{{$turma->id}}">
        {{method_field('DELETE')}}
        {{csrf_field()}}

        Nome: {{$turma->nome}} <br>
        Disciplina:  <a href="/disciplinas/{{ $turma->disciplina->id }}">{{ $turma->disciplina->nome }} </a><br>

        <br><br>
        @if(Auth::check())
           @if(Auth::user()->type == 2)
               <a href="/turmas/{{$turma->id}}/edit" class="btn btn-primary fa fa-edit"> Editar </a>
               <button type="submit" class="btn btn-danger fa fa-eraser"> Excluir </button>
           @endif
        @endif
        <a href="/turmas" class="btn btn-primary fa fa-mail-reply"> Voltar </a>
    </form>
  </div>
@endsection
