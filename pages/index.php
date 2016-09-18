<?php
//if (Login::isLogged(Login::$_login_front)) {
 // Helper::redirect(Login::$_dashboard_front);
 // }

$objForm = new Form();
$objUser =  new User();


if ($objForm->isPost('login_name')) {

  if ( 
       $objUser->isUser(
          $objForm->getPost('login_name'),
          $objForm->getPost('login_password')
          )
      ) {
      Login::loginFront($objUser->_id, $objUser->_name, Url::getReferrerUrl());
        

  }
    
  }
 

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lydia Cloud For Sale | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../../plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class="row">

    <div class="col-md-2">
        <br><br><br><br>

        <div class="box box-primary">
            <div class="box-header with-border">

                <h3 class="box-title">Change Log Alpha 2(ver 0.2)</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <ul>
                    <li>Sidebar Bug fixes </li>
                    <li>Separate Window Added to view stock Level</li>
                    <li>Separate Window Added to view Target Completion</li>
                    <li>Added View DSR(under sales reports)  </li>
                    <li>Area Handling Updated</li>
                    <li>"Create Invoice" UI optimized </li>
                    <li>In Area Handling not showing the AreaId is fixes </li>
                </ul>
            </div><!-- /.box-body -->
        </div><!-- /.box -->







        </p>

    </div>



    <div class="col-md-8">

<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Lydia Cloud For Sale for Radiant Marketing</a>
        <small>Alpha 2</small>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your Account</p>




        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="login_name" id="login_name" class="form-control" placeholder="Email" name="email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="login_password" id="login_password" class="form-control" placeholder="Password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Sign In</button>
                </div><!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
           
        </div><!-- /.social-auth-links -->



    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</div>
</div>


<!-- jQuery 2.1.4 -->
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });



</script>
</body>
</html>