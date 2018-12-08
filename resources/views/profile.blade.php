@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Informaton!</strong> {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Profil - ({{ $user->firstname }} {{ $user->lastname }})</div>
                <form method="post" action="{{ route('profile.update') }}">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="id" class="col-sm-2 col-form-label">Id</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="id" name="id" placeholder="Id" value="{{ $user->id }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="created_at" class="col-sm-2 col-form-label">Created at</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="created_at" name="created_at" placeholder="Created at" value="{{ $user->created_at }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="updated_at" class="col-sm-2 col-form-label">Updated at</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control" id="updated_at" name="updated_at" placeholder="Updated at" value="{{ $user->updated_at }}">
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-2 col-form-label">Firstname</label>
                            <div class="col-sm-10">
                                @if ($errors->has('firstname'))
                                    <input type="text" class="form-control is-invalid" id="firstname" name="firstname" placeholder="Firstname" value="{{ old('firstname') }}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('firstname') }}
                                    </div>
                                @else
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" value="{{ $user->firstname }}">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-sm-2 col-form-label">Lastname</label>
                            <div class="col-sm-10">
                                @if ($errors->has('lastname'))
                                    <input type="text" class="form-control is-invalid" id="lastname" name="lastname" placeholder="Lastname" value="{{ old('lastname') }}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('lastname') }}
                                    </div>
                                @else
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" value="{{ $user->lastname }}">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                @if ($errors->has('email'))
                                    <input type="email" class="form-control is-invalid" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @else
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <br/>
            <div class="card">
                <div class="card-header">Last lgins from - ({{ $user->firstname }} {{ $user->lastname }})</div>
                <div class="card-body">
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
                <div class="card-footer">
                    {{ $logins->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
