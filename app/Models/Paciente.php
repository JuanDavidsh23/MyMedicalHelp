<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paciente
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $correo
 * @property $telefono
 * @property $direccion
 * @property $ciudad
 * @property $documento
 * @property $idEps
 * @property $created_at
 * @property $updated_at
 *
 * @property Agenda[] $agendas
 * @property Ep $ep
 * @property Historia[] $historias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paciente extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellido' => 'required',
		'correo' => 'required',
		'telefono' => 'required',
		'direccion' => 'required',
		'ciudad' => 'required',
		'documento' => 'required',
		'idEps' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido','correo','telefono','direccion','ciudad','documento','idEps'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agendas()
    {
        return $this->hasMany('App\Models\Agenda', 'id_pacientes', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ep()
    {
        return $this->hasOne('App\Models\Ep', 'id', 'idEps');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historias()
    {
        return $this->hasMany('App\Models\Historia', 'pacientes_id', 'id');
    }
    

}
