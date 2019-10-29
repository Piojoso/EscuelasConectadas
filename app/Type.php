<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
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
     * Obtener todas las escuelas con determinado tipo
     */
    public function schools(){
        return $this->hasMany('App\School');
    }
}
