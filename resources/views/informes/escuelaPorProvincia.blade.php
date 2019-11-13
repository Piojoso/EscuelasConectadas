@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        {{ __('Escuelas por Provincia')}}
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <form action="{{ route('escuelaPorProvincia.show') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <!-- Province -->
                                        <div class="form-group col-md-4 row">
                                            <label for="province" class="col-md-4 col-form-label text-md-right">{{ __('Province') }}</label>

                                            <div class="col-md-8">
                                                <select id="province" class="form-control @error('province') is-invalid @enderror" name="province" required>
                                                    @foreach (App\Province::all() as $province)
                                                        <option @if (isset($respuesta) && $respuesta['province'] == $province->id) selected @endif value="{{ $province->id }}">{{ $province->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('province')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Department -->
                                        <div class="form-group col-md-4 row">
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
                                        <div class="form-group col-md-4 row">
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

                                    <div class="row">
                                        <!-- Level -->
                                        <div class="form-group row col-md-4">
                                            <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>

                                            <div class="col-md-8">
                                                <select id="level" class="form-control @error('level') is-invalid @enderror" name="level" required>
                                                    @foreach (App\Level::all() as $level)
                                                        <option @if (isset($respuesta) && $respuesta['level'] == $level->id) selected @endif value="{{ $level->id }}">{{ $level->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('level')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Sector -->
                                        <div class="form-group col-md-4 row">
                                            <label for="sector" class="col-md-4 col-form-label text-md-right">{{ __('Sector') }}</label>

                                            <div class="col-md-8">
                                                <select id="sector" class="form-control @error('sector') is-invalid @enderror" name="sector" required>
                                                    @foreach (App\Sector::all() as $sector)
                                                        <option @if (isset($respuesta) && $respuesta['sector'] == $sector->id) selected @endif value="{{ $sector->id }}">{{ $sector->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('sector')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- typeHighSchool -->
                                        <div class="form-group col-md-4 row">
                                            <label for="typeHighSchool" class="col-md-6 col-form-label text-md-right">{{ __('Type School') }}</label>

                                            <div class="col-md-6">
                                                <select id="typeHighSchool" class="form-control @error('typeHighSchool') is-invalid @enderror" name="typeHighSchool" required>
                                                    @foreach (App\TypeHighSchool::all() as $typeHighSchool)
                                                        <option @if (isset($respuesta) && $respuesta['typeHighSchool'] == $typeHighSchool->id) selected @endif value="{{ $typeHighSchool->id }}">{{ $typeHighSchool->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('typeHighSchool')
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
                                                <th>{{ __('Level') }}</th>
                                                <th>{{ __('Sector') }}</th>
                                                <th>{{ __('Type School') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>{{ __('Locality') }}</th>
                                                <td>{{ $localidad[0][0]->cantSchools }}</td>
                                                <td>{{ $localidad[1][0]->cantSchools }}</td>
                                                <td>{{ $localidad[2][0]->cantSchools }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Department') }}</th>
                                                <td>{{ $departamento[0][0]->cantSchools }}</td>
                                                <td>{{ $departamento[1][0]->cantSchools }}</td>
                                                <td>{{ $departamento[2][0]->cantSchools }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Province') }}</th>
                                                <td>{{ $provincia[0][0]->cantSchools }}</td>
                                                <td>{{ $provincia[1][0]->cantSchools }}</td>
                                                <td>{{ $provincia[2][0]->cantSchools }}</td>
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
