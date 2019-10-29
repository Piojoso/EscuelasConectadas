<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    /**
     * Atributos asignables
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Obtener todos los departamentos de determinada Provincia.
     */
    public function departments(){
        return $this->hasMany('App\Department');
    }
}
