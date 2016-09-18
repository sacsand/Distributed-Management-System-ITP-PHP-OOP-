<?php

$crud = new employeeCRUD();

if(!empty($_POST["username"])) {

  $results = $crud->checkUser( $username);
  $username = $_POST['username'] ;
 $results = $crud->checkUser( $username);
    
    //if value is more than 0, username is not available
    if($result>0) {
        echo 0;
    }else{
        echo 1;
}
}
if(isset($_POST['save'])) {

    $employee_id = isset($_POST['employee_id']) ? $_POST['employee_id'] : "";

    $employeeName = isset($_POST['employeeName']) ? $_POST['employeeName'] : "";

    $username = isset($_POST['username']) ? $_POST['username'] : "";

    $password = isset($_POST['password']) ? $_POST['password'] : "";

    $password2 = isset($_POST['password2']) ? $_POST['password2'] : "";

    $emptype = isset($_POST['Etype']) ? $_POST['Etype'] : "";


    $tddate = isset($_POST['tddate']) ? $_POST['tddate'] : "";
    $tid = isset($_POST['territoryList']) ? $_POST['territoryList'] : "";

    $results = $crud->checkUsers($username);

    //if value is more than 0, username is not available


    if ($results == 0) {

        if (!empty($employee_id) && !empty($employeeName) && !empty($username) && !empty($password) && !empty($password2) && !empty($emptype) && !empty($tddate) && !empty($tid)) {
            // insert
            $crud->add_employee($employee_id, $employeeName, $username, $password, $emptype, $tddate, $tid);
            $crud->redirect_to("/?page=employee/ehomeuser");
            //header("Location:/?page=employee/deviceManagement");
        } else {
            //validation
            //$error = "Please Insert Something" ;
            $crud->redirect_to("/?page=employee/ehomeuser");
            //  header("Location:/?page=employee/deviceAdd");
        }
    }else{
        $crud->redirect_to("/?page=employee/ehomeuser");

    }
}

if(isset($_POST['save_sales']))
{



    $employee_id = isset($_POST['employee_id']) ? $_POST['employee_id'] : "";

    $employeeName = isset($_POST['employeeName']) ? $_POST['employeeName'] : "";

    $username = isset($_POST['username']) ? $_POST['username'] : "";

    $password = isset($_POST['password']) ? $_POST['password'] : "";

    $password2 = isset($_POST['password2']) ? $_POST['password2'] : "";

    $emptype = isset($_POST['Etype']) ? $_POST['Etype'] : "";


    $tddate = isset($_POST['tddate']) ? $_POST['tddate'] : "";
    $tid=isset($_POST['territoryList']) ? $_POST['territoryList'] : "";

    $results = $crud->checkUsers($username);
    $areaExit = $crud->checkArea($tid);

    //if value is more than 0, username is not available

    if($results==0 ) {
        if($areaExit==0) {


            if (!empty($employee_id) && !empty($employeeName) && !empty($username) && !empty($password) && !empty($password2) && !empty($emptype) && !empty($tddate) && !empty($tid)) {
                // insert
                $crud->add_employee($employee_id, $employeeName, $username, $password, $emptype, $tddate, $tid);
                $crud->redirect_to("/?page=employee/ehomesalesrep");
                //header("Location:/?page=employee/deviceManagement");
            } else {
                //validation
                //$error = "Please Insert Something" ;
                $crud->redirect_to("/?page=employee/ehomesalesrep");
                //  header("Location:/?page=employee/deviceAdd");
            }
        }else{

            $crud->redirect_to("/?page=employee/ehomesalesrep");
        }
    }else{

        $crud->redirect_to("/?page=employee/ehomesalesrep&user=".$username);
        //


    }


}



if(isset($_POST['save_area']))
{



    $employee_id = isset($_POST['employee_id']) ? $_POST['employee_id'] : "";

    $employeeName = isset($_POST['employeeName']) ? $_POST['employeeName'] : "";

    $username = isset($_POST['username']) ? $_POST['username'] : "";

    $password = isset($_POST['password']) ? $_POST['password'] : "";

    $password2 = isset($_POST['password2']) ? $_POST['password2'] : "";

    $emptype = isset($_POST['Etype']) ? $_POST['Etype'] : "";


    $tddate = isset($_POST['tddate']) ? $_POST['tddate'] : "";
    $tid=isset($_POST['territoryList']) ? $_POST['territoryList'] : "";

    $results = $crud->checkUsers($username);
    $areaExit = $crud->checkArea($tid);

    //if value is more than 0, username is not available

    if($results==0 ) {
        if($areaExit==0) {


            if (!empty($employee_id) && !empty($employeeName) && !empty($username) && !empty($password) && !empty($password2) && !empty($emptype) && !empty($tddate) && !empty($tid)) {
                // insert
                $crud->add_employee($employee_id, $employeeName, $username, $password, $emptype, $tddate, $tid);
                $crud->redirect_to("/?page=employee/ehomearea");
                //header("Location:/?page=employee/deviceManagement");
            } else {
                //validation
                //$error = "Please Insert Something" ;
                $crud->redirect_to("/?page=employee/ehomearea");
                //  header("Location:/?page=employee/deviceAdd");
            }
        }else{

            $crud->redirect_to("/?page=employee/ehomearea");
        }
    }else{

        $crud->redirect_to("/?page=employee/ehomearea&user=".$username);
        //


    }


}

if(isset($_GET['rem_id'])) //For removing when the deletebutton is clicked
{
    $id = $_GET['rem_id'];
    $crud->remove_employee($id);
    $crud->redirect_to("/?page=employee/ehomeuser");
}
//remService_id

if(isset($_GET['remService_id'])) //For removing when the deletebutton is clicked
{
    $id = $_GET['remService_id'];
    $crud->remove_Service($id);
    $crud->redirect_to("/?page=employee/serviceRequest");
}

if(isset($_GET['act_id'])) //For removing when the deletebutton is clicked
{
    $id = $_GET['act_id'];
    $crud->change_employee($id);
    $crud->redirect_to("/?page=employee/ehomeuser");
}

if(isset($_GET['Inact_id'])) //For removing when the deletebutton is clicked
{
    $id = $_GET['Inact_id'];
    $crud->change2_employee($id);
    $crud->redirect_to("/?page=employee/ehomeuser");
}

if(isset($_POST['update']))//For Editing when the editbutton is clicked
{

    $id = $_GET['edit_Id'];
    /*form validation can be done here*/
    $employee_id = isset($_POST['employee_id']) ? $_POST['employee_id'] : "";
    //$device_id = $_POST['device_id'];
    $employeeName = isset($_POST['employeeName']) ? $_POST['employeeName'] : "";
    //$device_model = $_POST['device_model'];
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    //$device_id = $_POST['device_id'];
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    //$device_id = $_POST['device_id'];
    $password2 = isset($_POST['password2']) ? $_POST['password2'] : "";
    //$device_id = $_POST['device_id'];
    $emptype = isset($_POST['Etype']) ? $_POST['Etype'] : "";
    //$device_id = $_POST['device_id'];

    $tddate = isset($_POST['tddate']) ? $_POST['tddate'] : "";
    //$tddate = $_POST['tddate'];
    //$area_real_id = str_pad($area_id, 4, "A", STR_PAD_LEFT);

    //echo $id ,$employee_id, $employeeName, $username, $password, $password2, $emptype, $tddate;
    $results = $crud->checkUsers($username);
    $pUsername = $crud->getName($id);

    if($pUsername==$username ) {
        if (!empty($employee_id) && !empty($employeeName) && !empty($username) && !empty($password) && !empty($password2) && !empty($emptype) && !empty($tddate)) {

            $crud->update_employee($id, $employee_id, $employeeName, $username, $password, $emptype, $tddate);
            $crud->redirect_to("/?page=employee/ehomeuser");
        }else{

            $crud->redirect_to("/?page=employee/ehomeuser");
        }
    } else if($pUsername!=$username && $results==0) {

            if (!empty($employee_id) && !empty($employeeName) && !empty($username) && !empty($password) && !empty($password2) && !empty($emptype) && !empty($tddate)) {

                $crud->update_employee($id, $employee_id, $employeeName, $username, $password, $emptype, $tddate);
                $crud->redirect_to("/?page=employee/ehomeuser");
            }else{

                $crud->redirect_to("/?page=employee/ehomeuser");
            }


        } else{
        $crud->redirect_to("/?page=employee/ehomeuser");
    }
}


if(isset($_POST['update_salesrep']))//For Editing when the editbutton is clicked
{

  $id = $_GET['edit_Id'];
    /*form validation can be done here*/
    $employee_id = isset($_POST['employee_id']) ? $_POST['employee_id'] : "";
    //$device_id = $_POST['device_id'];
     $employeeName = isset($_POST['employeeName']) ? $_POST['employeeName'] : "";
    //$device_model = $_POST['device_model'];
      $username = isset($_POST['username']) ? $_POST['username'] : "";
    //$device_id = $_POST['device_id'];
      $password = isset($_POST['password']) ? $_POST['password'] : "";
    //$device_id = $_POST['device_id'];
       $password2 = isset($_POST['password2']) ? $_POST['password2'] : "";
    //$device_id = $_POST['device_id'];
      $emptype = isset($_POST['Etype']) ? $_POST['Etype'] : "";
    //$device_id = $_POST['device_id'];
 
     $tddate = isset($_POST['tddate']) ? $_POST['tddate'] : "";
    //$tddate = $_POST['tddate'];
    //$area_real_id = str_pad($area_id, 4, "A", STR_PAD_LEFT);

    $results = $crud->checkUsers($username);
    $pUsername = $crud->getName($id);


if($pUsername==$username ) {

   // echo $id ,$employee_id, $employeeName, $username, $password, $password2, $emptype, $tddate;
 if (!empty($employee_id) && !empty($employeeName) && !empty($username) && !empty($password) && !empty($password2) && !empty($emptype) && !empty($tddate)) {
     
    $crud->update_employee($id,$employee_id, $employeeName, $username, $password,$emptype, $tddate);
    $crud->redirect_to("/?page=employee/ehomesalesrep");
}    else{
        $crud->redirect_to("/?page=employee/ehomesalesrep");
    }//end of else
}else if($pUsername!=$username && $results==0){

    if (!empty($employee_id) && !empty($employeeName) && !empty($username) && !empty($password) && !empty($password2) && !empty($emptype) && !empty($tddate)) {

        $crud->update_employee($id,$employee_id, $employeeName, $username, $password,$emptype, $tddate);
        $crud->redirect_to("/?page=employee/ehomesalesrep");
    }    else{
        $crud->redirect_to("/?page=employee/ehomesalesrep");
    }//end of else

}else{
         $crud->redirect_to("/?page=employee/ehomesalesrep");

}

}



if(isset($_POST['update_area']))//For Editing when the editbutton is clicked
{

    $id = $_GET['edit_Id'];
    /*form validation can be done here*/
    $employee_id = isset($_POST['employee_id']) ? $_POST['employee_id'] : "";
    //$device_id = $_POST['device_id'];
    $employeeName = isset($_POST['employeeName']) ? $_POST['employeeName'] : "";
    //$device_model = $_POST['device_model'];
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    //$device_id = $_POST['device_id'];
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    //$device_id = $_POST['device_id'];
    $password2 = isset($_POST['password2']) ? $_POST['password2'] : "";
    //$device_id = $_POST['device_id'];
    $emptype = isset($_POST['Etype']) ? $_POST['Etype'] : "";
    //$device_id = $_POST['device_id'];

    $tddate = isset($_POST['tddate']) ? $_POST['tddate'] : "";
    //$tddate = $_POST['tddate'];
    //$area_real_id = str_pad($area_id, 4, "A", STR_PAD_LEFT);

    $results = $crud->checkUsers($username);
    $pUsername = $crud->getName($id);

    if($pUsername==$username ) {
        if (!empty($employee_id) && !empty($employeeName) && !empty($username) && !empty($password) && !empty($password2) && !empty($emptype) && !empty($tddate)) {

            $crud->update_employee($id, $employee_id, $employeeName, $username, $password, $emptype, $tddate);
            $crud->redirect_to("/?page=employee/ehomearea");
        }else{

            $crud->redirect_to("/?page=employee/ehomearea");
        }
    } else if($pUsername!=$username && $results==0) {

        if (!empty($employee_id) && !empty($employeeName) && !empty($username) && !empty($password) && !empty($password2) && !empty($emptype) && !empty($tddate)) {

            $crud->update_employee($id, $employee_id, $employeeName, $username, $password, $emptype, $tddate);
            $crud->redirect_to("/?page=employee/ehomearea");
        }else{

            $crud->redirect_to("/?page=employee/ehomearea");
        }


    } else{
        $crud->redirect_to("/?page=employee/ehomearea");
    }

}


if(isset($_POST['request']))//For Editing when the editbutton is clicked
{
    /*form validation can be done here*/
    $reason = isset($_POST['resonText']) ? $_POST['resonText'] : "";
    $empid= $_SESSION[Login::$_login_front];
    //$device_id = $_POST['device_id'];
   if  (!empty($reason)) {
       
    $crud->add_request($empid, $reason );
    $crud->redirect_to("/?page=employee/leaveRequest");

}

}
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
        $crud->redirect_to("/?page=employee/assignedDevices");

    }
    else{

        $crud->redirect_to("/?page=employee/assigndevices");

    }
}

if(isset($_POST['updateAssign']))//For Editing when the editbutton is clicked
{
    $id = $_GET['editDeviceId'];
    $device_idLog = $_POST['device_idLog'] ;
    
     $sales_repLog = $_POST['sales_repLog'];

     $dateAssign = $_POST['dateAssign'];

  if (!empty($device_idLog) && !empty($sales_repLog) && !empty($dateAssign) && !empty($id)) {

    $crud->update_deviceAssign($id,$sales_repLog,$dateAssign);
    $crud->redirect_to("/?page=employee/assignedDevices");
}//end of innerif
    else{
        
        $crud->redirect_to("/?page=employee/assigndevices");
      //  header("Location:/?page=employee/deviceAdd");
    }//end of else 

}


if(isset($_GET['remAssign_id'])) //For removing when the deletebutton is clicked
{
    $id = $_GET['remAssign_id'];
    $crud->removeAssigned_device($id);
    $crud->redirect_to("/?page=employee/assignedDevices");
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
    $crud->redirect_to("/?page=employee/serviceRequest");
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
        $crud->service_device($service_id, $device_serviceLog, $sales_serviceLog,$complaint,$Bdevice_serviceLog,$serviceStatus,$tsdate);
        $crud->redirect_to("/?page=employee/serviceRequest");

    }
  


    if(isset($_POST['serviceUpdate']))//For Editing when the editbutton is clicked
{
    $id = $_GET['editServiceId666666'];
    $service_id = $_POST['service_id'] ;
    
     $device_serviceLog = $_POST['device_serviceLog'];

     $sales_serviceLog = $_POST['sales_serviceLog'];

     $complaint = isset($_POST['complaint']) ? $_POST['complaint'] : "";
     $Bdevice_serviceLog = $_POST['Bdevice_serviceLog'];
     $tsdate = $_POST['dateService'];
     $serviceStatus = $_POST['serviceStatus'];



  if (!empty($service_id) && !empty($device_serviceLog) && !empty($sales_serviceLog) && !empty($complaint) && !empty($Bdevice_serviceLog) && !empty($tsdate) && !empty($serviceStatus)) {

    $crud->update_Service($service_id, $device_serviceLog, $sales_serviceLog,$complaint,$Bdevice_serviceLog,$serviceStatus,$tsdate);
    $crud->redirect_to("/?page=employee/serviceRequest");
}//end of innerif
    else{
        
        $crud->redirect_to("/?page=employee/serviceLogEdit");
       
    }//end of else 

}







?>


