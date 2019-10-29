<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /**
     * Atributos asignables
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cue', 'email', 'bilingual', 'avg_number_students', 'director', 'address',
        'internal_phone', 'phone', 'orientation', 'type_id', 'sector_id', 'level_id', 'area_id',
        'typeJourney_id', 'typeHighSchool_id', 'category_id', 'locality_id', 'responsable_id'
    ];

    /**
     * Obtener el tipo de la escuela
     */
    public function type(){
        return $this->belongTo('App\Type');
    }

    /**
     * Obtener el sector de la escuela.
     */
    public function sector(){
        return $this->belongsTo('App\Sector');
    }

    /**
     * Obtener el nivel de la escuela.
     */
    public function level(){
        return $this->belongsTo('App\Level');
    }

    /**
     * Obtener el ambito de la escuela.
     */
    public function area(){
        return $this->belongsTo('App\Area');
    }

    /**
     * Obtener el tipo de Jornada de la escuela.
     */
    public function typeJourney(){
        return $this->belongsTo('App\TypeJourney');
    }

    /**
     * Obtener el tipo de Secundaria de la escuela.
     */
    public function typeHighSchool(){
        return $this->belongsTo('App\TypeHighSchool');
    }

    /**
     * Obtener el tipo de categoria de la escuela.
     */
    public function category(){
        return $this->belongsTo('App\Category');
    }

    /**
     * Obtener la localidad de la escuela.
     */
    public function locality(){
        return $this->belongsTo('App\Locality');
    }

    /**
     * Obtener el responsable Inscripto.
     */
    public function responsable(){
        return $this->belongsTo('App\User');
    }

    /**
     * Obtener todos los docentes en la escuela.
     */
    public function teachers(){
        return $this->belongsToMany('App\Teacher');
    }
}
