<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public $table = 'eventos';

    protected $fillable = [
        'nome', 'preco', 'data',
    ];

    public function registros(){
        return $this->hasMany('App\Registros', 'evento_id');
    }

}
