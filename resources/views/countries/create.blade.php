@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('countries.index') }}">Countries</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('countries.create') }}">Create country</a></li>
        </ol>
    </nav>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create country</h3>
        </div>
        <form class="form-horizontal" method="post" action="{{ route('countries.store') }}">
            @csrf
            <div class="box-body">

                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('alpha2') ? 'has-error' : ''}}">
                    <label for="alpha2" class="col-sm-2 control-label">Alpha2</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alpha2" name="alpha2" placeholder="Alpha2" value="{{ old('alpha2') }}">
                        @if ($errors->has('alpha2'))
                            <span class="help-block">{{ $errors->first('alpha2') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('alpha3') ? 'has-error' : ''}}">
                    <label for="alpha3" class="col-sm-2 control-label">Alpha3</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alpha3" name="alpha3" placeholder="Alpha3" value="{{ old('alpha3') }}">
                        @if ($errors->has('alpha3'))
                            <span class="help-block">{{ $errors->first('alpha3') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('alphaNumeric') ? 'has-error' : ''}}">
                    <label for="alphaNumeric" class="col-sm-2 control-label">Alpha numeric</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alphaNumeric" name="alphaNumeric" placeholder="Alpha numeric" value="{{ old('alphaNumeric') }}">
                        @if ($errors->has('alphaNumeric'))
                            <span class="help-block">{{ $errors->first('alphaNumeric') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="continent" class="col-sm-2 control-label">Continent</label>
                    <div class="col-sm-10">
                        <select id="continent" name="continent" class="form-control">
                            @foreach($continents as $continent)
                                <option value="{{ $continent->id }}">{{ $continent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection
