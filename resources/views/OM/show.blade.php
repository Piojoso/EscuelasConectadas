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
                        {{ __('Orden de Merito') . " " . $om->id}}
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10">

                                <form action="{{ route('om.update', $om->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Region -->
                                    <div class="form-group row">
                                        <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Region') }}</label>

                                        <div class="col-md-6">
                                            <input id="region" type="text" class="form-control @error('region') is-invalid @enderror" name="region" value="{{ $om->region }}" required autocomplete="region" autofocus>

                                            @error('region')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Nivel -->
                                    <div class="form-group row">
                                        <label for="nivel" class="col-md-4 col-form-label text-md-right">{{ __('Nivel') }}</label>

                                        <div class="col-md-6">
                                            <input id="nivel" type="text" class="form-control @error('nivel') is-invalid @enderror" name="nivel" value="{{ $om->nivel }}" required autocomplete="nivel">

                                            @error('nivel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Apellido -->
                                    <div class="form-group row">
                                        <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                                        <div class="col-md-6">
                                            <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ $om->apellido }}" required autocomplete="apellido">

                                            @error('apellido')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Nombre -->
                                    <div class="form-group row">
                                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                            <div class="col-md-6">
                                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $om->nombre }}" required autocomplete="nombre">

                                                @error('nombre')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    <!-- Cuil -->
                                    <div class="form-group row">
                                        <label for="cuil" class="col-md-4 col-form-label text-md-right">{{ __('Cuil') }}</label>

                                        <div class="col-md-6">
                                            <input id="cuil" type="text" class="form-control @error('cuil') is-invalid @enderror" name="cuil" value="{{ $om->cuil }}" required autocomplete="cuil">

                                            @error('cuil')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Sexo -->
                                    <div class="form-group row">
                                        <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

                                        <div class="col-md-6">
                                            <select id="sexo" class="form-control @error('sexo') is-invalid @enderror" name="sexo" value="{{ old('sexo') }}" required>
                                                <option @if($om->sexo == 'Masculino') selected @endif value="Masculino">Masculino</option>
                                                <option @if($om->sexo == 'Femenino') selected @endif value="Femenino">Femenino</option>
                                            </select>

                                            @error('sexo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Localidad -->
                                    <div class="form-group row">
                                        <label for="localidad" class="col-md-4 col-form-label text-md-right">{{ __('Localidad') }}</label>

                                        <div class="col-md-6">
                                            <input id="localidad" type="text" class="form-control @error('localidad') is-invalid @enderror" name="localidad" value="{{ $om->localidad }}" required autocomplete="localidad">

                                            @error('localidad')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Cargo -->
                                    <div class="form-group row">
                                        <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

                                        <div class="col-md-6">
                                            <input id="cargo" type="text" class="form-control @error('cargo') is-invalid @enderror" name="cargo" value="{{ $om->cargo }}" required autocomplete="cargo">

                                            @error('cargo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Titulo 1 -->
                                    <div class="form-group row">
                                        <label for="titulo_1" class="col-md-4 col-form-label text-md-right">{{ __('Titulo 1') }}</label>

                                        <div class="col-md-6">
                                            <input id="titulo_1" type="text" class="form-control @error('titulo_1') is-invalid @enderror" name="titulo_1" value="{{ $om->titulo_1 }}" required autocomplete="titulo_1">

                                            @error('titulo_1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    @if ( isset($om->titulo_2) )
                                        <!-- Titulo 2 -->
                                        <div class="form-group row">
                                            <label for="titulo_2" class="col-md-4 col-form-label text-md-right">{{ __('Titulo 2') }}</label>

                                            <div class="col-md-6">
                                                <input id="titulo_2" type="text" class="form-control @error('titulo_2') is-invalid @enderror" name="titulo_2" value="{{ $om->titulo_2 }}" required autocomplete="titulo_2">

                                                @error('titulo_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Incumbencia -->
                                    <div class="form-group row">
                                        <label for="incumbencia" class="col-md-4 col-form-label text-md-right">{{ __('Incumbencia') }}</label>

                                        <div class="col-md-6">
                                            <input id="incumbencia" type="text" class="form-control @error('incumbencia') is-invalid @enderror" name="incumbencia" value="{{ $om->incumbencia }}" required autocomplete="incumbencia">

                                            @error('incumbencia')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Update - Cancel -->
                                    <div class="form-group row">
                                        <!-- Update -->
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-success btn-block">
                                                {{ __('Update') }}
                                            </button>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ route('om.index') }}" class="btn btn-dark btn-block">
                                                {{ __('Cancel') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>

                                <div class="form-group row mb-0">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">

                                        <form action="{{ route('om.destroy', $om->id) }}" method="POST">
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
