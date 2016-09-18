<?php

 $crud = new DriverCRUD();
    $acrud = new VechilesCRUD();
    $bcrud = new BookingCRUD();

if(isset($_GET['edt_id']))
{
    $res=mysql_query("SELECT * FROM booking WHERE booking_id='".$_GET['edt_id']."'");
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
               Booking Edit Table
            </h1>
            <ol class="breadcrumb">
                <li><a href="/?page=vehicle/Booking"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Booking</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="/?page=vehicle/BookingDBCrud&amp;edt_id=<?php echo $_GET['edt_id'] ?>" method="post" class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Booking ID</label>
                    <div class="col-sm-10">
                        <input type="text" name="booking_id" placeholder="Booking ID" class="form-control" value="<?php echo $row['booking_id'] ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Vechile ID</label>
                    <div class="col-sm-10">
                        <input type="text" name="vec_id" placeholder="Vechile Id" class="form-control" value="<?php echo $row['vec_id'] ?>" />
                    </div>
                </div>


                   <div class="form-group">
                    <label class="col-sm-2 control-label">Driver Id</label>
                    <div class="col-sm-10">

                        <input type="text" name="driv_id" placeholder="Driver Id" class="form-control" value="<?php echo $row['driv_id'] ?>" />

                    </div>
                </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Route Id</label>
                    <div class="col-sm-10">
                        <input type="text" name="rout_id" placeholder="Route ID" class="form-control" value="<?php echo $row['rout_id'] ?>" />
                    </div>
                </div>
              

                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>

                    <div class="col-md-1">

                        <button type="submit" name="update" class="btn fa fa-save btn-sm btn-success ">  Update</button>
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