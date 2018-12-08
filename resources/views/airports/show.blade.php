@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('airports.index') }}">Airports</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('airports.show', $airport->id) }}">Show ({{ $airport->name }})</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Show airport - ({{ $airport->name }})</div>
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
                                <input disabled type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $airport->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="iata" class="col-sm-2 col-form-label">IATA</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="iata" name="iata" placeholder="IATA" value="{{ $airport->iata }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="icao" class="col-sm-2 col-form-label">ICAO</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="icao" name="icao" placeholder="ICAO" value="{{ $airport->icao }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-sm-2 col-form-label">Country</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{ $airport->country->name }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
