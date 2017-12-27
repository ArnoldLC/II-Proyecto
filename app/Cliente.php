<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';

    protected $fillable = ['nombres', 'apellidos'];

    public function pedidos() {
        return $this->hasMany('Pedido');
    }
}
