<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('owner/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{ asset('owner/assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('owner/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('owner/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="/">B2B E-Commerce Application<span class="splash-description">Reset Password</a></span></div>
            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <input class="form-control form-control-lg  @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="Email-ID"  required autocomplete="on" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg  @error('password') is-invalid @enderror" id="password" type="password" name="password" required placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password-confrim" type="password" name="password_confirmation" required placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{ asset('owner/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('owner/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
</body>
 
</html>