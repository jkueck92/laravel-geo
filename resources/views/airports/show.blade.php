@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('airports.index') }}">Airports</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('airports.show', $airport->id) }}">Show ({{ $airport->name }})</a></li>
        </ol>
    </nav>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Show airport - ({{ $airport->name }})</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('airports.edit', $airport->id) }}" type="button" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
            </div>
        </div>
        <div class="box-body form-horizontal">
            <div class="form-group">
                <label for="id" class="col-sm-2 control-label">Id</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="id" name="id" placeholder="Id" value="{{ $airport->id }}">
                </div>
            </div>
            <div class="form-group">
                <label for="created_at" class="col-sm-2 control-label">Created at</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="created_at" name="created_at" placeholder="Created at" value="{{ $airport->created_at }}">
                </div>
            </div>
            <div class="form-group">
                <label for="updated_at" class="col-sm-2 control-label">Updated at</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="updated_at" name="updated_at" placeholder="Updated at" value="{{ $airport->updated_at }}">
                </div>
            </div>
            <hr/>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $airport->name }}">
                </div>
            </div>
            <div class="form-group">
                <label for="iata" class="col-sm-2 control-label">IATA</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="iata" name="iata" placeholder="IATA" value="{{ $airport->iata }}">
                </div>
            </div>
            <div class="form-group">
                <label for="icao" class="col-sm-2 control-label">ICAO</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="icao" name="icao" placeholder="ICAO" value="{{ $airport->icao }}">
                </div>
            </div>
            <div class="form-group">
                <label for="country" class="col-sm-2 control-label">Country</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{ $airport->country->name }}">
                </div>
            </div>
        </div>
    </div>
@endsection
