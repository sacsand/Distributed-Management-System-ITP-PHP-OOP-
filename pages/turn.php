<?php
/**
 * Created by PhpStorm.
 * User: sachintha
 * Date: 9/6/15
 * Time: 11:48 AM
 */

$salesrep="Sales_Rep";
$admin="ADMIN";
$areaManager="Area_Managar";
//echo $_SESSION[Login::$_login_name];
$HeadeObj=new Header();
$userType=$HeadeObj->get_user_type($_SESSION[Login::$_login_name]);
//echo $userType;
if($userType!=NULL){

    if(strcmp($userType, $areaManager) == 0) {
        $url="/?page=dashbords/AreaDashbored";
        Helper::redirect($url);

    }

    if(strcmp($userType, $admin) == 0) {
        $url="/?page=dashbords/AdminDashbored";
        Helper::redirect($url);

    }

    if(strcmp($userType, $salesrep) == 0) {
        $url="/?page=dashbords/SalesRepDashbored";
        Helper::redirect($url);

    }


}


