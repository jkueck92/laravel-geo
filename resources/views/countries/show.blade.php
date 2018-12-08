@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('countries.index') }}">Countries</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('countries.show', $country->id) }}">Show ({{ $country->name }})</a></li>
        </ol>
    </nav>


    <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Show country - ({{ $country->name }})</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
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
                                <input disabled type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $country->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alpha2" class="col-sm-2 col-form-label">Alpha2</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="alpha2" name="alpha2" placeholder="Alpha2" value="{{ $country->alpha2 }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alpha3" class="col-sm-2 col-form-label">Alpha3</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="alpha3" name="alpha3" placeholder="Alpha3" value="{{ $country->alpha3 }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alphaNumeric" class="col-sm-2 col-form-label">Alpha numeric</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="alphaNumeric" name="alphaNumeric" placeholder="Alpha numeric" value="{{ $country->alphaNumeric }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="continent" class="col-sm-2 col-form-label">Continent</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="continent" name="continent" placeholder="Continent" value="{{ $country->continent->name }}">
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="card">
                    <div class="card-header">Airports from - ({{ $country->name }})</div>
                    <div class="card-body">
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
                            @foreach($airports as $airport)
                                <tr>
                                    <th scope="row" style="text-align: center;">{{ $airport->id }}</th>
                                    <td><a href="{{ route('airports.show', $airport->id) }}">{{ $airport->name }}</a></td>
                                    <td style="text-align: center;">{{ $airport->iata }}</td>
                                    <td style="text-align: center;">{{ $airport->icao }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $airports->links() }}
                    </div>
                </div>
            </div>
        </div>
@endsection
