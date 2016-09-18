<?php
//include_once 'inc/class.crud.php';
$crud = new employeeCRUD();
//$id = $crud->area_no_of_rows();
//$nextId = $id + 1;
if(isset($_GET['edt_Id']))
{
    $eid=$_GET['edt_Id'];
    $res=$crud->edit_Sales_get_details($eid);
    $row=mysql_fetch_array($res);
    $tid=$_GET['edt_Id'];
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
                Edit Employee
            </h1>
            <ol class="breadcrumb">
                <li><a href="/?page=employee/AreaHome"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Employee</li>
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
            <form action="/?page=employee/employeeDBCRUD&amp;edit_Id=<?php echo $tid ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Employee ID</label>
                    <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">
                        <span class="input-group-addon info">E</span>
                        <input type="text" name="employee_id" class="form-control" value="<?php echo $row['userId'] ?>" readonly />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Employee Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="employeeName" placeholder="Employee Name" class="form-control" value="<?php echo $row['name'] ?>" />
                    </div>
                </div>

                 <div class="form-group" id="user-result">
                    <label for="inputEmail3" class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-10">
                        <input type="text"  required  name="username" id="username" placeholder="User Name" class="form-control" value="<?php echo $row['username'] ?>" />
                     
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" placeholder="Password" class="form-control" value="<?php echo $row['password'] ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password2" placeholder="Confirm Password" class="form-control" value="<?php echo $row['password'] ?>" />
                    </div>
                </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Employee Type</label>
                    <div class="col-sm-10">
                         <select id = "Etype" name="Etype" class="form-control" required  oninvalid="this.setCustomValidity('Please select the employee type')"
    oninput="setCustomValidity('')" readonly>
                         <option value = "<?php echo $row['type'] ?>"><?php echo $row['type'] ?></option>


             </select>
                    </div>
                </div>


               

            


                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-10">
                            <?php $tdate = date("d-m-Y")?>
                        <input type="text" name="tddate" placeholder="Date" class="form-control" value="<?php echo $tdate ?>" readonly />
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>

                    <div class="col-md-1">

                        <button type="submit" name="update_salesrep" class="btn btn-primary btn-sm" >
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
       <script>
    $("#username").keyup(function (e) { //user types username on inputfiled
   var username = $(this).val(); //get the string typed by user
   $.post('employeeDBCRUD.php', {'username':username}, function(data) { //make ajax call to check_username.php
   $("#user-result").html(data); //dump the data received from PHP page
   });
});


    </script>



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
        