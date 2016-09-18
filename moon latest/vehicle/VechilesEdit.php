<?php

$crud = new VechilesCRUD();

if(isset($_GET['edt_id']))
{
    $res=mysql_query("SELECT * FROM Vechiles WHERE v_id = '" .$_GET['edt_id']."'");
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
                Edit Vechiles
            </h1>
            <ol class="breadcrumb">
                <li><a href="/?page=vehicle/VechilesHome"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Area</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="/?page=vehicle/VechilesDBCrud&amp;edt_id=<?php echo $_GET['edt_id'] ?>" method="post" class="form-horizontal">

                


                <div class="form-group">
                    <label class="col-sm-2 control-label">Vechile License No</label>
                    <div class="col-sm-10">
                        <input type="text" name="v_lic" placeholder="Vechile License" class="form-control" value="<?php echo $row['v_lic'] ?>" />
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label">License Issue Date</label>
                    <div class="col-sm-10">
                        <input type="date" name="lic_issue" placeholder="Vechile License" class="form-control" value="<?php echo $row['lic_issue'] ?>" />
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label">License Expiration Date</label>
                    <div class="col-sm-10">
                        <input type="date" name="lic_exp" placeholder="Vechile License" class="form-control" value="<?php echo $row['lic_exp'] ?>" />
                    </div>
                    </div>
                  

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Mileage</label>
                    <div class="col-sm-10">
                        <input type="text" name="miles" placeholder="Mileage" class="form-control" value="<?php echo $row['miles'] ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Vechile Type</label>
                    <div class="col-sm-10">
                         <select name="v_type" class="form-control">
                    
                    <option> --- Select Vehicles Type --- </option>
                    <option>Lori</option>
                    <option>Van</option>
                    <option>Bus</option>

                         </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>
                <div class="col-md-1">
                    <button type="submit" name="update" class="btn fa fa-save btn-sm btn-success "> Update</button>
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
        <script src='../plugins/fastclick/fastclick.mins.js'></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/app.min.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js" type="text/javascript"></script>
        <!-- page script -->