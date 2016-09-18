<?php

class VechilesCRUD extends AreaApplication
{

    
    /*
    Area Table Function
    */
    public function vechiles_no_of_rows() {
        $sql = mysql_query("SELECT * FROM vechiles");
        $count = mysql_num_rows($sql);
        return $count;
    }

    // function for create vechile
    public function create_vechiles($v_id,$v_lic,$lic_issue,$lic_exp, $v_type,$miles)
    {
        $IndexNo = $this->vechiles_no_of_rows();
        mysql_query("INSERT INTO vechiles(v_id,v_lic,lic_issue,lic_exp,v_type,miles) VALUES ('$v_id','$v_lic','$lic_issue','$lic_exp','$v_type','$miles')");
    }
     public function NotInDriver()
    {
        return mysql_query("SELECT v.v_id FROM vechiles v where v.v_id NOT IN(SELECT d.v_id from driver d) ");
    }

   public function notbookedVehicles()
    {

        return mysql_query("SELECT v.v_id FROM vechiles v where v.v_id NOT IN(SELECT b.vec_id from booking b) ");
    }


       public function NotInRepair()
    {
        return mysql_query("SELECT v.v_id FROM vechiles v where v.v_id NOT IN(SELECT r.vr_id from vrepair r) ");
    }


    public function getVechilesIDList(){
        return mysql_query("SELECT v_id From vechiles");
    }

    // function for read area
    public function read_vechiles()
    {
        return mysql_query("SELECT * FROM vechiles ORDER BY v_id ASC");
    }

    //function to read specific rows in the table
    public function read_specific($v_id)
    {
        return mysql_query("SELECT * FROM vechiles WHERE v_id=". $v_id);
    }
  

     // function for read area with limits test
    public function w2($page, $perpage)
    {
        //$limit = "LIMIT ".($page-1)*$perpage." , $perpage";
        return mysql_query("SELECT * FROM vechiles ORDER BY v_type ASC ");
    }


    // function for delete area
    public function delete_vechiles($v_id)
    {
        mysql_query("DELETE FROM vechiles WHERE v_id ='" . $v_id."'");
    }

    // function for update area
    public function update_vechiles($v_id,$v_lic,$lic_issue,$lic_exp, $v_type,$miles)
    {

       mysql_query("UPDATE vechiles SET v_lic='$v_lic',lic_issue='$lic_issue',lic_exp='$lic_exp' , v_type = '$v_type' ,miles='$miles' WHERE v_id= '" . $v_id."'");
       //UPDATE vechiles SET v_id='v0014' , v_type='bus' where v_id='v006'
    }


    public function getTotalVechilesRecords(){
        $totalRecords = mysql_query("Select count(*) from `{$this->_table_area}`");
        return $totalRecords;
    }

    //get record from database and show
    public function getRecordsandShow()
    {
        $paginator = new Paginator();
       
        $paginator->total = $this->getTotalVechilesRecords();
        $paginator->paginate();
        $records = mysql_query("SELECT * from table LIMIT ($paginator->currentPage-1)*$paginator->itemsPerPage,  $paginator->itemsPerPage") ;


        echo $paginator->pageNumbers();
        echo $paginator->itemsPerPage();
    }

}
?>




