@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        {{ __('School_Teacher') }}
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10">

                                <form action="{{ route('pivots.update', ['pivot' => $pivot->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Division -->
                                    <div class="form-group row">
                                        <label for="division" class="col-md-4 col-form-label text-md-right">{{ __('Division') }}</label>

                                        <div class="col-md-6">
                                            <input id="division" type="text" class="form-control @error('division') is-invalid @enderror" name="division" value="{{ $pivot->division }}" required autocomplete="division" autofocus>

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
                                            <input id="hours" type="text" class="form-control @error('hours') is-invalid @enderror" name="hours" value="{{ $pivot->hours }}" required autocomplete="hours">

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
                                            <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ $pivot->class }}" required autocomplete="class">

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
                                            <a href="{{ route('teachers.index') }}" class="btn btn-dark btn-block">
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
