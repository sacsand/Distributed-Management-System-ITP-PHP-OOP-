<?php
//include_once 'inc/class.crud.php';
/*$crud = new AreaCRUD();
$id = $crud->area_no_of_rows();
$nextId = $id + 1;*/

// registration form

Login::restrictFront();

$crud = new employeeCRUD();
$co=mysql_query("SELECT max(IndexNo)+1 as Count from employee");
$row=mysql_fetch_array($co);
$objUser = new User();



?>
<?php
$no=$row['Count'];
$userid=($no<10)?"US000".$no:"US00".$no;

?>

<?php require_once('_header.php');?>
<?php require_once('_sidebar.php');?>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Add Sales Person
            <small></small>
        </h1>

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


        input:required:invalid, input:focus:invalid {
            background-image: url(/images/invalid.png);
            background-position: right top;
            background-repeat: no-repeat;
        }
        input:required:valid {
            background-image: url(/images/valid.png);
            background-position: right top;
            background-repeat: no-repeat;
        }

    </style>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#fa-icons" data-toggle="tab">Sales Person</a></li>
                        <li><a href="#glyphicons" data-toggle="tab">Add Sales Persons</a></li>


                    </ul>
                    <div class="tab-content">
                        <!-- Font Awesome icons -->
                        <div class="tab-pane active" id="fa-icons" >


                            <div class="box ">
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
                                        $res = $crud->read_salesrep();
                                        while($row = mysql_fetch_array($res))
                                        {
                                            $TeratoryName=$StockObj->Get_Sales_rep_teratory_name($row['teretoryId']);
                                            ?>
                                            <tr>

                                                <td ><?php echo $row['userId']; ?></td>
                                                <td ><?php echo $row['name']; ?></td>
                                                <td ><?php echo $row['username']; ?></td>
                                                <td ><?php echo $row['type']; ?></td>
                                                <td ><?php echo  $TeratoryName ?></td>
                                                <td ><?php echo $row['active']; ?></td>

                                                <td ><a style="color:white" href="/?page=employee/employeeEdit&amp;edt_Id=<?php echo $row['IndexNo']; ?>">
                                                        <button class="btn btn-info btn-xs" style="margin-left:10px" >
                                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                            Edit
                                                        </button></a></td>

                                                <td ><a style="color:white" href="/?page=employee/salesDB&amp;rem_id=<?php echo $row['IndexNo']; ?>">
                                                        <button class="btn btn-danger btn-xs" style="margin-left:10px"  onclick="return confirm('Are you sure?')">
                                                            <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                                                            Delete
                                                        </button></a></td>



                                                <?php
                                                if($row['active']=='0'){
                                                ?> <td ><a style="color:white" href="/?page=employee/salesDB&amp;Inact_id=<?php echo $row['IndexNo']; ?>">



                                                        <?php   echo ' <button class="btn btn-warning btn-xs" style="margin-left:10px">
                                        <span class="glyphicon glyphicon-remove-circle " aria-hidden="true" ></span>';
                                                        echo 'Inactive';
                                                        }else{
                                                        ?> <td ><a style="color:white" href="/?page=employee/salesDB&amp;act_id=<?php echo $row['IndexNo']; ?>">
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


                                    </table><!-- table -->
                                </div><!-- /.box body-->
                            </div><!-- /.box -->
                        </div><!-- /#ion-icons -->





                    <!-- glyphicons-->
                    <div class="tab-pane" id="glyphicons">

                        <form action="/?page=employee/employeeDBCRUD" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Employee ID</label>
                                <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">
                                    <span class="input-group-addon info">E</span>
                                    <input type="text" name="employee_id" id="employee_id" class="form-control" value="<?php echo $userid?>" readonly/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Employee Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="employeeName" id="employeeName"  min="2" max="20" placeholder="Employee Name" required pattern="[a-zA-Z0-9-]+" class="form-control" value="" required  oninvalid="this.setCustomValidity('Please give the employeename')"
                                           oninput="setCustomValidity('')"/>

                                </div>
                            </div>



                            <div class="form-group"  id="user-result">
                                <label for="inputEmail3" class="col-sm-2 control-label">User Name</label>
                                <div class="col-sm-10">
                                    <input type="text"  name="username" id="username" placeholder="User Name" required pattern="[a-zA-Z0-9-]+" min="4" max="20" class="form-control" value=""   oninvalid="this.setCustomValidity('Please give a valid user name')"
                                           oninput="setCustomValidity('')"/>

                                    <span id="#username_availability_result" ></span>



                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" id="password" placeholder="Password" class="form-control"
                                           required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                                           onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Password must contain at least 6 characters, including UPPER/lowercase and numbers' : '');
                                     if(this.checkValidity()) form.password2.pattern = this.value;"/>

                                </div>
                            </div>



                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password2" id="password2" placeholder="Confirm Password" class="form-control"
                                           required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                                           onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" />

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label" >Territory Type</label>
                                <div class="col-sm-10">
                                    <select id = "territoryList" name="territoryList" required class="form-control"  oninvalid="this.setCustomValidity('Please select the Territory Type')"
                                            oninput="setCustomValidity('')">
                                        <option value = "">Select a option</option>

                                        <?php

                                        $res=$crud->read_territory();
                                        while($row=mysql_fetch_array($res)){
                                            ?>
                                            <option value = "<?php echo $row['TeretoryId'];?>"><?php echo $row['TeretoryName'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label" >Employee Type</label>
                                <div class="col-sm-10">
                                    <select id = "Etype" name="Etype" class="form-control" required readonly oninvalid="this.setCustomValidity('Please select the employee type')"
                                            oninput="setCustomValidity('')">

                                        <option  selected="selected" value = "Sales_Rep">Sales Representative</option>

                                    </select>
                                </div>
                            </div>






                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Start Date</label>
                                <div class="col-sm-10">
                                    <?php $tdate = date("d-m-Y")?>
                                    <input type="text" name="tddate" placeholder="Date" class="form-control" value="<?php echo $tdate ?>" readonly />
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-1"></div>
                                <div class="col-md-1"></div>

                                <div class="col-md-1">

                                    <button type="submit" name="save_sales" class="btn btn-success btn-sm" >
                                        <span class="glyphicon glyphicon-save" aria-hidden="true"> Save</span></button>

                                </div>
                            </div>
                        </form>
                    </div><!-- /#ion-icons -->


            </div><!-- /.nav-tabs-custom -->
        </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php require_once('_footer.php')?>


<!-- jQuery 2.1.4 -->
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        //listens for typing on the desired field
        $("#username").keyup(function() {
            //gets the value of the field
            var username = $("#username").val();

            //here would be a good place to check if it is a valid email before posting to your db

            //displays a loader while it is checking the database
            $("#emailError").html('<img alt="" src="/images/loader.gif" />');

            //here is where you send the desired data to the PHP file using ajax
            $.post("employeeDBCRUD", {username:username},
                function(result) {
                    if(result == 1) {
                        //the email is available
                        $("#username_availability_result").html("Available");
                    }
                    else {
                        //the email is not available
                        $("#username_availability_result").html("Email not available");
                    }
                });
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
        