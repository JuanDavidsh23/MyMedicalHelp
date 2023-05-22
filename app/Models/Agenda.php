<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id','fecha','hora','lugar','id_user','id_pacientes'];

}
