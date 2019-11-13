@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        {{ __('Teacher') . " " . $teacher->id}}
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Cuil - Sex -->
                                    <div class="row">
                                        <!-- Cuil -->
                                        <div class="form-group col-md-6 row">
                                            <label for="cuil" class="col-md-4 col-form-label text-md-right">{{ __('Cuil') }}</label>

                                            <div class="col-md-8">
                                                <input id="cuil" type="text" class="form-control @error('cuil') is-invalid @enderror" name="cuil" value="{{ $teacher->cuil }}" required autocomplete="cuil" autofocus>

                                                @error('cuil')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Sex -->
                                        <div class="form-group col-md-6 row">
                                            <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('Sex') }}</label>

                                            <div class="col-md-8">
                                                <select id="sex" class="form-control @error('sex') is-invalid @enderror" name="sex" required>
                                                    <option @if ($teacher->sex == 'Masculino') selected @endif value="Masculino">{{ __('Male') }}</option>
                                                    <option @if ($teacher->sex == 'Femenino') selected @endif value="Femenino">{{ __('Female') }}</option>
                                                </select>

                                                @error('sex')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <!-- First Name - Last Name -->
                                    <div class="row">
                                        <!-- First Name -->
                                        <div class="form-group col-md-6 row">
                                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                            <div class="col-md-8">
                                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $teacher->first_name }}" required autocomplete="first_name">

                                                @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Last Name -->
                                        <div class="form-group col-md-6 row">
                                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                            <div class="col-md-8">
                                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $teacher->last_name }}" required autocomplete="last_name">

                                                @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Degree - Degree Category - Locality -->
                                    <div class="row">
                                        <!-- Degree -->
                                        <div class="form-group col-md-4 row">
                                            <label for="degree" class="col-md-4 col-form-label text-md-right">{{ __('Degree') }}</label>

                                            <div class="col-md-8">
                                                <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="{{ $teacher->degree }}" required autocomplete="degree">

                                                @error('degree')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Degree Category -->
                                        <div class="form-group col-md-4 row">
                                            <label for="degree_category" class="col-md-6 col-form-label text-md-right">{{ __('Degree Category') }}</label>

                                            <div class="col-md-6">
                                                <input id="degree_category" type="text" class="form-control @error('degree_category') is-invalid @enderror" name="degree_category" value="{{ $teacher->degree_category }}" required autocomplete="degree_category">

                                                @error('degree_category')
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
                                                        <option @if ($locality->id == $teacher->locality_id) selected @endif value="{{ $locality->id }}">{{ $locality->name }}</option>
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

                                    <hr>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('School') }}</th>
                                                    <th>{{ __('Division') }}</th>
                                                    <th>{{ __('Hours') }}</th>
                                                    <th>{{ __('Class') }}</th>
                                                    <th>{{ __('Situacion de Revista') }}</th>
                                                    <th>{{ __('Modify') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($teacher->schools as $school)
                                                    <tr>
                                                        <td>{{ "CUE: " . $school->cue . " - Nivel: " . $school->level->name }}</td>
                                                        <td>{{ $school->pivot->division }}</td>
                                                        <td>{{ $school->pivot->hours }}</td>
                                                        <td>{{ $school->pivot->class }}</td>
                                                        <td>{{ $school->pivot->situacionRevista }}</td>
                                                        <td>
                                                            <a href="{{ route('pivots.show', ['pivot' => $school->pivot->id, 'school' => $school->id, 'teacher' => $teacher->id]) }}">
                                                                <i class="fas fa-angle-double-right fa-lg"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <hr>

                                    <!-- Update - Cancel -->
                                    <div class="form-group row">
                                        <!-- Update -->
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success btn-block">
                                                {{ __('Update') }}
                                            </button>
                                        </div>
                                        <!-- cancel -->
                                        <div class="col-md-6">
                                            <a href="{{ route('teachers.index') }}" class="btn btn-dark btn-block">
                                                {{ __('Cancel') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">

                                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-block">
                                                {{ __('Remove') }}
                                            </button>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
