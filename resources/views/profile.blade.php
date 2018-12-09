@extends('layouts.app')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Profil - ({{ $user->firstname }} {{ $user->lastname }})</h3>
        </div>
        <form class="form-horizontal" method="post" action="{{ route('profile.update') }}">
            @method('PATCH')
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">Id</label>
                    <div class="col-sm-10">
                        <input disabled type="text" class="form-control" id="id" name="id" placeholder="Id" value="{{ $user->id }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="created_at" class="col-sm-2 control-label">Created at</label>
                    <div class="col-sm-10">
                        <input disabled type="text" class="form-control" id="created_at" name="created_at" placeholder="Created at" value="{{ $user->created_at }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="updated_at" class="col-sm-2 control-label">Updated at</label>
                    <div class="col-sm-10">
                        <input disabled type="text" class="form-control" id="updated_at" name="updated_at" placeholder="Updated at" value="{{ $user->updated_at }}">
                    </div>
                </div>
                <hr/>
                <div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
                    <label for="firstname" class="col-sm-2 control-label">Firstname</label>
                    <div class="col-sm-10">
                        @if ($errors->has('firstname'))
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" value="{{ old('firstname') }}">
                            <span class="help-block">{{ $errors->first('firstname') }}</span>
                        @else
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" value="{{ $user->firstname }}">
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
                    <label for="lastname" class="col-sm-2 control-label">Lastname</label>
                    <div class="col-sm-10">
                        @if ($errors->has('lastname'))
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" value="{{ old('lastname') }}">
                            <span class="help-block">{{ $errors->first('lastname') }}</span>
                        @else
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" value="{{ $user->lastname }}">
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        @if ($errors->has('email'))
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @else
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email }}">
                        @endif
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Last logins</h3>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" style="text-align: center;">#</th>
                    <th scope="col">Login</th>
                    <th scope="col">Ip</th>
                </tr>
                </thead>
                <tbody>
                @foreach($logins as $login)
                    <tr>
                        <th scope="row" style="text-align: center;">{{ $login->id }}</th>
                        <td>{{ $login->created_at }}</td>
                        <td>{{ $login->ip }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            {{ $logins->links('pagination.default') }}
        </div>
    </div>
@endsection
