<?php

$acrud = new AreaCRUD();

if(isset($_GET['area_edt_id']))
{
    $res=mysql_query("SELECT * FROM area WHERE IndexNo=".$_GET['area_edt_id']);
    $row=mysql_fetch_array($res);
}

?>
    <?php require_once('_header.php')?>
    <?php require_once('_sidebar.php')?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Area
            </h1>
            <ol class="breadcrumb">
                <li><a href="/?page=area/AreaHome"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Area</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="/?page=area/AreaDBCrud&amp;area_edt_id=<?php echo $_GET['area_edt_id'] ?>" method="post" class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Area ID</label>
                    <div class="col-sm-10">
                        <input type="text" name="area_id" placeholder="Area ID" class="form-control" value="<?php echo $row['AreaId'] ?>" readonly/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Area Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="area_name" required pattern="^[a-zA-Z0-9\,\-\_\.\s]{5,15}$" oninvalid="setCustomValidity('Please insert a name with some speacial characters which will be in between 5 and 15 ')" oninput="setCustomValidity('')" placeholder="Area Name" class="form-control" value="<?php echo $row['AreaName'] ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>
                <div class="col-md-1">
                    <button type="submit" name="area_update" class="btn fa fa-save btn-sm btn-success "> Update</button>
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
