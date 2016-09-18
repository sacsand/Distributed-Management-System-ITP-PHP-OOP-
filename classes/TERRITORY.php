<?php
/**
 * Created by PhpStorm.
 * User: sachintha
 * Date: 7/28/15
 * Time: 7:11 PM
 */

class TERRITORY extends Application
{


    public function GetRootByTeretory($AreaId)
    {
        return mysql_query("select * from teretory Where AreaId='$AreaId'");
    }


    public function CountRoot($AreaId)
    {
        $month = date("m");
        $year = date("y");
        $query = "SELECT count(TeretoryId) as TeretoryCount from teretory WHERE AreaId='$AreaId' ";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $ter = $query3['TeretoryCount'];
        return $ter;

    }

    public function CountDaysPlanRows($productid,$teretoryId)
    {
        $month = date("m");
        $year = date("y");
        $query = "SELECT count(IndexNo) as TargetCount from territory_target  WHERE productId='$productid' AND OpeningDate Like '$month%$year' AND TerritoryId LIKE  '%$teretoryId'";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $ter = $query3['TargetCount'];
        return $ter;

    }

    public function GetQuantityByRoot($productId, $AreaId)

    {
        $month = date("m");
        $year = date("y");


        return mysql_query("SELECT t.TeretoryName, SUM( s.quantity ) AS sum
                            FROM sold_product s, invoice i, teretory t
                            WHERE t.AreaId =  '$AreaId'
                            AND i.teretoryId = t.TeretoryId
                            AND s.InvoiceNo = i.InvoiceNo
                            AND s.productId =  '$productId'
                            AND cDate LIKE  '$month%$year'
                            GROUP BY t.TeretoryName

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

    public function Insert_DayasPlan($productId, $daysPlan, $TId)
    {


        $today = date("m/d/Y");

        mysql_query("insert into territory_target(ProductId,Target,TerritoryId,OpeningDate) Values('$productId',$daysPlan,'$TId','$today')");

    }

    public function Update_DayasPlan($productId, $daysPlan, $routeId)
    {

        $today = date("m/d/Y");
        $month = date("m");
        $year = date("y");

        mysql_query("UPDATE territory_target SET TimeStamp=DATE_FORMAT(CURDATE(), '%m/%d/%Y'),Target=$daysPlan WHERE ProductId='$productId' AND TerritoryId='$routeId' AND OpeningDate Like '$month%$year' ");

    }


    public function GetThisMonthDaysPlan($productid, $AreaId)
    {
        $month = date("m");
        $year = date("y");
        return mysql_query("SELECT t.TeretoryName,d.Target
                            FROM teretory t, territory_target d
                            WHERE t.AreaId =  '$AreaId'
                            AND t.TeretoryId = d.TerritoryId
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