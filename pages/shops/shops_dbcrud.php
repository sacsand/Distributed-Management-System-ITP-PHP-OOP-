<?php


$shops = new SHOPS();



//Shop Handling Bhanuka-----------------------------------------------------------------------------------------
if(isset($_POST['update']))
{//edit shops
    $indexNo = $_GET['indexNo'];
    $shopId = $_POST['shopId'];
    $routeId = $_POST['routeId'];

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $shops->update($indexNo,$shopId,$routeId,$name,$address,$phone);
    header("Location:/?page=shops/shops_home&route_id=".$routeId."");
}

//add shops

if(isset($_POST['save']))
{

    
    
    $routeId = $_POST['routeId'];


 //   $shopId = "S";

 //   $shopId .= $_POST['shopId'];
 

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $today = $_POST['theDate'];



    //validation part

    $r = $shops -> get_shop_id_count($shopId);
    $count = mysql_num_rows($r);




    //echo $count;

    if ( $count == 0 )
    {
        $shops->create($routeId,$name,$address,$phone);
        $ans=1;
        header("Location:/?page=shops/shops_home&route_id=".$routeId."&message=".$ans."");
    }
    else
    {
       // header("Location:/?page=shops/shops_home&route_id=".$routeId."");
        $ans=0;
        header("Location:/?page=shops/shops_home&route_id=".$routeId."&message=".$ans."");
    }

}


if(isset($_GET['del_id']))
{

    $routeId = $_GET['route_id'];
    $id = $_GET['del_id'];
    $shops->delete_shop($id);
     header("Location:/?page=shops/shops_home&route_id=".$routeId."");
}

if(isset($_GET['del_id2']))
{

  
    $id = $_GET['del_id2'];
    $shops->delete_shop($id);
     header("Location:/?page=shops/shops_main");
}

//END of shop handling Bhanuka---------------------------------------------------------------------------------


?>








