<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Registro;
use App\Evento;
use App\User;

class RegistroController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $registros = DB::select( DB::raw("SELECT * FROM registros WHERE user_id = :id"), array( 'id' => Auth::id() ));
        // dd($results);
        return view('registros.index')->with('registros', $registros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        // $eventos = Evento::all();
        $eventos = DB::select( DB::raw("SELECT *FROM eventos WHERE id NOT IN
          ( SELECT e.id  FROM eventos AS e INNER JOIN registros AS r ON e.id = r.evento_id WHERE user_id = :id )"),
            array( 'id' => Auth::id() )
        );
        // dd($eventos);
        return view('registros.create')->with('eventos', $eventos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        Registro::create($request->all());
        Session()->flash('success', 'Registro cadastrado!');
        return redirect('/registros');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $registro = Registro::findOrFail($id);
      return view('registros.show')->with('registro',$registro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $eventos = Evento::all();
        $registro = Registro::findOrFail($id);
        // dd($registro);
        return view('registros.edit')->with('registro',$registro)->with('eventos',$eventos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $registro = Registro::find($id);
        $registro->user_id = $request->user_id;
        $registro->evento_id = $request->evento_id;
        $registro->data = $request->data;
        $registro->pago = $request->pago;
        $registro->save();
        return redirect('/registros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $registro = Registro::findOrFail($id);
        $registro->delete();
        return redirect('/registros');
    }
}
