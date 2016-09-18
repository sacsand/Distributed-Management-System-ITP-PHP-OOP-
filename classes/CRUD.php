<?php
//include_once 'dbconfig.php';

class CRUD extends Application
{


    private $_table1 = 'invoice';
    private $_table2 = 'product';
    private $_table3 = 'productcategory';
    private $_table4 = 'sales_items';











    //new functions from sachintha 2015/06/29 before company visit








    public function get_daily_product_sale($rep)
    {
        return mysql_query("SELECT  productId,productName,SUM( s.quantity ) AS tot
        FROM invoice i, sales_items s
        WHERE s.invoiceNo = i.invoiceNo
        AND i.soldBy =  '$rep'
        AND i.currentDate = DATE_FORMAT(CURDATE(), '%m/%d/%Y')
        GROUP BY productId
        ORDER BY tot DESC
        LIMIT 0 , 4");
    }

    //get days plan for specific product
    public function get_daily_days_plan($productId,$rep)
    {
        $plan = mysql_query("SELECT plan
        FROM days_plan
        WHERE rep =  '$rep'c zz  RETURNED_SQLSTATE   QArr
        AND DATE =  DATE_FORMAT(CURDATE(), '%m/%d/%Y')
        AND productId =  '$productId'
        ");

        $result = mysql_fetch_array($plan);
        $ans = $result['plan'];
        return $ans;

    }

    //brought forward (B/F)-sacand
    public function get_bf_sales_for_productAll($soldBy, $beforeDate, $yesterdayDate)
    {
        return mysql_query("SELECT p.name,s.productId, SUM(s.quantity) AS tot,SUM(s.quantity*p.unitPrice_ws) AS cost ,SUM(s.quantity*unitPrice_ws-s.quantity*p.unitPrice_tf) AS propit, SUM(s.freeissue) AS freeis
        FROM invoice i,sales_items s,product p
        WHERE s.invoiceNo=i.invoiceNo AND i.soldBy='$soldBy' AND s.productId=p.productId AND i.currentDate BETWEEN '$beforeDate' AND '$yesterdayDate'
        GROUP BY s.productId
        ORDER BY tot DESC");
    }



    public function get_daily_product_saleAll($rep,$today)
    {
        return mysql_query("SELECT  productId,SUM( s.quantity ) AS tot
FROM invoice i, sales_items s
WHERE s.invoiceNo = i.invoiceNo
AND i.soldBy =  '$rep'
AND i.currentDate =  '$today'
GROUP BY productId
ORDER BY tot DESC
");
    }


    public function calculat_precentage($tots, $daysPlan)
    {


        $t = $tots / $daysPlan * 100;
        echo $t;


    }


    public function get_current_stock($real_sub,$rep)
    {
        $query = mysql_query("select qtyInHand from stock where repId='$rep' AND productId='$real_sub'");
        $array = mysql_fetch_array($query);
        $c = $array['qtyInHand'];
        return $c;
    }


    public function update_stock($real_sub,$product_name,$stock,$rep)
    {
        mysql_query("UPDATE stock SET qtyInHand='$stock' WHERE productId='$real_sub' AND repId='$rep' ");

    }


    public function update_date($real_sub,$rep)
    {
        mysql_query("UPDATE stock SET lastUpdatedDate=DATE_FORMAT(CURDATE(), '%m/%d/%Y') WHERE productId='$real_sub' AND repId='$rep' ");

    }






























    // function for read
    public function read()
    {
        return mysql_query("SELECT * FROM product ORDER BY auto ASC");
    }



    public function update($productId, $name, $weight, $caseMakeup, $unitPrice_ws, $casePrice_ws, $unitPrice_tf, $casePrice_tf, $priceConsumer, $category, $id,$freeIssue)
    {
        mysql_query("UPDATE product SET productId='$productId', name='$name', weight='$weight',caseMakeup='$caseMakeup',unitPrice_ws='$unitPrice_ws',casePrice_ws='$casePrice_ws',unitPrice_tf=$unitPrice_tf,casePrice_tf='$casePrice_tf',priceConsumer='$priceConsumer',category='$category' , freeIssueRate='$freeIssue' WHERE auto=" . $id);
    }


    public function create1($productId, $name, $weight, $caseMakeup, $unitPrice_ws, $casePrice_ws, $unitPrice_tf, $casePrice_tf, $priceConsumer, $category,$freeIssue)
    {


            mysql_query("INSERT INTO product(productId,name,weight,caseMakeup,unitPrice_ws,casePrice_ws,unitPrice_tf,casePrice_tf,priceConsumer,category,freeIssueRate) VALUES('$productId','$name','$weight','$caseMakeup','$unitPrice_ws','$casePrice_ws','$unitPrice_tf','$casePrice_tf','$priceConsumer','$category','$freeIssue'");

    }

    public function delete($id)
    {
        mysql_query("DELETE FROM product WHERE auto=" . $id);
    }



















    public function count_products()
    {

        $sql = mysql_query("SELECT auto FROM product ");
        $count = mysql_num_rows($sql);

        return $count;

    }

    public function percentage($no1,$no2){

        echo $perc=$no1/$no2*100;
    }


//adding stock-------------------------------------------------------------------///////

    public function add_stock($productId, $productName,$qtyInHand,$repid)
    {
        $sql = mysql_query("SELECT * FROM stock WHERE repid='sajith' AND productid='$productId'");
        $count = mysql_num_rows($sql);

        if ($count > 0) {
            return 1;
        } else {
            mysql_query("INSERT INTO stock(productId,productName,qtyInHand,repid) VALUES('$productId','$productName','$qtyInHand','$repid')");
            return 2;
        }

    }


    public function get_last_stock()
    {

        return mysql_query("SELECT * FROM stock WHERE repid='sajith' ORDER BY productId ");


    }

    public function update_stockk($id, $plan)
    {

        mysql_query("UPDATE stock SET qtyInHand='$plan' WHERE indexNo='$id' ");
    }

    public function  delete_stock($id)
    {

        mysql_query("DELETE FROM stock WHERE indexNo='$id'");

    }

    public function count_added_stock()
    {

        $sql = mysql_query("SELECT indexNo FROM stock WHERE  repid='sajith'  ");
        $count = mysql_num_rows($sql);

        return $count;

    }


    public function get_catergory()
    {

        return mysql_query("SELECT * FROM productcategory  ");

    }


























}
?>
