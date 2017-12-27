<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';

    protected $fillable = ['id_cliente', 'fecha_pedido', 'id_mozo', 'mesa'];

    public function cliente() {
        return $this->belongsTo('Cliente');
    }

    public function empleado() {
        return $this->belongsTo('Empleado');
    }

    public function detallePedido() {
        return $this->hasMany('DetallePedido');
    }

    public function boleta() {
        return $this->hasOne('Boleta');
    }
}
