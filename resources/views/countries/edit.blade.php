@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('countries.index') }}">Countries</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('countries.edit', $country->id) }}">Edit ({{ $country->name }})</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit country - ({{ $country->name }})</div>
                <form method="post" action="{{ route('countries.update', $country->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="id" class="col-sm-2 col-form-label">Id</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="id" name="id" placeholder="Id" value="{{ $country->id }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="created_at" class="col-sm-2 col-form-label">Created at</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="created_at" name="created_at" placeholder="Created at" value="{{ $country->created_at }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="updated_at" class="col-sm-2 col-form-label">Updated at</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="updated_at" name="updated_at" placeholder="Updated at" value="{{ $country->updated_at }}">
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                @if ($errors->has('name'))
                                    <input type="text" class="form-control is-invalid" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @else
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $country->name }}">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alpha2" class="col-sm-2 col-form-label">Alpha2</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" id="alpha2" name="alpha2" placeholder="Alpha2" value="{{ $country->alpha2 }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alpha3" class="col-sm-2 col-form-label">Alpha3</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" id="alpha3" name="alpha3" placeholder="Alpha3" value="{{ $country->alpha3 }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alphaNumeric" class="col-sm-2 col-form-label">Alpha numeric</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" id="alphaNumeric" name="alphaNumeric" placeholder="Alpha numeric" value="{{ $country->alphaNumeric }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="continent" class="col-sm-2 col-form-label">Continent</label>
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
