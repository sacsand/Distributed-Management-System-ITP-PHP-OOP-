<?php

class BookingCRUD extends AreaApplication
{

   

    public function booking_no_of_rows() {
        $sql = mysql_query("SELECT * FROM booking");
        $count = mysql_num_rows($sql);
        return $count;
    }

    // function for create route
    public function create_booking($booking_id, $vec_id, $driv_id, $rout_id)
    {
    
        mysql_query("INSERT INTO booking (booking_id, vec_id,driv_id,rout_id) VALUES ('$booking_id', '$vec_id','$driv_id','$rout_id')");
    }

    public function notbookedDriver()
    {

        return mysql_query("SELECT d.d_id FROM driver d where d.d_id NOT IN(SELECT b.driv_id from booking b) ");
    }
  
    // function for read route
    public function read_booking()
    {
        return mysql_query("SELECT * FROM booking ORDER BY booking_id ASC");
    }

    //function to read specific rows in the table
    public function read_specific_booking($booking_id)
    {
        return mysql_query("SELECT * FROM booking WHERE booking_id='". $booking_id."'");
    }
  

     // function for read territory with limits test
    public function booking_limits($page, $perpage)
    {
        //$limit = "LIMIT ".($page-1)*$perpage." , $perpage";
        return mysql_query("SELECT * FROM booking ORDER BY booking_id ASC ");
    }


    // function for delete route
    public function delete_booking($booking_id)
    {
        mysql_query("DELETE FROM booking WHERE booking_id ='" . $booking_id."'");
    }

    // function for update route
    public function update_booking($booking_id, $vec_id, $driv_id,$rout_id)
    {
       mysql_query("UPDATE booking SET booking_id = '$booking_id', vec_id = '$vec_id', driv_id= '$driv_id',rout_id='$rout_id' WHERE booking_id='" . $booking_id."'");
    }

    public function count_booking()
    {
        $cnt = mysql_query("SELECT COUNT(booking) FROM `{$this->_table_route}` ");

        return $cnt;
    }

    public function getTotalbookingRecords(){
        $totalRecords = mysql_query("Select count(*) from `{$this->_table_route}`");
        return $totalRecords;
    }

    //get record from database and show
    public function getRecordsandShow()
    {
        $paginator = new Paginator();
       
        $paginator->total = $this->getTotalbookingRecords();
        $paginator->paginate();
        $records = mysql_query("SELECT * from table LIMIT ($paginator->currentPage-1)*$paginator->itemsPerPage,  $paginator->itemsPerPage") ;


        echo $paginator->pageNumbers();
        echo $paginator->itemsPerPage();
    }

}
?>