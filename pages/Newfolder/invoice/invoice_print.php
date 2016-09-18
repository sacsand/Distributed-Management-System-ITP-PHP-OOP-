<?php
    $invoice_no = Url::getParam('invoiceNo');
    $invoice = new INVOICE();

    //Get invoice details...
    
    $invoice_details = $invoice -> view_current_invoice($invoice_no);
    
    $invoice_details = mysql_fetch_array($invoice_details);

    //Invoice Details
    $area         = $invoice_details['teretoryId'];
    $customerId   = $invoice_details['shopId'];
    $customerName = $invoice -> get_shop_name($customerId);
    $soldBy       = $invoice_details['repId'];
    $currentDate  = $invoice_details['cDate'];
    $nextDate     = $invoice_details['nDate'];


    //Get sells product details...
    $details = $invoice -> get_sold_product_details($invoice_no);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Radiant Pvt Ltd</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-globe"></i> Radiant Confectioners (Pvt) Ltd
              <small class="pull-right"><?php echo $currentDate; ?></small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong> Radiant Confectioners (Pvt) Ltd</strong><br>
                No.60 Udaya Mawatha, <br>
                Sapugaskanda,
                Sri Lanka.<br>
                Phone: (011)2401713<br/>
                Fax: (011)2401555<br/>
                Email: info@radiant.lk
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong><?php echo $customerName ?></strong><br>
                Address line 1,<br>
                Address line 2.<br>
                Phone: (555)5391037<br/>
                Email: john.yah@example.com
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
              <br>
              <b>Invoice No:&nbsp;</b> <?php  echo $invoice_no;  ?><br/><br/>
              <b>Payment Date:&nbsp;</b><?php echo $currentDate; ?><br/>
              <b>Date of next Vist:&nbsp;</b><?php echo $nextDate; ?><br/>
              <b>Sold By: &nbsp;</b>Sajith Chamara<br/><br>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Product Id</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Rate</th>
                  <th>Free Issue</th>
                  <th>Subtotal&nbsp;(Rs.)</th>
                </tr>
              </thead>
              <tbody>

              <?php
              while( $r = mysql_fetch_array($details) )
              {
                    $productName = $invoice -> get_product_name($r['productId']);
                    $rate = $invoice -> get_product_price($r['productId']);
              ?>
                    <tr>
                      <td><?php  echo $r['productId'];  ?></td >
                      <td><?php  echo $productName;  ?></td >
                      <td><?php  echo $r['quantity'];  ?></td >
                      <td><?php  echo $rate;  ?></td >
                      <td><?php  echo $r['freeIssue'];  ?></td >
                      <td><?php  echo $r['total'] ?></td>
                    </tr>
              <?php
              }
              ?>






              </tbody>
            </table>
          </div><!-- /.col -->
        </div><!-- /.row -->

    <?php
                    $total_result = $invoice -> get_total_bill($invoice_no);
                    $r = mysql_fetch_array($total_result);
                    $total_price = $r['SUM(total)'];
    ?>



        <div class="row">
          <!-- accepted payments column -->
          <div class="col-xs-6">
              <p class="lead">Special Notes:</p>
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                  <br><br><br><br>
              </p>
          </div><!-- /.col -->
          <div class="col-xs-6">
              <p class="lead">Summary</p>
              <div class="table-responsive">
                  <table class="table">
                        <tr>
                            <th style="width:50%">Total:&nbsp;(Rs.)</th>
                            <td><?php echo $total_price; ?></td>
                        </tr>
                        <tr>
                            <th>Discount:&nbsp;(Rs.)</th>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <th>Net Total:&nbsp;(Rs.)</th>
                            <td><?php echo $total_price; ?></td>
                        </tr>
                  </table>
              </div>
          </div><!-- /.col -->
      </div><!-- /.row -->


      </section><!-- /.content -->
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>
