<?php

namespace App\Http\Controllers;

use App\Imports\OMImport;
use App\OrdenMerito;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('OM/om');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $data
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        //
        $numError = 0;

        if($data->hasFile('OM')){
            if($data->file('OM')->isValid()){
                if($data->file('OM')->extension() == 'xls'){
                    $path = $data->file('OM');

                }
                else{ return "Solo se permiten archivos xls"; }
            }
            else{ return "Hubo un error al subir el archivo"; }
        }
        else{ return "No se envio ningun archivo"; }

        $rows = Excel::toArray(new OMImport, $path);

        $rows = $rows[0];
        $i = 0;

        ini_set('max_execution_time', 300);
        foreach ($rows as $row)
        {
            if($i >= 2){
                OrdenMerito::create([
                    'region' => $row[0],
                    'nivel' => $row[1],
                    'apellido' => $row[2],
                    'nombre' => $row[3],
                    'cuil' => $row[4],
                    'sexo' => $row[5],
                    'localidad' => $row[6],
                    'cargo' => $row[7],
                    'titulo_1' => $row[8],
                    'titulo_2' => $row[9],
                    'incumbencia' => $row[10],
                ]);
            }
            $i++;
        }

        return view('OM/om');
        // si todo ok,
            // llamo a store con el arreglo para que lo guarde
        // si no
            // llamo a vista create para arreglar las cagadas
                // y desde vista create llamo a store cuando las cagadas esten arregladas.
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrdenMerito  $ordenMerito
     * @return \Illuminate\Http\Response
     */
    public function show($ordenMerito)
    {
        $orden = OrdenMerito::find($ordenMerito);
        return view('OM/show', ['om' => $orden]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrdenMerito  $ordenMerito
     * @return \Illuminate\Http\Response
     */
    public function edit($ordenMerito)
    {
        $orden = OrdenMerito::find($ordenMerito);
        return view('OM/show', ['om' => $orden]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $data
     * @param  \App\OrdenMerito  $ordenMerito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, $ordenMerito)
    {
        $orden = OrdenMerito::find($ordenMerito);

        if(isset($data['titulo_2'])){
            $titulo_2 = $data['titulo_2'];
        }else{
            $titulo_2 = null;
        }

        $orden->update([
            'region' => $data['region'],
            'nivel' => $data['nivel'],
            'apellido' => $data['apellido'],
            'nombre' => $data['nombre'],
            'cuil' => $data['cuil'],
            'sexo' => $data['sexo'],
            'localidad' => $data['localidad'],
            'cargo' => $data['cargo'],
            'titulo_1' => $data['titulo_1'],
            'titulo_2' => $titulo_2,
            'incumbencia' => $data['incumbencia'],
        ]);

        return view('OM/om');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrdenMerito->id  $ordenMerito
     * @return \Illuminate\Http\Response
     */
    public function destroy($ordenMerito)
    {
        $orden = OrdenMerito::find($ordenMerito);
        $orden->delete();
        return view('OM/om');
    }
}
