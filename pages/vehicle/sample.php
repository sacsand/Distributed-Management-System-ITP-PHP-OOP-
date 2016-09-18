<?php
//include_once 'inc/class.crud.php';
    $crud = new CRUD();
?>
    <?php require_once('_header.php')?>
    <?php require_once('_sidebar.php')?>

    <script>
		$("a[name=tab]").on("click", function () { 
		    var a = $(this).data("index"); 
		    alert(a); 
		});
	</script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Area Management

            </h1>
            <?php echo (isset($row['area_name'])) ? $row['area_name'] : ''; ?>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Area</li>
            </ol>
        </section>

        <!-- Main content -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
					<?php
					$geo = New Geo;
                    echo $geo->getRealIpAddr();
					$geo->request('124.43.136.4');
					echo $geo->isp . '<br>';

                    
					?>

					<div>
						<ul class="nav navbar-nav navbar-right">
						    <li class="dropdown">
						      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
						      <ul class="dropdown-menu" role="menu">
						      	<li><a id="tab1" data-index="0" name="tab" href="#">5</a></li>
    							<li><a id="tab2" data-index="1" name="tab" href="#">10</a></li>
    							<li><a id="tab3" data-index="2" name="tab" href="#">15</a></li>
						        <li class="divider"></li>
						        <li><a href="#">Separated link</a></li>
						      </ul>
						    </li>
					  	</ul>
					</div>
				</div><!-- /.box -->
            </div>
        </div>

    </div><!-- /.content-wrapper -->

    <!--footer php-->

    <?php require_once('_footer.php')?>
