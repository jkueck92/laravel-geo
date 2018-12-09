<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign in</title>
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
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-box-body">
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @csrf
            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : ''}}">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : ''}}">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Sign in</button>
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