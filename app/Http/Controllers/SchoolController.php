<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

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
        echo ('Hello World');
        var_dump($data);
        /*
        return School::create([
            'name' => $data['name'],
            'cue' => $data['cue'],
            'email' => $data['email'],
            'bilingual' => $data['bilingual'],
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
        ]);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return view('Schools/show', $school);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('School/show', $school);
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
        $school->name = $data['name'];
        $school->cue = $data['cue'];


        $school->save();
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
    }
}
