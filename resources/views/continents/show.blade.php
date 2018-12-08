@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('continents.index') }}">Continents</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('continents.show', $continent->id) }}">Show ({{ $continent->name }})</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Show continent - ({{ $continent->name }})</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">Id</label>
                        <div class="col-sm-10">
                            <input disabled type="text" class="form-control" id="id" name="id" placeholder="Id" value="{{ $continent->id }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="created_at" class="col-sm-2 col-form-label">Created at</label>
                        <div class="col-sm-10">
                            <input disabled type="text" class="form-control" id="created_at" name="created_at" placeholder="Created at" value="{{ $continent->created_at }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updated_at" class="col-sm-2 col-form-label">Updated at</label>
                        <div class="col-sm-10">
                            <input disabled type="text" class="form-control" id="updated_at" name="updated_at" placeholder="Updated at" value="{{ $continent->updated_at }}">
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input disabled type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $continent->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-10">
                            <input disabled type="text" class="form-control" id="code" name="code" placeholder="Code" value="{{ $continent->code }}">
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="card">
                <div class="card-header">Countries from - ({{ $continent->name }})</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" style="text-align: center;">#</th>
                            <th scope="col">Name</th>
                            <th scope="col" style="text-align: center;">Aplha2</th>
                            <th scope="col" style="text-align: center;">Aplha3</th>
                            <th scope="col" style="text-align: center;">Aplha numeric</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($countries as $country)
                            <tr>
                                <th scope="row" style="text-align: center;">{{ $country->id }}</th>
                                <td><a href="{{ route('countries.show', $country->id) }}">{{ $country->name }}</a></td>
                                <td style="text-align: center;">{{ $country->alpha2 }}</td>
                                <td style="text-align: center;">{{ $country->alpha3 }}</td>
                                <td style="text-align: center;">{{ $country->alphaNumeric }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $countries->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
