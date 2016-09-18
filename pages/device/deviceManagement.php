<?php

   $crud = new deviceCRUD();
?>

<?php require_once('_header.php')?>
<?php require_once('_sidebar.php')?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Device Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="/?page=device/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Device</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main content -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                      <h3 class="box-title">Device Management Table</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="device_table" class="table table-bordered table-hover" >

                            <thead>
                                <tr>
                                    <th>Device ID</th>
                                    <th>Device Model</th>
                                    <th>MAC Address</th>
                                    <th>Registered Date</th>
                                    <th></th>
                                    <th></th>
                                   
                                </tr>
                            </thead>

                            <tbody>

                                <?php 
                                    $res = $crud->read_device();
                                    while($row = mysql_fetch_array($res))
                                    {
                                ?>
                                    <tr>
                                        <td ><?php echo $row['deviceId']; ?></td>
                                        <td ><?php echo $row['deviceModel']; ?></td>
                                        <td ><?php echo $row['macAddress']; ?></td>
                                        <td ><?php echo $row['registeredDate']; ?></td>

                                        <td ><a style="color:white" href="/?page=device/deviceEdit&amp;edt_Id=<?php echo $row['deviceId']; ?>">
                                        <button class="btn btn-info btn-xs" style="margin-left:10px">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        Edit
                                        </button></a></td>

                                        <td ><a style="color:white" href="/?page=device/deviceDBCRUD&amp;rem_id=<?php echo $row['deviceId']; ?>">
                                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" style="margin-left:10px">
                                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                                        Delete
                                        </button></a></td>

                                    </tr>
				
                                <?php
                		                    }
                                ?>

                            </tbody>
                            <tfoot>
                                <a href="/?page=device/deviceAdd" style="color:white">
                                    <button class="btn btn-success btn-xs" style="margin-bottom:10px">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    Add New Device
                                    </button>
                                </a>
                            </tfoot>

                        </table><!-- table -->
                    </div><!-- /.box body-->
                </div><!-- /.box -->
            </div>
        </div><!--row-->


</section><!-- /.content -->    
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
            $('#device_table').dataTable({
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