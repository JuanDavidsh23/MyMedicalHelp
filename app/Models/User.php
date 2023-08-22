<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    static $rules = [
		'name' => 'required',
		'apellido' => 'required',
		'telefono' => 'required',
		'direccion' => 'required',
		'ciudad' => 'required',
		'cedula' => 'required',
		'zona' => 'required',
		'email' => 'required',
        'password' => 'required',
        'IdRol' => 'required',
        'idContrato' => 'required',

     
    ];

    protected $perPage = 20;
/**
     *
     * @var array
     */
    protected $fillable = [
        'name', 'apellido', 'telefono', 'direccion', 'ciudad', 'cedula', 'zona',
        'email', 'estado', 'password', 'IdRol', 'idContrato'
    ];
    
   protected $hidden = [
       'password',
       'remember_token',
   ];

   /**
    * The attributes that should be cast.
    *
    * @var array<string, string>
    */
   protected $casts = [
       'email_verified_at' => 'datetime',
       'password' => 'hashed',
   ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agendas()
    {
        return $this->hasMany('App\Models\Agenda', 'id_user', 'id');
    }
}
 
