
<?php require_once('_header.php')?>
<?php require_once('_sidebar.php')?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Manage Stock
            <small></small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#fa-icons" data-toggle="tab">Add/Remove</a></li>
                        <li><a href="#glyphicons" data-toggle="tab">Options</a></li>


                    </ul>
                    <div class="tab-content">
                        <!-- Font Awesome icons -->
                        <div class="tab-pane active" id="fa-icons" >

                                <?php
                                $res = $StockObj->Get_Areas();
                                while($r1 = mysql_fetch_array($res))
                                {
                                ?>
                                <section id="new">

                                <h4 class="page-header"><?php echo $r1['AreaName'] ?></h4>
                                <div class="row fontawesome-icon-list">

                                  <?php  $res1 = $StockObj->Get_Teretories($r1['AreaId']);
                                    while($r11 = mysql_fetch_array($res1))
                                    {
                                    ?>

                                     <?php   $count_notification=0;
                                        $resv = $DsrObj->stock_level($r11['TeretoryId']) ;

                                        while($rowt = mysql_fetch_array($resv)) {
                                        $productidy = $rowt['productId'];
                                        $quantity = $rowt['quantity'];
                                        $max_stock = $rowt['max_stock'];


                                        $percentage = $DsrObj->CalculatePrecentage($quantity, $max_stock);
                                        if ($percentage < 25) {
                                        $count_notification++;
                                        }


                                        }
                                        ?>

                                   <a href="/?page=stock/Sales_rep_add_daily_stock&amp;teretory_id=<?php echo $r11['TeretoryId']?>"> <div class="col-md-3 col-sm-4"><i class="fa fa-map-marker"></i> <?php echo $r11['TeretoryName'] ?><?php echo "   "?><span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="<?php echo $count_notification ; ?> Low Stock"><?php echo $count_notification ; ?></span></div></a>


                                    <?php  } ?>
                                </div>
                            </section>

                            <?php }  ?>




                        </div><!-- /#fa-icons -->
                        <!-- glyphicons-->
                        <div class="tab-pane" id="glyphicons">

                            <ul class="bs-glyphicons">


                                <li>
                                    <span class="glyphicon glyphicon-zoom-in"></span>
                                    <span class="glyphicon-class">glyphicon glyphicon-zoom-in</span>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-zoom-out"></span>
                                    <span class="glyphicon-class">glyphicon glyphicon-zoom-out</span>
                                </li>
                            </ul>
                        </div><!-- /#ion-icons -->


                    </div><!-- /.tab-content -->
                </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php require_once('_footer.php')?>


<script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js" type="text/javascript"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js" type="text/javascript"></script>