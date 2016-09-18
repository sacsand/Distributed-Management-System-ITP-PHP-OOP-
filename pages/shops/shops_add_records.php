<?php 
    $shops = new SHOPS();
    $routeId=URL::getParam('routeId');


    $today = date("Y/m/d");

    $res=mysql_query("SELECT max(indexNo)+1 as Count from shops");
    $row=mysql_fetch_array($res);

    $COUNT=$row['Count'];
    $shopId="SP".$COUNT;

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

<!---VALIDATION____________________________-->



<style type="text/css">
            .input-group-addon.primary {
                color: rgb(255, 255, 255);
                background-color: rgb(50, 118, 177);
                border-color: rgb(40, 94, 142);
            }
            .input-group-addon.success {
                color: rgb(255, 255, 255);
                background-color: rgb(92, 184, 92);
                border-color: rgb(76, 174, 76);
            }
            .input-group-addon.info {
                color: rgb(255, 255, 255);
                background-color: rgb(57, 179, 215);
                border-color: rgb(38, 154, 188);
            }
            .input-group-addon.warning {
                color: rgb(255, 255, 255);
                background-color: rgb(240, 173, 78);
                border-color: rgb(238, 162, 54);
            }
            .input-group-addon.danger {
                color: rgb(255, 255, 255);
                background-color: rgb(217, 83, 79);
                border-color: rgb(212, 63, 58);
            }
        </style>

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
                Add Shops

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Shops</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <form action="/?page=shops/shops_dbcrud" method="post" class="form-horizontal">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Shop ID</label>
                    <div class="col-sm-10"  >
                      
                    <div style="padding-left:0px; padding-right:0px" class="input-group col-sm-10">
                        <span class="input-group-addon primary">SP</span>
                        <input type="text" name="shopId" placeholder="<?php echo $COUNT; ?>" class="form-control" readonly />
                    </div>
                    </div>
                </div>

              
              
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name of the shop</label>
                    <div class="col-sm-10">

                        <input type="text" name="name" placeholder="name" required class="form-control" ng-model="user.name" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" placeholder="address" required class="form-control" ng-model="user.address"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Telephone</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" placeholder="phone" required class="form-control" ng-model="user.Telephone"  />
                        <input type="hidden" name="routeId" id="routeId" value="<?php echo $routeId; ?>" placeholder="routeId" class="form-control"  />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-10">
                        <input type="text" name="today" value="<?php echo($today) ?>" class="form-control"  readonly>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>

                    <div class="col-md-1">

                        
                        <input type="submit" value="Save" id="save" name="save" class="btn btn-primary" >
            
                    </div>
                </div>




            </form>

            

      


        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!--footer php-->


    <?php require_once('_footer.php')?>






</body>
</html>