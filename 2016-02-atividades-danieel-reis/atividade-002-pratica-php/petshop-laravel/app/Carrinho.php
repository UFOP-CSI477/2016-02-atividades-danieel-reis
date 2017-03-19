<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
   protected $table = 'compras';
   protected $fillable = ['id_user', 'id_produto', 'quantidade', 'data' ];
}
