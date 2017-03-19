<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Cidade;
use App\Estado;
use Illuminate\Http\Request;

class CidadeController extends Controller {

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
        $cidades = Cidade::all()->sortBy('nome');;
        return view('cidades.index')->with('cidades', $cidades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if(Auth::check()) {
            if(Auth::user()->type == 2) {
                $estados = Estado::orderby('nome','desc')->get();
                return view('cidades.create')->with('estados', $estados);
            }
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/cidades');
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
                Cidade::create($request->all());
                session()->flash('info', 'Cidade cadastrada!');
                return redirect('/cidades');
            }
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/cidades');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $cidade = Cidade::find($id);
        return view('cidades.show')->with('cidade', $cidade);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if(Auth::check()) {
            if(Auth::user()->type == 2) {
                $cidade = Cidade::find($id);
                $estados = Estado::all();
                return view('cidades.edit')->with('cidade', $cidade)->with('estados', $estados);
            }
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/cidades');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if(Auth::check()) {
            if(Auth::user()->type == 2) {
                $cidade = Cidade::find($id);
                $cidade->nome=$request->nome;
                $cidade->estado_id=$request->estado_id;
                $cidade->save();
                session()->flash('info', 'Cidade atualizada!');
                return redirect('/cidades');
            }
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/cidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
         if(Auth::check()) {
             if(Auth::user()->type == 2) {
                 $cidade = Cidade::findOrFail($id);
                 $cidade->delete();
                 session()->flash('info', 'Cidade excluída!');
                 return redirect('cidades');
             }
         }
         session()->flash('info', 'Permissão negada');
         return redirect('/cidades');
     }
}
