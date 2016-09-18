<?php require_once('_header.php')?>
<?php require_once('_sidebar.php')?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Area Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="/?page=area/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Area</li>
        </ol>
    </section>
    <?php
        //include_once 'inc/class.crud.php';
        $acrud = new AreaCRUD();
        $TeretoryId=URL::getParam('TeretoryId');
        $id = $acrud->route_for_terr($TeretoryId);
        $rid = $id + 1;
    ?>
    <!-- Main content -->
    <style type="text/css">
        .clickable
        {
            cursor: pointer;
        }

        .clickable #plus
        {
            background: rgba(0, 0, 0, 0.09);
            color: #374850;
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px
        }

        .clickable #plus:hover
        {
            color: #3c8dbc;
        }

        .clickable #graph
        {
            background: rgba(0, 0, 0, 0.09);
            color: #374850;
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px;
            margin-right: 20px;
        }

        .clickable #graph:hover{
            color: #3c8dbc;
        }

        .clickable .area-details{
            font-size: 13px;
            margin-top: -50px;
            display:none;
            color: #3c8dbc;
        }

        .clickable .area-details:after{
            content: '';
        }

        i:hover .area-details{
            display:block;
            position: absolute; right: 1em; top: 2em; z-index: 99;
            border-radius: 5px 5px; -moz-border-radius: 5px; -webkit-border-radius: 5px;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);
            -webkit-box-shadow: 5px 5px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 5px 5px rgba(0, 0, 0, 0.1);
            font-family: Calibri, Tahoma, Geneva, sans-serif;
            width: 220px;
            margin-left:5em ;
            background: lightgoldenrodyellow;
            color: darkred;
            padding: 10px;
        }

        .panel-heading span
        {
            margin-top: -23px;
            font-size: 15px;
            margin-right: -9px;
        }
        a.clickable { color: inherit; }
        a.clickable:hover {
            text-decoration:none;

        }

        .panel-default > .panel-heading {
            background-color: #f2f2f2;
            color: #374850;
        }

        .fawesome{
            font-size: 13px;
            display:none;
        }

        .fawesome:after{
            content:'';
        }

        i:hover .fawesome{
            display:block;
            position: absolute; top: -2em; z-index: 99;
            border-radius: 5px 5px; -moz-border-radius: 5px; -webkit-border-radius: 5px;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);
            -webkit-box-shadow: 5px 5px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 5px 5px rgba(0, 0, 0, 0.1);
            font-family: Calibri, Tahoma, Geneva, sans-serif;
            width: 220px;
            margin-left:1em ;
            background: lightgoldenrodyellow;
            color: darkred;
            padding: 10px;
        }

        #pane-i{
            color: #374850;
        }

        #pane-i:hover{
            color: #3c8dbc;
        }

    </style>
    <section class="content">
        <!-- Main content -->
        <div class="row">
            <div class="col-xs-12">

                <div class="nav-tabs-custom" id="tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#area_tab" data-toggle="tab">Area</a></li>
                        <li><a href="#terr_tab" data-toggle="tab">Territory</a></li>
                        <li><a href="#route_tab" data-toggle="tab">Route</a></li>
                        <li><a href="#add_tab" data-toggle="tab">Add Territory and Route</a></li>
                        <li><a href="#sample" data-toggle="tab">Sample</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- Font Awesome icons -->
                        <div class="tab-pane fade in active" id="area_tab" >
                            <table id="area_table" class="table table-bordered table-hover" >

                                        <thead>
                                            <tr>
                                                
                                                <th>Area ID</th>
                                                <th>Area Name</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php 
                                                $ares = $acrud->read_area();
                                                while($arow = mysql_fetch_array($ares))
                                                {
                                            ?>
                                                <tr>
                                                    
                                                    <td class="editable" ="area_id" ><?php echo $arow['AreaId']; ?></td>
                                                    <td class="editable" id="area_name"><?php echo $arow['AreaName']; ?></td>

                                                    <td  ><a style="color:white" href="/?page=area/AreaEdit&amp;area_edt_id=<?php echo $arow['IndexNo']; ?>">
                                                    <button class="btn btn-info btn-xs" style="margin-left:10px">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    Edit
                                                    </button></a></td>

                                                    <td ><a style="color:white" href="/?page=area/AreaDBCrud&amp;area_del_id=<?php echo $arow['IndexNo']; ?>">
                                                    <button class="btn btn-danger btn-xs" style="margin-left:10px"  onclick="return confirm('Are you sure')">
                                                    <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                                                    Delete
                                                    </button></a></td>

                                                </tr>

                                            <?php
                                                }
                                            ?>

                                        </tbody>
                                        <tfoot>
                                            <a href="/?page=area/AddArea" style="color:white">
                                                <button class="btn btn-navy btn-xs" style="margin-bottom:10px">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                Add New
                                                </button>
                                            </a>
                                        </tfoot>

                            </table><!-- table -->
                        </div><!-- /#fa-icons -->
                        <!-- glyphicons-->
                        <div class="tab-pane fade" id="terr_tab">
                            <table id="territory_table" class="table table-bordered table-hover" >

                                <thead>
                                    <tr>
                                        <th>Territory ID</th>
                                        <th>Territory Name</th>
                                        <th>Area ID</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                        $tres = $acrud->read_territory();
                                        while($trow = mysql_fetch_array($tres))
                                        {
                                    ?>
                                        <tr>
                                            <td ><?php echo $trow['TeretoryId']; ?></td>
                                            <td ><?php echo $trow['TeretoryName']; ?></td>
                                            <td ><?php echo $trow['AreaId']; ?></td>


                                            <td ><a style="color:white" href="/?page=area/TerritoryEdit&amp;terr_edt_id=<?php echo $trow['IndexNo']; ?>">
                                            <button class="btn btn-info btn-xs" style="margin-left:10px">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            Edit
                                            </button></a></td>

                                            <td ><a style="color:white" href="/?page=area/AreaDBCrud&amp;terr_del_id=<?php echo $trow['IndexNo']; ?>">
                                            <button class="btn btn-danger btn-xs" style="margin-left:10px" onclick="return confirm('Are you sure')">
                                            <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                                            Delete
                                            </button></a></td>

                                        </tr>

                                    <?php
                                        }
                                    ?>

                                </tbody>
                                <tfoot>
                                    
                                </tfoot>

                            </table><!-- table -->
                        </div><!-- /#terr_tab-->

                        <div class="tab-pane fade" id="route_tab">
                            <table id="table_route" class="table table-bordered table-hover" >

                                <thead>
                                    <tr>
                                        <th>Route ID</th>
                                        <th>Route Name</th>
                                        <th>Route Description</th>
                                        <th>Territory ID</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                        $rres = $acrud->read_route();
                                        while($rrow = mysql_fetch_array($rres))
                                        {
                                    ?>
                                        <tr>
                                            <td ><?php echo $rrow['RouteId']; ?></td>
                                            <td ><?php echo $rrow['RouteName']; ?></td>
                                            <td ><?php echo $rrow['RouteDescription']; ?></td>
                                            <td ><?php echo $rrow['TeretoryId']; ?></td>


                                            <td ><a style="color:white" href="/?page=area/RouteEdit&amp;route_edt_id=<?php echo $rrow['IndexNo']; ?>">
                                            <button class="btn btn-info btn-xs" style="margin-left:10px">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            Edit
                                            </button></a></td>

                                            <td ><a style="color:white" href="/?page=area/AreaDBCrud&amp;route_del_id=<?php echo $rrow['IndexNo']; ?>">
                                            <button class="btn btn-danger btn-xs" style="margin-left:10px" onclick="return confirm('Are you sure')">
                                            <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                                            Delete
                                            </button></a></td>

                                        </tr>

                                    <?php
                                        }
                                    ?>

                                </tbody>
                                <tfoot>
                                    
                                </tfoot>

                            </table><!-- table -->
                        </div><!-- /#route tab -->

                        <div class="tab-pane fade" id="add_tab">
                            <div class="box box success">
                                <h5 style="color:#3385FF">Plus sign to Add Territories for Area and Choose Territories under each Area to add Territories</h5>
                                <div class="box-body">
                                        <div>
                                        <?php
                                            $res1_add = $acrud->get_area();
                                            while($row1 = mysql_fetch_array($res1_add))
                                            {
                                            ?>
                                            <div class="col-xs-12">
                                            <div class="panel panel-default">
                                                <div  class="panel-heading clickable">
                                                    <h3 class="panel-title ">
                                                       <?php echo $row1['AreaName'] ?>
                                                    </h3>
                                                    <a><span class="pull-right "><i id="plus" class="glyphicon glyphicon-minus"></i></span></a>
                                                    <a href="/?page=area/AddTerritory&amp;AreaId=<?php echo $row1['AreaId']?>"><span class="pull-right "><i id="graph" class="fa  fa-plus-circle">Add<span class="area-details">Add Territory to Area</span></i></span></a>
                                                    <a href="/?page=area/AreaSalesReport&amp;AreaId=<?php echo $row1['AreaId']?>"><span class="pull-right "><i id="graph" class="fa fa-map-marker"> View Report<span class="area-details">View Total Sales Reports on Area</span></i></span></a>
                                                    <a href="/?page=area/AreaSalesReport&amp;AreaId=<?php echo $row1['AreaId']?>"><span class="pull-right "><i id="graph" class="fa fa-shopping-cart"> View Report<span class="area-details">View Product Sales Reports on Area</span></i></span></a>
                                                </div>
                                                 <?php  $res2_add = $acrud->get_territory($row1['AreaId']);
                                                while($row2 = mysql_fetch_array($res2_add))
                                                {
                                                ?>
                                                <div class="panel-body">
                                                    <div class="box">
                                                        <div class="box-body" style="width: 100%">
                                                            <div style="padding-bottom:20px; color: #222d32; font-size: medium; margin: auto;  ">
                                                                <?php echo $row2['TeretoryName']; ?>
                                                            </div>
                                                            <a style="color:#" href="/?page=area/AddRoute&amp;TeretoryId=<?php echo $row2['TeretoryId']?>">
                                                                <div class="col-md-3 col-sm-4">
                                                                    <i id="pane-i" class="fa fa-plus-square"> Add<span class="fawesome">Add Route</span></i>
                                                                </div>
                                                            </a>
                                                            <a href="/?page=area/TerritorySalesReport&amp;TerritoryId=<?php echo $row2['TeretoryId']?>">
                                                                <div class="col-md-3 col-sm-4">
                                                                    <i id="pane-i" class="fa fa-map-marker"> View Report<span class="fawesome">Route Total Sales Chart</span></i>
                                                                </div>
                                                            </a>
                                                            <a href="/?page=area/ProductSalesReport&amp;TerritoryId=<?php echo $row2['TeretoryId']?>">
                                                                <div class="col-md-3 col-sm-4">
                                                                    <i id="pane-i" class="fa fa-shopping-cart"> View Report<span class="fawesome">Products Sales Chart for Route</span></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php  } ?>
                                                </div>
                                            </div>
                                        <?php }  ?>
                                        </div>
                                </div>
                            </div>
                        </div><!--/add-->


                        <div class="tab-pane fade" id="sample">

                            
                        </div><!--/sample-->



                    </div><!-- /.tab-content -->
                </div><!-- /.nav-tabs-custom -->                
            </div><!--col-->
        </div><!--row-->
    </section><!--content-->
</div><!-- /.content-wrapper -->

    <!--footer php-->


    <?php require_once('_footer.php')?>
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery 2.1.4 -->

    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->


    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->


    <!-- Radiant App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    <!-- Radiant App -->

    <script src="../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <!--<script src="../dist/js/app.min.js" type="text/javascript"></script>
    -->


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
    <script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- datepicker -->

    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->


    <!-- Angular JavaScript Plugin -->
    <script src='../plugins/angular/angular.min.js'></script>
    <!-- Angular JavaScript Plugin -->

    <script>

    </script>

    <script type="text/javascript">
      $(document).ready(function () {

        $(document).on('click', '.panel-heading span.clickable', function (e) {
            var $this = $(this);
            if (!$this.hasClass('panel-collapsed')) {
                $this.parents('.panel').find('.panel-body').slideUp();
                $this.addClass('panel-collapsed');
                $this.find('#plus').removeClass('glyphicon-minus').addClass('glyphicon-plus');
                $this.find('#graph');
            } else {
                $this.parents('.panel').find('.panel-body').slideDown();
                $this.removeClass('panel-collapsed');
                $this.find('#plus').removeClass('glyphicon-plus').addClass('glyphicon-minus');
                $this.find('#graph');
            }
        });
        $(document).on('click', '.panel div.clickable', function (e) {
            var $this = $(this);
            if (!$this.hasClass('panel-collapsed')) {
                $this.parents('.panel').find('.panel-body').slideUp();
                $this.addClass('panel-collapsed');
                $this.find('#plus').removeClass('glyphicon-minus').addClass('glyphicon-plus');
                $this.find('#graph');
            } else {
                $this.parents('.panel').find('.panel-body').slideDown();
                $this.removeClass('panel-collapsed');
                $this.find('#plus').removeClass('glyphicon-plus').addClass('glyphicon-minus');
                $this.find('#graph');
            }
        });
        $(document).ready(function () {
            $('.panel-heading span.clickable').click();
            $('.panel div.clickable').click();
        });


        $("#tabs").tabs( {
            "activate": function(event, ui) {
                var table = $.fn.dataTable.fnTables(true);
                if ( table.length > 0 ) {
                    $(table).dataTable().fnAdjustColumnSizing();
                }
            }
        } );

        $('table.display').dataTable( {
            "sScrollY": "200px",
            "bScrollCollapse": true,
            "bPaginate": false,
            "bJQueryUI": true,
            "aoColumnDefs": [
                { "sWidth": "10%", "aTargets": [ -1 ] }
            ]
        } );

        $('#area_table').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "ZeroRecords": "No matching records found",
            "searchDelay": null,
            "sPaginationType": "full_numbers",
            "scrollX": true,
            "columns": [
                { "searchable": true },
                { "searchable": true },
                { "searchable": false },
                { "searchable": false },
                ],
        });

        var original_cell_contents;
 
        $('#area_table tbody').on('click', '.editable', function() {
            $(this).attr('class', 'editing'); // change class, so editing the input doesn't process the clicks
            original_cell_contents = $(this).html();
            $(this).html("<input type='text' value='" + original_cell_contents + "' class='edit_input'>");
            $(this).find('.edit_input').focus();
        });
         
        $('#area_table tbody').on('focusout', '.editing', function(e) {
            $(this).attr('class','editable');
            $(this).html($(this).find('.edit_input').val());
            var this_column_name = $(this).closest('table').find('th').eq($(this).index()).text();
            if ($(this).html() != original_cell_contents) {
                $.ajax({
                    url:'/?page=area/AreaEdit&area_edt_id='+ $(this).closest('table').find('th').eq($(this).index()).attr("id") + '&id=' + dtable.cell($(this).closest('tr'),0).data() + '&value='+encodeURIComponent($(this).html()),
                    success:function(data) {
                        //do something
                    }
                });
         
            };
        });
         
        $('#area_table tbody').on('keyup', '.editing', function(e) {
            var keyCode = (window.event) ? e.keyCode : window.event.keyCode;
            var this_column_name = $(this).closest('table').find('th').eq($(this).index()).text();
            if (keyCode == 13 || keyCode == 27) {
                $(this).attr('class','editable');
                if (keyCode == '13') $(this).html($(this).find('.edit_input').val());
                if (keyCode == '27') $(this).html(original_cell_contents);
                if ($(this).html() != original_cell_contents) {
                    $.ajax({
                        url:'qqqqqqqqqqq.php?content=customer&action=update&column='+ $(this).closest('table').find('th').eq($(this).index()).attr("id") + '&id=' + dtable.cell($(this).closest('tr'),0).data() + '&value='+encodeURIComponent($(this).html()),
                        success:function(data) {
                            //do something
                        }
                    });
                }
            };
        });


        $('#territory_table').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bInfo": true,
          "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
          "ZeroRecords": "No matching records found",
          "searchDelay": null,
          "sPaginationType": "full_numbers",
          "scrollX": true,
          "columns": [
                { "searchable": true },
                { "searchable": true },
                { "searchable": true },
                { "searchable": false },
                { "searchable": false },
                ],

        });

        $('#table_route').dataTable({
              "bPaginate": true,
              "bLengthChange": true,
              "bFilter": true,
              "bSort": true,
              "bInfo": true,
              "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
              "ZeroRecords": "No matching records found",
              "searchDelay": null,
              "sPaginationType": "full_numbers",
              "scrollX": true,
              "columns": [
                    { "searchable": true },
                    { "searchable": true },
                    { "searchable": true },
                    { "searchable": true },
                    { "searchable": false },
                    { "searchable": false },
                    ],

            });

        });
    </script>