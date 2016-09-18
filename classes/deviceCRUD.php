<?php
class deviceCRUD extends Application
{
   public function redirect_to($new_location){ //This is to redirect to another page
        header("Location: " . $new_location); 
        exit;
    }    

    // function for adding device
    public function add_device($deviceModel, $macAddress, $regDate)
    {



            $res=mysql_query("SELECT max(deviceId)+1 as Count from device");
            $row=mysql_fetch_array($res);
           // $COUNT=0;
            if( $row['Count']<=0){
                $COUNT=0+1;
            }else{
                $COUNT=$row['Count'];}


        mysql_query("INSERT INTO device(deviceId, deviceModel, macAddress, registeredDate) VALUES ('$COUNT', '$deviceModel','$macAddress','$regDate')");
    }

    

       public function assign_device($device_idLog, $sales_repLog, $dateAssign)
    {
       // $sales_repId=mysql_query("SELECT IndexNo from employee where userId =". $sales_repLog);
        mysql_query("insert into devicelog values('$device_idLog','$sales_repLog','$dateAssign')");
    }

    public function service_device($service_id, $device_serviceLog, $sales_serviceLog,$complaint,$Bdevice_serviceLog,$serviceStatus,$tsdate)
    {
        $res=mysql_query("SELECT max(serviceId)+1 as Count from servicelog");
        $row=mysql_fetch_array($res);

        if( $row['Count']<=0){
            $COUNT=0+1;
        }else{
            $COUNT=$row['Count'];}
         mysql_query("INSERT into servicelog values('$COUNT','$device_serviceLog','$sales_serviceLog','$complaint','$Bdevice_serviceLog','$serviceStatus','$tsdate')");
         mysql_query("INSERT into devicelog values('$Bdevice_serviceLog','$sales_serviceLog','$tsdate')");
        
    }

    
 

     // function for read device
    public function read_device()
    {
        return mysql_query("SELECT * FROM device ORDER BY deviceId");
    }

        public function read_deviceLog() // to read all from device log
    {
        return mysql_query("Select d.deviceId,d.dateAssigned,d.emp_index,e.name,e.userId from employee e,devicelog d where e.IndexNo in (Select d.emp_index from devicelog)");
    }


    public function read_servicelog() // to read all from device log
    {
        return mysql_query("SELECT * FROM servicelog");
    }
        public function read_empTable()
    {
        return mysql_query("SELECT * FROM employee ORDER BY IndexNo");
    }

    public function read_alldeviceLog() // to read all from device log
    {
        return mysql_query("SELECT * from employee e,devicelog d where e.IndexNo in (Select d.emp_index from devicelog) ORDER BY deviceId");
    }

  
    public function notAssigned() // to read all from device which is not assigned
    {
        return mysql_query("SELECT d.deviceId,d.deviceModel FROM device d WHERE d.deviceId NOT IN (SELECT l.deviceId from devicelog l)");
    }

    public function notAssignedCat() // to read all from device which is not assigned
    {
        return mysql_query("SELECT DISTINCT d.deviceModel FROM device d WHERE d.deviceId NOT IN (SELECT l.deviceId from devicelog l)");
    }

    // function for remove_device
    public function remove_device($deviceId)
    {
        mysql_query("DELETE FROM device WHERE deviceId =" . $deviceId);
    }

    public function removeAssigned_device($deviceId)
    {
        mysql_query("DELETE FROM devicelog WHERE deviceId =" . $deviceId);
    }
    

    public function remove_Service($serviceId)
    {
        mysql_query("DELETE FROM servicelog WHERE serviceId =" . $serviceId);
    }




    // function for update_device
    public function update_device($id,$deviceId, $deviceModel, $macAddress, $regDate)
    {

       mysql_query("UPDATE device SET deviceId = '$deviceId', deviceModel = '$deviceModel', macAddress = '$macAddress', registeredDate = '$regDate' WHERE deviceId=" . $id);
    }
    public function update_deviceAssign($id,$deviceid,$sales_repLog,$dateAssign)
    {

       mysql_query("UPDATE devicelog SET deviceId = '$deviceid', emp_index = '$sales_repLog', dateAssigned = '$dateAssign' WHERE deviceId=" . $id);
    }

        public function update_Service($id,$service_id, $device_serviceLog, $sales_serviceLog,$complaint,$Bdevice_serviceLog,$serviceStatus,$tsdate)
    {

       mysql_query("UPDATE servicelog SET serviceId = '$service_id', deviceId = '$device_serviceLog', salesRepId = '$sales_serviceLog', complaint = '$complaint', backupdeviceId = '$Bdevice_serviceLog', serviceStatus = '$serviceStatus', dateService = '$tsdate' WHERE serviceId=" . $id);
        mysql_query("UPDATE devicelog SET deviceId = '$Bdevice_serviceLog', emp_index = '$sales_serviceLog', dateAssigned = '$tsdate' WHERE deviceId=" . $id);
    }


    public function getDeviceEqCat($catMod) // to read all from device which is not assigned
    {
        $res = mysql_query("SELECT d.deviceId FROM device d WHERE d.deviceModel LIKE '$catMod' and d.deviceId NOT IN (SELECT l.deviceId from devicelog l)") ;
        $rows = array();
        while($r = mysql_fetch_assoc($res)) {
            $rows[] = $r;
        }
        return $rows;
    }

    public function getDeviceLogEqCat($devMod) // to read all from device which is not assigned
    {
        $res = mysql_query("SELECT DISTINCT d.deviceId from devicelog d WHERE d.emp_index =$devMod and d.deviceId NOT IN (SELECT s.deviceId from servicelog s) ORDER BY d.deviceId") ;
        $rows = array();
        while($r = mysql_fetch_assoc($res)) {
            $rows[] = $r;
        }
        return $rows;
    }

    public function read_allSdeviceLog() // to read all from device log
    {
        return mysql_query("SELECT DISTINCT e.name,e.IndexNo from employee e,devicelog d where e.IndexNo=d.emp_index");
    }




}
?>




