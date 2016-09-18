
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

<!---VALIDATION____________________________-->
<script type="text/javascript">
    function validate_required(field,alerttxt)
    {
        with (field)
        {
        if (value==null||value=="")
          {alert(alerttxt);return false;}
        else {return true}
        }
        }
        function validate_form(thisform)
        {
        with (thisform)
        {
        if (validate_required(shopId,"shopId must be filled out!")==false)
          {email.focus();return false;}
        }
    }
</script>




</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <?php require_once('_header.php')?>
    <?php require_once('_sidebar.php')?>


    <?php
    $shops = new SHOPS();

    $AreaId=URL::getParam('AreaId');
    ?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                select the Territory

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Shops</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
 <?php
        $res = $shops->get_territory($AreaId); 


           while($row = mysql_fetch_array($res))
                        {
                        ?>
                            <div class="col-lg-3 col-xs-6">
                                <div class="small-box"> 
                                    <a href="/?page=shops/shops_get_route&amp;TeretoryId=<?php echo $row['TeretoryId']; ?>"><button class="btn btn-block btn-primary btn-lg"><?php echo $row['TeretoryName']; ?></button></a>
                                </div>
                            </div>
      <?php }?>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!--footer php-->


    <?php require_once('_footer.php')?>






</body>
</html>