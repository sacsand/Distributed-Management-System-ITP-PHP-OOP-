<?php
 $crud = new deviceCRUD();

    $res=mysql_query("SELECT max(deviceId)+1 as Count from device");
    $row=mysql_fetch_array($res);
   // $COUNT=0;
    if( $row['Count']<=0){
        $COUNT=0+1;
    }else{
    $COUNT=$row['Count'];}
?>
    <?php require_once('_header.php');?>
    <?php require_once('_sidebar.php');?>

    <script type="text/javascript">
       function format(field) { //This 
        var last = field.value.substring( field.value.lastIndexOf(":") + 1, field.value.length); 
        if (last.length >= 2) field.value = field.value + ":"; 
        if (field.value.length > 17) field.value = field.value.substring(0, 17); 
    } 
    </script><!--Validation for the macAddress Field -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Device
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
        </style>

        <!-- Main content -->
        <section class="content">
            <form action="/?page=device/deviceDBCRUD" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="device_id" class="col-sm-2 control-label">Device ID</label>
                    <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">
                        <span class="input-group-addon info">D</span>
                        <input type="text" name="device_id" pattern="[0-9]+" maxlength="4" required id="device_id" class="form-control" value="<?php echo $COUNT ?>" readonly /><!--maxlength used by html5 to control maxLength --><!-- required is used to make the input compulsory -->
                    </div>
                </div>

                <div class="form-group">
                    <label for="device_model" class="col-sm-2 control-label">Device Model</label>
                    <div class="col-sm-10">
                        <input type="text" name="device_model" pattern="[0-9A-Za-z ]+" oninvalid="setCustomValidity('Please enter a Device Model Name With No Special Characters in the format')" oninput="setCustomValidity('')" 
                         maxlength="15" required id="device_model" placeholder="device model" class="form-control" value="" /> <!--maxlength used by html5 to control maxLength -->
                    </div>
                </div>

               

                 <!-- MAC ADDRESS -->
                  <div class="form-group">
                    <label for="mac_Address" class="col-sm-2 control-label">Mac Address</label>
                    <div style="padding-left:15px; padding-right:15px" class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-laptop"></i>
                      </div>
                      <input type="text" pattern="[0-9A-Fa-f :]+" value="" oninvalid="setCustomValidity('The Mac Address format should consist of numbers between 0-9 and letters between A-F')" oninput="setCustomValidity('')" required placeholder="Mac Address" class="form-control" name="mac_Address" id="mac_Address" onKeyUp = "format(this.form.mac_Address);" 
                      onKeyDown = "format(this.form.mac_Address);"> <!--Pattern used to validate what could be written in text field -->
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->


                    <div class="form-group">
                    <label for="tddate" class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-10">
                            <?php $tdate = date("d-m-Y")?>
                        <input type="text" name="tddate" id="tddate" placeholder="Date" class="form-control" value="<?php echo $tdate ?>" readonly />
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>

                    <div class="col-md-1">

                        <button type="submit" name="save" class="btn btn-success btn-sm" >
                        <span class="glyphicon glyphicon-save" aria-hidden="true"> Add</span></button>

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
        