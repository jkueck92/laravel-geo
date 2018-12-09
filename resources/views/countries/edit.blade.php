@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('countries.index') }}">Countries</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('countries.edit', $country->id) }}">Edit ({{ $country->name }})</a></li>
        </ol>
    </nav>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit country - ({{ $country->name }})</h3>
        </div>
        <form class="form-horizontal" method="post" action="{{ route('countries.update', $country->id) }}">
            @method('PATCH')
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">Id</label>
                    <div class="col-sm-10">
                        <input disabled type="text" class="form-control" id="id" name="id" placeholder="Id" value="{{ $country->id }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="created_at" class="col-sm-2 control-label">Created at</label>
                    <div class="col-sm-10">
                        <input disabled type="text" class="form-control" id="created_at" name="created_at" placeholder="Created at" value="{{ $country->created_at }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="updated_at" class="col-sm-2 control-label">Updated at</label>
                    <div class="col-sm-10">
                        <input disabled type="text" class="form-control" id="updated_at" name="updated_at" placeholder="Updated at" value="{{ $country->updated_at }}">
                    </div>
                </div>
                <hr/>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        @if ($errors->has('name'))
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @else
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $country->name }}">
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('alpha2') ? 'has-error' : ''}}">
                    <label for="alpha2" class="col-sm-2 control-label">Alpha2</label>
                    <div class="col-sm-10">
                        @if ($errors->has('alpha2'))
                            <input type="text" class="form-control" id="alpha2" name="alpha2" placeholder="Alpha2" value="{{ old('alpha2') }}">
                            <span class="help-block">{{ $errors->first('alpha2') }}</span>
                        @else
                            <input type="text" class="form-control" id="alpha2" name="alpha2" placeholder="Alpha2" value="{{ $country->alpha2 }}">
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('alpha3') ? 'has-error' : ''}}">
                    <label for="alpha3" class="col-sm-2 control-label">Alpha3</label>
                    <div class="col-sm-10">
                        @if ($errors->has('alpha3'))
                            <input type="text" class="form-control" id="alpha3" name="alpha3" placeholder="Alpha3" value="{{ old('alpha3') }}">
                            <span class="help-block">{{ $errors->first('alpha3') }}</span>
                        @else
                            <input type="text" class="form-control" id="alpha3" name="alpha3" placeholder="Alpha3" value="{{ $country->alpha3 }}">
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('alphaNumeric') ? 'has-error' : ''}}">
                    <label for="alphaNumeric" class="col-sm-2 control-label">Alpha numeric</label>
                    <div class="col-sm-10">
                        @if ($errors->has('name'))
                            <input type="text" class="form-control" id="alphaNumeric" name="alphaNumeric" placeholder="Alpha numeric" value="{{ old('alphaNumeric') }}">
                            <span class="help-block">{{ $errors->first('alphaNumeric') }}</span>
                        @else
                            <input type="text" class="form-control" id="alphaNumeric" name="alphaNumeric" placeholder="Alpha numeric" value="{{ $country->alphaNumeric }}">
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('continent') ? 'has-error' : ''}}">
                    <label for="continent" class="col-sm-2 control-label">Continent</label>
                    <div class="col-sm-10">
                        <select id="continent" name="continent" class="form-control">
                            @foreach($continents as $continent)
                                @if($country->continent->id == $continent->id)
                                    <option value="{{ $continent->id }}" selected>{{ $continent->name }}</option>
                                @else
                                    <option value="{{ $continent->id }}">{{ $continent->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('continent'))
                            <span class="help-block">{{ $errors->first('continent') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection
