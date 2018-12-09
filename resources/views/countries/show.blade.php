@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('countries.index') }}">Countries</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('countries.show', $country->id) }}">Show ({{ $country->name }})</a></li>
        </ol>
    </nav>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Show country - ({{ $country->name }})</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('countries.edit', $country->id) }}" type="button" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
            </div>
        </div>
        <div class="box-body form-horizontal">
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
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $country->name }}">
                </div>
            </div>
            <div class="form-group">
                <label for="alpha2" class="col-sm-2 control-label">Alpha2</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="alpha2" name="alpha2" placeholder="Alpha2" value="{{ $country->alpha2 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="alpha3" class="col-sm-2 control-label">Alpha3</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="alpha3" name="alpha3" placeholder="Alpha3" value="{{ $country->alpha3 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="alphaNumeric" class="col-sm-2 control-label">Alpha numeric</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="alphaNumeric" name="alphaNumeric" placeholder="Alpha numeric" value="{{ $country->alphaNumeric }}">
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Airports from - ({{ $country->name }})</h3>
        </div>
        <div class="box-body ">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" style="text-align: center;">#</th>
                    <th scope="col">Name</th>
                    <th scope="col" style="text-align: center;">IATA</th>
                    <th scope="col" style="text-align: center;">ICAO</th>
                </tr>
                </thead>
                <tbody>
                @forelse($airports as $airport)
                    <tr>
                        <th scope="row" style="text-align: center;">{{ $airport->id }}</th>
                        <td><a href="{{ route('airports.show', $airport->id) }}">{{ $airport->name }}</a></td>
                        <td style="text-align: center;">{{ $airport->iata }}</td>
                        <td style="text-align: center;">{{ $airport->icao }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center;">No entries found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            {{ $airports->links('pagination.default') }}
        </div>
    </div>
@endsection
