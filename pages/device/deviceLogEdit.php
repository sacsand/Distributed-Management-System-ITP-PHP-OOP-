<?php
$crud = new deviceCRUD();

if(isset($_GET['editDevice_Id']))
{
    //Select d.deviceId,d.dateAssigned,d.emp_index,e.name,e.userId from employee e,devicelog d where e.IndexNo in (Select d.emp_index from devicelog)
    $res=mysql_query("Select d.deviceId,d.dateAssigned,d.emp_index,e.name,e.userId from employee e,devicelog d where e.IndexNo in (Select d.emp_index from devicelog) and deviceId =" . $_GET['editDevice_Id']);
    $row=mysql_fetch_array($res);
}

?>
    <?php require_once('_header.php');?>
    <?php require_once('_sidebar.php');?>

    <script type="text/javascript">
       function format(field) { //This 
        var last = field.value.substring( field.value.lastIndexOf(":") + 1, field.value.length); 
        if (last.length >= 2) field.value = field.value + ":"; 
        if (field.value.length > 17) field.value = field.value.substring(0, 17); 
    } 
    </script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Devices Assigned
            </h1>
            <ol class="breadcrumb">
                <li><a href="/?page=device/AreaHome"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"> Edit Devices Assigned</li>
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
            <form action="/?page=device/deviceDBCRUD&amp;editDeviceId=<?php echo $_GET['editDevice_Id'] ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="device_idLog" class="col-sm-2 control-label">Device ID</label>
                    <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">
                        <span class="input-group-addon info">D</span>
                        <input type="text" name="device_idLog" pattern="[0-9]+" oninvalid="setCustomValidity('The DeviceId format should consist of numbers between 0-9')" oninput="setCustomValidity('')"  maxlength="4" id="device_idLog" required class="form-control" value="<?php echo $row['deviceId'] ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="sales_repLog" class="col-sm-2 control-label">Sales Representative Id</label>
                        <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">
                        <span class="input-group-addon info">U</span>
                        <input type="text" name="sales_repLog" pattern="[0-9]+" oninvalid="setCustomValidity('The Sales Representative Id format should consist of numbers between 0-9')" oninput="setCustomValidity('')" maxlength="4" required id="sales_repLog" placeholder="Enter only last digits" class="form-control" value="<?php echo $row['emp_index'] ?>" />
                    </div>
                </div>

               
                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-10">
                            <?php $tdate = date("d-m-Y")?>
                        <input type="text" name="dateAssign" placeholder="Date" class="form-control" value="<?php echo $tdate ?>" readonly />
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>

                    <div class="col-md-1">

                        <button type="submit" name="updateAssign" class="btn btn-success btn-sm" >
                        <span class="glyphicon glyphicon-save" aria-hidden="true"> Update</span></button>

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
        