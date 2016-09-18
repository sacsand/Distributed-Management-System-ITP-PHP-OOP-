

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


                $linechartdata = $DsrObj->saleslinechartAdmin();
                $data = array();
                $label = array();
                $dataCost = array();
                $labelCost = array();
                while($row = mysql_fetch_array($linechartdata)) {
                    $data[] = $row['sums'];
                    $label[] = $row['cDate'];

                    $dataCost[] = $row['total'];
                    $labelCost[] = $row['cDate'];


                }



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
     <div class="row">

         <div class="col-md-6">
             <!-- AREA CHART -->
             <div class="box box-primary">
                 <div class="box-header with-border">
                     <h3 class="box-title">Sales Of this Month by Date(Sales Value)</h3>
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
                 <div class="box-header with-border">
                     <h3 class="box-title">Sales Of this Month By Area</h3>
                     <div class="box-tools pull-right">
                         <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                         <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                     </div>
                 </div>
                 <div class="box-body">
                     <canvas id="chart-area" style="height:250px"></canvas>
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

         </div><!-- /.col (LEFT) -->
         <div class="col-md-6">
             <!-- LINE CHART -->
             <div class="box box-info">
                 <div class="box-header with-border">
                     <h3 class="box-title">Sales Of this Month by Date(Unit) </h3>
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

     </div><!-- /.row -->






                </div><!-- /.col -->


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

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#chart-area").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
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

    var pieOptions = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke: true,
        //String - The colour of each segment stroke
        segmentStrokeColor: "#fff",
        //Number - The width of each segment stroke
        segmentStrokeWidth: 0,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps: 100,
        //String - Animation easing effect
        animationEasing: "easeOutBounce",
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate: true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale: false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive: true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio: true,
        //String - A legend template
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

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
