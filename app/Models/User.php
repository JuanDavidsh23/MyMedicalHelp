<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    
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
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','apellido','telefono','direccion','ciudad','cedula','zona','email','password','IdRol','idContrato'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agendas()
    {
        return $this->hasMany('App\Models\Agenda', 'id_user', 'id');
    }
}
