<?php
$bcrud= new  BookingCRUD();
$acrud = new VechilesCRUD();
$crud = new DriverCRUD();

if(isset($_POST['save']))
{
/*form validation can be done here*/
	$booking_id = isset($_POST['booking_id']) ? $_POST['booking_id'] :"";
	$vec_id = isset($_POST['vec_id']) ? $_POST['vec_id']: "";
	$driv_id = isset($_POST['driv_id']) ? $_POST['driv_id']: "";
	$rout_id = isset($_POST['rout_id']) ? $_POST['rout_id']: "";
	$vechiles_real_id = str_pad($booking_id, 2, "B", STR_PAD_LEFT);


	if (!empty($booking_id) && !empty($vec_id) && !empty($driv_id) && !empty($rout_id)){
		// insert
	    $bcrud->create_booking($booking_id, $vec_id, $driv_id, $rout_id );
	    header("Location:/?page=vehicle/BookingDetails");
	}else{
		$error = "Please Insert Something" ;
		header("Location:/?page=vehicle/Booking");
	}
}

if(isset($_GET['del_id']))
{
	$id = $_GET['del_id'];
	$bcrud->delete_booking($id);
	header("Location:/?page=vehicle/BookingDetails");
}


if(isset($_POST['update']))
{

    $id = $_GET['edt_id'];
    $booking_id = $_POST['booking_id'];
    $vec_id=$_POST['vec_id'];
    $driv_id=$_POST['driv_id'];
    $rout_id=$_POST['rout_id'];

	if (!empty($id) && !empty($booking_id) && !empty($vec_id) && !empty($driv_id) && !empty($rout_id)){


    $bcrud->update_booking($booking_id, $vec_id,$driv_id,$rout_id);
	header("Location:/?page=vehicle/BookingDetails");
}
else{
		$error = "Please Insert Something" ;
		header("Location:/?page=vehicle/Booking");
	}

}

?>


