<?php
/**
 * Created by PhpStorm.
 * User: sachintha
 * Date: 7/25/15
 * Time: 10:21 PM
 */
$StockObj = new STOCK();

//update stock sort
    if(isset($_POST['UpdateStock']))
    {
        $IndexNo= $_GET['IndexNo'];
        $GoodRecived = $_POST['GoodRecived'];
        $Teretory=$_POST['teretory'];
        $product_Id=$_POST['product_id'];
        echo $IndexNo;
        echo $product_Id;
        echo $Teretory;



        $StockObj->Update_Stock($IndexNo,$GoodRecived,$Teretory,$product_Id);

       header("Location:/?page=stock/Sales_rep_add_daily_stock&teretory_id=".$Teretory);

        unset($_POST["UpdateStock"]);
    }

//remove from stock

if(isset($_POST['RemoveStock']))
{
    $IndexNo= $_GET['IndexNo'];
    $GoodRecived = $_POST['GoodRecived'];
    $Teretory=$_POST['teretory'];
    $product_Id=$_POST['product_id'];




    $StockObj->Remove_Stock($IndexNo,$GoodRecived,$Teretory,$product_Id);


        header("Location:/?page=stock/Sales_rep_add_daily_stock&teretory_id=".$Teretory);


}

?>