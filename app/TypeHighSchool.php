<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeHighSchool extends Model
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
     * Obtener todas las escuelas con determinado tipo de Secundaria
     */
    public function schools(){
        return $this->hasMany('App\School');
    }
}
