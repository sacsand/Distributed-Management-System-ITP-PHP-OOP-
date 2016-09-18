<?php
    $invoice = new INVOICE();



    $nameArr = json_decode($_POST["names"]);
    $qtyArr = json_decode($_POST["quantitys"]);

    $shop = $_POST["shop"];



    $routeId = $_POST["route"];
    $teretoryId = $invoice -> get_teretory_id($routeId);
    $shopId = $invoice -> get_shop_id($shop);
    $repId = $_POST["rep"];
    $cDate = date("m/d/Y");
    $nDate = "not set";
    $time = "not set";
    

    $notEnoughProductsArray = array();
    $notEnoughGoods="no";
    $sendArray = array();
    $message = 100;


    for ($i = 0; $i < count($nameArr); $i++){

        $productId = $invoice -> get_product_id($nameArr[$i]);
        $quantity = $qtyArr[$i];
        $freeIssue = $invoice -> get_free_issue_value($productId,$quantity);
        $qtyInHand = $invoice -> get_qty_in_hand($productId,$teretoryId);
        $new_quantity = $quantity + $freeIssue;

        if($new_quantity > $qtyInHand)
        {
            $notEnoughGoods="yes";

            array_push( $notEnoughProductsArray,$nameArr[$i] );
            $message = 3;
            
            $mes="Your stock does not have enough products in ";

        }



    }




    if($notEnoughGoods == "no")
    {
            

        
            for($j = 0; $j<count($qtyArr); $j++)
            {
                if(( $qtyArr[$j] > 0 )){
                    $qty_ok=1;
                }
                else
                {
                    $qty_ok=0;
                }
                    
            }
        
        
        
        
            if($qty_ok == 1)
            {
                $invoiceNo = $invoice -> insert_invoice_details($routeId,$teretoryId,$shopId,$repId,$cDate,$nDate,$time);
                
                for ($i = 0; $i < count($nameArr); $i++) {

                if(($nameArr[$i] != ""  )){

                    //for insert sold product details
                    $productId = $invoice -> get_product_id($nameArr[$i]);
                    $quantity = $qtyArr[$i];
                    $freeIssue = $invoice -> get_free_issue_value($productId,$quantity);
                    $rate = $invoice -> get_product_price($productId);
                    $total = $invoice -> get_toal_price($rate,$quantity);
                    $totalProfit = $invoice -> get_product_profit($total);

                    $invoice -> insert_sold_products($invoiceNo,$productId,$quantity,$freeIssue,$total,$totalProfit,$time);


                    //for stock updates
                    $qtyInHand = $invoice -> get_qty_in_hand($productId,$teretoryId);
                    $new_quantity = $quantity + $freeIssue;

                    $invoice -> update_qty_in_stock($productId,$qtyInHand,$new_quantity,$teretoryId);

                }
                
                

            }
            
                $message=1;
            }
            else if ($qty_ok == 0)
            {
                $message=2;
            }
        

    }


    if( $message == 1  )
    {
        array_push( $sendArray,$message );
        array_push( $sendArray,$invoiceNo );
        
        print json_encode($sendArray);
    }
    else if ( $message == 2 )
    {
        array_push( $sendArray,$message );
        array_push( $sendArray,$invoiceNo );
        
        print json_encode($sendArray);
    }
    else if ( $message == 3 )
    {
    
        array_push( $sendArray,$mes);

        for( $k=0;$k<count($notEnoughProductsArray);$k++ )
        {
            array_push( $sendArray,$notEnoughProductsArray[$k]  );
        }

        print json_encode($sendArray);
    
    
    }





?>