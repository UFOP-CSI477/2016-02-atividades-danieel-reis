<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $produtos = Produto::all();
        return view('produtos.index')->with('produtos', $produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if(Auth::user()->type == 2 || Auth::user()->type == 3) {
            return view('produtos.create');
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
    public function store(Request $request) {
        if(Auth::user()->type == 2 || Auth::user()->type == 3) {
            //dd($request);
            $p = Produto::create($request->all());

            if ( $request->file('imagem')->isValid() ) {
                $fnome = $request->file('imagem')->getClientOriginalName();
                $request->file('imagem')->move("img/", $fnome);
                Produto::where('id', $p->getKey())->update(array('imagem' => "img/" . $fnome));
            }
            session()->flash('info', 'Produto cadastrado!');
            return redirect('/produtos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $produto = Produto::findOrFail($id);
        return view('produtos.show')->with('produto',$produto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if(Auth::user()->type == 2 || Auth::user()->type == 3) {
            $produto = Produto::findOrFail($id);
            return view('produtos.edit')->with('produto',$produto);
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
     public function update(Request $request, Produto $produto) {
        if(Auth::user()->type == 2 || Auth::user()->type == 3) {
            $produto->preco = $request->get("preco");
            $produto->nome = $request->get("nome");

            if ($request->file('imagem')!=null && $request->file('imagem')->isValid()) {
                $fnome = $request->file('imagem')->getClientOriginalName();
                $request->file('imagem')->move("img/", $fnome);
                $produto->nome = $fnome;
                die("xxxxx");
            }
            $produto->save();
            session()->flash('info', 'Produto atualizado!');
            return redirect('/produtos');
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
    public function destroy($id) {
        if(Auth::user()->type == 2) {
            Produto::destroy($id);
            session()->flash('info', 'Produto excluído!');
            return redirect('/produtos');
        } else {
            return redirect('/');
        }
    }
}
