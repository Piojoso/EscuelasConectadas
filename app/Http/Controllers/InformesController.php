<?php

namespace App\Http\Controllers;

use App\Level;
use App\School;
use App\Locality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformesController extends Controller
{

    /**
     * Total de Escuelas por Provincia, Departamento y Localidad
     * discriminadas por Sector, Tipo de Escuela y Nivel.
     *
     */
    public function escuelaPorProvincia()
    {
        return view('informes/escuelaPorProvincia');
    }

    public function escuelaPorProvinciaShow(Request $data)
    {
        #region $locality
        $localidad[] = DB::select('
            select count(schools.id) as cantSchools
            from schools
            where locality_id = :locality
            and level_id = :level', [
                'locality' => $data['locality'],
                'level' => $data['level']
        ]);
        $localidad[] = DB::select('
            select count(schools.id) as cantSchools
            from schools
            where locality_id = :locality
            and sector_id = :sector', [
                'locality' => $data['locality'],
                'sector' => $data['sector']
        ]);
        $localidad[] = DB::select('
            select count(schools.id) as cantSchools
            from schools
            where locality_id = :locality
            and typeHighSchool_id = :typeSchool', [
                'locality' => $data['locality'],
                'typeSchool' => $data['typeHighSchool']
        ]);
        $localidad[] = $localidad[0][0]->cantSchools + $localidad[1][0]->cantSchools + $localidad[2][0]->cantSchools;
        #endregion

        #region $departamento
        $departamento[] = DB::select('
            select count(schools.id) as cantSchools
            from schools
            where locality_id in
                (select localities.id
                from localities
                join departments on (department_id = departments.id)
                where department_id = :department)
            and level_id = :level', [
                'department' => $data['department'],
                'level' => $data['level']
        ]);
        $departamento[] = DB::select('
            select count(schools.id) as cantSchools
            from schools
            where locality_id in
                (select localities.id
                from localities
                join departments on (department_id = departments.id)
                where department_id = :department)
            and sector_id = :sector', [
                'department' => $data['department'],
                'sector' => $data['sector']
        ]);
        $departamento[] = DB::select('
            select count(schools.id) as cantSchools
            from schools
            where locality_id in
                (select localities.id
                from localities
                join departments on (department_id = departments.id)
                where department_id = :department)
            and typeHighSchool_id = :typeSchool', [
                'department' => $data['department'],
                'typeSchool' => $data['typeHighSchool']
        ]);
        $departamento[] = $departamento[0][0]->cantSchools + $departamento[1][0]->cantSchools + $departamento[2][0]->cantSchools;
        #endregion

        #region $provincia
        $provincia[] = DB::select('
            select count(schools.id) as cantSchools
            from schools
            where locality_id in
                (select localities.id
                from localities
                join departments on (department_id = departments.id)
                where department_id in
                    (select departments.id
                    from departments
                    join provinces on (province_id = provinces.id)
                    where province_id = :province))
            and level_id = :level', [
                'province' => $data['province'],
                'level' => $data['level']
        ]);
        $provincia[] = DB::select('
            select count(schools.id) as cantSchools
            from schools
            where locality_id in
                (select localities.id
                from localities
                join departments on (department_id = departments.id)
                where department_id in
                    (select departments.id
                    from departments
                    join provinces on (province_id = provinces.id)
                    where province_id = :province))
            and sector_id = :sector', [
            'province' => $data['province'],
            'sector' => $data['sector']
        ]);
        $provincia[] = DB::select('
            select count(schools.id) as cantSchools
            from schools
            where locality_id in
                (select localities.id
                from localities
                join departments on (department_id = departments.id)
                where department_id in
                    (select departments.id
                    from departments
                    join provinces on (province_id = provinces.id)
                    where province_id = :province))
            and typeHighSchool_id = :typeSchool', [
            'province' => $data['province'],
            'typeSchool' => $data['typeHighSchool']
        ]);
        $provincia[] = $provincia[0][0]->cantSchools + $provincia[1][0]->cantSchools + $provincia[2][0]->cantSchools;
        #endregion

        $respuesta = $data;
        return view('informes/escuelaPorProvincia', ['respuesta' => $respuesta, 'localidad' => $localidad, 'departamento' => $departamento, 'provincia' => $provincia]);
    }

    /**
     * Cantidad de Personas y Promedio de cargos por persona
     * discriminados por Departamento y Localidad
     *
     */
    public function countPersonasYCargos()
    {
        return view('informes/cantPersonasYCargos');
    }

    public function countPersonasYCargosShow(Request $data)
    {
        $localidadName = Locality::find($data['locality'])->name;

        $localidad[] = DB::selectOne('
            select count(DISTINCT cuil) as cantPersonas
            from orden_meritos
            where localidad = :localidad', [
                'localidad' => $localidadName
        ]);

        $localidad[] = DB::selectOne('
            select count(cargo) / count(Distinct cargo) as avgCargo
            from orden_meritos
            where localidad = :localidad', [
                'localidad' => $localidadName,
        ]);

        $departamento[] = DB::selectOne('
            select count(DISTINCT cuil) as cantPersonas
            from orden_meritos
            where localidad in
                (select localities.name
                from localities
                join departments on (department_id = departments.id)
                where departments.id = :department)', [
                'department' => $data['department'],
        ]);

        $departamento[] = DB::selectOne('
            select count(cargo) / count(Distinct cargo) as avgCargo
            from orden_meritos
            where localidad in
                (select localities.name
                from localities
                join departments on (department_id = departments.id)
                where departments.id = :department)', [
                'department' => $data['department'],
        ]);

        $respuesta = $data;
        return view('informes/cantPersonasYCargos', ['respuesta' => $respuesta, 'localidad' => $localidad, 'departamento' => $departamento]);
    }

    /**
     * Cantidad de Personas y Promedio de Inscripciones
     * discriminados por departamento y localidad
     *
     */
    public function countPersonasYInscripciones()
    {
        return view('informes/cantPersonasYInscripciones');
    }

    public function countPersonasYInscripcionesShow(Request $data)
    {
        $localidadName = Locality::find($data['locality'])->name;

        $localidad[] = DB::selectOne('
            select count(DISTINCT cuil) as cantPersonas
            from orden_meritos
            where localidad = :localidad', [
                'localidad' => $localidadName
        ]);

        $localidad[] = DB::selectOne('
            select count(id)/count(distinct cuil) as avgInscripciones
            from orden_meritos
            where localidad = :localidad', [
                'localidad' => $localidadName,
        ]);

        $departamento[] = DB::selectOne('
            select count(distinct cuil) as cantPersonas
            from orden_meritos
            where localidad in
                (select localities.name
                from localities
                join departments on (department_id = departments.id)
                where departments.id = :department)', [
                    'department' => $data['department'],
        ]);

        $departamento[] = DB::selectOne('
            select count(id)/count(distinct cuil) as avgInscripciones
            from orden_meritos
            where localidad in
                (select localities.name
                from localities
                join departments on (department_id = departments.id)
                where departments.id = :department)', [
                'department' => $data['department'],
        ]);

        $respuesta = $data;
        return view('informes/cantPersonasYInscripciones', ['respuesta' => $respuesta, 'localidad' => $localidad, 'departamento' => $departamento]);
    }

    /**
     * Cantidad de Personas inscriptas en junta sin un cargo frente alumnos
     * discriminados por Departamento Localidad.
     */
    public function countPersonasSinCargo()
    {
        return view('informes/cantPersonasSinCargo');
    }
    public function countPersonasSinCargoShow(Request $data)
    {
        $localidadName = Locality::find($data['locality'])->name;

        $localidad[] = DB::selectOne('
            select count(DISTINCT cuil) as cantPersonas
            from orden_meritos
            where cuil not in
                (select cuil
                from teachers)
            and localidad = :localidad', [
                'localidad' => $localidadName
        ]);

        $departamento[] = DB::selectOne('
            select count(DISTINCT cuil) as cantPersonas
            from orden_meritos
            where cuil not in
                (select cuil
                from teachers)
            and localidad in
                (select localities.name
                from localities
                join departments on (department_id = departments.id)
                where departments.id = :department)', [
            'department' => $data['department'],
        ]);

        $respuesta = $data;
        return view('informes/cantPersonasSinCargo', ['respuesta' => $respuesta, 'localidad' => $localidad, 'departamento' => $departamento]);
    }

    /**
     * Cantidad de escuelas sin Responsable
     * discriminados por Departamento y Localidad.
     */
    public function countEscuelasSinResponsable()
    {
        return view('informes/cantEscuelasSinResponsable');
    }
    public function countEscuelasSinResponsableShow(Request $data)
    {
        $localidad[] = DB::selectOne('
            select count(DISTINCT id) as cantSchools
            from schools
            where responsable_id is null
            and locality_id = :localidad', [
                'localidad' => $data['locality']
        ]);

        $departamento[] = DB::selectOne('
            select count(DISTINCT id) as cantSchools
            from schools
            where responsable_id is null
            and locality_id in
                (select localities.id
                from localities
                join departments on (department_id = departments.id)
                where departments.id = :department)', [
            'department' => $data['department'],
        ]);

        $respuesta = $data;
        return view('informes/cantEscuelasSinResponsable', ['respuesta' => $respuesta, 'localidad' => $localidad, 'departamento' => $departamento]);
    }

    /**
     * Cantidad de escuelas Rurales
     * discriminados por Departamento y Localidad.
     */
    public function countEscuelasRurales()
    {
        return view('informes/cantEscuelasRurales');
    }
    public function countEscuelasRuralesShow(Request $data)
    {
        $localidad[] = DB::selectOne('
            select count(DISTINCT id) as cantSchools
            from schools
            where area_id = 2
            and locality_id = :localidad', [
                'localidad' => $data['locality']
        ]);

        $departamento[] = DB::selectOne('
            select count(DISTINCT id) as cantSchools
            from schools
            where area_id = 2
            and locality_id in
                (select localities.id
                from localities
                join departments on (department_id = departments.id)
                where departments.id = :department)', [
            'department' => $data['department'],
        ]);

        $respuesta = $data;
        return view('informes/cantEscuelasRurales', ['respuesta' => $respuesta, 'localidad' => $localidad, 'departamento' => $departamento]);
    }

    /**
     * Cantidad Total de Promedio de Alumnos SUM, y Promedio de promedio de alumnos AVG
     * discriminados por Departamento Y Localidad
     */
    public function alumnosInforme()
    {
        return view('informes/alumnosInforme');
    }
    public function alumnosInformeShow(Request $data)
    {
        $localidad[] = DB::selectOne('
            select sum(avg_number_students) as sumAVGStudent
            from schools
            where locality_id = :locality', [
                'locality' => $data['locality']
        ]);

        $localidad[] = DB::selectOne('
            select avg(avg_number_students) as avgAVGStudent
            from schools
            where locality_id = :locality', [
                'locality' => $data['locality']
        ]);

        $departamento[] = DB::selectOne('
            select sum(avg_number_students) as sumAVGStudent
            from schools
            where locality_id in (
                select localities.id
                from localities
                where department_id = :department)', [
                    'department' => $data['department']
        ]);

        $departamento[] = DB::selectOne('
            select avg(avg_number_students) as avgAVGStudent
            from schools
            where locality_id in (
                select localities.id
                from localities
                where department_id = :department)', [
                    'department' => $data['department']
        ]);

        $respuesta = $data;
        return view('informes/alumnosInforme', ['respuesta' => $respuesta, 'localidad' => $localidad, 'departamento' => $departamento]);
    }

}
