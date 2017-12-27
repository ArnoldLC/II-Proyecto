<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEmpleado extends Model
{
    protected $table = 'tipoempleado';

    protected $fillable = ['tipo'];

    public function empleados() {
        return $this->hasMany('Empleado');
    }
}
