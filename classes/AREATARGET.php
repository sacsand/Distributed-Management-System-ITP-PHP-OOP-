<?php
/**
 * Created by PhpStorm.
 * User: sachintha
 * Date: 7/28/15
 * Time: 7:11 PM
 */

class AREATARGET extends Application
{


    public function GetRootByTeretory()
    {
        return mysql_query("select * from area ");
    }


    public function CountRoot()
    {
        $month = date("m");
        $year = date("y");
        $query = "SELECT count(AreaId) as AreaCount from area ";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $ter = $query3['AreaCount'];
        return $ter;

    }

    public function CountDaysPlanRows($productid)
    {
        $month = date("m");
        $year = date("y");
        $query = "SELECT count(IndexNo) as TargetCount from area_target  WHERE ProductId='$productid' AND OpeningDate Like '$month%$year'  ";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $ter = $query3['TargetCount'];
        return $ter;

    }

    public function GetQuantityByRoot($productId, $AreaId)

    {
        $month = date("m");
        $year = date("y");


        return mysql_query("SELECT a.AreaName, SUM( s.quantity ) AS sum
                            FROM sold_product s, invoice i, teretory t, area a
                            WHERE i.teretoryId = t.TeretoryId
                            AND s.InvoiceNo = i.InvoiceNo
                            AND s.productId =  '$productId'
                            AND cDate LIKE  '$month%$year'
                            ");
    }

    Public function Get_Sales_rep_teratory($username)
    {
        $query = "select AreaId from employee where username='$username'";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $ter = $query3['teretoryId'];
        return $ter;
    }

    public function GetProudutDetails()
    {
        return mysql_query("select * from product");
    }

    public function Insert_DayasPlan($productId, $daysPlan, $TId)
    {


        $today = date("m/d/Y");

        mysql_query("insert into area_target(ProductId,Target,AreaId,OpeningDate) Values('$productId',$daysPlan,'$TId','$today')");

    }

    public function Update_DayasPlan($productId, $daysPlan, $routeId)
    {

        $today = date("m/d/Y");
        $month = date("m");
        $year = date("y");

        mysql_query("UPDATE area_target SET TimeStamp=DATE_FORMAT(CURDATE(), '%m/%d/%Y'),Target=$daysPlan WHERE ProductId='$productId' AND AreaId='$routeId' AND OpeningDate Like '$month%$year' ");


    }


    public function GetThisMonthDaysPlan($productid)
    {
        $month = date("m");
        $year = date("y");
        return mysql_query("SELECT a.AreaName, d.Target
                            FROM area a, area_target d
                            WHERE a.AreaId = d.AreaId
                            AND d.ProductId =  '$productid'
                            AND d.OpeningDate LIKE  '$month%$year'
                                       ");


    }

    public function CalculatePrecentage($daysPlan, $target)
    {

        $perc = ($daysPlan / $target) * 100;
        return $perc;

    }


    public function GetTarget($AreaId, $productid)
    {
        $month = date("m");
        $year = date("y");


        $query = "select Target from area_target WHERE  AreaId='$AreaId' and ProductId='$productid' and OpeningDate Like '$month%$year'";

        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $target = $query3['Target'];
        return $target;
    }


}

?>