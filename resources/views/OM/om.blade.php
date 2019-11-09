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
                                    <li class="nav-item">{{ __('OM') }}</li>
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <form action="{{ route('om.store') }}" method="POST" enctype="multipart/form-data">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    @csrf
                                                    <input type="file" name="OM" class="custom-file-input" id="OM">
                                                    <label class="custom-file-label" for="OM">Choose file</label>
                                                </div>
                                                <div class="input-group-prepend">
                                                    <button type="submit" class="input-group-text upload" id="btnUpload">Upload</button>
                                                </div>
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            @auth
                                                <th> {{ __('ID') }} </th>
                                            @endauth
                                            <th>{{ __('Apellido') }}</th>
                                            <th>{{ __('Nombre') }}</th>
                                            <th>{{ __('Cuil') }}</th>
                                            <th>{{ __('Cargo') }}</th>
                                            <th>{{ __('Titulo 1') }}</th>
                                            <th>{{ __('Incumbencia') }}</th>
                                            <th>{{ __('Detail') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (App\OrdenMerito::all() as $om)
                                        <tr>
                                            @auth
                                                <td>{{ $om->id }}</td>
                                            @endauth
                                            <td>{{ $om->apellido }}</td>
                                            <td>{{ $om->nombre }}</td>
                                            <td>{{ $om->cuil }}</td>
                                            <td>{{ $om->cargo }}</td>
                                            <td>{{ $om->titulo_1 }}</td>
                                            <td>{{ $om->incumbencia }}</td>
                                            <td>
                                                <a href="{{ route('om.show', $om->id) }}">
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

