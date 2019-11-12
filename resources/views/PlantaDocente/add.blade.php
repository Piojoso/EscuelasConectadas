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
                                    <li class="nav-item">{{ __('Teachers') }}</li>
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
