<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';

    protected $fillable = ['nombres', 'apellidos', 'dni', 'fecha_nacimiento',
                            'telefono', 'direccion', 'tipo'];

    public function tipoEmpleado() {
        return $this->belongsTo('TipoEmpleado');
    }

    public function pedidos() {
        return $this->hasMany('Pedido');
    }
}
