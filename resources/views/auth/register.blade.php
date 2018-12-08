@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-2 col-form-label">Firstname</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('firstname') ? 'is-invalid' : ''}}" id="firstname" name="firstname" placeholder="Firstname"
                                       value="{{ old('firstname') }}">
                                @if ($errors->has('firstname'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('firstname') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-sm-2 col-form-label">Lastname</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : ''}}" id="lastname" name="lastname" placeholder="Lastname"
                                       value="{{ old('lastname') }}">
                                @if ($errors->has('lastname'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('lastname') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" placeholder="Email"
                                       value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password" placeholder="Password"
                                       value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
