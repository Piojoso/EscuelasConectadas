<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Teachers/teacher');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Teachers/create');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cuil' => ['required', 'unique', 'number'],
            'first_name' => ['string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'sex' => ['required'],
            'degree' => ['required', 'string', 'max:255'],
            'degree_category' => ['required', 'string', 'max:255'],
            'locality' => ['required', 'number']
        ]);
    }
    */
    /* NO WORK */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $data
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        $valid = $data->validate([
            'cuil' => ['required', 'unique:teachers', 'numeric'],
            'first_name' => ['string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'sex' => ['required'],
            'degree' => ['required', 'string', 'max:255'],
            'degree_category' => ['required', 'string', 'max:255'],
            'locality' => ['required', 'numeric']
        ]);

        dd($valid);

        $teacher = Teacher::create([
            'cuil' => $data['cuil'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'sex' => $data['sex'],
            'degree' => $data['degree'],
            'degree_category' => $data['degree_category'],
            'locality_id' => $data['locality'],
        ]);

        $teacher->schools()->attach($data['school'], [
            'division' => $data['division'],
            'hours' => $data['hours'],
            'class' => $data['class'],
            'situacionRevista' => $data['situacionRevista']
        ]);

        return view('Teachers/teacher');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('Teachers/show', ['teacher' => $teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('Teachers/show', ['teacher' => $teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $data
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, Teacher $teacher)
    {
        dd($data);
        $validated = $data->validate([
            'cuil' => ['required', 'unique:teachers', 'numeric'],
            'first_name' => ['string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'sex' => ['required'],
            'degree' => ['required', 'string', 'max:255'],
            'degree_category' => ['required', 'string', 'max:255'],
            'locality' => ['required', 'numeric']
        ]);
        dd('guarda');

        $teacher->update([
            'cuil' => $data['cuil'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'sex' => $data['sex'],
            'degree' => $data['degree'],
            'degree_category' => $data['degree_category'],
            'locality_id' => $data['locality'],
        ]);

        $teacher->schools()->updateExistingPivot($data['school'], [
                                    'division' => $data['division'],
                                    'hours' => $data['hours'],
                                    'class' => $data['class'],
                                    'situacionRevista' => $data['situacionRevista']
                                    ]);

        return view('Teachers/teacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $schools = $teacher->schools();

        foreach($schools as $school){
            $teacher->schools()->detach($school);
        }

        $teacher->delete();

        return view('Teachers/teacher');
    }
}
