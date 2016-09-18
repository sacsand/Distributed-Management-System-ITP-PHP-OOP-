<?php


class INVOICE extends Application
{



//Issue Invoice
    Public function Get_Sales_rep_teratory($username){
        $query = "select teretoryId from employee where username='$username'";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $ter = $query3['teretoryId'];
        return $ter;
    }

    public function roots_show($area)
    {
        return mysql_query("SELECT RouteName,RouteId FROM route WHERE TeretoryId='$area'");
    }

    public function sub_product_show($sub_catagory)
    {
        return mysql_query("SELECT * FROM product WHERE category='$sub_catagory'");
    }

    public function shops_show($root)
    {
        return mysql_query("SELECT * FROM shops WHERE routeId='$root'");
    }

    public function insert_sold_products($invoiceNo,$productId,$quantity,$freeIssue,$total,$totalProfit,$time)
    {
        
        
        mysql_query("insert into sold_product (InvoiceNo,productId,quantity,freeIssue,total,propit,TIMESTAM) values('$invoiceNo','$productId','$quantity','$freeIssue','$total','$totalProfit','$time')");
        return true;
    }


    public function insert_invoice_details($routeId,$teretoryId,$shopId,$repId,$cDate,$nDate,$time)
    {
        //DATE_FORMAT(CURDATE(),'%m/%d/%Y')
        mysql_query("insert into invoice(routeId,teretoryId,shopId,repId,cDate,nDate,TIMESTAM) values('$routeId','$teretoryId','$shopId','$repId','$cDate','$nDate','$time')");

        //return last inserted Invoice number...
        $id = mysql_insert_id();
        return $id;
    }

    public function get_teretory_id($routeId)
    {
        $query1 = mysql_query("SELECT TeretoryId FROM route WHERE RouteId='$routeId'");
        $query2 = mysql_fetch_array($query1);
        $teretoryId = $query2['TeretoryId'];
        return $teretoryId;
    }

    public function get_shop_id($shop)
    {
        $query1 = mysql_query("SELECT shopId FROM shops WHERE name='$shop'");
        $query2 = mysql_fetch_array($query1);
        $shopId = $query2['shopId'];
        return $shopId;
    }

    public function get_product_id($pname)
    {
        $query1 = mysql_query("SELECT productId FROM product WHERE name='$pname'");
        $query2 = mysql_fetch_array($query1);
        $productId = $query2['productId'];
        return $productId;
    }

    public function get_free_issue_value($productId,$quantity)
    {
        $query222 = mysql_query("select freeIssueRate from product where productId='$productId'");
        $query22 = mysql_fetch_array($query222);
        $rate = $query22['freeIssueRate'];
        $value = floor($quantity/$rate);
        return $value;
    }

    public function get_product_price($productId)
    {
        $query = mysql_query("SELECT unitPrice_ws FROM product WHERE productId='$productId'");
        $query2 = mysql_fetch_array($query);
        $rate = $query2['unitPrice_ws'];
        return $rate;
    }

    public function get_toal_price($rate,$quantity)
    {
        return ($rate*$quantity);
    }

    public function get_product_profit($total)
    {
        $profit = ($total*5.0)/100;
        return $profit;
    }


    //stock updates

    public function get_qty_in_hand($productId,$teretoryId)
    {
        $query = mysql_query("select quantity from stock where productId='$productId' AND teretory='$teretoryId'");
        $query2 = mysql_fetch_array($query);
        $qty = $query2['quantity'];
        return $qty;
    }

    public function update_qty_in_stock($productId,$qtyInHand,$quantity,$teretoryId)
    {
        $balance = $qtyInHand - $quantity;
        mysql_query("update stock set quantity = '$balance' where productId='$productId' AND teretory='$teretoryId'");
    }




//View Invoices

    public function view_invoices($date,$rep)
    {
        return mysql_query("select * from invoice WHERE cDate='$date' and repId='$rep'");
    }

    public function view_current_invoice($invoiceNo)
    {
        return mysql_query("select * from invoice where InvoiceNo='$invoiceNo'");
    }


    public function get_sold_product_details($invoiceNo)
    {
        return mysql_query("select * from sold_product where InvoiceNo='$invoiceNo'");
    }


    public function get_product_name($productId)
    {
        $query3 = mysql_query("SELECT name FROM product WHERE productId='$productId'");
        $query33 = mysql_fetch_array($query3);
        $name = $query33['name'];
        return $name;
    }

    public function get_total_bill($invoice_no)
    {
        return mysql_query("SELECT SUM(total) from sold_product where InvoiceNo='$invoice_no'");
    }

    public function get_shop_name($shopId)
    {
        $query = mysql_query("SELECT name FROM shops WHERE shopId='$shopId'");
        $query2 = mysql_fetch_array($query);
        $name = $query2['name'];
        return $name;
    }
    
    
    
    
    
    //Get invoice details calender search invoices
    
    
    public function get_invoice_details_between_days($date1,$date2,$terororyId)
    {
       $query  = "select * from invoice where cDate BETWEEN '$date1' AND '$date2' AND teretoryId='$terororyId' ";
       $query2 = mysql_query($query);
       return $query2;        
    }
    
    
    
    
    
    
    //Goal completions of today
    
    public function get_daily_sold_products($soldBy,$currentDate)
    {
       return mysql_query("SELECT DISTINCT s.productId FROM invoice i,sold_product s WHERE i.InvoiceNo = s.InvoiceNo AND i.repId='$soldBy' AND i.cDate='$currentDate' ");
    }

    public function get_days_plan_value($date,$rep,$productId)
    {
        $ans = mysql_query("select * from days_plan where date='$date' AND rep='$rep' AND productId='$productId' ");
        $query = mysql_fetch_array($ans);
        $res = $query['plan'];
        return $res;
    }
    
     public function get_daily_sells_count($soldBy,$currentDate,$productId)
    {
        $count = mysql_query("SELECT SUM(s.quantity) AS tot  FROM invoice i,sold_product s WHERE i.InvoiceNo = s.InvoiceNo AND i.repId='$soldBy' AND i.cDate='$currentDate' AND s.productId ='$productId'");
        //$count = mysql_query("SELECT SUM(quantity) AS tot FROM sales_items");
        $result = mysql_fetch_array($count);
        $ans = $result['tot'];
        return $ans;
    }

    public function get_product_name2($productId)
    {
        $query3 = mysql_query("SELECT name FROM product WHERE productId='$productId'");
        $query33 = mysql_fetch_array($query3);
        $name = $query33['name'];
        return $name;
    }


    
    
    
    //Invoices Editing
    
    public function edit_invoices_select_data($invoiceNo)
    {
        $query1 = "select * from sold_product where InvoiceNo='$invoiceNo'";
        $query2 = mysql_query($query1);
        return $query2;
    }
    
    
    public function get_added_product_details($indexNo)
    {
        $query1 = "select * from sold_product where IndexNo='$indexNo'";
        $query2 = mysql_query($query1);
        $query3 = mysql_fetch_array($query2);
        return $query3;
    }
    
    public function get_invoice_numm($indexNo)
    {
        $query1 = "select * from sold_product where IndexNo='$indexNo'";
        $query2 = mysql_query($query1);
        $row = mysql_fetch_array($query2);
        return $row;
    }
    
    
    
    public function get_invoice_details($invoiceNo)
    {
        $query1 = "select * from invoice where InvoiceNo='$invoiceNo'";
        $query2 = mysql_query($query1);
        $row = mysql_fetch_array($query2);
        return $row;
    }
    
    
    public function get_teretory_stock($tid,$pid)
    {
        $query1 = "select * from stock where teretory='$tid' AND productId='$pid'";
        $query2 = mysql_query($query1);
        $query3 = mysql_fetch_array($query2);
        $stock = $query3['quantity'];
        return $stock;
    }















    //Admin_view invoicesss

    public function Get_Areas()
    {

        $query = "select * from area ";
        $query2 = mysql_query($query);

        return $query2;
    }

    public function Get_Teretories($AreaId)
    {

        $query = "select TeretoryId,TeretoryName from teretory where AreaId='$AreaId'";
        $query2 = mysql_query($query);

        return $query2;
    }

    public function  get_invoice_details_of_terotory($teretoryId)
    {
        $query  = "select * from invoice where teretoryId='$teretoryId' ";
        $query2 = mysql_query($query);
        return $query2;
    }


    public function get_invoice_details_between_days_all($date1,$date2)
    {
        $query  = "select * from invoice where cDate BETWEEN '$date1' AND '$date2'";
        $query2 = mysql_query($query);
        return $query2;
    }

}

?>

