<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Atributos Cargables
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Obtener todas las escuelas con determinada categoria
     */
    public function schools(){
        return $this->hasMany('App\School');
    }
}
