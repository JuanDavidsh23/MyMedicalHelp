<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles_permisos extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id','idRol','idPermisos'];
}
