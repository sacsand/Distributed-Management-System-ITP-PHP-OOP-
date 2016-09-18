<?php

//include_once 'dbconfig.php';
error_reporting(E_ALL^E_DEPRECATED);
class SHOPS extends Application
{

//SHOP Handling Bhanuka<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    // function for read shops ------------------------------------------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<

    public function main()
    {
        return mysql_query("SELECT * FROM shops");
    }


    public function read($RouteId)
    {
        return mysql_query("SELECT * FROM shops WHERE routeId='$RouteId' ");
    }

    public function shophistory($shopId)
    {

        return mysql_query("SELECT * FROM shops WHERE shopId='$shopId' ");
    }


    public function history($shopId)
    {
                $month = date("m");
                $year = date("y");

                return mysql_query("SELECT p.name, SUM( s.quantity ) AS sales, SUM( s.freeIssue ) AS freeIssues, SUM( s.total ) AS Total
                FROM invoice i, sold_product s, product p
                WHERE s.invoiceNo = i.invoiceNo
                AND s.productId = p.productId
                AND i.shopId =  '$shopId'
                AND cDate LIKE  '08%2015'
                GROUP BY p.name");
        
    }


    public function update($indexNo,$shopId,$routeId,$name,$address,$phone)
    {
     
        mysql_query("UPDATE shops SET shopId='$shopId',routeId='$routeId', name='$name', address='$address', phone='$phone' WHERE indexNo='$indexNo' ");
    }


    public function create($routeId,$name,$address,$phone)
    {
        $today = date("Y/m/d");
        $res=mysql_query("SELECT max(indexNo)+1 as Count from shops");
        $row=mysql_fetch_array($res);

        $COUNT=$row['Count'];
        $shopId="SP".$COUNT;

        mysql_query("INSERT INTO shops(shopId,routeId,name,address,phone,theDate) VALUES('$shopId','$routeId','$name','$address','$phone','$today')");

    }

    public function delete_shop($id)
    {

        #mysql_query("DELETE FROM shops WHERE auto=" . $id);
        mysql_query("DELETE FROM shops WHERE indexNo='$id'");
    }



    public function count_shops()
    {

        $sql = mysql_query("SELECT auto FROM shops ");
        $count = mysql_num_rows($sql);

        return $count;

    }

    public function percentage($no1,$no2){

        echo $perc=$no1/$no2*100;
    }

    public function get_area()
    {
        return mysql_query("SELECT AreaName, AreaId  FROM area");
    }

    public function get_territory($AreaId)
    {
        return mysql_query("SELECT TeretoryName, TeretoryId FROM teretory WHERE AreaId='$AreaId'");
    }

    public function get_route($TeretoryId)
    {
        return mysql_query("SELECT RouteName, RouteId FROM route WHERE TeretoryId='$TeretoryId' ");
    }

    public function search()
    {
        return myql_query("SELECT * from table_name where e_name LIKE '%dfsd%'");    
    }




    public function get_shop_id_count($shopId)
    {
          $query1 = "select * from shops where shopId='$shopId'";
          $query2 = mysql_query($query1);
          return $query2;  
    }

    public function get_route_name($productId,$Teratory)
    {
        $month = date("m");

        $year = date("y");
        $today = date("m/d/Y");
        $query = "select quantity from stock where productId='$productId' and  teretory='$Teratory'  ";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $quant = $query3['quantity'];
        return $quant;
    }

    public function ChartShopSales($shopId)
    {
        $month = date("m");
        $year = date("y");


        $query = mysql_query("SELECT p.name, i.cDate, SUM( s.quantity ) AS sums, SUM( s.total ) AS total
                                FROM invoice i, sold_product s, product p
                                WHERE i.shopId =  '$shopId'
                                AND s.invoiceNo = i.invoiceNo
                                AND s.productId = p.productId
                                AND i.cDate LIKE  '%$year'
                                GROUP BY s.productId
                                ORDER BY s.productId");
        return $query;
    }




}
?>
