@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('airports.index') }}">Airports</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('airports.create') }}">Create airport</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create airport</div>
                <form method="post" action="{{ route('airports.store') }}">
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
                            <label for="iata" class="col-sm-2 col-form-label">IATA</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('iata') ? 'is-invalid' : ''}}" id="iata" name="iata" placeholder="IATA" value="{{ old('iata') }}">
                                @if ($errors->has('iata'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('iata') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="icao" class="col-sm-2 col-form-label">ICAO</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('icao') ? 'is-invalid' : ''}}" id="icao" name="icao" placeholder="ICAO" value="{{ old('icao') }}">
                                @if ($errors->has('icao'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('icao') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-sm-2 col-form-label">Country</label>
                            <div class="col-sm-10">
                                <select id="country" name="country" class="form-control {{ $errors->has('country') ? 'is-invalid' : ''}}">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('country') }}
                                    </div>
                                @endif
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
