<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * Atributos asignables
     *
     * @var array
     */
    protected $fillable = [
        'num_Region', 'name', 'province_id'
    ];

    /**
     * Obtener la provincia a la que pertenece determinado Departamento.
     */
    public function Province(){
        return $this->belongsTo('App\Province');
    }

    /**
     * Obtener todas las localidades de determinado Departamento.
     */
    public function Localities(){
        return $this->hasMany('App\Locality');
    }
}
