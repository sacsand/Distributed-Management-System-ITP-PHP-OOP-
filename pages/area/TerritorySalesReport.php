<?php
$acrud = new AreaCRUD();
$TerrId = URL::getParam('TerritoryId');
$routeIdList = $acrud->get_route_for_terr($TerrId);
require_once('_header.php');
require_once('_sidebar.php');
?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sales Reports
            </h1>
            <ol class="breadcrumb">
                <li><a href="/?page=area/AreaHome"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Sales Reports</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success" >
                        <div class="box-body">
                            <form style="margin:auto; margin-top: 20px;" action="/?page=area/TerritorySalesReport&amp;TerritoryId=<?php echo $TerrId ?>" style="width: 75%; margin: auto" method="post" class="form-horizontal" >
                                <div class="form-group"  style="margin-bottom: 20px; padding-bottom: 20px">
                                    <label class="col-sm-2 control-label">Route Name:</label>
                                    <div class="col-sm-6">
                                        <select name="route_id" class="form-control" required>
                                            <option value="" disabled selected>Select a Route</option>
                                            <?php
                                            while ($trow = mysql_fetch_array($routeIdList)) {
                                                echo '<option value="'.$trow['RouteId'].'" >'.$trow['RouteName'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" name="generate" class="btn btn-danger btn-sm" >
                                            <span class="glyphicon glyphicon-refresh" aria-hidden="true"> Generate Report</span></button>
                                    </div>
                                </div>
                                <?php
                                    $routeid="";
                                    if(isset($_POST["route_id"])) {
                                        $routeid = $_POST["route_id"];
                                    }else{
                                        $routeid = "";
                                    }
                                ?>
                            </form>
                        </div>
                    </div>

                    <div class="box box-danger">
                        <div class="box-body">
                            <table id="table" class="table table-bordered table-hover" >

                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Total Sales</th>
                                </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $salesquery = $acrud->salesByRoute($routeid);
                                        while($row = mysql_fetch_array($salesquery)) {?>
                                            <tr>
                                                <td ><?php echo $row['DateOfMonth']; ?></td>
                                                <td ><?php echo $row['TotalSales']; ?></td>
                                            </tr>
                                        }
                                            <?php
                                        }
                                    ?>
                                </tbody>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

<!--footer php-->


<?php require_once('_footer.php')?>

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery 2.1.4 -->

<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->


<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->


<!-- Radiant App -->
<script src="../dist/js/app.min.js" type="text/javascript"></script>
<!-- Radiant App -->

<script src="../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='../plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<!--<script src="../dist/js/app.min.js" type="text/javascript"></script>
-->


<!-- jQuery UI 1.11.2 -->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<!-- jQuery UI 1.11.2 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Morris.js charts -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->

<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- Sparkline -->

<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- jvectormap -->

<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->

<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
<script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- daterangepicker -->

<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- datepicker -->

<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->


<!-- Angular JavaScript Plugin -->
<script src='../plugins/angular/angular.min.js'></script>
<!-- Angular JavaScript Plugin -->

<script>
    jQuery(document).ready(function() {
        $('#routename').change(function() {

        });
    });
</script>