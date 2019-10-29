<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeJourney extends Model
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
     * Obtener todas las escuelas con determinado tipo de Jornada
     */
    public function schools(){
        return $this->hasMany('App\School');
    }
}
