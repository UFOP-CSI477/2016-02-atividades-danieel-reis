<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Compra;
use App\Produto;
use App\User;

class CompraController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {
            $compras = DB::select( DB::raw("SELECT * FROM compras WHERE id_user = :id"), array( 'id' => Auth::id() ));
            return view('compras.index')->with('compras', $compras);
        } else {
            redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_user)
    {
        $compras = Compra::with('user')->where('id_user', $id_user)->get();
        return view('compras.show')->with('compras', $compras);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        return view('compras.edit')->with('compra', $compra);
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
        session()->flash('info', 'Compra atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();
        session()->flash('info', 'Compra excluída!');
        return redirect('/compras');
    }
}
