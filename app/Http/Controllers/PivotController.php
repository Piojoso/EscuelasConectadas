<?php

namespace App\Http\Controllers;

use App\School;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PivotController extends Controller
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
        return view('Teachers/teacher');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('Teachers/teacher');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pivot = DB::select('select * from school_teacher where id = ?', [$id]);
        return view('Teachers/pivot', ['pivot' => $pivot[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pivot = DB::select('select * from school_teacher where id = ?', [$id]);
        return view('Teachers/pivot', ['pivot' => $pivot[0]]);
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
        DB::update('update school_teacher set division = :division, hours = :hours, class = :class, situacionRevista = :situacionRevista where id = :id', [
            'id' => $id,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('Teachers/teacher');
    }
}
