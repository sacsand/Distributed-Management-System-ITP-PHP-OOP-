<?php
/**
 * Created by PhpStorm.
 * User: sachintha
 * Date: 8/1/15
 * Time: 11:05 PM
 */
class Header extends Application
{

function get_user_type($username){

    $sql="SELECT type from employee WHERE username='$username'";
    $query2 = mysql_query($sql);
    $query3 = mysql_fetch_array($query2);
    $type = $query3['type'];
    return $type;

}

 function Get_route_name($RouteId ){
        $query = "select RouteName from route WHERE RouteId ='$RouteId'";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $ter = $query3['RouteName'];
        return $ter;
    }



}

?>

