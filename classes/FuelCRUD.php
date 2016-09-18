<?php

class FuelCRUD extends AreaApplication
{

    /*
    Territory Table Functions
    */

    public function fuel_no_of_rows() {
        $sql = mysql_query("SELECT * FROM fuel");
        $count = mysql_num_rows($sql);
        return $count;
    }

    // function for create Territory
    public function create_fuel($index_no, $f_amount, $f_taken, $f_exp,$f_cost, $d_id,$v_id )
    {
        mysql_query("INSERT INTO fuel(index_no,f_amount,f_taken,f_exp,f_cost,d_id,v_id) VALUES('$index_no', '$f_amount', '$f_taken', '$f_exp','$f_cost', '$d_id','$v_id')");
        
    }

    public function getFuelIDList(){
        return mysql_query("SELECT index_no From fuel");
    }

    // function for read territory
    public function read_fuel()
    {
        return mysql_query("SELECT * FROM fuel ORDER BY index_no ASC");
    }

    //function to read specific rows in the table
    public function read_specific_fuel($index_no)
    {
        return mysql_query("SELECT * FROM fuel WHERE index_no)=". $index_no);
    }
  

     // function for read territory with limits test
    public function fuel_limits($page, $perpage)
    {
        //$limit = "LIMIT ".($page-1)*$perpage." , $perpage";
        return mysql_query("SELECT * FROM fuel ORDER BY f_amount ASC ");
    }


    // function for delete territory
    public function delete_fuel($index_no)
    {
        mysql_query("DELETE FROM fuel WHERE index_no ='" . $index_no."'");
    }

    // function for update territory
    public function update_fuel($index_no,$f_amount, $f_taken, $f_exp,$f_cost, $d_id,$v_id )
    {
       mysql_query("UPDATE fuel SET index_no='$index_no',f_amount = '$f_amount', f_taken = '$f_taken',f_exp='$f_exp',f_cost='$f_cost',d_id='$d_id', v_id= '$v_id' WHERE index_no='" . $index_no ."'");
    }

    public function count_fuel()
    {
        $cnt = mysql_query("SELECT COUNT(index_no) FROM `{$this->_table_teretory}` ");

        return $cnt;
    }

    public function getTotalFuelRecords(){
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