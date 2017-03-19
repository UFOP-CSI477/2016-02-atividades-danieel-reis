<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Estado;
class EstadoController extends Controller {

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
        $estados = Estado::all()->sortBy('nome');
        return view('estados.index')->with('estados', $estados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if(Auth::check()) {
            if(Auth::user()->type == 2) {
                return view('estados.create');
            }
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/estados');
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
              Estado::create($request->all());
              session()->flash('info', 'Estado cadastrado!');
              return redirect('/estados');
          }
      }
      session()->flash('info', 'Permissão negada');
      return redirect('/estados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $estado = Estado::find($id);
        return view('estados.show')->with('estado', $estado);
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
              $estado = Estado::find($id);
              return view('estados.edit')->with('estado', $estado);
          }
      }
      session()->flash('info', 'Permissão negada');
      return redirect('/estados');
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
              $estado = Estado::find($id);
              $estado->nome=$request->nome;
              $estado->sigla=$request->sigla;
              $estado->save();
              session()->flash('info', 'Estado atualizado!');
              return redirect('/estados');
          }
      }
      session()->flash('info', 'Permissão negada');
      return redirect('/estados');
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
              Estado::destroy($id);
              session()->flash('info', 'Estado excluído!');
              return redirect('/estados');
          }
      }
      session()->flash('info', 'Permissão negada');
      return redirect('/estados');
    }
}
