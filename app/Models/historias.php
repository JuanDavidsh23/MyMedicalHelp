<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historias extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id','observaciones','procedimientos','recomendaciones','pacientes_id'];
}
