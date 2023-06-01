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
		'costo' => 'required',
		'politicas' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idEps','costo','politicas'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ep()
    {
        return $this->hasOne('App\Models\Ep', 'id', 'idEps');
    }
    

}
