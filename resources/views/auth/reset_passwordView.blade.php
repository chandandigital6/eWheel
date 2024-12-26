<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
<div class="container">
    <h2>Reset Password</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('store-password') }}">
        @csrf

        <input type="hidden" name="email" value="{{ $email }}">

        <div>
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" required autocomplete="new-password">
        </div>

        <div>
            <label for="password_confirmation">Confirm New Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
        </div>

        <button type="submit">Reset Password</button>
    </form>
</div>
</body>
</html>



{{--    <!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Reset Password</title>--}}
{{--    <link rel="icon" href="{{asset('logo.jpg')}}" type="image/x-icon">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">--}}
{{--    <link rel="stylesheet" href="{{ asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">--}}
{{--    <style>--}}
{{--        body {--}}
{{--            height: 100vh;--}}
{{--            display: flex;--}}
{{--            justify-content: center;--}}
{{--            align-items: center;--}}
{{--            background-color: #f4f6f9;--}}
{{--        }--}}
{{--        .login-box {--}}
{{--            width: 360px;--}}
{{--            margin: auto;--}}
{{--        }--}}
{{--        .login-logo a {--}}
{{--            font-size: 35px;--}}
{{--            font-weight: bold;--}}
{{--            color: #007bff;--}}
{{--            text-decoration: none;--}}
{{--        }--}}
{{--        .login-card-body {--}}
{{--            border-radius: 10px;--}}
{{--            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);--}}
{{--            padding: 30px;--}}
{{--            background-color: #fff;--}}
{{--        }--}}
{{--        .login-box-msg {--}}
{{--            margin-bottom: 20px;--}}
{{--            font-size: 18px;--}}
{{--            text-align: center;--}}
{{--        }--}}
{{--        .form-control {--}}
{{--            border-radius: 5px;--}}
{{--        }--}}
{{--        .btn-primary {--}}
{{--            border-radius: 5px;--}}
{{--            background-color: #007bff;--}}
{{--            border-color: #007bff;--}}
{{--        }--}}
{{--        .btn-primary:hover {--}}
{{--            background-color: #0056b3;--}}
{{--            border-color: #0056b3;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body class="hold-transition login-page">--}}
{{--<div class="login-box">--}}
{{--    <div class="login-logo">--}}
{{--        <a href="#"><b>Real</b>Victory</a>--}}
{{--    </div>--}}
{{--    <div class="card login-card-body">--}}
{{--        <p class="login-box-msg">create new Password</p>--}}
{{--        @if(session('error'))--}}
{{--            <div class="alert alert-danger">--}}
{{--                {{ session('error') }}--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        @if(session('success'))--}}
{{--            <div class="alert alert-success">--}}
{{--                {{ session('success') }}--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <form action="{{ route('store-password') }}" method="post">--}}
{{--            @csrf--}}
{{--            <input type="hidden" name="email" value="{{ $email }}">--}}
{{--            <div class="input-group mb-3">--}}
{{--                <input type="email" class="form-control" placeholder="Email" name="email">--}}
{{--                <div class="input-group-append">--}}
{{--                    <div class="input-group-text">--}}
{{--                        <span class="fas fa-envelope"></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--                        <div class="input-group mb-3">--}}
{{--                            <input type="password" class="form-control" placeholder="Password" name="password"  required autocomplete="new-password">--}}
{{--                            <div class="input-group-append">--}}
{{--                                <div class="input-group-text">--}}
{{--                                    <span class="fas fa-lock"></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--            <div class="input-group mb-3">--}}
{{--                <input type="password" class="form-control" placeholder="password_confirmation" name="password_confirmation"  required autocomplete="new-password">--}}
{{--                <div class="input-group-append">--}}
{{--                    <div class="input-group-text">--}}
{{--                        <span class="fas fa-lock"></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <button type="submit" class="btn btn-primary btn-block">Submit</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--        <p class="mt-3 mb-1 text-center">--}}
{{--            <a href="{{ route('login-form') }}" class="btn btn-warning w-100">login</a>--}}
{{--        </p>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>--}}
{{--<script src="{{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}
{{--<script src="{{ asset('asset/dist/js/adminlte.min.js') }}"></script>--}}
{{--</body>--}}
{{--</html>--}}

