<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Historia
 *
 * @property $id
 * @property $observaciones
 * @property $procedimientos
 * @property $recomendaciones
 * @property $pacientes_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Paciente $paciente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Historia extends Model
{
    
    static $rules = [
		'observaciones' => 'required',
		'procedimientos' => 'required',
		'recomendaciones' => 'required',
		'pacientes_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['observaciones','procedimientos','recomendaciones','pacientes_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        return $this->hasOne('App\Models\Paciente', 'id', 'pacientes_id');
    }
    

}
