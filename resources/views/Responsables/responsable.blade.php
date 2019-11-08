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
                                    <li class="nav-item">{{ __('Responsable') }}</li>
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('responsable.create') }}" class="nav-link">
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
                                        @foreach (App\User::where('rol', 'ResponsableInscripto')->cursor() as $responsable)
                                        <tr>
                                            @auth
                                                <td>{{ $responsable->id }}</td>
                                            @endauth
                                            <td>{{ $responsable->name }}</td>
                                            <td>{{ $responsable->first_name }}</td>
                                            <td>{{ $responsable->last_name }}</td>
                                            <td>{{ $responsable->email }}</td>
                                            <td>
                                                <a href="{{ route('responsable.show', ['responsable' => $responsable->id]) }}">
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
