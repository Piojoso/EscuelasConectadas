<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
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
     * Obtener todas las escuelas con determinado sector
     */
    public function schools() {
        return $this->hasMany('App\School');
    }
}
