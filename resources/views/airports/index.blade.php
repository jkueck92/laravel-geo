@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('airports.index') }}">Airports</a></li>
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
            <h3 class="box-title">Airports</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('airports.trashed') }}" type="button" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a>
                <a href="{{ route('airports.create') }}" type="button" class="btn btn-default btn-sm"><i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">IATA</th>
                    <th scope="col">ICAO</th>
                    <th scope="col" style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($airports as $airport)
                    <tr>
                        <th scope="row">{{ $airport->id }}</th>
                        <td>{{ $airport->name }}</td>
                        <td>{{ $airport->iata }}</td>
                        <td>{{ $airport->icao }}</td>
                        <td style="width: 21%; text-align: center">
                            <form action="{{ route('airports.destroy', $airport->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('airports.show', $airport->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('airports.edit', $airport->id) }}">Edit</a>
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
            {{ $airports->links('pagination.default') }}
        </div>
    </div>
@endsection
