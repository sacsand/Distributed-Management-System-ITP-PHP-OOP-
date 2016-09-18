

<?php require_once('_header.php')?>
<?php require_once('_sidebar.php')?>
<?php



$DaysPlanObj = new DAYSPLAN();
$DsrObj = new DASHBOARD();



$Teratory=$DaysPlanObj->Get_Sales_rep_teratory($username);


//
$profit=$DsrObj->total_profit($Teratory);//up to today -of all products

$total_value=$DsrObj->total_total_value($Teratory);//

$sales=$DsrObj->total_sales($Teratory);//

$freeis=$DsrObj->total_freeissue($Teratory);
//




?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard-Admin
            <small></small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->


        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Monthly Recap Report</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->

                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 0%</span>
                                    <h5 class="description-header"> <?php echo $sales; ?> UNITS</h5>
                                    <span class="description-text">TOTAL SALES</span>
                                </div><!-- /.description-block -->
                            </div><!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                                    <h5 class="description-header">RS <?php echo $total_value; ?></h5>
                                    <span class="description-text">TOTAL VALUE</span>
                                </div><!-- /.description-block -->
                            </div><!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 0%</span>
                                    <h5 class="description-header">RS <?php echo $profit; ?></h5>
                                    <span class="description-text">TOTAL PROFIT</span>
                                </div><!-- /.description-block -->
                            </div><!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block">
                                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 0%</span>
                                    <h5 class="description-header"> <?php echo $freeis; ?></h5>
                                    <span class="description-text">FREE ISSUE</span>
                                </div><!-- /.description-block -->
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.box-footer -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
                <!-- MAP & BOX PANE -->

                <!--hwre one row is deledt code in new folder---may later nedd -->

                <!-- TABLE: cumlative sale -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cumulative Sales <small> <?php echo $today  ?></small> </h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Sales</th>
                                    <th>Total Value</th>
                                    <th>Profit</th>
                                    <th>Free Issue</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $res = $DsrObj->brought_fw_sale($Teratory) ;

                                while($row = mysql_fetch_array($res))
                                { ?>
                                    <tr>
                                        <td><a href="#"><?php echo $row['productId']; ?></a></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><span class="badge bg-green"><?php echo $row['sales']; ?></span></td>
                                        <td><span class="badge bg-blue"><?php echo $row['total']; ?></span></td>
                                        <td><span class="badge bg-red"><?php echo $row['propit']; ?></span></td>
                                        <td><span class="badge bg-yellow"><?php echo $row['freeissue']; ?></span></td>
                                    </tr>
                                <?php
                                }

                                ?>


                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div><!-- /.box-body -->
                    <!-- <div class="box-footer clearfix">
                         <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                         <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                     </div><!-- /.box-footer -->
                </div><!-- /.box -->
                <!--target co[lrtion table --->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Target Completion <small> <?php echo $today  ?></small> </h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Sales</th>
                                    <th>Target</th>
                                    <th>completion</th>
                                    <th>percentage</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $res = $DsrObj->sales_by_produt($Teratory) ;


                                while($row = mysql_fetch_array($res))

                                {
                                    $productidx= $row['productId'];
                                    $salesx= $row['sales'];


                                    $target=$DsrObj->GetTarget($Teratory, $productidx) ;
                                    $percentage=$DsrObj->CalculatePrecentage($salesx, $target);

                                    ?>
                                    <tr>
                                        <td><a href="#"><?php echo $row['productId']; ?></a></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><span class="badge bg-blue"><?php echo $row['sales']; ?></span></td>
                                        <td><span class="badge bg-blue"><?php echo $target ; ?></span></td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-primary" style="width: <?php echo $percentage ?>%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-red"><?php echo $percentage ?>%</span></td>
                                    </tr>
                                <?php
                                }

                                ?>


                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->

                        >
                    </div><!-- /.box-body -->
                    <!-- <div class="box-footer clearfix">
                         <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                         <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                     </div><!-- /.box-footer -->
                </div><!-- /.box -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Stock Level <small> <?php echo $today  ?></small> </h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Current_Stock</th>
                                    <th>Opening_stock</th>
                                    <th>Remaining</th>
                                    <th>%</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $res = $DsrObj->stock_level($Teratory) ;


                                while($row = mysql_fetch_array($res))

                                {
                                    $productidy= $row['productId'];
                                    $quantity= $row['quantity'];
                                    $max_stock= $row['max_stock'];




                                    $percentage=$DsrObj->CalculatePrecentage($quantity,$max_stock);

                                    ?>
                                    <tr>
                                        <td><a href="#"><?php echo $row['productId']; ?></a></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><span class="badge bg-blue"><?php echo $quantity ?></span></td>
                                        <td><span class="badge bg-blue"><?php echo $max_stock ; ?></span></td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-primary" style="width: <?php echo $percentage ?>%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-red"><?php echo $percentage ?>%</span></td>
                                    </tr>
                                <?php
                                }

                                ?>


                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div><!-- /.box-body -->
                </div>



            </div><!-- /.col -->

            <div class="col-md-4">


                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sales According to Area</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive">

                                    <!-------chart---chart----chart-chart------------------------------------------------------------------>

                                    <canvas id="chart-area"  height="200" ></canvas>

                                </div><!-- ./chart-responsive -->
                            </div><!-- /.col -->
                            <div class="col-md-4">



                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <ul class="nav nav-pills nav-stacked">

                            <?php
                            $res1 = $DsrObj->sales_by_route($Teratory);
                            while($r1 = mysql_fetch_array($res1))
                            { ?>

                                <li><a href="#"><?php echo $r1['AreaName'];  ?> <span class="pull-right text-red"> <?php echo $r1['sales']; ?></span></a></li>

                            <?php    }  ?>


                        </ul>
                    </div><!-- /.footer -->
                </div><!-- /.box -->


            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php require_once('_footer.php')?>



</div><!-- ./wrapper -->


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


<script>

    var pieData = [
        <?php
           $res = $DsrObj->sales_by_route($Teratory);
            while($r1 = mysql_fetch_array($res))
            {

                ?>
        {
            value:<?php echo $r1['sales']; ?>,
            color:"<?php echo $color = sprintf("#%06x",rand(0,16777215)); ?>",
            highlight: "<?php echo $color = sprintf("#%06x",rand(0,16777215)); ?>",
            label: "<?php echo $r1['AreaName'];  ?>"
        },
        <?php  }  ?>
        {
            value: <?php echo 0; ?>,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Red"
        }


    ];

    window.onload = function(){
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx).Pie(pieData);

        new Chart(ctx).Doughnut(data, {
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

        });
    };




</script>
</body>
</html>
