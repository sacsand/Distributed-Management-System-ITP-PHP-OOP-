<?php

$crud = new FuelCRUD();

if(isset($_POST['save']))
{
/*form validation can be done here*/
	$index_no = isset($_POST['index_no']) ? $_POST['index_no'] :"";
	$f_amount = isset($_POST['f_amount']) ? $_POST['f_amount']: "";
	$f_taken = isset($_POST['f_taken']) ? $_POST['f_taken']: "";
	$f_exp = isset($_POST['f_exp']) ? $_POST['f_exp']: "";
	$f_cost = isset($_POST['f_cost']) ? $_POST['f_cost']: "";
	$d_id = isset($_POST['d_id']) ? $_POST['d_id']: "";
	$v_id = isset($_POST['v_id']) ? $_POST['v_id']: "";
	$fuel_real_id = str_pad($index_no, 3, "I0", STR_PAD_LEFT);


	if (!empty($index_no) && !empty($f_amount) && !empty($f_taken) && !empty($f_exp)  && !empty($f_cost)  && !empty($d_id)  && !empty($v_id)){
		// insert
	    $crud->create_fuel($fuel_real_id, $f_amount, $f_taken, $f_exp,$f_cost, $d_id,$v_id );
	    header("Location:/?page=vehicle/FuelHome");
	}else{
		$error = "Please Insert Something" ;
		header("Location:/?page=vehicle/AddFuel");
	}
}

if(isset($_GET['del_id']))
{
	$id = $_GET['del_id'];
	$crud->delete_fuel($id);
	header("Location:/?page=vehicle/FuelHome");
}


if(isset($_POST['update']))
{

    $id = $_GET['edt_id'];
    $f_amount = $_POST['f_amount'];
     $f_taken = $_POST['f_taken'];
    $f_exp = $_POST['f_exp'];
    $f_cost=$_POST['f_cost'];
     $d_id=$_POST['d_id'];
	 $v_id=$_POST['v_id'];

	if (!empty($id) && !empty($f_amount) && !empty($f_taken) && !empty($f_exp)  && !empty($f_cost)  && !empty($d_id)  && !empty($v_id)){


    $crud->update_fuel($id,$f_amount, $f_taken, $f_exp,$f_cost, $d_id,$v_id );
	header("Location:/?page=vehicle/FuelHome");
}
else{
		$error = "Please Insert Something" ;
		header("Location:/?page=vehicle/FuelEdit");
	}

}

?>



