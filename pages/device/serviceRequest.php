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
            Service Requests
        </h1>
        <ol class="breadcrumb">
            <li><a href="/?page=device/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Service Requests </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main content -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                      <h3 class="box-title">Service Requests Table</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">


                        <table id="device_table" class="table table-bordered table-hover" >

                            <thead>
                                <tr>
                                    <th>service ID</th>
                                    <th>device ID</th>
                                    <th>Sales Representative Id</th>
                                    <th>Complaint</th> 
                                    <th>backupdeviceId</th>
                                    <th>service Status</th>

                                    <th></th>
                                    <th></th>
                                   
                                </tr>
                            </thead>

                            <tbody>

                                <?php 
                                    $res = $crud->read_servicelog();
                                    while($row = mysql_fetch_array($res))
                                    {
                                ?>
                                    <tr>
                                        <td ><?php echo $row['serviceId']; ?></td>
                                        <td ><?php echo $row['deviceId']; ?></td>
                                        <td ><?php echo $row['salesRepId']; ?></td>
                                        <td ><?php echo $row['complaint']; ?></td>
                                        <td ><?php echo $row['backupdeviceId']; ?></td>
                                        <td ><?php echo $row['serviceStatus']; ?></td>

                                        <td ><a style="color:white" href="/?page=device/serviceLogEdit&amp;editService_Id=<?php echo $row['serviceId']; ?>">
                                        <button class="btn btn-info btn-xs" style="margin-left:10px">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        Edit
                                        </button></a></td>

                                        <td ><a style="color:white" href="/?page=device/deviceDBCRUD&amp;remService_id=<?php echo $row['serviceId']; ?>">
                                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs"  style="margin-left:10px">
                                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                                        Delete
                                        </button></a></td>

                                    </tr>
				
                                <?php
                		                    }//End of while loop
                                ?>

                            </tbody>
                            <tfoot>
                                <a href="/?page=device/requestService" style="color:white">
                                    <button class="btn btn-success" style="margin-bottom:10px">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    New Service Request
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
                    { "searchable": true },
                    { "searchable": true },
                    { "searchable": false },
                    { "searchable": false },

                    ],

            });
          });
        </script>