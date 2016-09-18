<?php
    $id = Url::getParam('edt_id');
    $indexNo = Url::getParam('id');

    $invoice = new INVOICE();

    $details = $invoice -> get_added_product_details($indexNo);


    



        
        //get invoice No
        $r = $invoice -> get_invoice_numm($indexNo);
        
        $productId = $r['productId'];    
        $invoiceNo = $r['InvoiceNo']; 
        $current_quantity = $r['quantity']; 
        $current_freeissue = $r['freeIssue'];

        //get teretory id
        $row2 = $invoice -> get_invoice_details($invoiceNo);
        $teretoryId = $row2['teretoryId'];

        
        //get stock of cuttrent teroroty
        $current_stock = $invoice ->  get_teretory_stock($teretoryId,$productId);
       
        
    

        //add stock to current_quantity
        $nnn = $current_stock + $current_quantity + $current_freeissue;



        mysql_query("update stock set quantity = $nnn where teretory='$teretoryId' AND productId='$productId'");
            

        //update sold_product table
        mysql_query("DELETE from sold_product where IndexNo='$indexNo'");
            
            
        $a = 3;
        header("Location:/?page=invoice/invoice_edit&message=".$a."");
        




?>
