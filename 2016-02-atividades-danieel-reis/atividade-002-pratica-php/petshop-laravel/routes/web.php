<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('', function () { return redirect('produtos'); });
Route::resource('/carrinho','CarrinhoController');
Route::resource('/produtos','ProdutoController');
Route::resource('/users','UserController');
Route::resource('/compras','CompraController');

Auth::routes();

Route::get('send', function() {
  Mail::send('email.send', [], function ($message) {
  $message->to('danielmartinsreis@gmail.com', 'Daniel')->subject('Confirmação de compra!'); });
  return redirect('/produtos');
});
