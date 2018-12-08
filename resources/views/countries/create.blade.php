@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('countries.index') }}">Countries</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('countries.create') }}">Create country</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create country</div>
                <form method="post" action="{{ route('countries.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alpha2" class="col-sm-2 col-form-label">Alpha2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('alpha2') ? 'is-invalid' : ''}}" id="alpha2" name="alpha2" placeholder="Alpha2" value="{{ old('alpha2') }}">
                                @if ($errors->has('alpha2'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('alpha2') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alpha3" class="col-sm-2 col-form-label">Alpha3</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('alpha3') ? 'is-invalid' : ''}}" id="alpha3" name="alpha3" placeholder="Alpha3" value="{{ old('alpha3') }}">
                                @if ($errors->has('alpha3'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('alpha3') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alphaNumeric" class="col-sm-2 col-form-label">Alpha numeric</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('alphaNumeric') ? 'is-invalid' : ''}}" id="alphaNumeric" name="alphaNumeric" placeholder="Alpha numeric" value="{{ old('alphaNumeric') }}">
                                @if ($errors->has('alphaNumeric'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('alphaNumeric') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="continent" class="col-sm-2 col-form-label">Continent</label>
                            <div class="col-sm-10">
                                <select id="continent" name="continent" class="form-control">
                                    @foreach($continents as $continent)
                                        <option value="{{ $continent->id }}">{{ $continent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
