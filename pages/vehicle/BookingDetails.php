<?php
//include_once 'inc/class.crud.php';
    $crud = new DriverCRUD();
    $acrud = new VechilesCRUD();
    $bcrud = new BookingCRUD();
?>

<?php require_once('_header.php')?>
<?php require_once('_sidebar.php')?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Booking  Management

        </h1>
        <ol class="breadcrumb">
            <li><a href="/?page=vehicle/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Route</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main content -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                      <h3 class="box-title">Booking Description Table</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="table_route" class="table table-bordered table-hover" >

                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Vehicle ID</th>
                                    <th>Driver ID</th>
                                    <th>Route ID</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php 
                                    $res = $bcrud->read_booking();
                                    while($row = mysql_fetch_array($res))
                                    {
                                ?>
                                    <tr>
                                        <td ><?php echo $row['booking_id']; ?></td>
                                        <td ><?php echo $row['vec_id']; ?></td>
                                        <td ><?php echo $row['driv_id']; ?></td>
                                         <td ><?php echo $row['rout_id']; ?></td>

                                        <td ><a style="color:white" href="/?page=vehicle/BookingEdit&amp;edt_id=<?php echo $row['booking_id']; ?>">
                                        <button class="btn btn-info btn-xs" style="margin-left:10px">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        Edit
                                        </button></a></td>

                                        <td ><a style="color:white" href="/?page=vehicle/BookingDBCrud&amp;del_id=<?php echo $row['booking_id']; ?>">
                                        <button onclick="return confirm('Are You sure You want to delete?')" class="btn btn-danger btn-xs" style="margin-left:10px">
                                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                                        Delete
                                        </button></a></td>

                                    </tr>

                                <?php
                                    }
                                ?>

                            </tbody>
                            <tfoot>
                                <a href="/?page=vehicle/Booking" style="color:white">
                                    <button class="btn btn-success btn-xs" style="margin-bottom:10px">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    Add New
                                    </button>
                                </a>
                            </tfoot>

                        </table><!-- table -->
                    </div><!-- /.box body-->
                </div><!-- /.box -->
            </div>
        </div><!--row-->
    </div><!--content-->
    </section>
</div><!-- /.content-wrapper -->

<!--footer php-->

<?php require_once('_footer.php')?>

<!-- jQuery 2.1.4 -->
        <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='../plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/app.min.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
          $(function () {
            $('#table_route').dataTable({
              "bPaginate": true,
              "bLengthChange": true,
              "bFilter": true,
              "bSort": true,
              "bInfo": true,
              "bAutoWidth": true,
              "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
              "ZeroRecords": "No matching records found",
              "searchDelay": null,
              "sPaginationType": "full_numbers",
              "scrollX": true,
              "columns": [
                    { "searchable": true },
                    { "searchable": true },
                    { "searchable": true },
                    { "searchable": true },
                    { "searchable": false },
                    { "searchable": false },
                    ],

            });
          });
        </script>