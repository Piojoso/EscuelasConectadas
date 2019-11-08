<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $data
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        User::create([
            'name' => $data['name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'rol' => 'Administrador',
            'password' => Hash::make($data['password'])
        ]);

        return view('Admin/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(User $admin)
    {
        return view('Admin/show', ['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        return view('Admin/show', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $data
     * @param  \App\User  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, User $admin)
    {
        $admin->update([
            'name' => $data['name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
        ]);

        return view('Admin/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $admin->delete();

        return view('Admin/admin');
    }
}
