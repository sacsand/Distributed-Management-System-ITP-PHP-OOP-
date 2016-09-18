<?php

$acrud = new AreaCRUD();

//Area validations starts here
if(isset($_POST['area_save']))
{
/*form validation can be done here*/

	$area_name = isset($_POST['area_name']) ? $_POST['area_name'] : '';
	$area_id = isset($_POST['area_id']) ? $_POST['area_id'] : '';
	$area_real_id = str_pad($area_id, 4, "A0", STR_PAD_LEFT);


	if (!empty($area_real_id) && !empty($area_name)) {
		// insert
	    $acrud->create_area($area_real_id, $area_name);
	    header("Location:/?page=area/AreaHome");
	}else{
		header("Location:/?page=area/AddArea");
	}
}

if(isset($_GET['area_del_id']))
{
	$id = $_GET['area_del_id'];
	$acrud->delete_area($id);
	header("Location:/?page=area/AreaHome");
}


if(isset($_POST['area_update']))
{
    $id = $_GET['area_edt_id'];
    $area_id = $_POST['area_id'];
    $area_name = $_POST['area_name'];

    $acrud->update_area($id, $area_id, $area_name);
	header("Location:/?page=area/AreaHome");
}

//Area validations ends here

//Territory validations starts here

if(isset($_POST['terr_save']))
{
/*form validation can be done here*/

	$terr_id = isset($_POST['terr_id']) ? $_POST['terr_id'] : '';
	if (strlen($terr_id) == 1) {
		$terr_real = str_pad($terr_id, 3, "T0", STR_PAD_LEFT);
	}else{
		$terr_real = str_pad($terr_id, 3, "T", STR_PAD_LEFT);
	}
	$terr_id = isset($_POST['terr_id']) ? $_POST['terr_id'] : '';
	$terr_name = isset($_POST['terr_name']) ? $_POST['terr_name'] : '';
	$area_id = isset($_POST['area_id']) ? $_POST['area_id'] : '';
	//$area_id = $_POST['area_id'];

	$territory_real_id = str_pad($terr_real, 7, $area_id, STR_PAD_RIGHT);

	if (!empty($territory_real_id) || !empty($terr_name) || !empty($area_id)) {
		$acrud->create_territory($territory_real_id, $terr_name, $area_id);
		header("Location:/?page=area/AreaHome");
	}else{
		$error = "Please Insert Something" ;
		header("Location:/?page=area/error");
	}

}

if(isset($_GET['terr_del_id']))
{
	$id = $_GET['terr_del_id'];
	$acrud->delete_territory($id);
	header("Location:/?page=area/AreaHome");
}


if(isset($_POST['terr_update']))
{
    $id = $_GET['terr_edt_id'];
    $terr_id = $_POST['terr_id'];
    $terr_name = $_POST['terr_name'];
    $area_id = $_POST['area_id'];

    $acrud->update_territory($id, $terr_id, $terr_name, $area_id);
	header("Location:/?page=area/AreaHome");
}

//Territory validations ends here


//Route validations starts here

if(isset($_POST['route_save']))
{
/*form validation can be done here*/
	$route_id = isset($_POST['route_id']) ? $_POST['route_id'] : '';
	if (strlen($route_id) == 1) {
		$route_real = str_pad($route_id, 3, "R0", STR_PAD_LEFT);
	}else{
		$route_real = str_pad($route_id, 3, "R", STR_PAD_LEFT);
	}
	$route_name = isset($_POST['route_name']) ? $_POST['route_name'] : '';
	$route_description = isset($_POST['route_description']) ? $_POST['route_description'] : '';
	$terr_id = isset($_POST['terr_id']) ? $_POST['terr_id'] : '';
	//$terr_id = $_POST['terr_id'];


	
	$route_real_id = str_pad($route_real, 10, $terr_id, STR_PAD_RIGHT);

	if (!empty($route_real_id) || !empty($route_name) || !empty($route_description) || !empty($terr_id)) {
		$acrud->create_route($route_real_id, $route_name, $route_description, $terr_id);
		header("Location:/?page=area/AreaHome");
	}else{
		$error = "Please Insert Something" ;
		header("Location:/?page=area/AreaHome");
	}

}

if(isset($_GET['route_del_id']))
{
	$id = $_GET['route_del_id'];
	$acrud->delete_route($id);
	header("Location:/?page=area/AreaHome");
}


if(isset($_POST['route_update']))
{
    $id = $_GET['route_edt_id'];
    $route_id = $_POST['route_id'];
    $route_name = $_POST['route_name'];
    $route_description = $_POST['route_description'];
    $terr_id = $_POST['terr_id'];

    $acrud->update_route($id, $route_id, $route_name, $route_description, $terr_id);
	header("Location:/?page=area/AreaHome");
}

//Route validations ends here


//AreaTarget validations starts here

if(isset($_POST['atarget_save']))
{
/*form validation can be done here*/
	$id = $acrud->areatarget_no_of_rows();
	$nextId = $id + 1;
	$length = strlen($nextId);
	$target_id = isset($_POST['target_id']) ? $_POST['target_id'] : $nextId;
	$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
	$target = isset($_POST['target']) ? $_POST['target'] : '';

	$openingdate = isset($_POST['openingdate']) ? $_POST['openingdate'] : '';

	$area_id = isset($_POST['area_id']) ? $_POST['area_id'] : '';
	$time = date('h:i:s');

	$atarget_real_id = str_pad($target_id, $length+2, "AT", STR_PAD_LEFT);


	if (!empty($target_id) && !empty($product_id) && !empty($target) && !empty($openingdate) && !empty($area_id) && !empty($time)) {
		// insert
	    $acrud->create_target_area($atarget_real_id, $product_id, $target, $openingdate, $area_id, $time);
	    header("Location:/?page=area/AreaTargetHome");
	}else{
		header("Location:/?page=area/AddAreaTarget");
	}
}

if(isset($_GET['areatarget_del_id']))
{
	$id = $_GET['areatarget_del_id'];
	$acrud->delete_area_target($id);
	header("Location:/?page=area/AreaTargetHome");
}


if(isset($_POST['atarget_update']))
{
    $id = $_GET['areatarget_edt_id'];
    $target_id = $_POST['target_id'];
    $product_id = $_POST['product_id'];
    $target = $_POST['target'];
    $openingdate = $_POST['openingdate'];
    $area_id = $_POST['area_id'];
    $time = $_POST['time'];


    $acrud->update_area_target($id, $target_id, $product_id, $target, $openingdate, $area_id, $time);
	header("Location:/?page=area/AreaTargetHome");
}

//AreaTarget validations ends here


//TerritoryTarget validations starts here

if(isset($_POST['terrtarget_save']))
{
	$id = $acrud->terrtarget_no_of_rows();
	$nextId = $id + 1;
	$length = strlen($nextId);

	$target_id = isset($_POST['target_id']) ? $_POST['target_id'] : $nextId;
	$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
	$target = isset($_POST['target']) ? $_POST['target'] : '';
	$openingdate = isset($_POST['openingdate']) ? $_POST['openingdate'] : '';
	$terr_id = isset($_POST['terr_id']) ? $_POST['terr_id'] : '';
	$time = date('h:i:s');

	$ttarget_real_id = str_pad($target_id, $length+2, "TT", STR_PAD_LEFT);


	if (!empty($target_id) && !empty($product_id) && !empty($target) && !empty($openingdate) && !empty($terr_id) && !empty($time)) {
		// insert
	    $acrud->create_target_terr($ttarget_real_id, $product_id, $target, $openingdate, $terr_id, $time);
	    header("Location:/?page=area/TerritoryTargetHome");
	}else{
		header("Location:/?page=area/AddTerritoryTarget");
	}
}

if(isset($_GET['terrtarget_del_id']))
{
	$id = $_GET['terrtarget_del_id'];
	$acrud->delete_terr_target($id);
	header("Location:/?page=area/TerritoryTargetHome");
}


if(isset($_POST['terrtarget_update']))
{
    $id = $_GET['terrtarget_edt_id'];
    $target_id = $_POST['target_id'];
    $product_id = $_POST['product_id'];
    $target = $_POST['target'];
    $openingdate = $_POST['openingdate'];
    $terr_id = isset($_POST['terr_id']) ? $_POST['terr_id'] : '';
    $time = $_POST['time'];


    $acrud->update_terr_target($id, $target_id, $product_id, $target, $openingdate, $terr_id, $time);
	header("Location:/?page=area/TerritoryTargetHome");
}

//TerritoryTarget validations ends here


// Mail it
//mail($to, $subject, $message, $headers);

// Additional headers
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
//$headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
if(isset($_POST['sendEmail']))
{
	$sendername = isset($_POST['sendername']) ? $_POST['sendername'] : "";
	$subject = isset($_POST['subject']) ? $_POST['subject'] : "";
	$message = isset($_POST['message']) ? $_POST['message'] : "";
	$to = 'admin@hamzathanees.0fees.us';
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= "From: {$sendername}" . "\r\n";
	$headers .= "Cc: {$subject}" . "\r\n";
	if (!empty($_POST["sendername"]) && !empty($_POST["subject"]) && !empty($_POST["message"])) {
		mail($to, $subject, $message, $headers);
		header("Location:/?page=area/index");
	}
	else{
		header("Location:/?page=area/error");
	}
}


?>
