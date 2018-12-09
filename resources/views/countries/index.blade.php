@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('countries.index') }}">Countries</a></li>
        </ol>
    </nav>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Information!</h4>
            {{ $message }}
        </div>
    @endif
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Countries</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('countries.create') }}" type="button" class="btn btn-default btn-sm"><i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Alpha2</th>
                    <th scope="col">Alpha3</th>
                    <th scope="col">Apla numeric</th>
                    <th scope="col" style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($countries as $country)
                    <tr>
                        <th scope="row">{{ $country->id }}</th>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->alpha2 }}</td>
                        <td>{{ $country->alpha3 }}</td>
                        <td>{{ $country->alphaNumeric }}</td>
                        <td style="width: 21%; text-align: center">
                            <form action="{{ route('countries.destroy', $country->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('countries.show', $country->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('countries.edit', $country->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">No entries found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            {{ $countries->links('pagination.default') }}
        </div>
    </div>
@endsection
