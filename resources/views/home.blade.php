@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Lobby</div>

                <div class="card-body">
                    <div class="container">

                        @if (auth()->user()->rol == 'Administrador')
                            <!-- User Administration -->
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{ __('User Administration:') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Admin Users -->
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a class="link text-center" href="{{ route('admins.index') }}">
                                                                {{ __('Admins') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Responsable Users -->
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a class="link text-center" href="{{ route('responsables.index') }}">
                                                                {{ __('Responsables') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Teachers and School Administration -->
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{ __('Teacher & School Administration:') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Teacher Users -->
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a class="link text-center" href="{{ route('teachers.index') }}">
                                                                {{ __('Teachers') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- School Users -->
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a class="link text-center" href="{{ route('schools.index') }}">
                                                                {{ __('School') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Informes -->
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{ __('Informes:') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Escuelas Por Provincias - Cantidad de Maestros y Promedios de cargos -->
                                    <div class="row mb-3">
                                        <!-- Escuelas Por Provincias -->
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a class="link text-center" href="{{ url('escuelaPorProvincia') }}">
                                                                {{ __('Escuelas Por Provincias') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Cantidad de Maestros y Promedios de cargos -->
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a class="link text-center" href="{{ url('cantPersonasYCargos') }}">
                                                                {{ __('Cantidad de Maestros y Promedios de cargos') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Cantidad de Personas y Promedio de Inscripciones - Cantidad de Personas inscriptas en junta sin un cargo frente alumnos -->
                                    <div class="row mb-3">
                                        <!-- Cantidad de Personas y Promedio de Inscripciones -->
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a class="link text-center" href="{{ url('cantPersonasYInscripciones') }}">
                                                                {{ __('Cantidad de Personas y Promedio de Inscripciones ') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Cantidad de Personas inscriptas en junta sin un cargo frente alumnos -->
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a class="link text-center" href="{{ url('cantPersonasSinCargo') }}">
                                                                {{ __('Cantidad de Personas inscriptas sin un cargo') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Escuelas sin Representantes - Cantidad Escuelas Rurales - Promedio de alumnos -->
                                    <div class="row mb-3">
                                        <!-- Escuelas sin Representantes -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a class="link text-center" href="{{ url('cantEscuelasSinResponsable') }}">
                                                                {{ __('Escuelas sin Representantes') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Cantidad Escuelas Rurales -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a class="link text-center" href="{{ url('cantEscuelasRurales') }}">
                                                                {{ __('Cantidad Escuelas Rurales') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Promedio de alumnos -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a class="link text-center" href="{{ url('alumnosInforme') }}">
                                                                {{ __('Promedio de alumnos') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- OM Administration -->
                            <div class="card mb-3"">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{ __('Orden de Merito Administration:') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- OM -->
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a class="link text-center" href="{{ route('om.index') }}">
                                                                {{ __('Orden de Meritos') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Planta Docente -->
                            <div class="card mb-3"">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{ __('Planta Docente Administration:') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Planta Docente -->
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a class="link text-center" href="{{ route('plantaDocente.index') }}">
                                                                {{ __('Planta Docente') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
