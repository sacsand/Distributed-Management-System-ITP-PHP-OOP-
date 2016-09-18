<?php
//include_once 'inc/class.shops.php';
$shops = new SHOPS();

   
?>

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
                            <table class="table table-bordered table-hover" >
                            <tr>
                            <th>
                            <h4><a href="/?page=shops/shops_getarea" class=".btn.btn-app"><button class="btn btn-success btn-xs">Add New</button></a></h4>
                               
                          
                                                 
                    
                            </th>
                            <th>
                          
                            </th>
                            </tr>
                            <div class="box-tools">

                            </div>
                            </table>
                        </div><!-- /.box-header -->
                        <!--<div class="box-body">
                            <table id="example2" class="table table-bordered table-hover"> -->

                        <div class="box-body">
                            <table id="shop_table" class="table table-bordered table-hover" >

                                        <thead>
                                            <tr>
                                                <th>shopId</th>
                                                <th>Shop Name</th>
                                                <th>Route</th>
                                                <th>Address</th>
                                                <th>Telephone</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>More Info</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                           <?php
                    
                                                $res = $shops->main();
                                                $num_rows = count($res);
                                                if(mysql_num_rows($res)>0)
                                                {
                                                while($row = mysql_fetch_array($res))
                                                {
                                                    $routeName=$HeadeObj->Get_route_name($row['routeId']) ;
                                            ?> 
                                                <tr>
                                                    
                                                    <td><?php echo $row['shopId']; ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $routeName; ?></td>
                                                    <td><?php echo $row['address']; ?></td>
                                                    <td><?php echo $row['phone']; ?></td>

                                                    <td><a href="/?page=shops/shops_edit&amp;indexNo=<?php echo $row['indexNo']; ?>"><button class="btn btn-primary btn-xs">Edit</button></a></td>
                                                    <td><a href="/?page=shops/shops_dbcrud&amp;del_id2=<?php echo $row['indexNo']; ?>"><button class="btn btn-danger btn-xs">Delete</button></a></td>
                                                    <td><a href="/?page=shops/shops_history&amp;indexNo=<?php echo $row['shopId']; ?>"><button class="btn btn-primary btn-xs">More</button></a></td>
                            
                                                </tr>

                                             <?php
                                                }
                                                    }
                                                    else
                                                    {
                                                        ?><tr><td colspan="5">Nothing here... add some new</td></tr><?php
                                                }
                                             ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>shopId</th>
                                                <th>Shop Name</th>
                                                <th>Route</th>
                                                <th>Address</th>
                                                <th>Telephone</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>More Info</th>
                                            </tr>
                                        </tfoot>
                                        

                            </table><!-- table -->
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
      <!--   <a href="/?page=shops/shops_add_records" class=".btn.btn-app"><button class="btn btn-danger btn-xs">Add New Shop</button></a>
        -->

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

    </script>

    <script type="text/javascript">
      $(document).ready(function () {
        $('#shop_table').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "ZeroRecords": "No matching records found",
            "searchDelay": null,
            "sPaginationType": "full_numbers",
            "scrollX": true,
        });
      });
    </script>
</body>
</html>