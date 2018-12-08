@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Hello, {{ Auth()->user()->firstname }} {{ Auth()->user()->lastname }}</h1>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="{{ route('continents.index') }}" role="button">Continents</a>
                <a class="btn btn-primary btn-lg" href="{{ route('countries.index') }}" role="button">Countries</a>
                <a class="btn btn-primary btn-lg" href="{{ route('airports.index') }}" role="button">Airports</a>
            </div>
        </div>
    </div>
@endsection
