<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenMerito extends Model
{
    /**
     * Atributos asignables
     *
     * @var array
     */
    protected $fillable = [
        'region',
        'nivel',
        'apellido',
        'nombre',
        'cuil',
        'sexo',
        'localidad',
        'cargo',
        'titulo_1',
        'titulo_2',
        'incumbencia'
    ];
}
