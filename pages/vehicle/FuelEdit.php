<?php
$crud =new FuelCRUD();
$dcrud = new DriverCRUD();
$acrud = new VechilesCRUD();
$VechilesIdList = $acrud->getVechilesIDList();
$DriverIdList = $dcrud->getDriverIDList();


if(isset($_GET['edt_id']))
{
    $res=mysql_query("SELECT * FROM fuel WHERE index_no='" .$_GET['edt_id']."'");
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
                Edit Fuel Expenses
            </h1>
            <ol class="breadcrumb">
                <li><a href="/?page=vehicle/FuelHome"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Fuel Expenses</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="/?page=vehicle/FuelDBCrud&amp;edt_id=<?php echo $_GET['edt_id'] ?>" method="post" class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Fuel Amount</label>
                    <div class="col-sm-10">
                        <input type="text" name="f_amount" class="form-control" value="<?php echo $row['f_amount'] ?>" />
                    </div>
                </div>

            

                <div class="form-group">
                    <label class="col-sm-2 control-label">Fuel Taken Date</label>
                    <div class="col-sm-10">

                        <input type="date" name="f_taken"  class="form-control" value="<?php echo $row['f_taken'] ?>"/>

                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label">Fuel Expenses Date</label>
                    <div class="col-sm-10">

                        <input type="date" name="f_exp"class="form-control" value="<?php echo $row['f_exp'] ?>"/>

                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label">Fuel Cost</label>
                    <div class="col-sm-10">

                        <input type="text" name="f_cost"class="form-control" value="<?php echo $row['f_cost'] ?>"/>

                    </div>
                </div>


                  <div class="form-group">
                    <label class="col-sm-2 control-label">Driver ID</label>
                    <div class="col-sm-10">
                        <select name="d_id" class="form-control">
                            <?php
                                while ($row = mysql_fetch_array($DriverIdList)) {
                                    echo '<option value="'.$row['d_id'].'">'.$row['d_id'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                



                     <div class="form-group">
                    <label class="col-sm-2 control-label">Vehicle ID</label>
                    <div class="col-sm-10">
                        <select name="v_id" class="form-control">
                            <?php
                                while ($row = mysql_fetch_array($VechilesIdList)) {
                                    echo '<option value="'.$row['v_id'].'">'.$row['v_id'].'</option>';
                                }
                            ?>
                        </select>
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