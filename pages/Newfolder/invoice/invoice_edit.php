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
            Edit Invoices
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

          


        <!-- Main content -->
        <section class="content">
         
        <form name="editform"  action="/?page=invoice/invoice_edit" method="post">
           <div class="row">
               
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-12 control-label">Invoice No:</label>
                    <div class="col-sm-10">
                        <input type="text" name="invoiceNo" id="invoiceNo" class="form-control" placeholder="Enter Invoice Number Here...">
                    </div>
                    <div class="form-group col-sm-2">     
                        <input type="submit" id="invoice_edit_submit" name="invoice_edit_submit" class="btn btn-primary" value="Find Invoice">
                    </div>
                </div>
            </div>
        </form>
            
            
          <!-- Give error message -->
            
          <?php
          if(isset($_GET['message']))
          {
                if ( $_GET['message'] == 1 )
                {
                ?>
                    <script>alert("Sucessfully Updated");</script>
                <?php    
                }
                else if ( $_GET['message'] == 3 )    
                {
                ?>        
                    <script>alert("Sucessfully Deleted!");</script>
                    
                <?php
                }
                else
                {
                ?>
                    <script>alert("Cant Update, Not enough products in the stock!");</script>
                <?php
                }
          }
          ?>        
          
            
          <?php
          if(isset($_POST['invoice_edit_submit']))
          {
          ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Product Table</h3>
                            <div class="box-tools">

                            </div>
                        </div><!-- /.box-header -->
                        <!--<div class="box-body">
                            <table id="example2" class="table table-bordered table-hover"> -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered table-hover paginated">
                        <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
        
                        $invoiceNo = $_POST['invoiceNo'];
                        $res = $invoice -> edit_invoices_select_data($invoiceNo);
                        $count = mysql_num_rows($res);

                        if($count>0)
                        {
                        while($row = mysql_fetch_array($res))
                        {
                            $pname = $invoice -> get_product_name($row['productId']);
                        ?>
                        <tr>
                            <td><?php echo $row['productId']; ?></td>
                            <td><?php echo $pname; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            
                            <td><a href="/?page=invoice/invoice_added_products_edit&id=<?php echo $row['IndexNo'] ?>"><button class="btn btn-primary btn-xs">Edit</button></a></td>
                            
                            <td><a href="/?page=invoice/invoice_added_products_delete&id=<?php echo $row['IndexNo'] ?>"><button class="btn btn-danger btn-xs">Delete</button></a></td>
                        </tr>

                        <?php
                        }
                        }
                        else
                        {
                            ?><tr><td colspan="5">No matching invoice found...</td></tr><?php
                        }
                        ?>

                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
          
          </section>  
          
          
          
          <?php
          }
          ?>
          
          
          
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
