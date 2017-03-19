<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Aluno;
use App\Cidade;

class AlunoController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth',['except'=> 'index']);//so o index n precisa de login para ser acessado
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $alunos = Aluno::all()->sortBy('nome');;
        return view('alunos.index')->with('alunos', $alunos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
      if(Auth::check()) {
          if(Auth::user()->type == 2) {
              $cidades = Cidade::all();
              return view('alunos.create')->with('cidades', $cidades);
          }
      }
      session()->flash('info', 'Permissão negada');
      return redirect('/alunos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if(Auth::check()) {
            if(Auth::user()->type == 2) {
                Aluno::create($request->all());
                session()->flash('info', 'Aluno cadastrado!');
                return redirect('/alunos');
            }
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/alunos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.show')->with('aluno', $aluno);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
      if(Auth::check()) {
          if(Auth::user()->type == 2) {
              $aluno = Aluno::findOrFail($id);
              $cidades = Cidade::all();
              return view('alunos.edit')->with('aluno', $aluno)->with('cidades', $cidades);
          }
      }
      session()->flash('info', 'Permissão negada');
      return redirect('/alunos');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id) {
         if(Auth::check()) {
             if(Auth::user()->type == 2) {
                 $aluno = Aluno::find($id);
                 $aluno->nome=$request->nome;
                 $aluno->rua=$request->rua;
                 $aluno->numero=$request->numero;
                 $aluno->bairro=$request->bairro;
                 $aluno->cidade_id=$request->cidade_id;
                 $aluno->cep=$request->cep;
                 $aluno->mail=$request->mail;
                 $aluno->save();
                 session()->flash('info', 'Aluno atualizado!');
                 return redirect('/alunos');
             }
         }
         session()->flash('info', 'Permissão negada');
         return redirect('/alunos');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if(Auth::check()) {
            if(Auth::user()->type == 2) {
                $aluno = Aluno::findOrFail($id);
                $aluno->delete();
                session()->flash('info', 'Aluno excluído!');
                return redirect('alunos');
            }
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/alunos');
    }
}
