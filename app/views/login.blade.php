<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/images/favicons/apple-touch-icon-57x57.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/images/favicons/apple-touch-icon-114x114.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/images/favicons/apple-touch-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/images/favicons/apple-touch-icon-60x60.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/images/favicons/apple-touch-icon-120x120.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/images/favicons/apple-touch-icon-76x76.png')}}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/favicons/favicon-96x96.png')}}" sizes="96x96">
<link rel="icon" type="image/png" href="{{ asset('assets/images/favicons/favicon-16x16.png')}}" sizes="16x16">
<link rel="icon" type="image/png" href="{{ asset('assets/images/favicons/favicon-32x32.png')}}" sizes="32x32">
<meta name="msapplication-TileColor" content="#da532c">
<!-- Bootstrap -->
<link href="{{ asset('assets/bs3/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/style-responsive.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/atom-style.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

<style>
html, body {
	height: 100%;
	font-family: 'Open Sans', sans-serif;
	font-weight: 100;
	background: #f7f7f7;
}
</style>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container login-bg">

    <div class="container">

          <form class="form-signin">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>

        </div>

{{--<div style="margin:100px auto 20px;max-width:330px;text-align: center;"><img src="{{ asset('assets/images/logo-green.png')}}"></div>--}}
{{--        {{ Form::open(array('action' => array('HomeController@authenticate'), 'files' => true, 'class'=>'login-form-signin', 'id'=>'loginForm')) }}--}}
            {{--<div class="login-wrap">--}}
                {{--<span style="font-style: italic;"><h5>Email</h5></span>--}}
                {{--<input type="text" autofocus class="form-control" name="username">--}}
                {{--<span style="font-style: italic;"><h5>Password</h5></span>--}}
                {{--<input type="password" class="form-control" name="password">--}}

                {{--<div style="margin-bottom: 10px;">--}}
                    {{--<a href="#myModal" data-toggle="modal"> Forgot Password?</a>--}}
                {{--</div>--}}
                {{--<button type="submit" class="btn btn-round btn-success">Sign in</button>--}}
            {{--</div>--}}
{{--        {{ Form::close() }}--}}
    </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('assets/js/jquery-1.10.2.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('assets/bs3/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/retina.min.js')}}"></script>
</body>
</html>