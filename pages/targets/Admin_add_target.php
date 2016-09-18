
<?php require_once('_header.php')?>



<?php

$status_id=URL::getParam('id');
$DaysPlanObj=new AREATARGET();
$StockObj = new STOCK();




$Teratory=$DaysPlanObj->Get_Sales_rep_teratory($username);


$today = date("m/d/Y");
$yesterday = date('m/d/Y',strtotime("-1 days"));

$first_date_of_this_month = date('m/Y');

?>








<?php require_once('_sidebar.php')?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Manage Area Target </h1>

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
                    <?php $RouteCount=$DaysPlanObj->CountRoot();
                   // echo "is ".$RouteCount;

                    $DaysPlanCount=$DaysPlanObj->CountDaysPlanRows($productId);
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
                            echo  '<h5>&nbsp;&nbsp;&nbsp;Target Added</h5>';}
                        else{ ?>

                            <h5>&nbsp;&nbsp;&nbsp;Target not Available</h5>
                        <?php  }

                        ?>

                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>



                    <a href="/?page=targets/Admin_add_target12&amp;product_id=<?php echo $r1['productId'] ?>&amp;product_name=<?php echo $r1['name'] ?>&amp;username=<?php echo $username ; ?> "
                       class="small-box-footer">Add Target <i class="fa fa-arrow-circle-right"></i>
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
