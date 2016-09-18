<?php

    $invoice = new INVOICE();


    if(isset($_POST['save_edited_sells_items']))
    {
        $new_quantity = $_POST['quantity'];
        $indexNo  = $_POST['indexNo'];
        $productId = $_POST['pid'];
        
        //get invoice No
        $r = $invoice -> get_invoice_numm($indexNo);
        
        $invoiceNo = $r['InvoiceNo']; 
        $current_quantity = $r['quantity']; 
        
        
        //get teretory id
        $row2 = $invoice -> get_invoice_details($invoiceNo);
        $teretoryId = $row2['teretoryId'];

        
        //get stock of cuttrent teroroty
        $current_stock = $invoice ->  get_teretory_stock($teretoryId,$productId);
       
        
        
        if( $new_quantity < $current_stock )
        {
            
            //add stock to current_quantity
            $nnn = $current_stock + $current_quantity;
            mysql_query("update stock set quantity = $nnn where teretory='$teretoryId' AND productId='$productId'");
            
            //update sold_product table
            mysql_query("update sold_product set quantity = $new_quantity where IndexNo='$indexNo'");
            
            
            //get current stock againnnn
            $current_stock_now = $invoice ->  get_teretory_stock($teretoryId,$productId);
            
            
            
            //update stock again
            $n = $current_stock_now - $new_quantity; 
            mysql_query("update stock set quantity = $n where teretory='$teretoryId' AND productId='$productId'");
            
         
            /*
             ********************************************************************************            
             ********************************************************************************
             ***********...Free iddues update wena eka meka thama hadala neee..... **********
             ********************************************************************************
             ********************************************************************************
            */
            
            
            
            //get product rate
            $rate = $invoice -> get_product_price($productId);
            
            $subTotal = $rate * $new_quantity;
            
            //update sub total filed of sold product table
            mysql_query("update sold_product set total = $subTotal where IndexNo='$indexNo'");
            
            //get profit
            $totalProfit = $invoice -> get_product_profit($subTotal);
            
            //update profit
            mysql_query("update sold_product set propit = $totalProfit where IndexNo='$indexNo'");
            
                        
            $a = 1;
            header("Location:/?page=invoice/invoice_edit&message=".$a."");
        }
        else
        {
            $b = 0;
            header("Location:/?page=invoice/invoice_edit&message=".$b."");
        }
        
        
    }
                      

?>