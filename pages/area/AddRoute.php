<?php
//include_once 'inc/class.crud.php';
$acrud = new AreaCRUD();
$TeretoryId=URL::getParam('TeretoryId');
$id = $acrud->route_for_terr($TeretoryId);
$rid = $id + 1;
?>
    <?php require_once('_header.php');?>
    <?php require_once('_sidebar.php');?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Route
            </h1>
            <ol class="breadcrumb">
                <li><a href="/?page=area/RouteHome"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Add Route</li>
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
            <form action="/?page=area/AreaDBCrud" method="post" class="form-horizontal">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Territory ID</label>
                    <div class="col-sm-10">
                        <input type="text"  name="terr_id" placeholder="" class="form-control"  value="<?php echo $TeretoryId; ?>" readonly/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Route ID</label>
                    <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">
                        <span class="input-group-addon danger">R</span>
                        <input type="text" name="route_id"  required pattern="^[0-9]{1,2}$"  oninvalid="setCustomValidity('Please insert a number with 2 didgist if less than 10 enter like 08')" oninput="setCustomValidity('')" placeholder="Route Number should be between 0-99" class="form-control" value="<?php echo $rid; ?>" readonly/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Route Name</label>
                    <div class="col-sm-10">

                        <input type="text" name="route_name" placeholder="Route name" required pattern="^[a-zA-Z0-9\,\-\_\.\s]{5,20}$" oninvalid="setCustomValidity('Please insert a name with/without some speacial characters which will be in between 5 and 15 ')" oninput="setCustomValidity('')" class="form-control" value="<?php echo (isset($row['RouteName'])) ? $row['RouteName'] : ''; ?>" />

                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Route Description</label>
                    <div class="col-sm-10">
                        <input type="text" name="route_description" placeholder="Route Description" required pattern="^[a-zA-Z0-9\,\?\-\_\.\s]{5,30}$" oninvalid="setCustomValidity('Please insert a name with some speacial characters which will be in between 5 and 30 ')" oninput="setCustomValidity('')" class="form-control" value="<?php echo (isset($row['RouteDescription'])) ? $row['RouteDescription'] : ''; ?>" />
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>

                    <div class="col-md-1">

                        <button type="submit" name="route_save" class="btn btn-success btn-sm" >
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


    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- jQuery UI 1.11.2 -->

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->

    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- Sparkline -->

    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jvectormap -->

    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->

    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- daterangepicker -->

    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- datepicker -->

    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->


    <!-- Angular JavaScript Plugin -->
    <script src='plugins/angular/angular.min.js'></script>
    <!-- Angular JavaScript Plugin -->
    <script>
    $(function () {
        $("#terr_name").change(function () {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
            $("#terr_id").val(selectedValue); // set it into the text box
        });
    });

    </script>