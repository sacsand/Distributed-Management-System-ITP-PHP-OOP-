<?php

$shops = new SHOPS();
if(isset($_GET['indexNo']))
{
    $res=mysql_query("SELECT * FROM shops WHERE indexNo=".$_GET['indexNo']);
    $row=mysql_fetch_array($res);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> -->
    <![endif]-->
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <?php require_once('_header.php')?>
    <?php require_once('_sidebar.php')?>





    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                edit Shop details

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">edit Shop details</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="/?page=shops/shops_dbcrud&amp;indexNo=<?php echo $_GET['indexNo'] ?>" method="post" class="form-horizontal" id="register-form">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">shopId:</label>
                    <div class="col-sm-10">
                        <input type="text" name="shopId" placeholder="shop id" value="<?php echo $row['shopId'] ?>" class="form-control" readonly>

                    </div>
                </div>

       
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">routeId</label>
                    <div class="col-sm-10">
                        <input type="text" name="routeId" class="form-control" value="<?php echo $row['routeId'] ;?>" readonly>

                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">

                        <input type="text" name="name" placeholder="name" required class="form-control" ng-model="user.name" value="<?php echo $row['name'] ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" placeholder="address" class="form-control" value="<?php echo $row['address'] ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" placeholder="phone" class="form-control" value="<?php echo $row['phone'] ?>" />
                    </div>
                </div>

                    <div class="fieldgroup">
                        <input type="submit" name="update" value="update" class="btn btn-danger">
                    </div>



              </form>




        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!--footer php-->



    <?php require_once('_footer.php')?>


    <script type="text/javascript" src="jquery.validate.min.js"></script>
    <script type="text/javascript">

        $('document').ready(function()
        {
            $("#register-form").validate({
                rules: {
                    shopId: "required",
                    name: "required"

                },
                messages: {
                    shopId: "Please enter your firstname",
                    name: "Please enter your lastname"

                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

        });
    </script>








</body>
</html>