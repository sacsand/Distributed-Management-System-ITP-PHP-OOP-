<?php
/**
 * Created by PhpStorm.
 * User: sachintha
 * Date: 7/25/15
 * Time: 10:39 AM
 */

class STOCK extends Application
{


    Public function Get_Sales_rep_teratory($username){
        $query = "select teretoryId from employee where username='$username'";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $ter = $query3['teretoryId'];
        return $ter;
    }

    Public function Get_Sales_rep_teratory_name($teretory ){
        $query = "select TeretoryName from teretory where TeretoryId ='$teretory'";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $ter = $query3['TeretoryName'];
        return $ter;
    }

    Public function Get_Sales_rep_Area_id($teretoryName ){
        $query = "select AreaId from teretory where  TeretoryName='$teretoryName'";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $ter = $query3['AreaId'];
        return $ter;
    }

    Public function Get_Sales_rep_Area_Name($AreaId ){
        $query = "select AreaName from area where AreaId ='$AreaId'";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $ter = $query3['AreaName'];
        return $ter;
    }


    public function GetProudutDetails()
    {
        return mysql_query("select * from product");
    }

    public function Get_Current_stock($productId,$Teratory)
    {
        $month = date("m");

        $year = date("y");
        $today = date("m/d/Y");
        $query = "select quantity from stock where productId='$productId' and  teretory='$Teratory' and opening_date Like '$month%$year' ";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $quant = $query3['quantity'];
        return $quant;
    }

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


    public function Get_Index_No($productId,$Teratory)
    {
        $month = date("m");
        $year = date("y");

        $query = "select IndexNo from stock where productId='$productId' and  teretory='$Teratory' and opening_date Like '$month%$year' ";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $IndexNoy = $query3['IndexNo'];
        return $IndexNoy;
    }

    public function Update_Stock($IndexNo,$goodRecived,$Teretory,$product_Id)
    {


        $month = date("m");
        $year = date("y");
        $today = date("m/d/Y");
        $month = date("m");
        $year = date("y");

        $query = "select IndexNo from stock where productId='$product_Id' and  teretory='$Teretory' and opening_date Like '$month%$year' ";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $IndexNoy = $query3['IndexNo'];



        if($IndexNo<=0 || $IndexNoy<=0 ){

            mysql_query("insert into stock(productId,quantity,teretory,opening_date,opening_stock,max_stock) Values('$product_Id',$goodRecived,'$Teretory','$today',$goodRecived,$goodRecived)");

        }else {

            $queryx = "select max_stock from stock where IndexNo='$IndexNo' ";
            $query2x = mysql_query($queryx);
            $query3x = mysql_fetch_array($query2x);
            $maxStock = $query3x['max_stock'];


            $query = "select quantity from stock where IndexNo='$IndexNo' ";
            $query2 = mysql_query($query);
            $query3 = mysql_fetch_array($query2);
            $quantityOld = $query3['quantity'];

            $sum = $quantityOld + $goodRecived;
                if($sum >= $maxStock  ){

                    mysql_query("UPDATE stock SET TIMESTAM=DATE_FORMAT(CURDATE(), '%m/%d/%Y'),quantity=$sum,max_stock=$sum WHERE IndexNo='$IndexNo' ");
                }else {

                    mysql_query("UPDATE stock SET TIMESTAM=DATE_FORMAT(CURDATE(), '%m/%d/%Y'),quantity=$sum WHERE IndexNo='$IndexNo' ");
                }

        }
    }

    public function Remove_Stock($IndexNo,$goodRecived,$Teretory,$product_Id)
    {        $month = date("m");
        $year = date("y");
        $today = date("m/d/Y");



            $query = "select quantity from stock where IndexNo='$IndexNo' ";
            $query2 = mysql_query($query);
            $query3 = mysql_fetch_array($query2);
            $quantityOld = $query3['quantity'];

            if($quantityOld<$goodRecived){

                return -1;


            }else {

                $sum = $quantityOld - $goodRecived;
            }

            mysql_query("UPDATE stock SET TIMESTAM=DATE_FORMAT(CURDATE(), '%m/%d/%Y'),quantity=$sum WHERE IndexNo='$IndexNo' ");


    }

}

?>