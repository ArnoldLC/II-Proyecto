<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detallepedido';

    protected $fillable = ['id_pedido', 'id_platillo', 'cantidad'];

    public function platilloCarta() {
        return $this->belongsTo('PlatilloCarta');
    }

    public function pedido() {
        return $this->belongsTo('Pedido');
    }
}
