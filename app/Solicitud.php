<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $fillable = ['nombre', 'serviceskit_id', 'departamento_id', 'puesto_id','estado','prioridad','localidad_id','cedula','supervidor_id','user_id'];
}
