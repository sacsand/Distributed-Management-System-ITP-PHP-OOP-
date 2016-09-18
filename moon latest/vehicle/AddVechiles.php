<?php
//include_once 'inc/class.crud.php';
$crud = new VechilesCRUD();
$v_ind = $crud->vechiles_no_of_rows();
$nextId = $v_ind + 1;


?>
    <?php require_once('_header.php');?>
    <?php require_once('_sidebar.php');?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Vehicle
            </h1>
            <ol class="breadcrumb">
                <li><a href="/?page=vehicle/VechilesHome"><i class="fa fa-book"></i> Home</a></li>
                <li class="active">Add Vehicles</li>
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

        <!-- for input add on this javascript will add nice interactions
        <script type="text/javascript">
            $(document).ready(function() {
                $('.input-group input[required], .input-group textarea[required], .input-group select[required]').on('keyup change', function() {
                    var $form = $(this).closest('form'),
                        $group = $(this).closest('.input-group'),
                        $addon = $group.find('.input-group-addon'),
                        $icon = $addon.find('span'),
                        state = false;
                        
                    if (!$group.data('validate')) {
                        state = $(this).val() ? true : false;
                    }else if ($group.data('validate') == "email") {
                        state = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($(this).val())
                    }else if($group.data('validate') == 'phone') {
                        state = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/.test($(this).val())
                    }else if ($group.data('validate') == "length") {
                        state = $(this).val().length >= $group.data('length') ? true : false;
                    }else if ($group.data('validate') == "number") {
                        state = !isNaN(parseFloat($(this).val())) && isFinite($(this).val());
                    }

                    if (state) {
                            $addon.removeClass('danger');
                            $addon.addClass('success');
                            $icon.attr('class', 'glyphicon glyphicon-ok');
                    }else{
                            $addon.removeClass('success');
                            $addon.addClass('danger');
                            $icon.attr('class', 'glyphicon glyphicon-remove');
                    }
                    
                    if ($form.find('.input-group-addon.danger').length == 0) {
                        $form.find('[type="submit"]').prop('disabled', false);
                    }else{
                        $form.find('[type="submit"]').prop('disabled', true);
                    }
                });
                
                $('.input-group input[required], .input-group textarea[required], .input-group select[required]').trigger('change');
                
                
            });
        </script>
        -->

        <!-- Main content -->
        <section class="content">
            <form action="/?page=vehicle/VechilesDBCrud" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Vehicle ID</label>
                    <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">
                        <span class="input-group-addon info">V</span>
                        <input type="text" required name="v_id" class="form-control" value="<?php echo $nextId?>"readonly />
                    </div>
                </div>



                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Vehicle License No</label>
                    <div style="padding-left:15px; padding-right:15px" class="input-group col-sm-10">
                       
                        <input type="text" required name="v_lic" placeholder="Please insert a Vehicle ID" class="form-control" value="" />
                    </div>
                </div>



                       <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">License Issue Date</label>
                    <div class="col-sm-10">
                        <input type="date" required name="lic_issue"class="form-control" value="" />
                    </div>
                </div>



                       <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">License Expiration Date</label>
                    <div class="col-sm-10">
                        <input type="date" required name="lic_exp"class="form-control" value="" />
                    </div>
                </div>

             
                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Vehicle Type</label>
                    <div class="col-sm-10">
                    <select name="v_type" class="form-control">
                   
                    <option> --- Select Vehicles Type --- </option>
                    <option>Lori</option>
                    <option>Van</option>
                    <option>Pickup</option>
                     <option>truck</option>

                         </select>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Mileage</label>
                    
                    <div style="padding-left:15px; padding-right:15px"class="input-group col-sm-10">
                     <span class="input-group-addon info">Miles/km</span>
                        <input type="text" name="miles" required class="form-control" value="" />

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
        