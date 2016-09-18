<?php
//include_once 'inc/class.crud.php';

$crud = new CRUD();
$count = Url::getParam('count');
echo $count;

?>


    <?php require_once('_header.php')?>
    <?php require_once('_sidebar.php')?>





    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manage Products

            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

          <!--  <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <!--<div class="small-box bg-green">
                    <div class="inner">
                        <h3>mdmllml<sup style="font-size: 20px">%</sup></h3>
                        <p>Bounce Rate</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>

                </div> -->


            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Product Table</h3>
                            <div class="box-tools">

                            </div>
                        </div><!-- /.box-header -->
                        <!--<div class="box-body">
                            <table id="example2" class="table table-bordered table-hover"> -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered table-hover paginated">
                        <thead>
                        <tr>
                            <th>Index</th>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Weight</th>
                            <th>Case Makeup</th>
                            <th>Unit Price WS</th>
                            <th>Case Price WS</th>
                            <th> Unit Price TF</th>
                            <th>Case Price TF</th>
                            <th>Price Consumer</th>
                            <th>Category</th>
                            <th>Free Issue Rate</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $res = $crud->read();
                        $num_rows = count($res);
                        if(mysql_num_rows($res)>0)
                        {
                        while($row = mysql_fetch_array($res))
                        {
                        ?>
                        <tr>
                            <td><?php echo $row['auto']; ?></td>
                            <td><?php echo $row['productId']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['weight']; ?></td>
                            <td><?php echo $row['caseMakeup']; ?></td>
                            <td><?php echo $row['unitPrice_ws']; ?></td>
                            <td><?php echo $row['casePrice_ws']; ?></td>
                            <td><?php echo $row['unitPrice_tf']; ?></td>
                            <td><?php echo $row['casePrice_tf']; ?></td>
                            <td><?php echo $row['priceConsumer']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['freeIssueRate']; ?></td>


                            <td><a href="/?page=product/product_edit&amp;edt_id=<?php echo $row['auto']; ?>"><button class="btn btn-primary btn-xs">Edit</button></a></td>
                            <td><a href="/?page=product/dbcrud&amp;del_id=<?php echo $row['auto']; ?>"><button class="btn btn-danger btn-xs">Delete</button></a></td>
                        </tr>

                        <?php
                        }
                        }
                        else
                        {
                            ?><tr><td colspan="5">Nothing here... add some new</td></tr><?php
                        }
                        ?>

                        </tbody>
                                <tfoot>
                                <tr>
                                    <th> Id</th>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Weight</th>
                                    <th>Case Makeup</th>
                                    <th>Unit Price WS</th>
                                    <th>Case Price WS</th>
                                    <th> Unit Price TF</th>
                                    <th>Case Price TF</th>
                                    <th>Price Consumer</th>
                                    <th>Category</th>
                                </tr>
                                </tfoot>

                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
            <a href="/?page=product/add_records" class=".btn.btn-app"><button class="btn btn-danger btn-xs">Add New Product</button></a>


        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!--footer php-->


    <?php require_once('_footer.php')?>


<script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js" type="text/javascript"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js" type="text/javascript"></script>
  <!--<script>

    $('td', 'table').each(function(i) {
    $(this).text(i+1);
    });



    $('table.paginated').each(function() {
    var currentPage = 0;
    var numPerPage = 10;
    var $table = $(this);
    $table.bind('repaginate', function() {
    $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
    });
    $table.trigger('repaginate');
    var numRows = $table.find('tbody tr').length;
    var numPages = Math.ceil(numRows / numPerPage);
    var $pager = $('<div class="pager"></div>');
    for (var page = 0; page < numPages; page++) {
    $('<span class="page-number"></span>').text(page + 1).bind('click', {
    newPage: page
    }, function(event) {
    currentPage = event.data['newPage'];
    $table.trigger('repaginate');
    $(this).addClass('active').siblings().removeClass('active');
    }).appendTo($pager).addClass('clickable');
    }
    $pager.insertBefore($table).find('span.page-number:first').addClass('active');
    });



</script> -->


</body>
</html>