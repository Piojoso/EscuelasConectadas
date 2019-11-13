<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\InformesController;

Route::get('/', function () {
    if(Auth::check()){
        return view('home');
    }else{
        return view('auth/login');
    }
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

// CRUD Scools
Route::resource('schools', 'SchoolController')->middleware('admin');

// CRUD Admins
Route::resource('admins', 'AdminController')->middleware('admin');

// CRUD Responsables
Route::resource('responsables', 'ResponsableController')->middleware('admin');

// CRUD Orden de Merito
Route::resource('om', 'OMController')->middleware('admin');

// CRUD Teachers
Route::resource('teachers', 'TeacherController')->middleware('admin');

// Add teacher to a School, and return view to Modify intermediate table
Route::get('plantaDocente/add/{id}', function ($id) {
    $teacher = App\Teacher::find($id);

    $school = App\School::where('responsable_id', Auth::user()->id)->first();

    $teacher->schools()->attach($school, [
        'division' => 'example',
        'hours' => 8,
        'class' => 'Math',
        'situacionRevista' => 'Titular'
    ]);

    $pivot = $teacher->schools->where('id', '=', $school->id)->first()->pivot;

    return view('PlantaDocente/show', ['teacher' => $teacher, 'pivot' => $pivot]);
});

// Planta Docente
Route::resource('plantaDocente', 'PlantaDocenteController')->except('edit');

//
Route::resource('pivots', 'PivotController')->only(['show', 'update']);

Route::get('escuelaPorProvincia', 'InformesController@escuelaPorProvincia');
Route::post('escuelaPorProvincia', 'InformesController@escuelaPorProvinciaShow')->name('escuelaPorProvincia.show');

Route::get('cantPersonasYCargos', 'InformesController@countPersonasYCargos');
Route::post('cantPersonasYCargos', 'InformesController@countPersonasYCargosShow')->name('cantPersonasYCargos.show');

Route::get('cantPersonasYInscripciones', 'InformesController@countPersonasYInscripciones');
Route::post('cantPersonasYInscripciones', 'InformesController@countPersonasYInscripcionesShow')->name('cantPersonasYInscripciones.show');

Route::get('cantPersonasSinCargo', 'InformesController@countPersonasSinCargo');
Route::post('cantPersonasSinCargo', 'InformesController@countPersonasSinCargoShow')->name('cantPersonasSinCargo.show');

Route::get('cantEscuelasSinResponsable', 'InformesController@countEscuelasSinResponsable');
Route::post('cantEscuelasSinResponsable', 'InformesController@countEscuelasSinResponsableShow')->name('cantEscuelasSinResponsable.show');

Route::get('cantEscuelasRurales', 'InformesController@countEscuelasRurales');
Route::post('cantEscuelasRurales', 'InformesController@countEscuelasRuralesShow')->name('cantEscuelasRurales.show');

Route::get('alumnosInforme', 'InformesController@alumnosInforme');
Route::post('alumnosInforme', 'InformesController@alumnosInformeShow')->name('alumnosInforme.show');
