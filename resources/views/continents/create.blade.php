@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('continents.index') }}">Continents</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('continents.create') }}">Create continent</a></li>
        </ol>
    </nav>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create continent</h3>
        </div>
        <form class="form-horizontal" method="post" action="{{ route('continents.store') }}">
            @csrf
            <div class="box-body">
                <div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
                    <label for="code" class="col-sm-2 control-label">Code</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="code" name="code" placeholder="Code" value="{{ old('code') }}">
                        @if ($errors->has('code'))
                            <span class="help-block">{{ $errors->first('code') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection
