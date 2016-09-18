  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
        <?php require_once('_header.php')?>
        <?php require_once('_sidebar.php')?>


        <?php

        $invoice = new INVOICE();


        $today = date("m/d/Y");
        $yesterday = date('m/d/Y',strtotime("-1 days"));

        $first_date_of_this_month = date('m/01/Y');

        ?>


        <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        

        <!-- Main content -->
        <section class="content">

            <h1><small><?php echo $today; ?></small></h1>

            <div class="row">
                    <?php
                    $result = $invoice -> view_invoices($today,$rep);

                     $x=1;
                     while( $items = mysql_fetch_array($result) )
                     {



                         if($x%3 == 1)
                         $colorr = "small-box bg-gray";
                         if($x%3 == 2)
                         $colorr = "small-box bg-gray";
                         if($x%3 == 0)
                         $colorr = "small-box bg-gray";
                         

                     ?>



                         <div class="col-lg-3 col-xs-6">
                                    <div class="<?php echo $colorr; ?>">
                                        <div class="inner">
                                            <h3 style="color: #787878"><?php echo $items['InvoiceNo'];  ?></h3>
                                                
                                            <?php
                                                $sname = $invoice -> get_shop_name($items['shopId']);
                                            ?>
                          
                                            <p><?php  echo $sname; ?></p>
                                            
                                        </div>
                                        <div class="icon">
                                            <i class="fa ion-stats-bars"></i>
                                        </div>

                                       <?php

                                       echo "<a class='small-box-footer'  href='/?page=invoice/invoice&InvoiceNo=" .$items['InvoiceNo']. "' >";
                                        
                                       ?> 
                                        More info<i class="fa fa-arrow-circle-righ"></i></a>

                                    </div>
                                </div>


                     <?php
                        $x++;
                        }
                     ?>
            </div>


          </section>

    <section class="content">
          <div class="row">
                <div class="col-md-12">
                    <p class="text-center">
                        <strong>Goal Completion</strong>
                    </p>

                    <?php
                    $i=1;

                    $a = $invoice -> get_daily_sold_products($rep,$today);
                    $count = mysql_num_rows($a);


                    while($i<=$count) {

                        $r = mysql_fetch_array($a);
                        $productId = $r['productId'];
                        //$plan = $invoice -> get_days_plan_value($date,$route,$productId);
                        $plan=250;
                        $sale = $invoice -> get_daily_sells_count($rep,$today,$productId);
                        $name = $invoice -> get_product_name2($productId);

                        if($i%4 == 1)
                            $color = "progress-bar progress-bar-aqua";
                        if($i%4 == 2)
                            $color = "progress-bar progress-bar-red";
                        if($i%4 == 3)
                            $color = "progress-bar progress-bar-green";
                        if($i%4 == 0)
                            $color = "progress-bar progress-bar-yellow";

                        ?>
                        <div class="progress-group">
                            <span class="progress-text"><?php echo $name; ?></span>
                            <span class="progress-number"><b><?php echo $sale; ?></b>/<?php echo $plan; ?></span>

                            <div class="progress sm">
                                <div class="<?php echo $color; ?>" style="width:<?php echo $sale/$plan*100  ?>%"></div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                    ?>
                </div>


          </div>
          
          
          
          
          




            
          
          
          
          
          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     
      <!--footer php-->


       <?php require_once('_footer.php')?>

   



  </body>
</html>