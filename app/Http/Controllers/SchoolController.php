<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Schools/school');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Schools/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $data
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        $reglas = [
            'name' => ['required', 'string', 'max:255'],
            'cue' => ['required', 'numeric', 'max:11'],'name' => $data['name'],
            'avg_number_students' => ['required', 'numeric', 'max:11'],
            'director' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'internal_phone' => ['required', 'numeric', 'max:11'],
            'phone' => ['required', 'numeric', 'max:11'],
            'orientation' => ['required', 'string', 'max:255'],
            'type_id' => ['required', 'numeric', 'max:10'],
            'sector_id' => ['required', 'numeric', 'max:10'],
            'level_id' => ['required', 'numeric', 'max:10'],
            'area_id' => ['required', 'numeric', 'max:10'],
            'typeJourney_id' => ['required', 'numeric', 'max:10'],
            'typeHighSchool_id' => ['required', 'numeric', 'max:10'],
            'category_id' => ['required', 'numeric', 'max:10'],
            'locality_id' => ['required', 'numeric', 'max:10'],
            'responsable_id' => ['required', 'numeric', 'max:10'],
        ];

        $valid = Validator::make(Input::all(), $reglas);

        if ($valid->fails())
        {
            return View('Schools/create')->withErrors($valid);
        }

        foreach(School::all()as $school) {
            if( ($school->cue == $data['cue']) && ($school->level_id == $data['level']) ){
                return View('Docentes.create')->withErrors("Esa escuela ya existe");
            }
            else if($school->email == $data['email']){
                return View('Docentes.create')->withErrors("Ya existe otra escuela con ese correo.");
            }
        }

        if($data['bilingual'] == null){
            $bilingual = false;
        }
        else if($data['bilingual'] == "on"){
            $bilingual = true;
        }

        School::create([
            'name' => $data['name'],
            'cue' => $data['cue'],
            'email' => $data['email'],
            'bilingual' => $bilingual,
            'avg_number_students' => $data['avgStudents'],
            'director' => $data['director'],
            'address' => $data['address'],
            'internal_phone' => $data['internal_phone'],
            'phone' => $data['phone'],
            'orientation' => $data['orientation'],
            'type_id' => $data['type'],
            'sector_id' => $data['sector'],
            'level_id' => $data['level'],
            'area_id' => $data['area'],
            'typeJourney_id' => $data['typeJourney'],
            'typeHighSchool_id' => $data['typeHighSchool'],
            'category_id' => $data['category'],
            'locality_id' => $data['locality'],
            'responsable_id' => $data['responsable']
        ]);

        return view('Schools/school');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return view('Schools/show', ['school' => $school]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('Schools/show', ['school' => $school]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $data
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, School $school)
    {
        $reglas = [
            'name' => ['required', 'string', 'max:255'],
            'cue' => ['required', 'numeric', 'max:11'],'name' => $data['name'],
            'avg_number_students' => ['required', 'numeric', 'max:11'],
            'director' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'internal_phone' => ['required', 'numeric', 'max:11'],
            'phone' => ['required', 'numeric', 'max:11'],
            'orientation' => ['required', 'string', 'max:255'],
            'type_id' => ['required', 'numeric', 'max:10'],
            'sector_id' => ['required', 'numeric', 'max:10'],
            'level_id' => ['required', 'numeric', 'max:10'],
            'area_id' => ['required', 'numeric', 'max:10'],
            'typeJourney_id' => ['required', 'numeric', 'max:10'],
            'typeHighSchool_id' => ['required', 'numeric', 'max:10'],
            'category_id' => ['required', 'numeric', 'max:10'],
            'locality_id' => ['required', 'numeric', 'max:10'],
            'responsable_id' => ['required', 'numeric', 'max:10'],
        ];

        $valid = Validator::make(Input::all(), $reglas);

        if ($valid->fails())
        {
            return view('Schools/show', ['school' => $school])->withErrors($valid);
        }

        if($data['bilingual'] == null){
            $bilingual = false;
        }
        else if($data['bilingual'] == "on"){
            $bilingual = true;
        }

        $school->update([
            'name' => $data['name'],
            'cue' => $data['cue'],
            'email' => $data['email'],
            'bilingual' => $bilingual,
            'avg_number_students' => $data['avgStudents'],
            'director' => $data['director'],
            'address' => $data['address'],
            'internal_phone' => $data['internal_phone'],
            'phone' => $data['phone'],
            'orientation' => $data['orientation'],
            'type_id' => $data['type'],
            'sector_id' => $data['sector'],
            'level_id' => $data['level'],
            'area_id' => $data['area'],
            'typeJourney_id' => $data['typeJourney'],
            'typeHighSchool_id' => $data['typeHighSchool'],
            'category_id' => $data['category'],
            'locality_id' => $data['locality'],
            'responsable_id' => $data['responsable']]
        );

        return view('Schools/school');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $school->delete();

        return view('Schools/school');
    }
}
