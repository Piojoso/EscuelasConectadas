<?php

namespace App\Http\Controllers;

use App\School;
use App\Teacher;
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

        $teacher->schools()->updateExistingPivot($school, [
            'division' => $data['division'],
            'hours' => $data['hours'],
            'class' => $data['class'],
            'situacionRevista' => $data['situacionRevista']
        ]);
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
    }
}
