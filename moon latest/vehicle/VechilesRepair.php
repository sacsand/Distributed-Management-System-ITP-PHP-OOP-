<?php
//include_once 'inc/class.crud.php';
$crud = new VrepairCRUD();
$tcrud = new VechilesCRUD();

$VechilesIdList = $tcrud->NotInRepair();
?>
    <?php require_once('_header.php');?>
    <?php require_once('_sidebar.php');?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Vehicle Repair
            </h1>
            <ol class="breadcrumb">
                <li><a href="/?page=vehicle/RouteHome"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">vehicle repair</li>
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
            <form action="/?page=vehicle/VrepairDBCrud" method="post" class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Vehicle ID</label>
                    <div class="col-sm-10">
                        <select name="vr_id" class="form-control">
                            <?php
                                while ($row = mysql_fetch_array($VechilesIdList)) {
                                    echo '<option value="'.$row['v_id'].'">'.$row['v_id'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Repair Type</label>
                    <div class="col-sm-10">

                        <input type="text" required name="vr_type" placeholder="Please Insert Repair type" class="form-control" value="" />

                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Repair Cost</label>
                     <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">
                        <span class="input-group-addon info">Rs</span>
                        <input type="text" required pattern="[0-9.]+" name="vr_cost" placeholder="Please Insert Repair Cost" value="" class="form-control" value"" />
                    </div>
                </div>

                <!--
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Territory ID</label>
                    <div class="col-sm-10">
                        <input type="text" name="terr_id" placeholder="TNumberA0Number" class="form-control" value="<?php echo (isset($row['TerritoryId'])) ? $row['TerritoryId'] : ''; ?>" />
                    </div>
                </div>
                -->

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Repair Date</label>
                    <div class="col-sm-10">
                        <input type="date" name="vr_date" placeholder="Date of Repair" class="form-control" value"" />
                    </div>
                </div>
                

                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>

                    <div class="col-md-1">

                        <button type="submit" name="save" class="btn btn-success btn-sm" >
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
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js" type="text/javascript"></script>
        <!-- page script -->