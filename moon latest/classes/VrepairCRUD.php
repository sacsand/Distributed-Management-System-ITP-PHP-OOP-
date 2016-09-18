<?php

class VrepairCRUD extends AreaApplication
{

   

    public function vrepair_no_of_rows() {
        $sql = mysql_query("SELECT * FROM vrepair");
        $count = mysql_num_rows($sql);
        return $count;
    }

    // function for create route
    public function create_vrepair($vr_id, $vr_type, $vr_cost, $vr_date)
    {
    
        mysql_query("INSERT INTO vrepair (vr_id, vr_type,vr_cost,vr_date) VALUES ('$vr_id', '$vr_type','$vr_cost','$vr_date')");
    }

    // function for read route
    public function read_vrepair()
    {
        return mysql_query("SELECT * FROM vrepair ORDER BY vr_id ASC");
    }

    //function to read specific rows in the table
    public function read_specific_vrepair($vr_id)
    {
        return mysql_query("SELECT * FROM vrepair WHERE vr_id=". $vr_id);
    }
  

     // function for read territory with limits test
    public function vrepair_limits($page, $perpage)
    {
        //$limit = "LIMIT ".($page-1)*$perpage." , $perpage";
        return mysql_query("SELECT * FROM vrepair ORDER BY vr_id ASC ");
    }


    // function for delete route
    public function delete_vrepair($vr_id)
    {
        mysql_query("DELETE FROM vrepair WHERE vr_id ='" . $vr_id."'");
    }

    // function for update route
    public function update_vrepair($vr_id, $vr_type, $vr_cost,$vr_date)
    {
       mysql_query("UPDATE vrepair SET vr_id = '$vr_id', vr_type = '$vr_type', vr_cost= '$vr_cost',vr_date='$vr_date' WHERE vr_id='" . $vr_id."'");
    }

    public function count_vrepair()
    {
        $cnt = mysql_query("SELECT COUNT(vrepair) FROM `{$this->_table_route}` ");

        return $cnt;
    }

    public function getTotalvrepairRecords(){
        $totalRecords = mysql_query("Select count(*) from `{$this->_table_route}`");
        return $totalRecords;
    }

    //get record from database and show
    public function getRecordsandShow()
    {
        $paginator = new Paginator();
       
        $paginator->total = $this->getTotalvrepairRecords();
        $paginator->paginate();
        $records = mysql_query("SELECT * from table LIMIT ($paginator->currentPage-1)*$paginator->itemsPerPage,  $paginator->itemsPerPage") ;


        echo $paginator->pageNumbers();
        echo $paginator->itemsPerPage();
    }

}
?>