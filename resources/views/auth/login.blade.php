<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mah'ad Aly | Login</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Welcome to IN+</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback" style="width: 100%;">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                      <input type="password" name="password" class="form-control" placeholder="Password">
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                    </div>

                <div class="form-group">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                            </label>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="{{ route('password.request') }}"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">Create an account</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

</body>

</html>
