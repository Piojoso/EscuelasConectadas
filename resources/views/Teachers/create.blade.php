@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        {{ __('Add new Teacher')}}
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10">

                                <form action="{{ route('teachers.store') }}" method="POST">
                                    @csrf

                                    <!-- Cuil -->
                                    <div class="form-group row">
                                        <label for="cuil" class="col-md-4 col-form-label text-md-right">{{ __('Cuil') }}</label>

                                        <div class="col-md-6">
                                            <input id="cuil" type="text" class="form-control @error('cuil') is-invalid @enderror" name="cuil" value="{{ old('cuil') }}" required autocomplete="cuil" autofocus>

                                            @error('cuil')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- First Name -->
                                    <div class="form-group row">
                                        <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name">

                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Last Name -->
                                    <div class="form-group row">
                                        <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">

                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Sex -->
                                    <div class="form-group row">
                                        <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('Sex') }}</label>

                                        <div class="col-md-6">
                                            <select id="sex" class="form-control @error('sex') is-invalid @enderror" name="sex" required>
                                                <option selected value="Masculino">{{ __('Male') }}</option>
                                                <option value="Femenino">{{ __('Female') }}</option>
                                            </select>

                                            @error('sex')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Degree -->
                                    <div class="form-group row">
                                        <label for="degree" class="col-md-4 col-form-label text-md-right">{{ __('Degree') }}</label>

                                        <div class="col-md-6">
                                            <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="{{ old('degree') }}" required autocomplete="degree">

                                            @error('degree')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Degree Category -->
                                    <div class="form-group row">
                                        <label for="degree_category" class="col-md-4 col-form-label text-md-right">{{ __('Degree Category') }}</label>

                                        <div class="col-md-6">
                                            <input id="degree_category" type="text" class="form-control @error('degree_category') is-invalid @enderror" name="degree_category" value="{{ old('degree_category') }}" required autocomplete="degree_category">

                                            @error('degree_category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Locality -->
                                    <div class="form-group row">
                                        <label for="locality" class="col-md-4 col-form-label text-md-right">{{ __('Locality') }}</label>

                                        <div class="col-md-6">
                                            <select id="locality" class="form-control @error('locality') is-invalid @enderror" name="locality" required>
                                                @foreach (App\Locality::all() as $locality)
                                                    <option value="{{ $locality->id }}">{{ $locality->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('locality')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr>

                                    <!-- School -->
                                    <div class="form-group row">
                                        <label for="school" class="col-md-4 col-form-label text-md-right">{{ __('School') }}</label>

                                        <div class="col-md-6">
                                            <select name="school" id="school" class="form-control @error('school') is-invalid @enderror" required>
                                                @foreach (App\School::all() as $school)
                                                    <option value="{{ $school->id }}">{{ "CUE: " . $school->cue . " - Nivel: " . $school->level->name}}</option>
                                                @endforeach
                                            </select>

                                            @error('school')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Division -->
                                    <div class="form-group row">
                                        <label for="division" class="col-md-4 col-form-label text-md-right">{{ __('Division') }}</label>

                                        <div class="col-md-6">
                                            <input id="division" type="text" class="form-control @error('division') is-invalid @enderror" name="division" value="{{ old('division') }}" required autocomplete="division">

                                            @error('division')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Hours -->
                                    <div class="form-group row">
                                        <label for="hours" class="col-md-4 col-form-label text-md-right">{{ __('Hours') }}</label>

                                        <div class="col-md-6">
                                            <input id="hours" type="text" class="form-control @error('hours') is-invalid @enderror" name="hours" value="{{ old('hours') }}" required autocomplete="hours">

                                            @error('hours')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Class -->
                                    <div class="form-group row">
                                        <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>

                                        <div class="col-md-6">
                                            <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ old('class') }}" required autocomplete="class">

                                            @error('class')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- SituacionRevista -->
                                    <div class="form-group row">
                                        <label for="situacionRevista" class="col-md-4 col-form-label text-md-right">{{ __('Situacion de Revista') }}</label>

                                        <div class="col-md-6">
                                            <select name="situacionRevista" id="situacionRevista" class="form-control @error('situacionRevista') is-invalid @enderror" required>
                                                <option value="Titular">Titular</option>
                                                <option value="Interino">Interino</option>
                                                <option value="Suplente">Suplente</option>
                                                <option value="Licencia">Licencia</option>
                                            </select>

                                            @error('situacionRevista')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Add - Cancel -->
                                    <div class="form-group row mb-0">
                                        <!-- Add -->
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-success btn-block">
                                                {{ __('Add') }}
                                            </button>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ route('teachers.index') }}" class="btn btn-danger btn-block">
                                                {{ __('Cancel') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
