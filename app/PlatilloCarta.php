<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlatilloCarta extends Model
{
    protected $table = 'platillocarta';

    protected $fillable = ['nombre', 'descripcion', 'precio'];

    public function detallePedidos() {
        return $this->hasMany('DetallePedido');
    }
}
