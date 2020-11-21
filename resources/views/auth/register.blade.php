<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
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
            <div class="card-header text-center"><a href="/">B2B E-Commerce Application<span class="splash-description">Retailer Registration</a></span></div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg  @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Name"  required autocomplete="on" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
                        <input class="form-control form-control-lg" id="password-confrim" type="password" name="password_confirmation" required placeholder="Password">                        
                    </div>
                    <div class="form-group">
                        <textarea name="address" class="form-control form-control-lg" id="address" cols="40" placeholder="Enter Your Address" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="city" type="text" name="city" required placeholder="Enter Your City">                        
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="pincode" type="text" name="pincode" required placeholder="Enter Your Pincode">                        
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="mobile" type="text" name="mobile" required placeholder="Enter Your Mobile">                        
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="shoplicense" type="File" name="shoplicense" required placeholder="Upload Your Shop License">                        
                    </div>                    
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                </form>                
            </div>     
            <a href="{{ route('login') }}" class="mt-1 text-center">Back To Login</a>       
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