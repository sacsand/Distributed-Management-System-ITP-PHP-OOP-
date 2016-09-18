<?php
/**
 * Created by PhpStorm.
 * User: sachintha
 * Date: 8/1/15
 * Time: 11:05 PM
 */
class OVEROLL extends Application
{



   function brought_fw_sale($teretoryId)
   {
       $month = date("m");
       $year = date("y");

       $today = date("m/d/Y");
       $yesterday = date('m/d/Y',strtotime("-1 days"));

       $first_date_of_this_month = date('m/01/Y');

     return mysql_query("SELECT p.productId, p.name, SUM( s.quantity ) AS sales, SUM( s.total ) AS total, SUM( s.propit ) AS propit, SUM( s.freeissue ) AS freeissue
                            FROM invoice i, sold_product s, product p
                            WHERE s.invoiceNo = i.invoiceNo
                            AND i.teretoryId =  '$teretoryId'
                            AND s.productId = p.productId
                            AND i.cDate
                            BETWEEN  '$first_date_of_this_month'
                            AND  '$today'
                            AND cDate LIKE  '$month%$year'
                            GROUP BY s.productId
                            ORDER BY s.productId
                               ");

    }

    function total_profit($teretoryId)
    {
        $month = date("m");
        $year = date("y");

        $today = date("m/d/Y");
        $yesterday = date('m/d/Y',strtotime("-1 days"));

        $first_date_of_this_month = date('m/01/Y');


        $query="SELECT SUM( s.propit ) AS propit
                            FROM invoice i, sold_product s
                            WHERE s.invoiceNo = i.invoiceNo
                            AND i.teretoryId =  '$teretoryId'
                            AND i.cDate
                            BETWEEN  '$first_date_of_this_month'
                            AND  '$today'
                            AND cDate LIKE  '$month%$year'
                            " ;

         $query2 = mysql_query($query);
         $query3 = mysql_fetch_array($query2);
         $profit = $query3['propit'];
         return $profit;

    }

    function total_total_value($teretoryId)
    {
        $month = date("m");
        $year = date("y");

        $today = date("m/d/Y");
        $yesterday = date('m/d/Y',strtotime("-1 days"));

        $first_date_of_this_month = date('m/01/Y');


        $query="SELECT SUM( s.total ) AS total
                FROM invoice i, sold_product s
                WHERE s.invoiceNo = i.invoiceNo
                AND i.teretoryId =  '$teretoryId'
                AND i.cDate
                BETWEEN  '$first_date_of_this_month'
                AND  '$today'
                AND cDate LIKE  '$month%$year'";

        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $total = $query3['total'];
        return $total;

    }

    function total_sales($teretoryId)
    {
        $month = date("m");
        $year = date("y");

        $today = date("m/d/Y");
        $yesterday = date('m/d/Y',strtotime("-1 days"));

        $first_date_of_this_month = date('m/01/Y');


        $query="SELECT  SUM( s.quantity ) AS sales
                            FROM invoice i, sold_product s
                            WHERE s.invoiceNo = i.invoiceNo
                            AND i.teretoryId =  '$teretoryId'
                            AND i.cDate
                            BETWEEN  '$first_date_of_this_month'
                            AND  '$today'
                            AND cDate LIKE  '$month%$year'
                            " ;

        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $sales = $query3['sales'];
        return $sales;

    }

    function total_freeissue($teretoryId)
    {
        $month = date("m");
        $year = date("y");

        $today = date("m/d/Y");
        $yesterday = date('m/d/Y',strtotime("-1 days"));

        $first_date_of_this_month = date('m/01/Y');


        $query="SELECT SUM( s.freeissue ) AS freeissue
                            FROM invoice i, sold_product s
                            WHERE s.invoiceNo = i.invoiceNo
                            AND i.teretoryId =  '$teretoryId'
                            AND i.cDate
                            BETWEEN  '$first_date_of_this_month'
                            AND  '$today'
                            AND cDate LIKE  '$month%$year'
                            " ;

        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $free = $query3['freeissue'];
        return $free;

    }


    //find the target completion fot the month
    function sales_by_produt($teretoryId)
    {
        $month = date("m");
        $year = date("y");

        $today = date("m/d/Y");
        $yesterday = date('m/d/Y',strtotime("-1 days"));

        $first_date_of_this_month = date('m/01/Y');


        return mysql_query("SELECT p.productId, p.name, SUM( s.quantity ) AS sales, SUM( s.total ) AS total, SUM( s.propit ) AS propit, SUM( s.freeissue ) AS freeissue
                            FROM invoice i, sold_product s, product p
                            WHERE s.invoiceNo = i.invoiceNo
                            AND i.teretoryId =  '$teretoryId'
                            AND s.productId = p.productId
                            AND i.cDate
                            BETWEEN  '$first_date_of_this_month'
                            AND  '$today'
                            AND cDate LIKE  '$month%$year'
                            GROUP BY s.productId
                            ORDER BY s.productId");



    }

    public function GetTarget($teretoryid, $productid)
    {
        $month = date("m");
        $year = date("y");


        $query = "select Target from territory_target WHERE  TerritoryId='$teretoryid' and ProductId='$productid' and OpeningDate Like '$month%$year'";

        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $target = $query3['Target'];
        return $target;
    }

    public function CalculatePrecentage($sales, $target)
    {

        $perc = ($sales / $target) * 100;
        $round=round($perc,1);
        return $round;

    }


    //stock level

    function stock_level($teretoryId)
    {
        $month = date("m");
        $year = date("y");

        $today = date("m/d/Y");
        $yesterday = date('m/d/Y',strtotime("-1 days"));

        $first_date_of_this_month = date('m/01/Y');


        return mysql_query("SELECT p.productId, p.name, s.quantity, s.max_stock
                            FROM stock s, product p
                            WHERE s.teretory =  '$teretoryId'
                            AND s.productId = p.productId

                            GROUP BY s.productId
                            ORDER BY s.productId
                            ");




    }
        //pie chart for dashbord -- sales by route
    function sales_by_route($teretoryId)
    {
        $month = date("m");
        $year = date("y");

        $today = date("m/d/Y");
        $yesterday = date('m/d/Y',strtotime("-1 days"));

        $first_date_of_this_month = date('m/01/Y');


        return mysql_query("SELECT r.RouteName, SUM( s.quantity ) AS sales
                            FROM invoice i, sold_product s, route r
                            WHERE s.invoiceNo = i.invoiceNo
                            AND i.teretoryId =  '$teretoryId'
                            AND i.cDate LIKE  '$month%$year'
                            AND i.routeId = r.RouteId
                            GROUP BY r.RouteName
                            ORDER BY r.RouteName
                             ");



    }


    //DSR Daily

    public function GetProudutDetails()
    {
        return mysql_query("select * from product");
    }

    function total_freeissue_daily($teretoryId,$productid)
    {
        $month = date("m");
        $year = date("y");

        $today = date("m/d/Y");
        $yesterday = date('m/d/Y',strtotime("-1 days"));

        $first_date_of_this_month = date('m/01/Y');


        $query="SELECT SUM( s.freeissue ) AS freeissue
                            FROM invoice i, sold_product s
                            WHERE s.invoiceNo = i.invoiceNo
                            AND i.teretoryId =  '$teretoryId'
                            AND i.cDate ='$today'
                            AND s.productId = '$productid'
                                                        " ;

        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $free = $query3['freeissue'];
        return $free;

    }

    function total_sales_daily($teretoryId,$productid)
    {
        $month = date("m");
        $year = date("y");

        $today = date("m/d/Y");
        $yesterday = date('m/d/Y',strtotime("-1 days"));

        $first_date_of_this_month = date('m/01/Y');


        $query="SELECT  SUM( s.quantity ) AS sales
                            FROM invoice i, sold_product s
                            WHERE s.invoiceNo = i.invoiceNo
                            AND i.teretoryId =  '$teretoryId'
                            AND i.cDate ='$today'
                            AND s.productId = '$productid'
                            " ;


        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $sales = $query3['sales'];
        return $sales;

    }

    function stock_level_daily($teretoryId)
    {
        $month = date("m");
        $year = date("y");

        $today = date("m/d/Y");
        $yesterday = date('m/d/Y',strtotime("-1 days"));

        $first_date_of_this_month = date('m/01/Y');


        return mysql_query("SELECT p.productId, p.name, s.quantity, s.max_stock
                            FROM stock s, product p
                            WHERE s.teretory =  '$teretoryId'
                            AND s.productId = p.productId

                            GROUP BY s.productId
                            ORDER BY s.productId
                           ");



    }

    public function Get_Current_stock($productId,$Teratory)
    {
        $month = date("m");

        $year = date("y");
        $today = date("m/d/Y");
        $query = "select quantity from stock where productId='$productId' and  teretory='$Teratory'";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $quant = $query3['quantity'];
        return $quant;
    }


    public function Get_sales_rep_name($Teretory){

        $query = "select name from employee where teretoryId='$Teretory'";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $quant = $query3['name'];
        return $quant;
    }

    public function Get_sales_rep(){

        return mysql_query("SELECT * FROM employee   ");
    }



   //DSR -Daily Sales Reports -- one day sales method


    function dsr_total_sales($teretoryId)
    {
        $month = date("m");
        $year = date("y");

        $today = date("m/d/Y");
        $yesterday = date('m/d/Y',strtotime("-1 days"));

        $first_date_of_this_month = date('m/01/Y');


        $query="SELECT  SUM( s.quantity ) AS sales
                            FROM invoice i, sold_product s
                            WHERE s.invoiceNo = i.invoiceNo
                            AND i.teretoryId =  '$teretoryId'
                            AND i.cDate ='$today'

                            " ;


        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $sales = $query3['sales'];
        return $sales;

    }

    function dsr_total_freeissue($teretoryId)
    {
        $month = date("m");
        $year = date("y");

        $today = date("m/d/Y");
        $yesterday = date('m/d/Y',strtotime("-1 days"));

        $first_date_of_this_month = date('m/01/Y');


        $query="SELECT SUM( s.freeissue ) AS freeissue
                            FROM invoice i, sold_product s
                            WHERE s.invoiceNo = i.invoiceNo
                            AND i.teretoryId =  '$teretoryId'
                            AND i.cDate ='$today'

                                                        " ;

        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $free = $query3['freeissue'];
        return $free;

    }

    function dsr_total_total_value($teretoryId)
    {
        $month = date("m");
        $year = date("y");

        $today = date("m/d/Y");
        $yesterday = date('m/d/Y',strtotime("-1 days"));

        $first_date_of_this_month = date('m/01/Y');


        $query="SELECT SUM( s.total ) AS total
                FROM invoice i, sold_product s
                WHERE s.invoiceNo = i.invoiceNo
                AND i.teretoryId =  '$teretoryId'
                AND i.cDate ='$today';
               ";

        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $total = $query3['total'];
        return $total;

    }

    function dsr_total_profit($teretoryId)
    {
        $month = date("m");
        $year = date("y");

        $today = date("m/d/Y");
        $yesterday = date('m/d/Y',strtotime("-1 days"));

        $first_date_of_this_month = date('m/01/Y');


        $query="SELECT SUM( s.propit ) AS propit
                            FROM invoice i, sold_product s
                            WHERE s.invoiceNo = i.invoiceNo
                            AND i.teretoryId =  '$teretoryId'
                            AND i.cDate ='$today'
                            " ;

        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $profit = $query3['propit'];
        return $profit;

    }




}

