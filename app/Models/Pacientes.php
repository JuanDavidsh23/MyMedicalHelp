<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pacientes extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id','nombre','apellido','correo','telefono','direccion','ciudad','documento','idEps'];
}
