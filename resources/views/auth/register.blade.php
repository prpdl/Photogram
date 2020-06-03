<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
    <title>Document</title>
</head>
<body>


<hr>

<div class="card bg-light">
    @if(session()->has('message'))
        <div class="alert alert-primary" role="alert">
            <strong>Sucess</strong> {{ session()->get('message') }}
        </div>
    @endif

    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Create Account</h4>
        <p class="text-center">Get started with your free account</p>
        <p>
            <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
            <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
        </p>
        <p class="divider-text">
            <span class="bg-light">OR</span>
        </p>
        <form action="{{ route('customRegistration.register') }}" method=post>
            {{csrf_field()}}
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full name"
                       type="text" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address"
                       type="email" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong> {{ $message ?? ''}}</strong>
                </span>
                @enderror
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                </div>
                <select class="custom-select" style="max-width: 120px;">
                    <option selected="">+977</option>
                    <option value="1">+61</option>
                    <option value="2">+00</option>
                    <option value="3">+701</option>
                </select>
                <input name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror()"
                       placeholder="Phone number" type="text" required>
                @error('phoneNumber')
                <span class="invalid-feedback" role="alert">
                    <strong> {{ $message ?? ''}}</strong>
                </span>
                @enderror
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                </div>
                <select class="form-control" name="job">
                    <option selected> Select job type</option>
                    <option>Designer</option>
                    <option>Manager</option>
                    <option>Accounting</option>
                </select>
            </div> <!-- form-group end.// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="password" class="form-control @error('password') is-invalid @enderror"
                       placeholder="Create password" type="password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong> {{ $message ?? ''}}</strong>
                </span>
                @enderror
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="password_confirmation" class="form-control" placeholder="Repeat password" type="password"
                       required>
            </div> <!-- form-group// -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Create Account</button>
            </div> <!-- form-group// -->
            <p class="text-center">Have an account? <a href="{{route('login')}}">Log In</a></p>
        </form>
    </article>
</div> <!-- card.// -->

</body>

<!--container end.//-->

</html>
