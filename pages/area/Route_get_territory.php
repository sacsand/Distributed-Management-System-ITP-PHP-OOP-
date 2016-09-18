<?php
    $acrud = new AreaCRUD();
    $AreaId=URL::getParam('AreaId');
?>

<?php require_once('_header.php')?>
<?php require_once('_sidebar.php')?>

<style type="text/css">
    #hov {
          border: 1px solid #ccc;
          font-size: 12px;
          margin-top: 30px;
          margin-right: 10px;
          margin-left: 70px; 
          padding: 5px;
          text-transform: uppercase;
          color: #9F6000;
          background-color: #FEEFB3;
    }
</style>

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
                        $res = $acrud->get_territory($AreaId); 
                        $cnt = 0;
                        while($row = mysql_fetch_array($res))
                        {  
                        ?>
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box"> 
                                <a href="/?page=area/AddRoute&amp;TeretoryId=<?php echo $row['TeretoryId']; ?>"><button class="btn btn-block btn-primary btn-lg"><?php echo $row['TeretoryName']; ?></button></a>
                            </div>
                        </div>
                      <?php 
                        $cnt = $cnt + 1;
                        }

                        if ($cnt < 1) { ?>
                            <div><span id="hov" ><i class="fa fa-warning" >    No Territories assigned to this area</i></span></div>
                      <?php  
                        }
                      ?> 
                    </div><!-- /.box body-->
                </div><!-- /.box -->
            </div>
        </div><!--row-->
    </section><!--content-->
</div><!-- /.content-wrapper -->

<?php require_once('_footer.php')?>