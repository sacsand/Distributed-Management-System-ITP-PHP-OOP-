<?php

$crud = new VrepairCRUD();

if(isset($_POST['save']))
{
/*form validation can be done here*/
	$vr_id = isset($_POST['vr_id']) ? $_POST['vr_id'] :"";
	$vr_type= isset($_POST['vr_type']) ? $_POST['vr_type']: "";
	$vr_cost= isset($_POST['vr_cost']) ? $_POST['vr_cost']: "";
	$vr_date= isset($_POST['vr_date']) ? $_POST['vr_date']: "";
	$vrepair_real_id = str_pad($vr_id, 2, "V", STR_PAD_LEFT);
	


   if (!empty($vr_id) && !empty($vr_type) && !empty($vr_cost) && !empty($vr_date)) {
		$crud->create_vrepair($vrepair_real_id,$vr_type, $vr_cost, $vr_date);
		header("Location:/?page=vehicle/RepairDetails");
	}else{
		$error = "Please Insert Something" ;
		header("Location:/?page=vehicle/VechilesRepair");
	}

}

if(isset($_GET['del_id']))
{
	$id = $_GET['del_id'];
	$crud->delete_vrepair($id);
	header("Location:/?page=vehicle/RepairDetails");
}


if(isset($_POST['update']))
{
    $id = $_GET['edt_id'];
    $vr_id = $_POST['vr_id'];
    $vr_type = $_POST['vr_type'];
    $vr_cost = $_POST['vr_cost'];
    $vr_date = $_POST['vr_date'];

    if (!empty($id) && !empty($vr_id) && !empty($vr_type) && !empty($vr_cost) && !empty($vr_date)){


    $crud->update_vrepair($id, $vr_type,$vr_cost,$vr_date);
	header("Location:/?page=vehicle/RepairDetails");
}
else{
		$error = "Please Insert Something" ;
		header("Location:/?page=vehicle/VechilesRepair");
	}
   
}

?>