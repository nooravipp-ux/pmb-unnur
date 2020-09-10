<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portal PMB SistemInformasi Akademik</title>

    <!-- Bootstrap -->
    <link href="{{ asset('template/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('template/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('template/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('template/build/css/custom.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/build/css/login.css')}}">
</head>

<body>
    <div class="body"></div>
    <div class="grad"></div>
    <div class="header">
        <div>PMB<span>Nurtanio</span></div>
    </div>
    <br>
    <div class="login">
        <form action="{{route('login')}}" method="POST">
            {{ csrf_field() }}
            <input type="email" placeholder="input Email" name="email" required><br>
            <input type="password" placeholder="password" name="password" required><br>
            <input type="submit" class="button" value="{{ __('Log in') }}">
        </form>
    </div>
    {{-- <div class="container" style="margin-top: 151px;">
        <div class="row">
            <div class="col">
                <div class="login-wrap">
                    <div class="login-html">
                        <form action="{{route('login')}}" method="POST" style="margin-top: 100px;">
    {{ csrf_field() }}
    <input type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign
        In</label>
    <input type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
    <div class="login-form">
        <div class="sign-in-htm">
            <div class="group">
                <label for="email" class="label">Email</label>
                <input class="input" id="email" name="email" type="email" class="form-control" placeholder="Email"
                    required="" />
            </div>
            <div class="group">
                <label for="pass" class="label">Password</label>
                <input class="input" id="password" name="password" type="password" class="form-control"
                    placeholder="Password" required="" />
            </div>
            <div class="group">
                <input type="submit" class="button" value="{{ __('Log in') }}">
            </div>
        </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div> --}}
</body>

</html>
