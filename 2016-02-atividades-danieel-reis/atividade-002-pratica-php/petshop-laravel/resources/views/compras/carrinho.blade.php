@extends('layout.dashboard')
@section('content')
<title>PetShop</title>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Carrinho</div>
                <div class="panel-body">
                    <table class="table">
                      <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                      </tr>

                      <?php
                          $carrinho = Session::pull('compra');
                          if(isset($carrinho)) {
                              $j = 1;
                              $valor_total = 0;
                              foreach ($carrinho as &$compras) {
                                  $i = 1;
                                  foreach ($compras as &$c) {
                                      if($i == 1) $id_user = $c;
                                      else if($i == 2) $id_produto = $c;
                                      else if($i == 3) $imagem = $c;
                                      else if($i == 4) $preco = $c;
                                      else if($i == 5) { $quantidade = $c; $valor_total += $preco * $quantidade; }
                                      $i++;
                                  }
                                  $j++;
                                  Session::push('compra', [
                                      'id_user' => $id_user,
                                      'id_produto' => $id_produto,
                                      'imagem' => $imagem,
                                      'preco' => $preco,
                                      'quantidade' => $quantidade
                                  ]);
                        ?>
                                  <tr>
                                      <td><a href="/produtos/{{ $id_produto }}"><img src="{{URL::asset($imagem)}}" width="80" height="80"></a></td>
                                      <td>R$ {{ $preco }}</td>
                                      <td>{{ $quantidade }}</td>
                                  </tr>
                        <?php
                              }
                          }
                        ?>
                        @if(isset($carrinho))
                            <tr>
                                <td><b>Valor Total:</b></td>
                                <td>R$ {{ $valor_total }}</td>
                                <td></td>
                            </tr>
                        @endif
                    </table>
                    @if(isset($carrinho))
                        <div class="col-md-3 col-md-offset-3">
                            <form class="form-horizontal" role="form" method="POST" action="/carrinho/0">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}
                                <a class="btn btn-primary fa fa-check" href="/compras"> Comprar </a>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <form class="form-horizontal" role="form" method="POST" action="/carrinho/0">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary fa fa-eraser" href="/produtos"> Limpar </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
