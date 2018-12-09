@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('continents.index') }}">Continents</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('continents.edit', $continent->id) }}">Edit ({{ $continent->name }})</a></li>
        </ol>
    </nav>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit continent - ({{ $continent->name }})</h3>
        </div>
        <form class="form-horizontal" method="post" action="{{ route('continents.update', $continent->id) }}">
            @method('PATCH')
            @csrf
            <div class="box-body">
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
                <div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        @if ($errors->has('name'))
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @else
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $continent->name }}">
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="code" class="col-sm-2 control-label">Code</label>
                    <div class="col-sm-10">
                        <input readonly type="text" class="form-control" id="code" name="code" placeholder="Code" value="{{ $continent->code }}">
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection
