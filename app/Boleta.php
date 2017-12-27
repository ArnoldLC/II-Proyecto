<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    protected $table = 'boleta';

    protected $fillable = ['id_pedido', 'costo_total'];

    public function pedido() {
        return $this->belongsTo('Pedido');
    }
}
