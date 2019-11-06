@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="navbar navbar-expand-md p-0">
                            <div class="container">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">{{ __('Schools') }}</li>
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('schools.create') }}">
                                            {{ __('Add') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            @auth
                                                <th> {{ __('ID') }} </th>
                                            @endauth
                                            <th>{{ __('Name')  }}</th>
                                            <th>{{ __('CUE') }}</th>
                                            <th>{{ __('Address') }}</th>
                                            <th>{{ __('Level') }}</th>
                                            <th>{{ __('Locality') }}</th>
                                            <th>{{ __('Responsable Name') }}</th>
                                            <th>{{ __('Detail') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (App\School::all() as $school)
                                        <tr>
                                            @auth
                                                <td>{{ $school->id }}</td>
                                            @endauth
                                            <td>{{ $school->name }}</td>
                                            <td>{{ $school->cue }}</td>
                                            <td>{{ $school->address }}</td>
                                            <td>{{ $school->level->name }}</td>
                                            <td>{{ $school->locality->name }}</td>
                                            <td>{{ $school->responsable->first_name }}</td>
                                            <td>
                                                <a href="{{ route('schools.show', ['school' => $school->id]) }}">
                                                    <i class="fas fa-angle-double-right fa-lg"></i>
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
@endsection

