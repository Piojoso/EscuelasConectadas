<?php

namespace App\Http\Controllers;

use App\School;
use App\Teacher;
use Symfony\Component\Console\Input\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantaDocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school = School::where('responsable_id', Auth::user()->id)->first();

        return view('PlantaDocente.plantaDocente', ['school' => $school]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lista = [];
        $enEscuela = false;
        $teachers = Teacher::all();
        foreach ($teachers as $teacher){
            if(count($teacher->schools) != 0){
                foreach($teacher->schools as $school){
                    if($school->responsable_id == Auth::user()->id){
                        $enEscuela = true;
                    }
                }
                if($enEscuela == false){
                    $lista[] = $teacher;
                }
            }else{
                $lista[] = $teacher;
            }
        }
        return view('PlantaDocente.add', ['teachers' => $lista]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data, $teacher)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);

        $school = School::where('responsable_id', Auth::user()->id)->first();

        $pivot = $teacher->schools->where('id', '=', $school->id)->first()->pivot;

        return view('PlantaDocente/show', ['teacher' => $teacher, 'pivot' => $pivot]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $data
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, $id)
    {
        $teacher = Teacher::find($id);

        $school = School::where('responsable_id', Auth::user()->id)->first();

        $pivot = $teacher->schools->where('id', '=', $school->id)->first()->pivot;

        $valid = $data->validate([
            'division' => ['required', 'string', 'max:255'],
            'hours' => ['required', 'numeric', 'max:11'],
            'class' => ['required', 'string', 'max:255'],
        ]);

        if ($valid->fails())
        {
            return view('PlantaDocente/show', ['teacher' => $teacher, 'pivot' => $pivot])->withErrors($valid);
        }

        $teacher->schools()->updateExistingPivot($school, [
            'division' => $data['division'],
            'hours' => $data['hours'],
            'class' => $data['class'],
            'situacionRevista' => $data['situacionRevista']
        ]);

        return view('PlantaDocente.plantaDocente', ['school' => $school]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);

        $school = School::where('responsable_id', Auth::user()->id)->first();

        $teacher->schools()->detach($school);

        return view('PlantaDocente.plantaDocente', ['school' => $school]);
    }

    /**
     * Search by Teacher's last_name
     */
    public function search(Request $data)
    {
        $lista = [];
        $enEscuela = false;
        $teachers = Teacher::all();
        foreach ($teachers as $teacher){
            if(count($teacher->schools) != 0){
                foreach($teacher->schools as $school){
                    if($school->responsable_id == Auth::user()->id){
                        $enEscuela = true;
                    }
                }
                if($enEscuela == false){
                    $lista[] = $teacher;
                }
            }else{
                $lista[] = $teacher;
            }
        }

        if($data['patron'] != null){

            $teachers = [];

            foreach ($lista as $teacher) {
                if(strpos($teacher->last_name, $data['patron']) !== false)
                {
                    $teachers[] = $teacher;
                }
            }
        }
        else{
            $teachers = $lista;
        }

        return view('PlantaDocente.add', ['teachers' => $teachers]);
    }

    /**
     * Filtra por la Localidad del Teacher
     */
    public function filter(Request $data)
    {

        $lista = [];
        $enEscuela = false;
        $teachers = Teacher::all();
        foreach ($teachers as $teacher){
            if(count($teacher->schools) != 0){
                foreach($teacher->schools as $school){
                    if($school->responsable_id == Auth::user()->id){
                        $enEscuela = true;
                    }
                }
                if($enEscuela == false){
                    $lista[] = $teacher;
                }
            }else{
                $lista[] = $teacher;
            }
        }

        $teachers = [];

        foreach ($lista as $teacher) {
            if($teacher->locality_id == $data['locality'])
            {
                $teachers[] = $teacher;
            }
        }

        return view('PlantaDocente.add', ['teachers' => $teachers]);
    }
}
