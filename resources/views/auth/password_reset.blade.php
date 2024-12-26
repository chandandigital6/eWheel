<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$data['title']}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->

    <link rel="stylesheet" href="{{ asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('asset/dist/css/adminlte.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">


    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @elseif(session('success'))
        <div class="alert alert-primary">
            {{ session('success') }}
        </div>
    @elseif(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    <div class="card">
        <div class="card-body register-card-body">

            <p>{{$data['body']}}</p>
            <a href="{{$data['url']}}">reset password</a>



        </div>

    </div>
</div>

<script src="{{asset('asset/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('asset/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
