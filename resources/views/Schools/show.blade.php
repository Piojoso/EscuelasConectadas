@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        {{ __('School') . " " . $school->id }}
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <form action="{{ route('schools.update', $school->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Cue - Level -->
                                    <div class="row">
                                        <!-- CUE -->
                                        <div class="form-group row col-md-6">
                                            <label for="cue" class="col-md-2 offset-1 col-form-label text-md-right">{{ __('CUE') }}</label>

                                            <div class="col-md-9">
                                                <input id="cue" type="text" class="form-control @error('cue') is-invalid @enderror" name="cue" value="{{ $school->cue }}" required>

                                                @error('cue')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Level -->
                                        <div class="form-group row col-md-6">
                                            <label for="level" class="col-md-2 offset-1 col-form-label text-md-right">{{ __('Level') }}</label>

                                            <div class="col-md-9">
                                                <select id="level" class="form-control @error('level') is-invalid @enderror" name="level" required>
                                                    @foreach (App\Level::all() as $level)
                                                        <option @if($level->id == $school->level_id) select @endif value="{{ $level->id }}">{{ $level->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('level')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Name - Email - Bilingual -->
                                    <div class="row">
                                        <!-- Name -->
                                        <div class="form-group row col-md-5">
                                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-9">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $school->name }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group row col-md-5">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-8">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $school->email }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Bilingual -->
                                        <div class="form-group col-md-2 row">
                                            <label for="bilingual" class="col-md-8 col-check-label text-md-right">{{ __('Bilingual') }}</label>

                                            <div class="col-md-4">
                                                <input type="checkbox" @if ($school->bilingual) checked @endif name="bilingual" id="bilingual" class="form-check-control @error('bilingual') is-invalid @enderror">

                                                @error('bilingual')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Locality - Responsable -->
                                    <div class="row">
                                        <!-- Locality -->
                                        <div class="form-group col-md-5 row">
                                            <label for="locality" class="col-md-4 col-form-label text-md-right">{{ __('Locality') }}</label>

                                            <div class="col-md-8">
                                                <select id="locality" class="form-control @error('locality') is-invalid @enderror" name="locality" required>
                                                    @foreach (App\Locality::all() as $locality)
                                                        <option @if($locality->id == $school->locality_id) selected @endif  value="{{ $locality->id }}">{{ $locality->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('locality')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Responsable -->
                                        <div class="form-group col-md-5 row">
                                            <label for="responsable" class="col-md-4 col-form-label text-md-right">{{ __('Responsable') }}</label>

                                            <div class="col-md-8">
                                            <select id="responsable" class="form-control @error('responsable') is-invalid @enderror" name="responsable" value="{{ old('responsable') }}" required>
                                                    @foreach (App\User::where('rol', 'ResponsableInscripto')->cursor() as $responsable)
                                                        <option @if ($responsable->id == $school->responsable_id) selected @endif value="{{ $responsable->id }}">{{ $responsable->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('responsable')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- New Responsable -->
                                        <div class="form-group col-md-2 row">
                                            <div class="">
                                                <button type="button" class="btn btn-primary">
                                                    {{ __('Add New')}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Address - Phone - Internal Phone -->
                                    <div class="row">
                                        <!-- Address -->
                                        <div class="form-group col-md-4 row">
                                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                            <div class="col-md-8">
                                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $school->address }}" required>

                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- phone -->
                                        <div class="form-group col-md-4 row">
                                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                            <div class="col-md-8">
                                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $school->phone }}" required>

                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Internal Phone -->
                                        <div class="form-group col-md-4 row">
                                            <label for="internal_phone" class="col-md-6 col-form-label text-md-right">{{ __('Internal Phone') }}</label>

                                            <div class="col-md-6">
                                                <input id="internal_phone" type="text" class="form-control @error('internal_phone') is-invalid @enderror" name="internal_phone" value="{{ $school->internal_phone }}" required>

                                                @error('internal_phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- AVG Students - Director Name - Orientation -->
                                    <div class="row">
                                        <!-- AVG Students -->
                                        <div class="form-group col-md-4 row">
                                            <label for="avgStudents" class="col-md-7 col-form-label text-md-right">{{ __('AVG Students Number') }}</label>

                                            <div class="col-md-5">
                                                <input id="avgStudents" type="text" class="form-control @error('avgStudents') is-invalid @enderror" name="avgStudents" value="{{ $school->avg_number_students }}" required autocomplete="avgStudents">

                                                @error('avgStudents')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Director Name -->
                                        <div class="form-group col-md-4 row">
                                            <label for="director" class="col-md-5 col-form-label text-md-right">{{ __('Director Name') }}</label>

                                            <div class="col-md-7">
                                                <input id="director" type="text" class="form-control @error('director') is-invalid @enderror" name="director" value="{{ $school->director }}" required>

                                                @error('director')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Orientation -->
                                        <div class="form-group col-md-4 row">
                                            <label for="orientation" class="col-md-4 col-form-label text-md-right">{{ __('Orientation') }}</label>

                                            <div class="col-md-8">
                                                <input id="orientation" type="text" class="form-control @error('orientation') is-invalid @enderror" name="orientation" value="{{ $school->orientation }}" required>

                                                @error('orientation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Type - Sector - Area -->
                                    <div class="row">
                                        <!-- Type -->
                                        <div class="form-group col-md-4 row">
                                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                                            <div class="col-md-8">
                                                <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" required>
                                                    @foreach (App\Type::all() as $type)
                                                        <option @if ($type->id == $school->type_id) selected @endif value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Sector -->
                                        <div class="form-group col-md-4 row">
                                            <label for="sector" class="col-md-4 col-form-label text-md-right">{{ __('Sector') }}</label>

                                            <div class="col-md-8">
                                                <select id="sector" class="form-control @error('sector') is-invalid @enderror" name="sector" required>
                                                    @foreach (App\Sector::all() as $sector)
                                                        <option @if ($sector->id == $school->sector_id) selected @endif value="{{ $sector->id }}">{{ $sector->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('sector')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Area -->
                                        <div class="form-group col-md-4 row">
                                            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                                            <div class="col-md-8">
                                                <select id="area" class="form-control @error('area') is-invalid @enderror" name="area" required>
                                                    @foreach (App\Area::all() as $area)
                                                        <option @if ($area->id == $school->area_id) selected @endif value="{{ $area->id }}">{{ $area->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('area')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Category - typeJourney - typeHighSchool -->
                                    <div class="row">
                                        <!-- Category -->
                                        <div class="form-group col-md-4 row">
                                            <label for="category" class="col-md-4 offset-2 col-form-label text-md-right">{{ __('Category') }}</label>

                                            <div class="col-md-6">
                                                <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" required>
                                                    @foreach (App\Category::all() as $category)
                                                        <option @if ($category->id == $school->category_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('category')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- typeJourney -->
                                        <div class="form-group col-md-4 row">
                                            <label for="typeJourney" class="col-md-6 col-form-label text-md-right">{{ __('Type Journey') }}</label>

                                            <div class="col-md-6">
                                                <select id="typeJourney" class="form-control @error('typeJourney') is-invalid @enderror" name="typeJourney" required>
                                                    @foreach (App\TypeJourney::all() as $typeJourney)
                                                        <option @if ($typeJourney->id == $school->typeJourney_id) selected @endif value="{{ $typeJourney->id }}">{{ $typeJourney->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('typeJourney')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- typeHighSchool -->
                                        <div class="form-group col-md-4 row">
                                            <label for="typeHighSchool" class="col-md-6 col-form-label text-md-right">{{ __('Type High School') }}</label>

                                            <div class="col-md-6">
                                                <select id="typeHighSchool" class="form-control @error('typeHighSchool') is-invalid @enderror" name="typeHighSchool" required>
                                                    @foreach (App\TypeHighSchool::all() as $typeHighSchool)
                                                        <option @if ($typeHighSchool->id == $school->typeHighSchool_id) selected @endif value="{{ $typeHighSchool->id }}">{{ $typeHighSchool->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('typeHighSchool')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Update - Cancel -->
                                    <div class="form-group row">


                                        <!--Update -->
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success btn-block">
                                                {{ __('Update') }}
                                            </button>
                                        </div>

                                        <!-- Cancel -->
                                        <div class="col-md-6">
                                            <a type="button" href="{{ route('schools.index') }}" class="btn btn-dark btn-block">
                                                {{ __('Cancel') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>

                                <!-- Remove -->
                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <form action="{{ route('schools.destroy', $school->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" href="" class="btn btn-danger btn-block">
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
