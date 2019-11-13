@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('Total de Cantidad Promedio de Alumnos y Promedio de Cantidad Promedio de Alumnos')}}
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <form action="{{ route('alumnosInforme.show') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <!-- Department -->
                                    <div class="form-group col-md-6 row">
                                        <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

                                        <div class="col-md-8">
                                            <select id="department" class="form-control @error('department') is-invalid @enderror" name="department" required>
                                                @foreach (App\Department::all() as $department)
                                                    <option @if (isset($respuesta) && $respuesta['department'] == $department->id) selected @endif value="{{ $department->id }}">{{ $department->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('department')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Locality -->
                                    <div class="form-group col-md-6 row">
                                        <label for="locality" class="col-md-4 col-form-label text-md-right">{{ __('Locality') }}</label>

                                        <div class="col-md-8">
                                            <select id="locality" class="form-control @error('locality') is-invalid @enderror" name="locality" required>
                                                @foreach (App\Locality::all() as $locality)
                                                    <option @if (isset($respuesta) && $respuesta['locality'] == $locality->id) selected @endif value="{{ $locality->id }}">{{ $locality->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('locality')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Refresh - Back -->
                                <div class="row col-md-6 offset-3">
                                    <!-- Refresh -->
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success btn-block">
                                            {{ __('Refresh') }}
                                        </button>
                                    </div>

                                    <!-- Back -->
                                    <div class="col-md-6">
                                        <a type="button" href="{{ route('home') }}" class="btn btn-danger btn-block">
                                            {{ __('Back') }}
                                        </a>
                                    </div>
                                </div>

                            </form>

                            @isset ($respuesta)

                            <hr>

                            <div class="table-responsibe">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>{{ __('Total of Avg student number') }}</th>
                                            <th>{{ __('Avg of Avg student number') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>{{ __('Locality') }}</th>
                                            <td>{{ $localidad[0]->sumAVGStudent }}</td>
                                            <td>{{ $localidad[1]->avgAVGStudent }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Department') }}</th>
                                            <td>{{ $departamento[0]->sumAVGStudent }}</td>
                                            <td>{{ $departamento[1]->avgAVGStudent }}</td>
                                        </tr>
                                    </table>
                                </div>

                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
