    <div class="wrapper">
      <?php require_once('_header.php')?>
      <?php require_once('_sidebar.php')?>



        <?php
        $invoice = new INVOICE();

        $invoice_no = Url::getParam('InvoiceNo');





        ?>



      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Invoice
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Invoice</li>
            </ol>
        </section>

        <?php

                $invoice_details = $invoice -> view_current_invoice($invoice_no);

                $invoice_details = mysql_fetch_array($invoice_details);

                //Invoice Details
                $area         = $invoice_details['teretoryId'];
                $customerId   = $invoice_details['shopId'];
                $customerName = $invoice -> get_shop_name($customerId);
                $soldBy       = $invoice_details['repId'];
                $currentDate  = $invoice_details['cDate'];
                $nextDate     = $invoice_details['nDate'];
        ?>

        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Radiant Confectioners (Pvt) Ltd
                        <small class="pull-right">Date: <?php echo $currentDate; ?></small>
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

            <?php
                   // echo $invoice_no;
                    $details = $invoice -> get_sold_product_details($invoice_no);

            ?>

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
                            <th>Sub Total&nbsp;(Rs.)</th>
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
                            </tr >
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

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="/?page=invoice/invoice_print&invoiceNo=<?php echo $invoice_no; ?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
                    
                </div>
            </div>

              </section>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!--footer php-->
     
       
      
      <?php require_once('_footer.php')?>


 <div class='control-sidebar-bg'></div>
    </div>
     

  </body>
</html>
