<?php

$crud = new VechilesCRUD();

if(isset($_POST['save']))
{
/*form validation can be done here*/
	$v_id = isset($_POST['v_id']) ? $_POST['v_id'] :"";
	$v_lic = isset($_POST['v_lic']) ? $_POST['v_lic']: "";
	$lic_issue = isset($_POST['lic_issue']) ? $_POST['lic_issue']: "";
	$lic_exp = isset($_POST['lic_exp']) ? $_POST['lic_exp']: "";
	$v_type = isset($_POST['v_type']) ? $_POST['v_type']: "";
	$miles = isset($_POST['miles']) ? $_POST['miles']: "";
	$vechiles_real_id = str_pad($v_id, 3, "V0", STR_PAD_LEFT);

		


	if (!empty($v_id) && !empty($v_lic) && !empty($lic_issue) && !empty($lic_exp) && !empty($v_type) && !empty($miles)){
		// insert
	    $crud->create_vechiles($vechiles_real_id,$v_lic,$lic_issue,$lic_exp,$v_type,$miles);
	    header("Location:/?page=vehicle/VechilesHome");
	}else{
		$error = "Please Insert Something" ;
		header("Location:/?page=vehicle/AddVechiles");
	}
}

if(isset($_GET['del_id']))
{
	$id = $_GET['del_id'];
	$crud->delete_vechiles($id);
	header("Location:/?page=vehicle/VechilesHome");
}


if(isset($_POST['update']))
{

    $id = $_GET['edt_id'];
    $v_lic = $_POST['v_lic'];
     $lic_issue = $_POST['lic_issue'];
    $lic_exp = $_POST['lic_exp'];
    $v_type=$_POST['v_type'];
      $miles=$_POST['miles'];

	if (!empty($id) && !empty($v_lic) && !empty($lic_issue) && !empty($lic_exp)&& !empty($v_type) && !empty($miles)){


    $crud->update_vechiles($id,$v_lic,$lic_issue,$lic_exp,$v_type,$miles);
    // echo "\nid".$id;
    // echo "\nv_lic".$v_lic;
    
    // echo "\nlic_issue".$lic_issue;
    // echo "\nlic_exp".$lic_exp;
    // echo "\nv_type".$v_type;
    // echo "\nmiles".$miles;
	header("Location:/?page=vehicle/VechilesHome");
}
else{
		$error = "Please Insert Something" ;
	echo "\nid".$id;
    echo "\nv_lic".$v_lic;
    
    echo "\nlic_issue".$lic_issue;
    echo "\nlic_exp".$lic_exp;
    echo "\nv_type".$v_type;
    echo "\nmiles".$miles;
		// header("Location:/?page=vehicle/VechilesEdit");
	}

}

?>


