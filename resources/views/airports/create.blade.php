@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('airports.index') }}">Airports</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('airports.create') }}">Create airport</a></li>
        </ol>
    </nav>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create airport</h3>
        </div>
        <form class="form-horizontal" method="post" action="{{ route('airports.store') }}">
            @csrf
            <div class="box-body">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('iata') ? 'has-error' : ''}}">
                    <label for="iata" class="col-sm-2 control-label">IATA</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="iata" name="iata" placeholder="IATA" value="{{ old('iata') }}">
                        @if ($errors->has('iata'))
                            <span class="help-block">{{ $errors->first('iata') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('icao') ? 'has-error' : ''}}">
                    <label for="icao" class="col-sm-2 control-label">ICAO</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="icao" name="icao" placeholder="ICAO" value="{{ old('icao') }}">
                        @if ($errors->has('icao'))
                            <span class="help-block">{{ $errors->first('icao') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
                    <label for="country" class="col-sm-2 control-label">Country</label>
                    <div class="col-sm-10">
                        <select id="country" name="country" class="form-control">
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('country'))
                            <span class="help-block">{{ $errors->first('country') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection
