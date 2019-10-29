<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * Atributos asignables
     *
     * @var array
     */
    protected $fillable = [
        'cuil', 'firt_name', 'last_name', 'sex', 'degree', 'degree_category', 'locality_id'
    ];

    /**
     * Obtener la localidad del Docente.
     */
    public function locality(){
        return $this->belongsTo('App\Locality');
    }

    /**
     * Obtener todas las escuelas en las que trabaja el Docente.
     */
    public function schools(){
        return $this->belongsToMany('App\School');
    }
}
