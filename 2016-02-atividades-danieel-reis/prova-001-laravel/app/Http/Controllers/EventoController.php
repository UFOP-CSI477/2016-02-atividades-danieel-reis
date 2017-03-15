<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Evento;
use App\Registro;
use App\User;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $eventos = Evento::all()->sortBy('data');
        $eventos = DB::select( DB::raw("SELECT * FROM eventos ORDER BY data DESC" ));
        return view('eventos.index')->with('eventos', $eventos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type == 2) {
            return view('eventos.create');
        } else {
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->type == 2) {
            Evento::create($request->all());
            Session()->flash('success', 'Evento cadastrado!');
            return redirect('/eventos');
        } else {
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
         $evento = Evento::findOrFail($id);
         return view('eventos.show')->with('evento',$evento);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if(Auth::user()->type == 2) {
          $evento = Evento::findOrFail($id);
          return view('eventos.edit')->with('evento',$evento);
      } else {
          return redirect('/');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->type == 2) {
            $evento = Evento::find($id);
            $evento->nome = $request->nome;
            $evento->preco = $request->preco;
            $evento->data = $request->data;
            $evento->save();
            return redirect('/eventos');
        } else {
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->type == 2) {
            Evento::destroy($id);
            return redirect('/eventos');
        } else {
            return redirect('/');
        }
    }
}
