

      <?php require_once('_header.php')?>
<?php


$Index_No = Url::getParam('Index_No');
$productname = Url::getParam('product_name');
$currentStock=Url::getParam('quantity');
$Teretory=Url::getParam('teretory');
$product_id=Url::getParam('product_id');


?>
      <?php require_once('_sidebar.php')?>



      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <section class="content-header">



                <h4> <a href="/?page=stock/Sales_rep_add_daily_stock&amp;teretory_id=<?php echo $Teretory ?>"> <i class="fa  fa-angle-left"></i> Back</a></h4>



                <h1>
                    Add Good Recived

                    <small></small>
                </h1>



            </section>
            <section class="content">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Current Stock of <b> <?php echo $productname ;?> </b>  is  <b> <?php echo $currentStock ?></b></h3>
                    </div>
                    <div class="panel-body">


                        <form action="/?page=stock/STOCK_CRUD&amp;IndexNo=<?php echo $Index_No ; ?>" method="post" name="UpdateStock" class="form-horizontal">

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $productname ;?> Good Recived</label>



                                <div class="col-sm-10">
                                    <input type="text" name="GoodRecived" class="form-control" >
                                </div>

                                <input type="hidden" name="teretory" value="<?php echo $Teretory ;?>">
                                <input type="hidden" name="product_id" value="<?php echo $product_id ;?>">

                            </div>



                            <div class="form-group">
                                <div class="col-md-2"> </div>


                                <div class="col-md-1">
                                    <button type="submit" value="Save" name="UpdateStock" class="btn btn-danger" onclick="myFunction()">Add</button>
                                </div>

                            </div>

                        </form>


                    </div>
                </div>



















        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <?php require_once('_footer.php')?>


  <!-- ./wrapper -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- jQuery 2.1.4
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>









  





  </body>
</html>
