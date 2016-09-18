<?php

      $crud = new deviceCRUD();
?>
    <?php require_once('_header.php');?>
    <?php require_once('_sidebar.php');?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Assign Device
            </h1>
            <ol class="breadcrumb">
                <li><a href="/?page=device/assignedDevices"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Assign Device</li>
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

                    <label for="device_Cat" class="col-sm-2 control-label">Device Category</label>
                    <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">

                        <select name="device_Cat" required id="device_Cat" class="form-control">
                            <option value="">Choose a Device Model</option>
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
                    <label for="device_idLog" class="col-sm-2 control-label">Device ID</label>
                    <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">
                        <span class="input-group-addon info">D</span>
                        
                       <select name="device_idLog" required id="device_idLog" class="form-control">
                                <option value="">Choose a Device Id</option>
                                <?php
                                    $res = $crud->notAssigned();
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
                    <label for="sales_repLog" class="col-sm-2 control-label">Sales Representative</label>
                        <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">
                        <span class="input-group-addon info">U</span>
                      
                            <select name="sales_repLog" required id="sales_repLog" class="form-control">
                            <option value "">Choose a Sales Representative</option>

                            <?php 
                                    $res = $crud->read_empTable();
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
                    <label for="dateAssign" class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-10">
                            <?php $tdate = date("d-m-Y")?>
                        <input type="text" name="dateAssign" id="dateAssign" placeholder="Date" class="form-control" value="<?php echo $tdate ?>" readonly />
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>

                    <div class="col-md-1">

                        <button type="submit" name="dAsave" class="btn btn-success btn-sm" >
                        <span class="glyphicon glyphicon-save" aria-hidden="true"> Assign</span></button>

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

    $(document).ready(function(){
        $devices=$("[id=device_idLog]");

        $("[id=device_Cat]").on('change', function(){
            //Loading...
            $devices.empty();
            $devices.append('<option value="">Loading...</option>');

            var catVal = this.value;//ajax call to retrieve options for device ids
            $.ajax({
                method: "get",
                url: "/?page=device/deviceDBCRUD&device_Cat="+catVal
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