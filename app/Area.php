<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
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
     * Obtener todas las escuelas con determinado ambito
     */
    public function schools(){
        return $this->hasMany('App\School');
    }
}
