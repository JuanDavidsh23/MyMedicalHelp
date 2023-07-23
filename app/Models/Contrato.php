<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contrato
 *
 * @property $id
 * @property $idEps
 * @property $costo
 * @property $politicas
 * @property $created_at
 * @property $updated_at
 *
 * @property Ep $ep
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Contrato extends Model
{
    
    static $rules = [
		'idEps' => 'required',
		'fecha_inicio' => 'required',
		'fecha_fin' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idEps','fecha_inicio','fecha_fin','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ep()
    {
        return $this->hasOne('App\Models\Ep', 'id', 'idEps');
    }
    

}
