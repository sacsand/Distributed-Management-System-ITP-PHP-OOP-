<?php

$crud = new DriverCRUD();

if(isset($_POST['save']))
{
/*form validation can be done here*/

	$d_id = isset($_POST['d_id']) ? $_POST['d_id'] :"";
	$d_name = isset($_POST['d_name']) ? $_POST['d_name'] :"";
	$lic_no = isset($_POST['lic_no']) ? $_POST['lic_no'] :"";
	$lic_issue = isset($_POST['lic_issue']) ? $_POST['lic_issue'] :"";
	$lic_exp = isset($_POST['lic_exp']) ? $_POST['lic_exp'] :"";
	$v_id = isset($_POST['v_id']) ? $_POST['v_id'] :"";

	$driver_real_id = str_pad($d_id, 3, "D0", STR_PAD_LEFT);

	if (!empty($d_id) && !empty($d_name)  && !empty($lic_no)  && !empty($lic_issue)  && !empty($lic_exp) && !empty($v_id)) {
		$crud->create_driver($driver_real_id, $d_name,$lic_no,$lic_issue,$lic_exp, $v_id);
		header("Location:/?page=vehicle/DriverHome");
	}else{
		$error = "Please Insert Something" ;
		header("Location:/?page=vehicle/AddDriver");
	}
	
}

if(isset($_GET['del_id']))
{
	$id = $_GET['del_id'];
	$crud->delete_driver($id);
	header("Location:/?page=vehicle/DriverHome");
}


if(isset($_POST['update']))
{
    $id = $_GET['edt_id'];
  
    $d_name = $_POST['d_name'];
    $lic_no = $_POST['lic_no'];
    $lic_issue = $_POST['lic_issue'];
    $lic_exp = $_POST['lic_exp'];
    $v_id = $_POST['v_id'];

   

	if (!empty($id) && !empty($d_name) && !empty($lic_no) && !empty($lic_issue) && !empty($lic_exp) && !empty($v_id)){


    $crud->update_driver($id,$d_name,$lic_no,$lic_issue,$lic_exp,$v_id);
	header("Location:/?page=vehicle/DriverHome");
}
else{
		$error = "Please Insert Something" ;
		header("Location:/?page=vehicle/DriverEdit");
	}
}

?>