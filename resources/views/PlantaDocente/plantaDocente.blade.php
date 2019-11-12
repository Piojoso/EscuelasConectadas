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
                                    <li class="nav-item">{{ __('Teachers'. ' in ' . $school->name) }}</li>
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('plantaDocente.create') }}" class="nav-link">
                                            {{ __('Add Teacher') }}
                                        </a>
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
                                                @auth
                                                <th> {{ __('ID') }} </th>
                                                @endauth
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
                                            @foreach ($school->teachers as $teacher)
                                            <tr>
                                                @auth
                                                <td>{{ $teacher->id }}</td>
                                                @endauth
                                                <td>{{ $teacher->cuil }}</td>
                                                <td>{{ $teacher->first_name }}</td>
                                                <td>{{ $teacher->last_name }}</td>
                                                <td>{{ $teacher->sex }}</td>
                                                <td>{{ $teacher->degree }}</td>
                                                <td>{{ $teacher->degree_category }}</td>
                                                <td>{{ $teacher->locality->name }}</td>
                                                <td>
                                                    <a href="{{ route('plantaDocente.show', $teacher->id) }}">
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
    </div>
@endsection
