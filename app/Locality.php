<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    /**
     * Atributos asignables
     *
     * @var array
     */
    protected $fillable = [
        'name', 'department_id'
    ];

    /**
     * Obtener el departamento al cual pertenece determinada Localidad.
     */
    public function department(){
        return $this->belongsTo('App\Department');
    }

    /**
     * Obtener todas las escuelas de determinada Localidad.
     */
    public function schools(){
        return $this->hasMany('App\School');
    }

    /**
     * Obtener todos los profesores en determinada Localidad.
     */
    public function teachers(){
        return $this->hasMany('App\Teacher');
    }
}
