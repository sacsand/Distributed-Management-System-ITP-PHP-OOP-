<?php
//include_once 'inc/class.shops.php';

    $shops = new SHOPS();

   $shopId=URL::getParam('indexNo');


$ShopObj = new SHOPS();


$ShopChart = $ShopObj->ChartShopSales($shopId);
$data = array();
$label = array();
$dataCost = array();
$labelCost = array();
while($row = mysql_fetch_array($ShopChart)) {
    $data[] = $row['sums'];
    $label[] = $row['name'];
    $dataCost[] = $row['total'];
    $labelCost[] = $row['name'];


}



?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
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

    <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

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
                Manage Shops

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Shops</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!--  <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <!--<div class="small-box bg-green">
                    <div class="inner">
                        <h3>mdmllml<sup style="font-size: 20px">%</sup></h3>
                        <p>Bounce Rate</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>

                </div> -->


            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Shop Table</h3>
                            <table>
                            <tr>
                            </tr>
                            <tr>
                            <th>
                            <h4><a href="/?page=shops/shops_main" class=".btn.btn-app"><button class="btn btn-success btn-xs">Home</button></a></h4>
                            <h4></h4>
                            </th>
                            <th></th>
                            <th>
                            </th>
                            </tr>
                            <div class="box-tools">

                            </div>
                        </div><!-- /.box-header -->
                        <!--<div class="box-body">
                            <table id="example2" class="table table-bordered table-hover"> -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered table-hover paginated">
                        <thead>
                        <tr>
                            <th>shopId</th>
                            <th>Shop Name</th>
                            <th>routeId</th>
                            <th>Address</th>
                            <th>Telephone</th>
                            <th>Date added</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                    
                        $res = $shops->shophistory($shopId);
                        $num_rows = count($res);
                        if(mysql_num_rows($res)>0)
                        {
                        while($row = mysql_fetch_array($res))
                        {
                        ?>
                        <tr>
                            <td><?php echo $row['shopId']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['routeId']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['theDate']; ?></td>
                
                        </tr>

                        <?php
                        }
                        }
                        else
                        {
                            ?><tr><td colspan="5">Nothing here... add some new</td></tr><?php
                        }
                        ?>


                            </table>
                        </div><!-- /.box-body -->


                         <div class="box-body table-responsive no-padding">
                         <h5 class="box-title">Sales done</h5>
                            <table class="table table-bordered table-hover paginated">
                        <thead>
                        <tr>
                           
                            <th>productName</th>
                            <th>quantity</th>                         
                            <th>freeIssues</th>
                            <th>Total Value</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                      
                    
                        $res = $shops->history($shopId);
                        $num_rows = count($res);
                        if(mysql_num_rows($res)>0)
                        {
                        while($row = mysql_fetch_array($res))
                        {
                        ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['sales']; ?></td>
                            <td><?php echo $row['freeIssues']; ?></td>
                            <td><?php echo $row['Total']; ?></td>
                            
                
                        </tr>

                        <?php
                        }
                        }
                        else
                        {
                            ?><tr><td colspan="5">Nothing sold..........</td></tr><?php
                        }
                        ?>


                            </table>
                        </div><!-- /.box-body --> 


                    </div><!-- /.box -->
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Overall Sales Product by Sales(Unit)</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="canvas" style="height:250px"></canvas>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    <!-- DONUT CHART -->
                    <div class="box box-danger">

                    </div><!-- /.box -->

                </div><!-- /.col (LEFT) -->
                <div class="col-md-6">
                    <!-- LINE CHART -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Overall Sales By Product(Unit) </h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="linecanvas" style="height:250px"></canvas>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    <!-- BAR CHART -->
                    <div class="box box-success">



                    </div><!-- /.box -->

                </div><!-- /.row -->






            </div><!-- /.col -->
      <!--   <a href="/?page=shops/shops_add_records" class=".btn.btn-app"><button class="btn btn-danger btn-xs">Add New Shop</button></a>
        -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!--footer php-->


    <?php require_once('_footer.php')?>


    <script>

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.


        var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
        var lineChartData = {
            labels : <?php echo json_encode($label) ?>,
            datasets : [
                {
                    label: "My First dataset",
                    fillColor : "rgba(36, 140, 151, 0.4)",
                    strokeColor : "rgba(156, 207, 49,1)",
                    pointColor : "rgba(255, 204, 102,1)",
                    pointStrokeColor : "#FF9900",
                    pointHighlightFill : "#8D2424",
                    pointHighlightStroke : "#800000",
                    data : <?php echo json_encode($data) ?>
                }
            ]

        }

        var barChartData = {
            labels : <?php echo json_encode($labelCost) ?>,
            datasets : [
                {
                    fillColor : "rgba(36, 140, 151, 0.4)",
                    strokeColor : "rgba(36, 140, 151, 0.4)",
                    highlightFill: "rgba(127, 23, 31,0.75)",
                    highlightStroke: "rgba(127, 23, 31,1)",
                    data : <?php echo json_encode($dataCost) ?>
                }
            ]

        }
        window.onload = function(){
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx).Bar(barChartData, {
                responsive : true
            });

            var ctxline = document.getElementById("linecanvas").getContext("2d");
            window.myLine = new Chart(ctxline).Line(lineChartData, {
                responsive: true
            });

            $(function() {
                $("#datepicker").datepicker( {
                    format: "mm/30/yyyy",
                    viewMode: "months",
                    minViewMode: "months"
                });
            });
        }
    </script>


</body>
</html>