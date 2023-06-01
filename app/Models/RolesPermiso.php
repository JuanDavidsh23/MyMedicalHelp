<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolesPermiso
 *
 * @property $id
 * @property $IdRol
 * @property $IdPermisos
 * @property $created_at
 * @property $updated_at
 *
 * @property Permiso $permiso
 * @property Rol $rol
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RolesPermiso extends Model
{
    
    static $rules = [
		'IdRol' => 'required',
		'IdPermisos' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['IdRol','IdPermisos'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function permiso()
    {
        return $this->hasOne('App\Models\Permiso', 'id', 'IdPermisos');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rol()
    {
        return $this->hasOne('App\Models\Rol', 'id', 'IdRol');
    }
    

}
