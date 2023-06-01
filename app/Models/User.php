<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $apellido
 * @property $telefono
 * @property $direccion
 * @property $ciudad
 * @property $departamemnto
 * @property $cedula
 * @property $zona
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Agenda[] $agendas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Model
{
    
    static $rules = [
		'name' => 'required',
		'apellido' => 'required',
		'telefono' => 'required',
		'direccion' => 'required',
		'ciudad' => 'required',
		'departamemnto' => 'required',
		'cedula' => 'required',
		'zona' => 'required',
		'email' => 'required',
        'password' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','apellido','telefono','direccion','ciudad','departamemnto','cedula','zona','email','password','IdRol'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agendas()
    {
        return $this->hasMany('App\Models\Agenda', 'id_user', 'id');
    }
    

}
