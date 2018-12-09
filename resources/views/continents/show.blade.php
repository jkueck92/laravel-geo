@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('continents.index') }}">Continents</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('continents.show', $continent->id) }}">Show ({{ $continent->name }})</a></li>
        </ol>
    </nav>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Show continent - ({{ $continent->name }})</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('continents.edit', $continent->id) }}" type="button" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
            </div>
        </div>
        <div class="box-body form-horizontal">
            <div class="form-group">
                <label for="id" class="col-sm-2 control-label">Id</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="id" name="id" placeholder="Id" value="{{ $continent->id }}">
                </div>
            </div>
            <div class="form-group">
                <label for="created_at" class="col-sm-2 control-label">Created at</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="created_at" name="created_at" placeholder="Created at" value="{{ $continent->created_at }}">
                </div>
            </div>
            <div class="form-group">
                <label for="updated_at" class="col-sm-2 control-label">Updated at</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="updated_at" name="updated_at" placeholder="Updated at" value="{{ $continent->updated_at }}">
                </div>
            </div>
            <hr/>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $continent->name }}">
                </div>
            </div>
            <div class="form-group">
                <label for="code" class="col-sm-2 control-label">Code</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="code" name="code" placeholder="Code" value="{{ $continent->code }}">
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Countries from - ({{ $continent->name }})</h3>
        </div>
        <div class="box-body ">
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
                @forelse($countries as $country)
                    <tr>
                        <th scope="row" style="text-align: center;">{{ $country->id }}</th>
                        <td><a href="{{ route('countries.show', $country->id) }}">{{ $country->name }}</a></td>
                        <td style="text-align: center;">{{ $country->alpha2 }}</td>
                        <td style="text-align: center;">{{ $country->alpha3 }}</td>
                        <td style="text-align: center;">{{ $country->alphaNumeric }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">No entries found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            {{ $countries->links('pagination.default') }}
        </div>
    </div>
@endsection
