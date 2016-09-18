<?php

class DriverCRUD extends AreaApplication
{

    /*
    Territory Table Functions
    */

    public function driver_no_of_rows() {
        $sql = mysql_query("SELECT * FROM driver");
        $count = mysql_num_rows($sql);
        return $count;
    }

    // function for create Territory
    public function create_driver($d_id, $d_name,$lic_no,$lic_issue,$lic_exp, $v_id)
    {
        mysql_query("INSERT INTO driver(d_id,d_name,lic_no,lic_issue,lic_exp,v_id) VALUES('$d_id','$d_name','$lic_no','$lic_issue','$lic_exp','$v_id')");
        
    }
   

    public function getDriverIDList(){
        return mysql_query("SELECT d_id From driver");
    }

    public function getemployeeList(){
        return mysql_query("SELECT e.userId,e.username From employee e where e.type='Driver' and e.userId NOT IN (SELECT d.d_id from driver d)");
    }


    // function for read territory
    public function read_driver()
    {
        return mysql_query("SELECT * FROM driver ORDER BY d_id ASC");
    }

    //function to read specific rows in the table
    public function read_specific_driver($d_id)
    {
        return mysql_query("SELECT * FROM driver WHERE d_id)=". $d_id);
    }
  

     // function for read territory with limits test
    public function driver_limits($page, $perpage)
    {
        //$limit = "LIMIT ".($page-1)*$perpage." , $perpage";
        return mysql_query("SELECT * FROM driver ORDER BY d_Name ASC ");
    }


    // function for delete territory
    public function delete_driver($d_id)
    {
        mysql_query("DELETE FROM driver WHERE d_id ='" . $d_id."'");
    }

    // function for update territory
    public function update_driver($d_id, $d_name,$lic_no,$lic_issue,$lic_exp,$v_id)
    {
       mysql_query("UPDATE driver SET d_id = '$d_id', d_name = '$d_name',lic_no='$lic_no',lic_issue='$lic_issue',lic_exp='$lic_exp', v_id= '$v_id' WHERE d_id='" . $d_id ."'");
    }

    public function count_driver()
    {
        $cnt = mysql_query("SELECT COUNT(d_id) FROM `{$this->_table_teretory}` ");

        return $cnt;
    }

    public function getTotalDriverRecords(){
        $totalRecords = mysql_query("Select count(*) from `{$this->_table_territory}`");
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

}
?>