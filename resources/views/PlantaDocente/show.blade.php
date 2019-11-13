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
                        {{ __('Teacher') . " " . $teacher->id }}
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <form action="{{ route('plantaDocente.update', $teacher->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Cuil - Sex -->
                                    <div class="row">
                                        <!-- Cuil -->
                                        <div class="form-group col-md-6 row">
                                            <label for="cuil" class="col-md-4 col-form-label text-md-right">{{ __('Cuil') }}</label>

                                            <div class="col-md-8">
                                                <input id="cuil" type="text" readonly class="form-control @error('cuil') is-invalid @enderror" name="cuil" value="{{ $teacher->cuil }}" required autocomplete="cuil" autofocus>

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
                                                <select id="sex" readonly class="form-control @error('sex') is-invalid @enderror" name="sex" required>
                                                    @if ($teacher->sex == 'Masculino')
                                                    <option selected value="Masculino">{{ __('Male') }}</option>
                                                    @else
                                                    <option selected value="Femenino">{{ __('Female') }}</option>
                                                    @endif
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
                                                <input id="first_name" readonly type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $teacher->first_name }}" required autocomplete="first_name">

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
                                                <input id="last_name" readonly type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $teacher->last_name }}" required autocomplete="last_name">

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
                                                <input id="degree" readonly type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="{{ $teacher->degree }}" required autocomplete="degree">

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
                                                <input id="degree_category" readonly type="text" class="form-control @error('degree_category') is-invalid @enderror" name="degree_category" value="{{ $teacher->degree_category }}" required autocomplete="degree_category">

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
                                                <select id="locality" readonly class="form-control @error('locality') is-invalid @enderror" name="locality" required>
                                                    @foreach (App\Locality::all() as $locality)
                                                        @if ($locality->id == $teacher->locality_id)
                                                        <option selected value="{{ $locality->id }}">{{ $locality->name }}</option>
                                                        @endif
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

                                    <div class="row">
                                        <!-- Division -->
                                        <div class="form-group col-md-4 row">
                                            <label for="division" class="col-md-4 col-form-label text-md-right">{{ __('Division') }}</label>

                                            <div class="col-md-8">
                                                <input id="division" type="text" class="form-control @error('division') is-invalid @enderror" name="division" value="{{ $pivot->division }}" required autocomplete="division">

                                                @error('division')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Hours -->
                                        <div class="form-group col-md-2 row">
                                            <label for="hours" class="col-md-6 col-form-label text-md-right">{{ __('Hours') }}</label>

                                            <div class="col-md-6">
                                                <input id="hours" type="text" class="form-control @error('hours') is-invalid @enderror" name="hours" value="{{ $pivot->hours }}" required autocomplete="hours">

                                                @error('hours')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Class -->
                                        <div class="form-group col-md-3 row">
                                            <label for="class" class="col-md-6 col-form-label text-md-right">{{ __('Class') }}</label>

                                            <div class="col-md-6">
                                                <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ $pivot->class }}" required autocomplete="class">

                                                @error('class')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Situacion de Revista -->
                                        <div class="form-group col-md-3 row">
                                            <label for="situacionRevista" class="col-md-6 col-form-label text-md-right">{{ __('Sitacion de Revista') }}</label>

                                            <div class="col-md-6">
                                                <input id="situacionRevista" type="text" class="form-control @error('situacionRevista') is-invalid @enderror" name="situacionRevista" value="{{ $teacher->degree_category }}" required autocomplete="situacionRevista">

                                                @error('situacionRevista')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
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
                                        <a href="{{ route('plantaDocente.index') }}" class="btn btn-dark btn-block">
                                            {{ __('Cancel') }}
                                        </a>
                                    </div>
                                </div>
                            </form>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">

                                    <form action="{{ route('plantaDocente.destroy', [$teacher->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-block">
                                            {{ __('Remove of this School') }}
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
