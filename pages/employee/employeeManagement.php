<?php
Login::restrictFront();
   $crud = new employeeCRUD();
?>

<?php require_once('_header.php')?>
<?php require_once('_sidebar.php')?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Employee Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="/?page=employee/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Employee</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main content -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                      <h3 class="box-title">Employee Management Table</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="device_table" class="table table-bordered table-hover" >

                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>name</th>
                                    <th>username</th>
                                    <th>type</th>
                                    <th>Territory</th>
                                    <th>active</th>
                                    <th></th>
                                     <th></th>
                                   
                                </tr>
                            </thead>

                            <tbody>

                                <?php 
                                    $res = $crud->read_user();
                                    while($row = mysql_fetch_array($res))
                                    {
                                ?>
                                    <tr>
                                        <td ><?php echo $row['userId']; ?></td>
                                        <td ><?php echo $row['name']; ?></td>
                                        <td ><?php echo $row['username']; ?></td>
                                        <td ><?php echo $row['type']; ?></td>
                                        <td ><?php echo $row['teretoryId']; ?></td>
                                        <td ><?php echo $row['active']; ?></td>

                                        <td ><a style="color:white" href="/?page=employee/employeeEdit&amp;edt_Id=<?php echo $row['IndexNo']; ?>">
                                        <button class="btn btn-info btn-xs" style="margin-left:10px" >
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        Edit
                                        </button></a></td>

                                        <td ><a style="color:white" href="/?page=employee/employeeDBCRUD&amp;rem_id=<?php echo $row['IndexNo']; ?>">
                                        <button class="btn btn-danger btn-xs" style="margin-left:10px"  onclick="return confirm('Are you sure?')">
                                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                                        Delete
                                        </button></a></td>

                                       
                                       
                                        <?php
                                        if($row['active']=='0'){
                                                ?> <td ><a style="color:white" href="/?page=employee/employeeDBCRUD&amp;Inact_id=<?php echo $row['IndexNo']; ?>">
                                                 


                                         <?php   echo ' <button class="btn btn-warning btn-xs" style="margin-left:10px">
                                        <span class="glyphicon glyphicon-remove-circle " aria-hidden="true" ></span>';
                                            echo 'Inactive';
                                        }else{
                                             ?> <td ><a style="color:white" href="/?page=employee/employeeDBCRUD&amp;act_id=<?php echo $row['IndexNo']; ?>">
                                             <?php
                                            echo ' <button class="btn  btn-success  btn-xs" style="margin-left:10px">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
                                            echo 'Active';
                                        }
                                       ?>
                                        </button></a></td>

                                    </tr>
				
                                <?php
                		                    }
                                ?>

                            </tbody>
                            <tfoot>
                                <a href="/?page=employee/addemployee" style="color:white">
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
         
        </script>