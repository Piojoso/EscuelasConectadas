@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="navbar navbar-expand-md p-0">
                            <div class="container">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">{{ __('Admin') }}</li>
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.create') }}" class="nav-link">
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
                                            <th>{{ __('First Name') }}</th>
                                            <th>{{ __('Last Name') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Detail') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (App\User::where('rol', 'Administrador')->cursor() as $admin)
                                        <tr>
                                            @auth
                                                <td>{{ $admin->id }}</td>
                                            @endauth
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->first_name }}</td>
                                            <td>{{ $admin->last_name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>
                                                <a href="{{ route('admin.show', ['admin' => $admin->id]) }}">
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
