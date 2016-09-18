<?php
//include_once 'inc/class.crud.php';
/*$crud = new AreaCRUD();
$id = $crud->area_no_of_rows();
$nextId = $id + 1;*/
$crud = new employeeCRUD();

?>
    <?php require_once('_header.php');?>
    <?php require_once('_sidebar.php');?>

    

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Leave requesting
            </h1>
            <ol class="breadcrumb">
                <li><a href="/?page=AreaHome"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">leave requesting</li>
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
            <form action="/?page=employeeDBCRUD" method="post" class="form-horizontal">

            <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10" style="padding-top:7px" >
                            <label><?php echo $_SESSION[Login::$_login_name];?></label>
                       <br>
                    </div>
                </div>

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Territory</label>
                    <div class="col-sm-10" style="padding-top:7px" >
                            <label><?php echo $_SESSION[Login::$teritory_name];?></label>
                       <br>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Select Leave</label>
                    <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">
                       
                      
                   <select id = "leaveList" name="leaveList">
                         <option value = "">Select a option</option>
                           <option value = "1">Duty Leave</option>
                           <option value = "2">Medical Leave</option>
                           <option value = "3">Half Leave without pay</option>
                           <option value = "4">Leave without pay</option>
             </select>
                    </div>
                </div>

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Today</label>
                    <div class="col-sm-10">
                            <?php $tdate = date("d-m-Y")?>
                        <input type="text" name="tddate" placeholder="Date" class="form-control" value="<?php echo $tdate ?>" readonly />
                    </div>
                </div>


               <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Leave Date From</label>
                    <div class="col-sm-10">
                            <?php $sdate = date("Y-m-d")?>
                        <input type="date" name="Lfrom" min="<?php echo $sdate ?>"><br>
                    </div>
                </div>


                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Leave Date To</label>
                    <div class="col-sm-10">
                            <?php $sdate = date("Y-m-d")?>
                        <input type="date" name="Lto" min="<?php echo $sdate ?>"><br>
                    </div>
                </div>

               

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Reason for leave</label>
                    <div class="col-sm-10">
                       <textarea type = "text" name="resonText" rows="4" cols="50" placeholder="Brifly mention the reason for requesting a leave..."></textarea>

                    </div>
                </div>

                

                

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Employee Type</label>
                    <div class="col-sm-10">
           
                        <input type="text" name="emptype" placeholder="TSype" class="form-control" value="" />
                    </div>
                </div>


                   

                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>

                    <div class="col-md-1">

                        <button type="submit" name="request" class="btn btn-success btn-sm" >
                        <span  aria-hidden="true">Request</span></button>

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
        