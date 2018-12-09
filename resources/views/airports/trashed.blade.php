@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('airports.index') }}">Airports</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('airports.trashed') }}">Trashed airports</a></li>
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
            <h3 class="box-title">Trashed airports</h3>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Deleted at</th>
                    <th scope="col" style="text-align: center;">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($airports as $airport)
                    <tr>
                        <th scope="row">{{ $airport->id }}</th>
                        <td>{{ $airport->name }}</td>
                        <td>{{ $airport->created_at }}</td>
                        <td>{{ $airport->deleted_at }}</td>
                        <td style="text-align: center;">
                            <form action="{{ route('airports.forceDelete', $airport->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Force delete</button>
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
