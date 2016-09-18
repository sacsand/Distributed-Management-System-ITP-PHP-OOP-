<?php

$crud = new VrepairCRUD();

if(isset($_GET['edt_id']))
{
    $res=mysql_query("SELECT * FROM vrepair WHERE vr_id='".$_GET['edt_id']."'");
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
               Vechile Repair Edit Table
            </h1>
            <ol class="breadcrumb">
                <li><a href="/?page=vehicle/VechilesRepair"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Repair</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="/?page=vehicle/VrepairDBCrud&amp;edt_id=<?php echo $_GET['edt_id'] ?>" method="post" class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Vechile ID</label>
                    <div class="col-sm-10">
                        <input type="text" name="vr_id" placeholder="Vechile ID" class="form-control" value="<?php echo $row['vr_id'] ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Repair Type</label>
                    <div class="col-sm-10">
                        <input type="text" name="vr_type" placeholder="Repair Type" class="form-control" value="<?php echo $row['vr_type'] ?>" />
                    </div>
                </div>


                   <div class="form-group">
                    <label class="col-sm-2 control-label">Repair Cost</label>
                    <div class="col-sm-10">

                        <input type="text" name="vr_cost" placeholder="Repair Cost" class="form-control" value="<?php echo $row['vr_cost'] ?>" />

                    </div>
                </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Repair Date</label>
                    <div class="col-sm-10">
                        <input type="text" name="vr_date" placeholder="Repair date" class="form-control" value="<?php echo $row['vr_date'] ?>" />
                    </div>
                </div>
              

                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>

                    <div class="col-md-1">

                        <button type="submit" name="update" class="btn fa fa-save btn-sm btn-success ">   Update</button>
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