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
<link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/style-responsive.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/loginform.css')}}" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <style>
/*    --------------------------------------------------
	:: Login Section
	-------------------------------------------------- */
#login {
    padding-top: 50px
}
#login .form-wrap {
    width: 30%;
    margin: 0 auto;
}
#login h1 {
    color: #1fa67b;
    font-size: 18px;
    text-align: center;
    font-weight: bold;
    padding-bottom: 20px;
}
#login .form-group {
    margin-bottom: 25px;
}
#login .checkbox {
    margin-bottom: 20px;
    position: relative;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
}
#login .checkbox.show:before {
    content: '\e013';
    color: #1fa67b;
    font-size: 17px;
    margin: 1px 0 0 3px;
    position: absolute;
    pointer-events: none;
    font-family: 'Glyphicons Halflings';
}
#login .checkbox .character-checkbox {
    width: 25px;
    height: 25px;
    cursor: pointer;
    border-radius: 3px;
    border: 1px solid #ccc;
    vertical-align: middle;
    display: inline-block;
}
#login .checkbox .label {
    color: #6d6d6d;
    font-size: 13px;
    font-weight: normal;
}
#login .btn.btn-custom {
    font-size: 14px;
	margin-bottom: 20px;
}
#login .forget {
    font-size: 13px;
	text-align: center;
	display: block;
}

/*    --------------------------------------------------
	:: Inputs & Buttons
	-------------------------------------------------- */
.form-control {
    color: #212121;
}
.btn-custom {
    color: #fff;
	background-color: #1fa67b;
}
.btn-custom:hover,
.btn-custom:focus {
    color: #fff;
}

/*    --------------------------------------------------
    :: Footer
	-------------------------------------------------- */
#footer {
    color: #6d6d6d;
    font-size: 12px;
    text-align: center;
}
#footer p {
    margin-bottom: 0;
}
#footer a {
    color: inherit;
}


    </style>
</head>

<body>
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-wrap">
                    <h1>Log in with your email account</h1>
                    {{ Form::open(array('action' => array('HomeController@authenticate'), 'files' => true, 'class'=>'login-form-signin', 'id'=>'loginForm')) }}
                        <form role="form" action="javascript:;" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="username" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="key" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <span class="character-checkbox" onclick="showPassword()"></span>
                                <span class="label">Show password</span>
                            </div>
                            <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                        </form>
                        <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
                        <hr>
                    {{ Form::close() }}
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->

    </section>

    <div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Recovery password</h4>
                </div>
                <div class="modal-body">
                    <p>Type your email account</p>
                    <input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-custom">Recovery</button>
                </div>
            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p>Neighbor Network © - 2015</p>
                    <p>Powered by <strong><a href="https://www.facebook.com/weerayoot.ngandee" target="_blank">Weerayoot Ngandee</a></strong></p>
                </div>
            </div>
        </div>
    </footer>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('assets/js/jquery.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/retina.min.js')}}"></script>
<script>
    function showPassword() {

        var key_attr = $('#key').attr('type');

        if(key_attr != 'text') {

            $('.checkbox').addClass('show');
            $('#key').attr('type', 'text');

        } else {

            $('.checkbox').removeClass('show');
            $('#key').attr('type', 'password');

        }

    }

</script>

</body>
</html>