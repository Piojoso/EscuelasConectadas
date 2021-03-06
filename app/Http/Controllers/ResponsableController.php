<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\School;
use Symfony\Component\Console\Input\Input;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Responsables/responsable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Responsables/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $data
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        $valid = $data->validate([
            'name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($valid->fails())
        {
            return View('Responsables/create')->withErrors($valid);
        }

        User::create([
            'name' => $data['name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'rol' => 'ResponsableInscripto',
            'password' => Hash::make($data['password']),
        ]);

        return view('Responsables/responsable');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $responsable
     * @return \Illuminate\Http\Response
     */
    public function show(User $responsable)
    {
        return view('Responsables/show', ['responsable' => $responsable]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $responsable
     * @return \Illuminate\Http\Response
     */
    public function edit(User $responsable)
    {
        return view('Responsables/show', ['responsable' => $responsable]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $data
     * @param  \App\User  $responsable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, User $responsable)
    {
        $reglas = [
            'name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
        ];

        $valid = Validator::make(Input::all(), $reglas);

        if ($valid->fails())
        {
            return view('Responsables/show', ['responsable' => $responsable])->withErrors($valid);
        }

        $responsable->update([
            'name' => $data['name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
        ]);

        return view('Responsables/responsable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $responsable
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $responsable)
    {
        $school = School::where('responsable_id', $responsable->id);

        $school->update([
            'responsable_id' => null
        ]);

        $responsable->delete();

        return view('Responsables/responsable');
    }
}
