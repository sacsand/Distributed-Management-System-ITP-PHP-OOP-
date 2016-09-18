<?php
class employeeCRUD extends Application
{
   public function redirect_to($new_location){ //This is to redirect to another page
        header("Location: " . $new_location); 
        exit;
    }    
    /*
    Area Table Function
    */
   /* public function area_no_of_rows() {
        $sql = mysql_query("SELECT * FROM area");
        $count = mysql_num_rows($sql);
        return $count;
    }*/

    // function for adding device



 public function add_employee($employee_id, $employeeName, $username, $password, $emptype, $tddate,$tid)
    {

        mysql_query("INSERT INTO employee(userId, name, username, password, type, StartDate,active,teretoryId) VALUES ('$employee_id', '$employeeName', '$username', '$password', '$emptype', '$tddate','1','$tid')
");
    }




public function add_request($reqDate,$leaveType,$leaveFrom,$leaveTo,$Reason,$UserId)
    {

        mysql_query("INSERT INTO radiant.leave(reqDate,leaveType,leaveFrom,leaveTo,Reason,UserId) VALUES ('$reqDate','$leaveType','$leaveFrom','$leaveTo','$Reason','$UserId')
");
        }


 
    

       public function assign_device($device_idLog, $sales_repLog, $dateAssign)
    {
       // $sales_repId=mysql_query("SELECT IndexNo from employee where userId =". $sales_repLog);
        mysql_query("insert into devicelog values('$device_idLog','$sales_repLog','$dateAssign')");
    }

    public function service_device($service_id, $device_serviceLog, $sales_serviceLog,$complaint,$Bdevice_serviceLog,$serviceStatus,$tsdate)
    {
         mysql_query("INSERT into servicelog values('$service_id','$device_serviceLog','$sales_serviceLog','$complaint','$Bdevice_serviceLog','$serviceStatus','$tsdate')");
         //INSERT into servicelog values(2,2,1,'moon is compainin',2,'Inservice','21-5-2015')
    }

public function checkUser($username){
    $result= mysqli_query("SELECT count(*) FROM employee WHERE username='$username'");
     $username_exist = mysqli_num_rows($results);
     return $username_exist; //total records
}
    
    /*
    public function getAreaIDList(){
        return mysql_query("SELECT AreaId From area");
    }

    */ // function for read device
    public function read_employee()
    {
        return mysql_query("SELECT * FROM employee ORDER BY userId");
    }

     public function read_territory()
    {
        return mysql_query("SELECT * FROM teretory ORDER BY IndexNo");
    }



public function  read_login()
     {
         return mysql_query("SELECT * FROM login_info ORDER BY id");
     }

        public function add_login($username) // to read all from device log
    {
        mysql_query("INSERT INTO login_info(username,success) VALUES ('$username','1')
");
    }


public function  get_territoryName()
{
   // $na=$_SESSION[self::$_login_front];
     return mysql_query("SELECT TeretoryName FROM teretory where TeretoryId = (SELECT teretoryId from employee where userId='".$_SESSION[self::$_login_front]."')");
}


/*
    //function to read specific rows in the table
    public function read_specific($IndexNo)
    {
        return mysql_query("SELECT * FROM area WHERE IndexNo=". $IndexNo);
    }
  

     // function for read area with limits test
    public function w2($page, $perpage)
    {
        //$limit = "LIMIT ".($page-1)*$perpage." , $perpage";
        return mysql_query("SELECT * FROM area ORDER BY AreaName ASC ");
    }

*/
    // function for remove_device
    public function remove_employee($employeeId)
    {
        mysql_query("DELETE FROM employee WHERE IndexNo =" . $employeeId);
    }

    public function change_employee($id)
    {
        mysql_query("UPDATE employee SET active='0' WHERE IndexNo = ".$id);
    }

    public function change2_employee($id)
    {
        mysql_query("UPDATE employee SET active='1' WHERE IndexNo = ".$id);
    }
    

    public function remove_Service($serviceId)
    {
        mysql_query("DELETE FROM servicelog WHERE serviceId =" . $serviceId);
    }




    public function update_employee($id,$employee_id, $employeeName, $username, $password, $emptype, $tddate)
    {

       mysql_query("UPDATE employee SET userId = '$employee_id', name = '$employeeName', username = '$username', password = '$password', type = '$emptype', StartDate = '$tddate' WHERE IndexNo = $id" );
    }
   public function getteretoryId()
   {

   }
    


/*

    public function getTotalAreaRecords(){
        $totalRecords = mysql_query("Select count(*) from `{$this->_table_area}`");
        return $totalRecords;
    }

    //get record from database and show
    public function getRecordsandShow()
    {
        $paginator = new Paginator();
       
        $paginator->total = $this->getTotalAreaRecords();
        $paginator->paginate();
        $records = mysql_query("SELECT * from table LIMIT ($paginator->currentPage-1)*$paginator->itemsPerPage,  $paginator->itemsPerPage") ;


        echo $paginator->pageNumbers();
        echo $paginator->itemsPerPage();
    }

}*/


    public function read_area()
    {
        return mysql_query("SELECT * FROM area ORDER BY IndexNo");
    }


    public function read_salesrep()
    {
        return mysql_query("SELECT * FROM employee WHERE type='Sales_Rep' ORDER BY userId");
    }


    public function read_areamanager()
    {
        return mysql_query("SELECT * FROM employee WHERE type='Area_Manager' ORDER BY userId");
    }

    public function read_user()
    {
        return mysql_query("SELECT * FROM employee WHERE teretoryId='NULL' ORDER BY userId");
    }
    public function edit_Sales_get_details($id)
    {

        return mysql_query("SELECT * FROM employee WHERE IndexNo ='$id'");
    }

    public function checkUsers($username){

        $result= mysql_query("SELECT count(IndexNo) as users FROM employee WHERE username='$username'");
        $query3 = mysql_fetch_array($result);
        $ter = $query3['users'];
        return $ter;
    }

    public function getName($id){

        $result= mysql_query("SELECT username  FROM employee WHERE IndexNo='$id'");
        $query3 = mysql_fetch_array($result);
        $ter = $query3['username'];
        return $ter;
    }

    public function checkArea($areaId){

        $result= mysql_query("SELECT count(IndexNo) as countt FROM employee WHERE teretoryId ='$areaId'");
        $query3 = mysql_fetch_array( $result);
        $ter = $query3['countt'];

        return $ter;
    }
}
?>




