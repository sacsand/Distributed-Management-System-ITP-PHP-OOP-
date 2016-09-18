<?php
/**
 * Created by PhpStorm.
 * User: sachintha
 * Date: 7/28/15
 * Time: 7:11 PM
 */

class DAYSPLAN extends Application
{


    public function GetRootByTeretory($teretoryId)
    {
        return mysql_query("select * from route Where TeretoryId='$teretoryId'");
    }


    public function CountRoot($teretoryId)
    {
        $month = date("m");
        $year = date("y");
        $query = "SELECT count(RouteId) as RouteCount from route WHERE TeretoryId='$teretoryId' ";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $ter = $query3['RouteCount'];
        return $ter;

    }

    public function CountDaysPlanRows($productid,$teretoryId)
    {
        $month = date("m");
        $year = date("y");
        $query = "SELECT count(IndexNo) as DaysPlanCount from days_plan WHERE productId='$productid' AND opening_date Like '$month%$year' AND routeId LIKE  '%$teretoryId'";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $ter = $query3['DaysPlanCount'];
        return $ter;

    }

    public function GetQuantityByRoot($productId, $teretoryId)

    {
        $month = date("m");
        $year = date("y");


        return mysql_query("SELECT  r.RouteName, SUM( s.quantity ) AS sum
                            FROM sold_product s, invoice i,route r
                            WHERE i.teretoryId =  '$teretoryId'
                            AND r.Routeid = i.routeId
                            AND s.InvoiceNo = i.InvoiceNo
                            AND s.productId =  '$productId'
                            AND cDate LIKE  '$month%$year'
                            GROUP BY r.RouteName
                            ");
    }

    Public function Get_Sales_rep_teratory($username)
    {
        $query = "select teretoryId from employee where username='$username'";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $ter = $query3['teretoryId'];
        return $ter;
    }

    public function GetProudutDetails()
    {
        return mysql_query("select * from product");
    }

    public function Insert_DayasPlan($productId, $daysPlan, $RouteId)
    {


        $today = date("m/d/Y");

        mysql_query("insert into days_plan(productId,daysPlan,routeId,opening_date) Values('$productId',$daysPlan,'$RouteId','$today')");

    }

    public function Update_DayasPlan($productId, $daysPlan, $routeId)
    {

        $today = date("m/d/Y");
        $month = date("m");
        $year = date("y");

        mysql_query("UPDATE days_plan SET TIMESTAM=DATE_FORMAT(CURDATE(), '%m/%d/%Y'),daysPlan=$daysPlan WHERE productId='$productId' AND routeId='$routeId' AND opening_date Like '$month%$year' ");

    }


    public function GetThisMonthDaysPlan($productid, $teretoryId)
    {
        $month = date("m");
        $year = date("y");
        return mysql_query("SELECT r.RouteName, d.daysPlan
                            FROM route r, days_plan d
                            WHERE r.RouteId = d.routeId
                            AND d.productId =  '$productid'
                            AND d.opening_date LIKE  '$month%$year'
                            AND d.routeId LIKE  '%$teretoryId'
                            ");


    }

    public function CalculatePrecentage($daysPlan, $target)
    {

        $perc = ($daysPlan / $target) * 100;
        return $perc;

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


}

?>