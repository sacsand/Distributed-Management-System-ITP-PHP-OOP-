

<?php require_once('_header.php')?>
<?php require_once('_sidebar.php')?>
<?php



$DaysPlanObj = new DAYSPLAN();
$DsrObj = new DSR();



$Teratory=$DaysPlanObj->Get_Sales_rep_teratory($username);

$TeratoryName=$StockObj->Get_Sales_rep_teratory_name($Teratory);



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Stock - <?php echo $TeratoryName; ?>
            <small></small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->


        <div class="row">
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
        </div>
        <!-- Main row -->

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



</body>
</html>
