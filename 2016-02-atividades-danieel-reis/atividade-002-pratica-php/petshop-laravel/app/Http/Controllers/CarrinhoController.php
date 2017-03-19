<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Compra;
use App\Produto;

class CarrinhoController extends Controller
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
        return view('compras.carrinho');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request) {
         Session::push('compra', [
             'id_user' => Auth::id(),
             'id_produto' => $request->id_produto,
             'imagem' => $request->imagem,
             'preco' => $request->preco,
             'quantidade' => $request->quantidade
         ]);

         $produto = Produto::findOrFail($request->id_produto);
         $request->session()->flash('info', "Produto $produto->nome adicionado ao carrinho");
         return redirect('produtos');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        if(Auth::check()) {
            $carrinho = Session::pull('compra');
            if(isset($carrinho)) {
                foreach ($carrinho as &$compras) {
                    $i = 1;
                    foreach ($compras as &$c) {
                        if($i == 1) $id_user = $c;
                        else if($i == 2) $id_produto = $c;
                        else if($i == 3) $imagem = $c;
                        else if($i == 4) $preco = $c;
                        else if($i == 5) $quantidade = $c;
                        $i++;
                    }

                    date_default_timezone_set('America/Sao_Paulo');
                    $date = date('Y-m-d H:i');

                    DB::table('compras')->insert([
                        ['id_user' => $id_user, 'id_produto' => $id_produto, 'quantidade' => $quantidade, 'data' => $date]
                    ]);

                    session()->flash('info', 'Compra realizada!');
                    return redirect('/compras');
                }
            }

            session()->flash('info', 'Compra realizada!');
            return redirect('/compras');
        }
        session()->flash('info', 'Permissão negada');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compras = Session::pull('compra');
        return redirect('/');
    }
}
