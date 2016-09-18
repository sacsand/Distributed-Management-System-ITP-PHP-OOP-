<?php

$status_id=URL::getParam('id');

$username="sajith";

$DaysPlanObj=new DAYSPLAN();


$StockObj = new STOCK();




$Teratory=$DaysPlanObj->Get_Sales_rep_teratory($username);


$today = date("m/d/Y");
$yesterday = date('m/d/Y',strtotime("-1 days"));

$first_date_of_this_month = date('m/Y');

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

    <!--<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.1/angular.min.js"></script> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

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
            <h1>Manage Days Plan </h1>

            <small><?php echo $today ?></small>


        </section>

        <!-- Main content -->
        <section class="content">
            <h1></h1>


            <!--<form action="/?page=dbcrud" method="post" name="daysPlan" class="form-horizontal"> -->
            <div class="row">
                <?php
                $res = $StockObj->GetProudutDetails();



                while($r1 = mysql_fetch_array($res))
                {
                ?>


                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <?php $productId=$r1['productId'];  ?>

                    <!--check whether Days Plan added  added-->
                    <?php $RouteCount=$DaysPlanObj->CountRoot($Teratory);
                   // echo "is ".$RouteCount;

                    $DaysPlanCount=$DaysPlanObj->CountDaysPlanRows($productId,$Teratory);
                    //echo $DaysPlanCount; ?>

                    <?php
                    if ($RouteCount==$DaysPlanCount){
                        $status=1;

                        echo  '<div class="small-box bg-red">';}

                    else {
                        $status=0;

                        echo '<div class="small-box bg-yellow">';
                    }
                    ?>


                    <div class="inner">

                        <h4><?php echo $r1['name'];  ?></h4>
                        <?php $stock=$StockObj->Get_Current_stock($productId,$Teratory)?>
                        <?php $IndexNo= $StockObj->Get_Index_No($productId,$Teratory) ?>
                        <!--check index no is exit then assing o to index no- -->
                        <?php
                        if ( $status==1){
                            echo  '<h5>&nbsp;&nbsp;&nbsp;DaysPlan Added</h5>';}
                        else{ ?>

                            <h5>&nbsp;&nbsp;&nbsp;DaysPlan not Available</h5>
                        <?php  }

                        ?>

                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>



                    <a href="/?page=Sales_rep_add_days_plan12&amp;product_id=<?php echo $r1['productId'] ?>&amp;product_name=<?php echo $r1['name'] ?>&amp;username=<?php echo $username ; ?> "
                       class="small-box-footer">Add Days Plan <i class="fa fa-arrow-circle-right"></i>
                    </a>


                </div>
            </div>


            <?php
            }
            ?>


    </div><!-- /.row -->







</div>

</div>








</section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php require_once('_footer.php')?>


<!-- ./wrapper -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- jQuery 2.1.4
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>












</body>
</html>
