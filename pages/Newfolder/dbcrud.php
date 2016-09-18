<?php


$crud = new CRUD();





if(isset($_POST['update']))
{
    $id = $_GET['edt_id'];
    $pid = $_GET['productId'];
    $productId = $_POST['productId'];
    $name = $_POST['name'];
    $weight = $_POST['weight'];

    $caseMakeup = $_POST['caseMakeup'];
    $unitPrice_ws = $_POST['unitPrice_ws'];
    $casePrice_ws = $_POST['casePrice_ws'];

    $unitPrice_tf = $_POST['unitPrice_tf'];
    $casePrice_tf = $_POST['casePrice_tf'];
    $priceConsumer = $_POST['priceConsumer'];
    $category = $_POST['category'];

$sql = mysql_query("SELECT productId FROM product WHERE productId='$productId'");
$count = mysql_num_rows($sql);

if($pid==$productId){

    $crud->update($productId,$name,$weight,$caseMakeup,$unitPrice_ws,$casePrice_ws,$unitPrice_tf,$casePrice_tf,$priceConsumer,$category,$id);
    header("Location:/?page=product_home");

}else if ($count!==0){

    $crud->update($productId,$name,$weight,$caseMakeup,$unitPrice_ws,$casePrice_ws,$unitPrice_tf,$casePrice_tf,$priceConsumer,$category,$id);
    header("Location:/?page=product_home");


  }
}

//product-handling

if(isset($_POST['save']))
{

    $productId = $_POST['productId'];
    $name = $_POST['name'];
    $weight = $_POST['weight'];

    $caseMakeup = $_POST['caseMakeup'];
    $unitPrice_ws = $_POST['unitPrice_ws'];
    $casePrice_ws = $_POST['casePrice_ws'];

    $unitPrice_tf = $_POST['unitPrice_tf'];
    $casePrice_tf = $_POST['casePrice_tf'];
    $priceConsumer = $_POST['priceConsumer'];
    $category = $_POST['category'];


// insert

    $sql = mysql_query("SELECT productId FROM product WHERE productId='$productId'");
    $count = mysql_num_rows($sql);

    if($count!=0){

        header("Location:/?page=add_records&count=1 ");

    }else {

        mysql_query("INSERT INTO product(productId,name,weight,caseMakeup,unitPrice_ws,casePrice_ws,unitPrice_tf,casePrice_tf,priceConsumer,category) VALUES('$productId','$name','$weight','$caseMakeup','$unitPrice_ws','$casePrice_ws','$unitPrice_tf','$casePrice_tf','$priceConsumer','$category')");
        header("Location:/?page=product_home");

    }




}


if(isset($_GET['del_id']))
{
    $id = $_GET['del_id'];
    $crud->delete($id);
    header("Location: /?page=product_home");
}



if(isset($_POST['stock'])) {
    $main = $_POST['maincategory'];

    $sub1 = $_POST['subcategory1'];
    $sub2 = $_POST['subcategory2'];
    $sub3 = $_POST['subcategory3'];
    $sub4 = $_POST['subcategory4'];
    $sub5 = $_POST['subcategory5'];
    $sub6 = $_POST['subcategory6'];
    $sub7 = $_POST['subcategory7'];
    $sub8 = $_POST['subcategory8'];
    $sub9 = $_POST['subcategory9'];
    $sub10 = $_POST['subcategory10'];
    $sub11 = $_POST['subcategory11'];


    if ($sub1 != 'please select')
        $real_sub = $sub1;

    if ($sub2 != 'please select')
        $real_sub = $sub2;

    if ($sub3 != 'please select')
        $real_sub = $sub3;

    if ($sub4 != 'please select')
        $real_sub = $sub4;

    if ($sub5 != 'please select')
        $real_sub = $sub5;

    if ($sub6 != 'please select')
        $real_sub = $sub6;

    if ($sub7 != 'please select')
        $real_sub = $sub7;

    if ($sub8 != 'please select')
        $real_sub = $sub9;

    if ($sub9 != 'please select')
        $real_sub = $sub9;

    if ($sub10 != 'please select')
        $real_sub = $sub10;

    if ($sub11 != 'please select')
        $real_sub = $sub11;



    $product_name = $crud->get_product_name($real_sub);

    $stockk = $_POST['daysplan'];


    $current_stock =  $crud->get_current_stock($real_sub,"sajith");

    $stock = $stockk + $current_stock;


    $crud->update_stock($real_sub,$product_name,$stock,'sajith');
    $crud->update_date($real_sub,'sajith');


    header("Location:/?page=Sales_rep_add_daily_stock");
    // header("Location:/?page=test&cat=".$invoice_number."");

}











?>










