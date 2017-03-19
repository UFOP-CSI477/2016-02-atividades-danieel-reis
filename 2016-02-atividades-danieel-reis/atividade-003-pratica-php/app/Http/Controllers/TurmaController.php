<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Turma;
use App\Disciplina;

class TurmaController extends Controller {

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
          $turmas = Turma::all()->sortBy('nome');
          return view('turmas.index')->with('turmas', $turmas);
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create() {
         if(Auth::check()) {
             if(Auth::user()->type == 2) {
                 $disciplinas = Disciplina::all();
                 return view('turmas.create')->with('disciplinas', $disciplinas);
             }
          }
          session()->flash('info', 'Permissão negada');
          return redirect('/turmas');
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
                 Turma::create($request->all());
                 session()->flash('info', 'Turma cadastrada!');
                 return redirect('/turmas');
             }
         }
         session()->flash('info', 'Permissão negada');
         return redirect('/turmas');
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id) {
         $turma = Turma::find($id);
         return view('turmas.show')->with('turma', $turma);
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
                 $turma = Turma::find($id);
                 $disciplinas = Disciplina::all();
                 return view('turmas.edit')->with('turma', $turma)->with('disciplinas', $disciplinas);
             }
         }
         session()->flash('info', 'Permissão negada');
         return redirect('/turmas');
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
                 $turma = Turma::find($id);
                 $turma->nome=$request->nome;
                 $turma->disciplina_id=$request->disciplina_id;
                 $turma->save();
                 session()->flash('info', 'Turma atualizada!');
                 return redirect('/turmas');
             }
         }
         session()->flash('info', 'Permissão negada');
         return redirect('/turmas');
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
                 Turma::destroy($id);
                 session()->flash('info', 'Turma excluída!');
                 return redirect('/turmas');
             }
         }
         session()->flash('info', 'Permissão negada');
         return redirect('/turmas');
     }
}
