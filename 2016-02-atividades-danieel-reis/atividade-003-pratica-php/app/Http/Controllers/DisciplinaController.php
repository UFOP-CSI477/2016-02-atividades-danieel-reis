<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Disciplina;

class DisciplinaController extends Controller {

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
        $disciplinas = Disciplina::all()->sortBy('nome');;
        return view('disciplinas.index')->with('disciplinas', $disciplinas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if(Auth::check()) {
            if(Auth::user()->type == 2) {
                return view('disciplinas.create');
            }
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/disciplinas');
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
                Disciplina::create($request->all());
                session()->flash('info', 'Disciplina cadastrada!');
                return redirect('/disciplinas');
            }
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/disciplinas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $disciplina = Disciplina::find($id);
        return view('disciplinas.show')->with('disciplina', $disciplina);
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
                $disciplina = Disciplina::find($id);
                return view('disciplinas.edit')->with('disciplina', $disciplina);
            }
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/disciplinas');
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
                $disciplina = Disciplina::find($id);
                $disciplina->nome=$request->nome;
                $disciplina->codigo=$request->codigo;
                $disciplina->carga=$request->carga;
                $disciplina->save();
                session()->flash('info', 'Disciplina atualizada!');
                return redirect('/disciplinas');
            }
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/disciplinas');
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
                Disciplina::destroy($id);
                session()->flash('info', 'Disciplina excluída!');
                return redirect('/disciplinas');
            }
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/disciplinas');
    }
}
