@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                        <div class="navbar navbar-expand-md p-0">
                            <div class="container">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">{{ __('Teachers') }}</li>
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item row">

                                        <!-- search -->
                                        <form class="form-inline my-lg-0" action="{{ route('search') }}" method="POST">
                                            @csrf
                                            <input type="search" name ="patron" id="patron" class="form-control mr-sm-2" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-outline-success my-sm-0" type="submit">Search</button>
                                        </form>

                                        <!-- Filtro -->
                                        <form action="{{ route('filter') }}" method="POST">
                                            @csrf

                                            <div class="form-group row mt-sm-1 mb-0 ml-1">

                                                <div class="col-md-8">
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

                                                <button type="submit" class="btn btn-outline-success">
                                                    {{ __('Flitrar') }}
                                                </button>

                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('CUIL')  }}</th>
                                                <th>{{ __('First Name') }}</th>
                                                <th>{{ __('Last Name') }}</th>
                                                <th>{{ __('Sex') }}</th>
                                                <th>{{ __('Degree') }}</th>
                                                <th>{{ __('Degree Category') }}</th>
                                                <th>{{ __('Locality') }}</th>
                                                <th>{{ __('Detail') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($teachers as $teacher)
                                            <tr>
                                                <td>{{ $teacher->cuil }}</td>
                                                <td>{{ $teacher->first_name }}</td>
                                                <td>{{ $teacher->last_name }}</td>
                                                <td>{{ $teacher->sex }}</td>
                                                <td>{{ $teacher->degree }}</td>
                                                <td>{{ $teacher->degree_category }}</td>
                                                <td>{{ $teacher->locality->name }}</td>
                                                <td>
                                                    <a href="{{ url('plantaDocente/add', $teacher->id) }}">
                                                        <i class="fas fa-plus text-success fa-lg"></i>
                                                    </a>
                                                </td>
                                            <tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
