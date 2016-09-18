<?php

    $invoice = new INVOICE();
    //$crud = new CRUD();



    $today = date("m/d/Y");
    $yesterday = date('m/d/Y',strtotime("-1 days"));
    $first_date_of_this_month = date('m/01/Y');
?>


<!DOCTYPE html>
<html>
   <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
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

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>



  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
        <?php require_once('_header.php')?>
        <?php require_once('_sidebar.php')?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Search Invoices
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

          


        <!-- Main content -->
        <section class="content">
         
        <form name="date"  action="/?page=invoice/invoice_searching" method="post">
           <div class="row">
               
               <div class="form-group col-md-6"> 
                    <label>Date From:</label>    
                    <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    <input type="text" id="date1" name="date1" class="form-control" >
                    </div>    
               </div>
               
               <div class="form-group col-md-6">
                    <label>Date To:</label>
                    <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    <input type="text" id="date2" name="date2" class="form-control" >
                    </div>   
                </div>            
               
            </div> 
            <div class="row">
                <div class="form-group col-md-1">     
                    <input type="submit" id="calendar_submit" name="calendar_submit" class="btn btn-primary" value="Search">
                </div>
            </div> 
            
            
          </form>
            
            
        
            <div class="row"> 
          
                <?php

                    $invoice = new INVOICE();


                    if(isset($_POST['calendar_submit']))
                    {
                        
                        $date1 = $_POST['date1'];
                        $date2 = $_POST['date2'];

                        $data = $invoice -> get_invoice_details_between_days($date1,$date2,$rep);

                        
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
