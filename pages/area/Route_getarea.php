<?php
    $acrud = new AreaCRUD();
?>

<?php require_once('_header.php')?>
<?php require_once('_sidebar.php')?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Route Management

        </h1>
        <ol class="breadcrumb">
            <li><a href="/?page=area/RouteHome"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Route</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main content -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                      <h3 class="box-title">Route Description Table</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php
                            $res = $acrud->get_area(); 
                            if ($res > 0) {
    				        while($row = mysql_fetch_array($res)){
                        ?>
                            <div class="col-lg-3 col-xs-6">
                            <div class="small-box">        
                                <a href="/?page=area/Route_get_territory&amp;AreaId=<?php echo $row['AreaId']; ?>"><button class="btn btn-block btn-info btn-lg"><?php echo $row['AreaName']; ?></button></a>
                            </div>
                            </div> 
				      <?php }
                    }
                      ?>
                    </div><!-- /.box body-->
                </div><!-- /.box -->
            </div>
        </div><!--row-->
    </section><!--content-->
</div><!-- /.content-wrapper -->

<?php require_once('_footer.php')?>