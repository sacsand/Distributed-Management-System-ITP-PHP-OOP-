<?php
$StockObj = new STOCK();
$res = $StockObj->GetProudutDetails();
?>
<?php
/**
 * Created by PhpStorm.
 * User: sachintha
 * Date: 7/28/15
 * Time: 7:11 PM
 */
$name=$_POST['name'];
echo "Response :".$name ;  ?>
<!doctype html>
<html>
<head>
    <title>Pie Chart</title>
    <script src="../js/Chart.js"></script>
    <!-- FLOT CHARTS -->
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js" type="text/javascript"></script>
    <!-- FLOT CHARTS -->
    <script src="../plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="../plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="../plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
    <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
    <script src="../plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>

    <title>AdminLTE 2 | Flot Charts</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" /

</head>
<body>
<div id="canvas-holder">
    <canvas id="chart-area" width="300" height="300"/>
</div>

<!-- Donut chart -->

<div class="box box-primary">
    <div class="box-header with-border">
        <i class="fa fa-bar-chart-o"></i>
        <h3 class="box-title">Donut Chart</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div id="donut-chart" style="height: 300px;"></div>
    </div><!-- /.box-body-->
</div><!-- /.box -->


<?php
//$values= array('49.9', '71.5', '106.4', '129.2',)
$ss=25;
$red="Green";

$var = 90;
?>

<script>


    var pieData = [
<?php
   $res = $StockObj->GetProudutDetails();
    while($r1 = mysql_fetch_array($res))
    {$count=5;$count++;

        ?>
        {
            value:<?php echo $r1['caseMakeup']; ?>,
            color:"<?php echo $color = sprintf("#%06x",rand(0,16777215)); ?>",
            highlight: "<?php echo $color = sprintf("#%06x",rand(0,16777215)); ?>",
            label: "<?php echo $r1['name'];  ?>"
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
    };




</script>





    <script type="text/javascript">

    $(function () {
        /*
         * DONUT CHART
         * -----------
         */


        var donutData = [
            <?php
                        $res = $StockObj->GetProudutDetails();
                    while($r1 = mysql_fetch_array($res))
                    {$count=5;$count++;

                        ?>


            {label: "<?php echo $r1['name'];  ?>", data: <?php echo $r1['caseMakeup']; ?>, color: "<?php echo $color = sprintf("#%06x",rand(0,16777215)); ?>"},
<?php  } ?>
            {label: "S", data: 0, color: "#01c0ef"}
        ];
        $.plot("#donut-chart", donutData, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.5,
                    label: {
                        show: true,
                        radius: 2 / 3,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }

                }
            },
            legend: {
                show: false
            }
        });
        /*
         * END DONUT CHART
         */

    });

    /*
     * Custom Label formatter
     * ----------------------
     */
    function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
            + label
            + "<br/>"
            + Math.round(series.percent) + "%</div>";
    }
</script>


</body>
</html>
