<?php

$crud = new deviceCRUD();
//
//DEVICE MANAGEMENT
//

if(isset($_POST['save']))
{
/*form validation can be done here*/
    $device_id = isset($_POST['device_id']) ? $_POST['device_id'] : "";
    //$device_id = $_POST['device_id'];
     $device_model = isset($_POST['device_model']) ? $_POST['device_model'] : "";
    //$device_model = $_POST['device_model'];
     $mac_Address = isset($_POST['mac_Address']) ? $_POST['mac_Address'] : "";
    //$mac_Address = $_POST['mac_Address'];
     $tddate = isset($_POST['tddate']) ? $_POST['tddate'] : "";
    //$tddate = $_POST['tddate'];
    //$area_real_id = str_pad($area_id, 4, "A", STR_PAD_LEFT);


    if (!empty($device_id) && !empty($device_model) && !empty($mac_Address) && !empty($tddate)) {
        // insert
        $crud->add_device($device_id, $device_model, $mac_Address, $tddate);
        $crud->redirect_to("/?page=deviceManagement");
        //header("Location:/?page=deviceManagement");
    }
    else{
        //validation 
        //$error = "Please Insert Something" ;
        $crud->redirect_to("/?page=deviceAdd");
      //  header("Location:/?page=deviceAdd");
    }
}

if(isset($_GET['rem_id'])) //For removing when the deletebutton is clicked
{
    $id = $_GET['rem_id'];
    $crud->remove_device($id);
    $crud->redirect_to("/?page=deviceManagement");
}
//remService_id

if(isset($_GET['remService_id'])) //For removing when the deletebutton is clicked
{
    $id = $_GET['remService_id'];
    $crud->remove_Service($id);
    $crud->redirect_to("/?page=serviceRequest");
}


if(isset($_POST['update']))//For Editing when the editbutton is clicked
{
    $id = $_GET['edit_Id'];
    $device_id = $_POST['device_id'];
    $device_model = $_POST['device_model'];
    $mac_Address = isset($_POST['mac_Address']) ? $_POST['mac_Address'] : "";
    $tddate = isset($_POST['tddate']) ? $_POST['tddate'] : "";

 if (!empty($device_id) && !empty($device_model) && !empty($mac_Address) && !empty($tddate)) {

    $crud->update_device($id,$device_id, $device_model, $mac_Address, $tddate);
    $crud->redirect_to("/?page=deviceManagement");
}//end of innerif
    else{
        
        $crud->redirect_to("/?page=deviceAdd");
      //  header("Location:/?page=deviceAdd");
    }//end of else 

}
//
//  DEVICE MANAGEMENT
//


//
//DEVICE ASSIGNMENT
//

if(isset($_POST['dAsave'])) //To assign Device
{
/*form validation can be done here*/
    $device_idLog = isset($_POST['device_idLog']) ? $_POST['device_idLog'] : "";
    
     $sales_repLog = isset($_POST['sales_repLog']) ? $_POST['sales_repLog'] : "";

     $dateAssign = isset($_POST['dateAssign']) ? $_POST['dateAssign'] : "";
    //$tddate = $_POST['tddate'];
    //$area_real_id = str_pad($area_id, 4, "A", STR_PAD_LEFT);


    if (!empty($device_idLog) && !empty($sales_repLog) && !empty($dateAssign)) {
        // insert
        $crud->assign_device($device_idLog, $sales_repLog, $dateAssign);
        $crud->redirect_to("/?page=assignedDevices");

    }
    else{

        $crud->redirect_to("/?page=assigndevices");

    }
}

if(isset($_POST['updateAssign']))//For Editing when the editbutton is clicked
{
    $id = $_GET['editDeviceId'];
    $device_idLog = $_POST['device_idLog'] ;
    
     $sales_repLog = $_POST['sales_repLog'];

     $dateAssign = $_POST['dateAssign'];

  if (!empty($device_idLog) && !empty($sales_repLog) && !empty($dateAssign) && !empty($id)) {

    $crud->update_deviceAssign($id,$device_idLog,$sales_repLog,$dateAssign);
    $crud->redirect_to("/?page=assignedDevices");
}//end of innerif
    else{
        
        $crud->redirect_to("/?page=assigndevices");
      //  header("Location:/?page=deviceAdd");
    }//end of else 

}


if(isset($_GET['remAssign_id'])) //For removing when the deletebutton is clicked
{
    $id = $_GET['remAssign_id'];
    $crud->removeAssigned_device($id);
    $crud->redirect_to("/?page=assignedDevices");
}


//
//DEVICE ASSIGNMENT
//


//
//Service
//

if(isset($_GET['remService_id'])) //For removing when the deletebutton is clicked
{
    $id = $_GET['remService_id'];
    $crud->remove_Service($id);
    $crud->redirect_to("/?page=serviceRequest");
}

if(isset($_POST['serviceSave'])) //To service Device
{

    $service_id = isset($_POST['service_id']) ? $_POST['service_id'] : "";
    
     $device_serviceLog = isset($_POST['device_serviceLog']) ? $_POST['device_serviceLog'] : "";

     $sales_serviceLog = isset($_POST['sales_serviceLog']) ? $_POST['sales_serviceLog'] : "";

     $complaint = isset($_POST['complaint']) ? $_POST['complaint'] : "";

     $Bdevice_serviceLog = isset($_POST['Bdevice_serviceLog']) ? $_POST['Bdevice_serviceLog'] : "";

     $tsdate = $_POST['dateService'];

     $serviceStatus = isset($_POST['serviceStatus']) ? $_POST['serviceStatus'] : "";

     
    //$area_real_id = str_pad($area_id, 4, "A", STR_PAD_LEFT);


           // insert

     if (!empty($service_id) && !empty($device_serviceLog) && !empty($sales_serviceLog) && !empty($complaint) && !empty($Bdevice_serviceLog) && !empty($tsdate) && !empty($serviceStatus)) {
        $crud->service_device($service_id, $device_serviceLog, $sales_serviceLog,$complaint,$Bdevice_serviceLog,$serviceStatus,$tsdate);
        $crud->redirect_to("/?page=serviceRequest");

    }
    else{

        $crud->redirect_to("/?page=requestService");

    }
}

    if(isset($_POST['serviceUpdate']))//For Editing when the editbutton is clicked
{
    $id = $_GET['editServiceId'];
    $service_id = $_POST['service_id'] ;
    
     $device_serviceLog = $_POST['device_serviceLog'];

     $sales_serviceLog = $_POST['sales_serviceLog'];

     $complaint = isset($_POST['complaint']) ? $_POST['complaint'] : "";
     $Bdevice_serviceLog = $_POST['Bdevice_serviceLog'];
     $tsdate = $_POST['dateService'];
     $serviceStatus = $_POST['serviceStatus'];



  if (!empty($service_id) && !empty($device_serviceLog) && !empty($sales_serviceLog) && !empty($complaint) && !empty($Bdevice_serviceLog) && !empty($tsdate) && !empty($serviceStatus)) {

    $crud->update_Service($id,$service_id, $device_serviceLog, $sales_serviceLog,$complaint,$Bdevice_serviceLog,$serviceStatus,$tsdate);
    $crud->redirect_to("/?page=serviceRequest");
}//end of innerif
    else{
      
       $crud->redirect_to("/?page=serviceLogEdit");
       
   }//end of else 

}


?>


