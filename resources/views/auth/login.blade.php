<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMB | UNNUR</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('logtem/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<body>


<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center"><a href="{{url('/')}}">PMB-UNNUR</a></h2>
		    <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-uppercase">Email</label>
                    <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required="">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                    <div class="form-check">

                    <button type="submit" class="btn btn-login float-right">Log in</button>
                    @if (Route::has('password.request'))
                    <small><a class="reset_pass" href="{{ route('password.request') }}">Lost your password?</a></small>
                    @endif
                </div>

            </form>
                <div class="copy-text">Universitas Nurtanio Bandung</div>
                        </div>
                        <div class="col-md-8 banner-sec">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                <img class="d-block img-fluid" src="{{ asset('logtem/img/unnur.jpg') }}" alt="First slide">
                            </div>

                        </div>
                    </div>
                </div>
</section>
</body>

</html>
