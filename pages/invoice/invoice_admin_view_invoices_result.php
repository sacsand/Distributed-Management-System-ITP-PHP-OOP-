
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <?php require_once('_header.php')?>
    <?php require_once('_sidebar.php')?>


    <?php
        $invoice = new INVOICE();

        $tid =  Url::getParam('teretory_id');

    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View Invoices
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>




        <!-- Main content -->
        <section class="content">





            <div class="row">

                <?php

                $invoice = new INVOICE();


                    $data = $invoice -> get_invoice_details_of_terotory($tid);


                    $count = mysql_num_rows($data);

                    if ($count > 0)
                    {

                        while( $invoce = mysql_fetch_array($data) )
                        {

                            $invoice_no = $invoce['InvoiceNo'];
                            $total_result = $invoice -> get_total_bill($invoice_no);
                            $r = mysql_fetch_array($total_result);
                            $total_price = $r['SUM(total)'];
                            ?>
                            <div class="col-md-3">
                                <div class="box box-default collapsed-box box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">
                                            <p><B>Invoice No:</B>&nbsp;<?php  echo $invoce['InvoiceNo'];   ?> &nbsp; &nbsp; </p>
                                            <p><B>Date:</B>&nbsp;<?php  echo $invoce['cDate'];?></p>
                                        </h3>
                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>

                                    <div class="box-body">

                                        <p>
                                            <B>Invoice No:</B>&nbsp;  <?php  echo $invoce['InvoiceNo'];   ?><br>
                                            <B>Route:</B>&nbsp;       <?php  echo $invoce['routeId'];   ?><br>
                                            <B>Shop:</B>&nbsp;        <?php  echo $invoce['shopId'];   ?><br>
                                            <B>Date:</B>&nbsp;        <?php  echo $invoce['cDate'];   ?><br>
                                            <B>Total amount:</B>&nbsp;Rs.&nbsp;<?php  echo $total_price;  ?><br>
                                        </p>

                                        <p>
                                            <?php

                                            echo "<a  class='small-box-footer'  href='/?page=invoice/invoice&InvoiceNo=" .$invoice_no. "' >";

                                            ?>  More info <i class="fa fa-arrow-circle-righ"></i></a>


                                        </p>

                                    </div>
                                </div>
                            </div>
                            <?php
                        }


                    }
                    else
                    {
                        echo "
                            <div class='form-group col-md-6'>
                            <label>No Results found...</label>
                            </div> ";

                    }

                ?>


            </div>


        </section>













    </div>

    <!--footer php-->
    <?php require_once('_footer.php')?>






    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- jQuery 2.1.4
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>





    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>
        $(function() {
            $( "#date1" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function( selectedDate ) {
                    $( "#date1" ).datepicker( "option", "minDate", selectedDate );
                }
            });
            $( "#date2" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function( selectedDate ) {
                    $( "#date2" ).datepicker( "option", "maxDate", selectedDate );
                }
            });


        });
    </script>







</body>
</html>
