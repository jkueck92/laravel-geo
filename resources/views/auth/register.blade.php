<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign up</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="{{ asset("adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset("adminlte/bower_components/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset("adminlte/bower_components/Ionicons/css/ionicons.min.css") }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset("adminlte/dist/css/AdminLTE.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("adminlte/plugins/iCheck/square/blue.css") }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-box-body">
        <form class="" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
            @csrf
            <div class="form-group has-feedback {{ $errors->has('firstname') ? 'has-error' : ''}}">
                <input type="text" class="form-control" placeholder="Firstname" id="firstname" name="firstname">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('firstname'))
                    <span class="help-block">{{ $errors->first('firstname') }}</span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('lastname') ? 'has-error' : ''}}">
                <input type="text" class="form-control" placeholder="Lastname" id="lastname" name="lastname">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('lastname'))
                    <span class="help-block">{{ $errors->first('lastname') }}</span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : ''}}">
                <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : ''}}">
                <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset ("adminlte/bower_components/jquery/dist/jquery.min.js") }}"></script>
<script src="{{ asset ("adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<script src="{{ asset ("adminlte/plugins/iCheck/icheck.min.js") }}"></script>
</body>
</html>