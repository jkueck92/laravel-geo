@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('airports.index') }}">Airports</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('airports.edit', $airport->id) }}">Edit ({{ $airport->name }})</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit airport - ({{ $airport->name }})</div>
                <form method="post" action="{{ route('airports.update', $airport->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="id" class="col-sm-2 col-form-label">Id</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="id" name="id" placeholder="Id" value="{{ $airport->id }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="created_at" class="col-sm-2 col-form-label">Created at</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="created_at" name="created_at" placeholder="Created at" value="{{ $airport->created_at }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="updated_at" class="col-sm-2 col-form-label">Updated at</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="updated_at" name="updated_at" placeholder="Updated at" value="{{ $airport->updated_at }}">
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
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $airport->name }}">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="iata" class="col-sm-2 col-form-label">IATA</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" id="iata" name="iata" placeholder="IATA" value="{{ $airport->iata }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="icao" class="col-sm-2 col-form-label">ICAO</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" id="icao" name="icao" placeholder="ICAO" value="{{ $airport->icao }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-sm-2 col-form-label">Country</label>
                            <div class="col-sm-10">
                                <select id="country" name="country" class="form-control">
                                    @foreach($countries as $country)
                                        @if($airport->country->id == $country->id)
                                            <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                        @else
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
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
