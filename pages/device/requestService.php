<?php

 $crud = new deviceCRUD();

    $res=mysql_query("SELECT max(serviceId)+1 as Count from servicelog");
    $row=mysql_fetch_array($res);

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
    </script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Request Service
            </h1>
            <ol class="breadcrumb">
                <li><a href="/?page=device/deviceManagement"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Request Service</li>
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
            <form action="/?page=device/deviceDBCRUD" method="post" class="form-horizontal">
                                <div class="form-group">
                    <label for="service_id" class="col-sm-2 control-label">Service Id</label>
                        <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">
                        <span class="input-group-addon info">S</span>
                        <input type="text" name="service_id" pattern="[0-9]+" maxlength="4" required id="service_id" placeholder="Enter Service Id" class="form-control" value="<?php echo $row['Count']?>" readonly />
                    </div>
                </div>

                <div class="form-group">
                    <label for="sales_serviceLog" class="col-sm-2 control-label">Sales Representative Id</label>
                    <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">


                        <select name="sales_serviceLog" required id="sales_serviceLog" class="form-control">
                            <option value "">Choose a Sales Representative Id To Which Device Belongs</option>
                            <?php
                            $res = $crud->read_allSdeviceLog();
                            while($row = mysql_fetch_array($res))
                            {
                                ?>
                                <option value="<?php echo $row['IndexNo']; ?>"><?php echo $row['name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="device_serviceLog" class="col-sm-2 control-label">Device ID</label>
                    <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">
                        <span class="input-group-addon info">D</span>
                        
                                <select name="device_serviceLog" required id="device_serviceLog" class="form-control">
                                    <option value "">Choose a Device Id</option>
                            <?php 
                                    $res = $crud->read_alldeviceLog();
                                    while($row = mysql_fetch_array($res))
                                    {
                                ?>
                                    <option value="<?php echo $row['deviceId']; ?>">D<?php echo $row['deviceId']; ?></option>
                                 <?php
                                            }
                                ?>
                                </select>
                    </div>
                </div>






                    <div class="form-group">
                    <label for="complaint" class="col-sm-2 control-label">Complaint</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="complaint" id="complaint" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                </div>




                    <div class="form-group">
                    <label for="dateService" class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-10">
                            <?php $tsdate = date("d-m-Y")?>
                        <input type="text" name="dateService" id="dateService" placeholder="Date" class="form-control" value="<?php echo $tsdate ?>" readonly />
                    </div>
                </div>

                <div class="form-group">

                    <label for="Bdevice_Cat" class="col-sm-2 control-label">Backup Device Category</label>
                    <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">

                        <select name="Bdevice_Cat" required id="Bdevice_Cat" class="form-control">
                            <option value="">Choose a Backup Device Model</option>
                            <?php
                            $res = $crud->notAssignedCat();
                            while($row = mysql_fetch_array($res))
                            {
                                ?>
                                <option value="<?php echo $row['deviceModel']; ?>"><?php echo $row['deviceModel']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <label for="Bdevice_serviceLog" class="col-sm-2 control-label">Backup Device ID</label>
                    <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">
                        <span class="input-group-addon info">BD</span>

                                <select name="Bdevice_serviceLog" required id="Bdevice_serviceLog" class="form-control">
                                <option value "">Choose a BackupDevice</option>
                            <?php
                                    $res = $crud->notAssigned();
                                    while($row = mysql_fetch_array($res))
                                    {
                                ?>
                                    <option value="<?php echo $row['deviceId']; ?>">BD<?php echo $row['deviceId']; ?></option>
                                 <?php
                                            }
                                ?>
                                </select>
                    </div>
                </div>

                <script>
                    //For the ComboBoxes Dependency
                    //BackupDevices
                    $(document).ready(function(){
                        $devices=$("[id=Bdevice_serviceLog]");

                        $("[id=Bdevice_Cat]").on('change', function(){
                            //Loading...
                            $devices.empty();
                            $devices.append('<option value="">Loading...</option>');

                            var catVal = this.value;//ajax call to retrieve options for device ids
                            $.ajax({
                                method: "get",
                                url: "/?page=device/deviceDBCRUD&Bdevice_Cat="+catVal
                            })
                                .done(function(d){
                                    loadDevices(d["data"]);
                                })
                                .fail(function(){
                                    $devices.empty();
                                    $devices.append('<option value="0">Unavailable</option>');
                                });
                        });

                        //Loads Options on to load Devices
                        function loadDevices(dev){

                            if (dev != null) {
                                $devices.empty();
                                //foreach row in array
                                $.each(dev, function (key, val) {
                                    console.log("Key:"+key+"Value:"+val);
                                    //foreach object
                                    $.each(val,function (key,val){
                                        console.log("O-Key:"+key+"O-Value:"+val);
                                        $devices.append('<option value="' + val + '">D' + val + '</option>');
                                    });
                                });
                            } else {
                                $devices.empty();
                                $devices.append('<option value="0">None</option>');
                            }
                        }
                    });


                </script>



                    <div class="form-group">
                    <label for="serviceStatus" class="col-sm-2 control-label">Service Status</label>
                    <div class="col-sm-10">
                        <input type="radio" name="serviceStatus" maxlength="15" id="serviceStatus" class="" value="InService">Inservice<br>
                        <input type="radio" name="serviceStatus" maxlength="15" id="serviceStatus" class="" value="Repaired">Repaired<br>
                    </div>
                </div>




                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>

                    <div class="col-md-1">

                        <button type="submit" name="serviceSave" class="btn btn-success btn-sm" >
                        <span class="glyphicon glyphicon-save" aria-hidden="true"> Request</span></button>

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


<script>
    //For the ComboBoxes Dependency

    //For Device And Sales

    $(document).ready(function(){
        $deviceLog=$("[id=device_serviceLog]");//sales_serviceLog

        $("[id=sales_serviceLog]").on('change', function(){
            //Loading...
            $deviceLog.empty();
            $deviceLog.append('<option value="">Loading...</option>');

            var catVal = this.value;//ajax call to retrieve options for device ids
            $.ajax({
                method: "get",
                url: "/?page=device/deviceDBCRUD&sales_serviceLog="+catVal
            })
                .done(function(d){
                    loadDevices(d["data"]);
                })
                .fail(function(){
                    $deviceLog.empty();
                    $deviceLog.append('<option value="0">Unavailable</option>');
                });
        });

        //Loads Options on to load Devices
        function loadDevices(dev){

            if (dev != null) {
                $deviceLog.empty();
                //foreach row in array
                $.each(dev, function (key, val) {
                    console.log("Key:"+key+"Value:"+val);
                    //foreach object
                    $.each(val,function (key,val){
                        console.log("O-Key:"+key+"O-Value:"+val);
                        $deviceLog.append('<option value="' + val + '">' + val + '</option>');
                    });
                });
            } else {
                $deviceLog.empty();
                $deviceLog.append('<option value="0">None</option>');
            }
        }
    });


</script>