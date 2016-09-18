
<?php require_once('_header.php')?>
<?php require_once('_sidebar.php')?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           View Sales Reports
            <small></small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#fa-icons" data-toggle="tab">Monthly</a></li>
                        <li><a href="#glyphicons" data-toggle="tab">DSR</a></li>


                    </ul>
                    <div class="tab-content">
                        <!-- Font Awesome icons -->
                        <div class="tab-pane active" id="fa-icons" >

                                <?php
                                $res = $StockObj->Get_Areas();
                                while($r1 = mysql_fetch_array($res))
                                {
                                ?>
                                <section id="new">

                                <h4 class="page-header"><?php echo $r1['AreaName'] ?></h4>
                                <div class="row fontawesome-icon-list">

                                  <?php  $res1 = $StockObj->Get_Teretories($r1['AreaId']);
                                    while($r11 = mysql_fetch_array($res1))
                                    {
                                    ?>

                                   <a href="/?page=salesreports/ViewSalesRepDashbored&amp;teretory_id=<?php echo $r11['TeretoryId']?>"> <div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-bed"></i> <?php echo $r11['TeretoryName'] ?></div></a>

                                    <?php  } ?>
                                </div>
                            </section>

                            <?php }  ?>




                        </div><!-- /#fa-icons -->
                        <!-- glyphicons-->
                        <div class="tab-pane" id="glyphicons">

                            <?php
                            $res = $StockObj->Get_Areas();
                            while($r1 = mysql_fetch_array($res))
                            {
                                ?>
                                <section id="new">

                                    <h4 class="page-header"><?php echo $r1['AreaName'] ?></h4>
                                    <div class="row fontawesome-icon-list">

                                        <?php  $res1 = $StockObj->Get_Teretories($r1['AreaId']);
                                        while($r11 = mysql_fetch_array($res1))
                                        {
                                            ?>

                                            <a href="/?page=salesreports/DSRreport&amp;teretory_id=<?php echo $r11['TeretoryId']?>"> <div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-bed"></i> <?php echo $r11['TeretoryName'] ?></div></a>

                                        <?php  } ?>
                                    </div>
                                </section>

                            <?php }  ?>

                        </div><!-- /#ion-icons -->


                    </div><!-- /.tab-content -->
                </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php require_once('_footer.php')?>


