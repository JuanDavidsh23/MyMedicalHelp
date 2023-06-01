<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Agenda
 *
 * @property $id
 * @property $fecha
 * @property $hora
 * @property $lugar
 * @property $id_pacientes
 * @property $id_user
 * @property $created_at
 * @property $updated_at
 *
 * @property Paciente $paciente
 * @property Usuario $usuario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Agenda extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'hora' => 'required',
		'lugar' => 'required',
		'id_pacientes' => 'required',
		'id_user' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','hora','lugar','id_pacientes','id_user'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        return $this->hasOne('App\Models\Paciente', 'id', 'id_pacientes');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
    

}
