




<?php require_once('_header.php')?>

<?php
$Teratory=URL::getParam('teretory_id');
$Teratory_i=$Teratory;

$crud = new CRUD();
$StockObj = new STOCK();


//$Teratory=$StockObj->Get_Sales_rep_teratory($username);
//$Teratory_i=$StockObj->Get_Sales_rep_teratory($username);

$TeratoryName=$StockObj->Get_Sales_rep_teratory_name($Teratory_i);
$AreaId=$StockObj->Get_Sales_rep_Area_id($TeratoryName );
$AreaName=$StockObj->Get_Sales_rep_Area_Name($AreaId );


$count_notification=0;
$resv = $DsrObj->stock_level($Teratory) ;

while($rowt = mysql_fetch_array($resv)) {
    $productidy = $rowt['productId'];
    $quantity = $rowt['quantity'];
    $max_stock = $rowt['max_stock'];


    $percentage = $DsrObj->CalculatePrecentage($quantity, $max_stock);
    if ($percentage < 25) {
        $count_notification++;


    }
}


?>


<?php

$StockObj = new STOCK();


if(isset($_POST['save_mul'])) {
    $total = $_POST['lname4'];
    //  echo $total;


    for ($i = 1; $i <= $total; $i++) {
        $stock_i = $_POST["lname1$i"];
        $produtid_i = $_POST["lname2$i"];
        $indexNo_i = $_POST["lname3$i"];

        $StockObj->Update_Stock($indexNo_i,$stock_i,$Teratory_i,$produtid_i);

    }
    unset($_POST["save_mul"]);

}


?>


<?php require_once('_sidebar.php')?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <h4> <a href="/?page=stock/Admin_Add_Stock"><i class="fa  fa-angle-left"></i> Back</a></h4>
            <h1>
                <?php echo $TeratoryName ." - ". $AreaName  ?>
                <br>

                <small> <?php echo $Teratory_i; ?> -</small>
                <small> <?php echo $AreaId; ?></small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#fa-icons" data-toggle="tab">Grid View</a></li>
                            <li><a href="#glyphicons" data-toggle="tab">List View</a></li>
                            <li><a href="#glyphicons1" data-toggle="tab">Low Stocks <span data-toggle="tooltip" title="" class="badge bg-red" data-original-title="<?php echo $count_notification ; ?> Low Stock"><?php echo $count_notification ; ?></span></a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- Font Awesome icons -->
                            <div class="tab-pane active" id="fa-icons" >
                                <h4 class="page-header">Stock</h4>

                                <div class="row">
                                    <?php
                                    $res = $StockObj->GetProudutDetails();



                                    while($r1 = mysql_fetch_array($res))
                                    {
                                    ?>


                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <?php $productId=$r1['productId'];  ?>

                                        <!--check whether opening stock is added-->
                                        <?php $IndexNo= $StockObj->Get_Index_No($productId,$Teratory) ?>

                                        <?php
                                        if ( $IndexNo==null){

                                            echo  '<div class="small-box bg-red ">';}

                                        else

                                            echo  '<div class="small-box bg-yellow ">';

                                        ?>


                                        <div class="inner">

                                            <h4><?php echo $r1['name'];  ?></h4>
                                            <?php $stock=$StockObj->Get_Current_stock($productId,$Teratory)?>
                                            <?php $IndexNo= $StockObj->Get_Index_No($productId,$Teratory) ?>
                                            <!--check index no is exit then assing o to index no- -->
                                            <?php
                                            if ( $IndexNo==null){
                                                $IndexNo=0;
                                                echo  '<h5>&nbsp;&nbsp;&nbsp;Stock Not Available</h5>';}
                                            else{ ?>

                                                <h5>&nbsp;&nbsp;&nbsp;Opening Stock : <?php echo $stock ?></h5>
                                            <?php  }

                                            ?>

                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>



                                        <a href="/?page=stock/Sales_rep_update_stock&amp;Index_No=<?php echo $IndexNo; ?>&amp;product_id=<?php echo $r1['productId'] ?>&amp;product_name=<?php echo $r1['name'] ?>&amp;quantity=<?php echo $stock ?>&amp;teretory=<?php echo $Teratory ?> "
                                           class="small-box-footer">Add to Stock <i class="fa fa-arrow-circle-right"></i>
                                        </a>

                                        <a href="/?page=stock/Sales_rep_remove_stock&amp;Index_No=<?php echo $IndexNo; ?>&amp;product_id=<?php echo $r1['productId'] ?>&amp;product_name=<?php echo $r1['name'] ?>&amp;quantity=<?php echo $stock ?>&amp;teretory=<?php echo $Teratory ?> "
                                           class="small-box-footer"> Remove from stock<i class="fa fa-arrow-circle-right"></i>

                                        </a>


                                    </div>
                                </div>


                                <?php
                                }
                                ?>


                            </div><!-- /.row -->








                </div><!-- /#fa-icons -->
                            <!-- glyphicons-->
                            <div class="tab-pane" id="glyphicons">
                                <h4 class="page-header">Stock</h4>
                                <small></small>
                                <div class="row">

                               <form method="post" name="frm" >



                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <table class="table no-margin">
                                                    <thead>
                                                    <tr>
                                                        <th>Product ID</th>
                                                        <th>Product Name</th>
                                                        <th>Current Stock</th>


                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $res = $StockObj->GetProudutDetails();

                                                    $count=0;

                                                    while($row = mysql_fetch_array($res))
                                                    { $count++;
                                                        $productId=$row['productId'];

                                                        $stocky=$DsrObj->Get_Current_stock($productId,$Teratory);
                                                       $IndexNon= $StockObj->Get_Index_No($productId,$Teratory) ;


                                                   if ( $IndexNon==0)
                                                       $IndexNon=0;


                                            ?>






                                                        <tr>
                                                            <td><a href="#"><?php echo $row['productId']; ?></a></td>
                                                            <td><?php echo $row['name']; ?></td>
                                                            <td><?php echo $stocky ; ?></td>
                                                            <td><input type="number" name="lname1<?php echo $count; ?>" placeholder="Stock" max="100000" class='form-control' /></td>
                                                            <input type="hidden" name="lname2<?php echo $count; ?>" placeholder="last name" value="<?php echo $row['productId']; ?>" class='form-control' />
                                                            <input type="hidden" name="lname3<?php echo $count; ?>" placeholder="last name" value="<?php echo $IndexNon  ?>" class='form-control' />



                                                        </tr>
                                                    <?php
                                                    }

                                                    ?>
                                                    <input type="hidden" name="lname4" placeholder="last name" value="<?php echo $count;  ?>" class='form-control' />
                                                    <tr>
                                                        <td colspan="4">

                                                            <button type="submit" name="save_mul" class="btn btn-default btn-block btn-sm" style="margin-bottom:10px">
                                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                                Add/Remove Stock
                                                            </button>

                                                        </td>
                                                    </tr>

                                                    <tfoot>


                                                        <button type="submit" name="save_mul" class="btn btn-primary btn-block btn-sm" style="margin-bottom:10px">
                                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                            Add/Remove Stock
                                                        </button>

                                                    </tfoot>



                                                    </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                                        </div><!-- /.box-body -->

                               </form>




                            </div><!-- /.row -->







                        </div>

                        <div class="tab-pane" id="glyphicons1">
                            <h4 class="page-header">Low Stock</h4>
                            <small></small>
                            <div class="row">

                                <?php $resv = $DsrObj->stock_level($Teratory) ;


                                while($rowt = mysql_fetch_array($resv)) {
                                $productidy = $rowt['productId'];
                                $quantity = $rowt['quantity'];
                                $max_stock = $rowt['max_stock'];


                                $percentage = $DsrObj->CalculatePrecentage($quantity, $max_stock);
                                if ($percentage < 25) {


                                ?>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box bg-red">
                                        <span class="info-box-icon"><i class="fa fa-area-chart"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text"><?php echo $rowt['name']; ?></span>
                                            <span class="info-box-number"><?php echo $quantity ?></span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: <?php echo $percentage ?>%"></div>
                                            </div>
                                             <span class="progress-description">
                                                      <?php echo $percentage ?>% remains
                                             </span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->

                                <?php }} ?>


                            </div><!-- /.row -->







                        </div>

                    </div>

                </div><!-- /#ion-icons -->



            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php require_once('_footer.php')?>

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
