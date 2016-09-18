<?php
//include_once 'inc/class.crud.php';
$crud = new DriverCRUD();
$acrud = new VechilesCRUD();
$d_id = $crud->driver_no_of_rows();
$nextId = $d_id + 1;

$VechilesIdList = $acrud->NotInDriver();
$employeeidlist= $crud->getemployeeList();
$employeenamelist= $crud->getemployeeList();



?>
    <?php require_once('_header.php');?>
    <?php require_once('_sidebar.php');?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Driver
            </h1>
            <ol class="breadcrumb">
                <li><a href="/?page=vehicle/DriverHome"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Add Driver</li>
            </ol>
        </section>


        <style type="text/css">
            .input-group-addon.primary {
                color: rgb(255, 255, 255);
                background-color: rgb(50, 118, 177);
                border-color: rgb(40, 94, 142);
            }
            .input-group-addon.success {
                color: rgb(255, 255, 255);
                background-color: rgb(92, 184, 92);
                border-color: rgb(76, 174, 76);
            }
            .input-group-addon.info {
                color: rgb(255, 255, 255);
                background-color: rgb(57, 179, 215);
                border-color: rgb(38, 154, 188);
            }
            .input-group-addon.warning {
                color: rgb(255, 255, 255);
                background-color: rgb(240, 173, 78);
                border-color: rgb(238, 162, 54);
            }
            .input-group-addon.danger {
                color: rgb(255, 255, 255);
                background-color: rgb(217, 83, 79);
                border-color: rgb(212, 63, 58);
            }
        </style>

        <!-- Main content -->
        <section class="content">
            <form action="/?page=vehicle/DriverDBCrud" method="post" class="form-horizontal">

                 <div class="form-group">
                    <label class="col-sm-2 control-label">Driver ID </label>
                    <div class="col-sm-10">
                        <select name="d_id" class="form-control">
                            <?php
                                while ($row = mysql_fetch_array($employeenamelist)) {
                                    echo '<option value="'.$row['userId'].'">'.$row['userId'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label">Driver ID </label>
                    <div class="col-sm-10">
                        <select name="d_name" class="form-control">
                            <?php
                                while ($row = mysql_fetch_array($employeeidlist)) {
                                    echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Driver License No</label>
                    <div class="col-sm-10">

                        <input type="text" name="lic_no" required placeholder="Please Insert Driver License Number" class="form-control" value="" />

                    </div>
                </div>

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">License Issue Date</label>
                    <div class="col-sm-10">

                        <input type="date" name="lic_issue" required class="form-control" value="" />

                    </div>
                </div>


                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">License Expiry Date</label>
                    <div class="col-sm-10">

                        <input type="date" name="lic_exp" required class="form-control" value="" />

                    </div>
                </div>

             <!-- if drop down list doesn't work use this
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Area ID</label>
                    <div class="col-sm-10">
                        <input type="text" name="area_id" placeholder="A0Number" class="form-control" value="<?php echo (isset($row['AreaId'])) ? $row['AreaId'] : ''; ?>" />
                    </div>
                </div>
                -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Vehicle ID</label>
                    <div class="col-sm-10">
                        <select name="v_id" class="form-control">
                            <?php
                                while ($row = mysql_fetch_array($VechilesIdList)) {
                                    echo '<option value="'.$row['v_id'].'">'.$row['v_id'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>

                    <div class="col-md-1">

                        <button type="submit" name="save" class="btn btn-success btn-sm" >
                        <span class="glyphicon glyphicon-save" aria-hidden="true"> Save</span></button>

                    </div>
                </div>


            </form>




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