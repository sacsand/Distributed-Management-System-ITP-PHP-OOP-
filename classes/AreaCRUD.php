<?php

class AreaCRUD extends Application
{
    /*
    get ProductId List
    */
    public function getProductIDNameList(){
        return mysql_query("SELECT productId, name From product");
    }
    //

    /*
    Area Table Function
    */
    public function area_no_of_rows() {
        $sql = mysql_query("SELECT * FROM area");
        $count = mysql_num_rows($sql);
        return $count;
    }

    // function for create area
    public function create_area($AreaId, $AreaName)
    {
        $IndexNo = $this->area_no_of_rows() + 1;
        mysql_query("INSERT INTO area(IndexNo, AreaId, AreaName) VALUES ('$IndexNo', '$AreaId','$AreaName')");
    }

    public function getAreaNameIDList(){
        return mysql_query("SELECT AreaId, AreaName From area");
    }

    // function for read area
    public function read_areaname($area_id)
    {
        return mysql_query("SELECT AreaName FROM area WHERE AreaId = '$area_id' ");
    }

    // function for read area
    public function read_area()
    {
        return mysql_query("SELECT * FROM area ORDER BY AreaId ASC");
    }


     // function for read area with limits test
    public function w2($page, $perpage)
    {
        //$limit = "LIMIT ".($page-1)*$perpage." , $perpage";
        return mysql_query("SELECT * FROM area ORDER BY AreaName ASC ");
    }


    // function for delete area
    public function delete_area($IndexNo)
    {
        mysql_query("DELETE FROM area WHERE IndexNo =" . $IndexNo);
    }

    // function for update area
    public function update_area($IndexNo, $AreaId, $AreaName)
    {

       mysql_query("UPDATE area SET AreaId = '$AreaId', AreaName = '$AreaName' WHERE IndexNo=" . $IndexNo);
    }


    public function getTotalAreaRecords(){
        $totalRecords = mysql_query("Select count(*) from `{$this->_table_area}`");
        return $totalRecords;
    }


    /*//get record from database and show
    public function getRecordsandShow()
    {
        $paginator = new Paginator();

        $paginator->total = $this->getTotalAreaRecords();
        $paginator->paginate();
        $records = mysql_query("SELECT * from table LIMIT ($paginator->currentPage-1)*$paginator->itemsPerPage,  $paginator->itemsPerPage") ;


        echo $paginator->pageNumbers();
        echo $paginator->itemsPerPage();
    }
    */



    /*
    Territory Table Functions
    */

    public function territory_no_of_rows() {
        $sql = mysql_query("SELECT * FROM teretory");
        $count = mysql_num_rows($sql);
        return $count;
    }

    public function terr_for_area($area_id) {
        $sql = mysql_query("SELECT * FROM teretory WHERE AreaId = '$area_id'");
        $count = mysql_num_rows($sql);
        return $count;
    }

    public function getTerrNameIDList(){
        return mysql_query("SELECT TeretoryId, TeretoryName From teretory");
    }

    // function for create Territory
    public function create_territory($TerrId, $TerrName, $AreaId)
    {
        $IndexNo = $this->territory_no_of_rows() + 1;
        mysql_query("INSERT INTO teretory(IndexNo, TeretoryId, TeretoryName, AreaId) VALUES ('$IndexNo', '$TerrId','$TerrName', '$AreaId')");
    }

    public function getTerritoryIDList(){
        return mysql_query("SELECT TeretoryId From teretory");
    }

    // function for read territory
    public function read_territory()
    {
        return mysql_query("SELECT t.IndexNo,t.TeretoryId,t.TeretoryName,t.AreaId,a.AreaName FROM teretory t,area a WHERE t.AreaId=a.AreaId ORDER BY TeretoryId ASC");
    }

    //function to read specific rows in the table
    public function read_specific_territory($IndexNo)
    {
        return mysql_query("SELECT * FROM teretory WHERE IndexNo=". $IndexNo);
    }

    // function for delete territory
    public function delete_territory($IndexNo)
    {
        mysql_query("DELETE FROM teretory WHERE IndexNo =" . $IndexNo);
    }

    // function for update territory
    public function update_territory($IndexNo, $TerrId, $TerrName, $AreaId)
    {
       mysql_query("UPDATE teretory SET TeretoryId = '$TerrId', TeretoryName = '$TerrName', AreaId = '$AreaId' WHERE IndexNo= " . $IndexNo);
    }

    public function count_territory()
    {
        $cnt = mysql_query("SELECT COUNT(TeretoryId) FROM `{$this->_table_teretory}` ");

        return $cnt;
    }

    public function getTotalTerritoryRecords(){
        $totalRecords = mysql_query("Select count(*) from `{$this->_table_territory}`");
        return $totalRecords;
    }

    public function getTerrID($a_id)
    {

        $sql = mysql_query("SELECT TeretoryId FROM teretory WHERE AreaId = '$a_id'");
        $count = mysql_num_rows($sql);
        return $count;

    }


    Public function Get_areamanager_territory($username){
        $query = "select teretoryId from employee where username='$username'";
        $query2 = mysql_query($query);
        $query3 = mysql_fetch_array($query2);
        $ter = $query3['teretoryId'];
        return $ter;
    }


    /*
    Route Table Functions
    */

    public function route_no_of_rows() {
        $sql = mysql_query("SELECT * FROM route");
        $count = mysql_num_rows($sql);
        return $count;
    }

    public function route_for_terr($terr_id) {
        $sql = mysql_query("SELECT * FROM route WHERE TeretoryId = '$terr_id'");
        $count = mysql_num_rows($sql);
        return $count;
    }

    // function for create route
    public function create_route($RouteId, $RouteName, $RouteDescription, $TerritoryId)
    {
        $IndexNo = $this->route_no_of_rows() + 1;
        mysql_query("INSERT INTO route(IndexNo, RouteId, RouteName, RouteDescription, TeretoryId) VALUES ('$IndexNo', '$RouteId','$RouteName', '$RouteDescription', '$TerritoryId')");
    }

    // function for read route
    public function read_route()
    {
        return mysql_query("SELECT * FROM route ORDER BY RouteId ASC");
    }

    //function to read specific rows in the table
    public function read_specific_route($IndexNo)
    {
        return mysql_query("SELECT * FROM route WHERE IndexNo=". $IndexNo);
    }


     // function for read territory with limits test
    public function route_limits($page, $perpage)
    {
        //$limit = "LIMIT ".($page-1)*$perpage." , $perpage";
        return mysql_query("SELECT * FROM route ORDER BY RouteName ASC ");
    }


    // function for delete route
    public function delete_route($IndexNo)
    {
        mysql_query("DELETE FROM route WHERE IndexNo =" . $IndexNo);
    }

    // function for update route
    public function update_route($IndexNo, $RouteId, $RouteName, $RouteDescription, $TerritoryId)
    {
       mysql_query("UPDATE route SET RouteId = '$RouteId', RouteName = '$RouteName', RouteDescription = '$RouteDescription', TeretoryId = '$TerritoryId' WHERE IndexNo= " . $IndexNo);
    }

    public function count_route()
    {
        $cnt = mysql_query("SELECT COUNT(RouteId) FROM `{$this->_table_route}` ");

        return $cnt;
    }

    public function getTotalRouteRecords(){
        $totalRecords = mysql_query("Select count(*) from `{$this->_table_route}`");
        return $totalRecords;
    }



    /*
    Area Target Function
    */

    public function areatarget_no_of_rows() {
        $sql = mysql_query("SELECT * FROM area_targets");
        $count = mysql_num_rows($sql);
        return $count;
    }

    // function for read area_target
    public function atarget_read(){
        return mysql_query("SELECT * FROM area_targets ORDER BY IndexNo ASC");
    }

    // function for create target of area
    public function create_target_area($TargetId, $ProductId, $Target, $OpeningDate, $AreaId, $TimeStamp)
    {
        $IndexNo = $this->areatarget_no_of_rows() + 1;
        mysql_query("INSERT INTO area_targets(IndexNo, TargetId, ProductId, Target, OpeningDate, AreaId, TimeStamp) VALUES ('$IndexNo', '$TargetId', '$ProductId','$Target', '$OpeningDate', '$AreaId', '$TimeStamp')");
    }

    // function for delete area targets
    public function delete_area_target($IndexNo)
    {
        mysql_query("DELETE FROM area_targets WHERE IndexNo =" . $IndexNo);
    }

    // function for update route
    public function update_area_target($IndexNo, $TargetId, $ProductId, $Target, $OpeningDate, $AreaId, $TimeStamp)
    {
        mysql_query("UPDATE area_targets SET TargetId = '$TargetId', ProductId = '$ProductId', Target = '$Target', OpeningDate = '$OpeningDate', AreaId = '$AreaId', TimeStamp = '$TimeStamp' WHERE IndexNo = " . $IndexNo);
    }


     /*
    Territory Target Function
    */

    public function terrtarget_no_of_rows() {
        $sql = mysql_query("SELECT * FROM territory_targets");
        $count = mysql_num_rows($sql);
        return $count;
    }

    // function for read area_target
    public function terrtarget_read(){
        return mysql_query("SELECT * FROM territory_targets ORDER BY TargetId ASC");
    }

    // function for create target of area
    public function create_target_terr($TargetId, $ProductId, $Target, $OpeningDate, $TerrId, $TimeStamp)
    {
        $IndexNo = $this->terrtarget_no_of_rows() + 1;
        mysql_query("INSERT INTO territory_targets(IndexNo, TargetId, ProductId, Target, OpeningDate, TerritoryId, TimeStamp) VALUES ('$IndexNo', '$TargetId', '$ProductId','$Target', '$OpeningDate', '$TerrId', '$TimeStamp')");
    }

    // function for delete terr targets
    public function delete_terr_target($IndexNo)
    {
        mysql_query("DELETE FROM territory_targets WHERE IndexNo =" . $IndexNo);
    }

    // function for update terr targets
    public function update_terr_target($IndexNo, $TargetId, $ProductId, $Target, $OpeningDate, $TerrId, $TimeStamp)
    {
        mysql_query("UPDATE territory_targets SET TargetId = '$TargetId', ProductId = '$ProductId', Target = '$Target', OpeningDate = '$OpeningDate', TerritoryId = '$TerrId', TimeStamp = '$TimeStamp' WHERE IndexNo = " . $IndexNo);
    }

    public function getLastTerrIdForArea($AreaId){
      $sql = mysql_query("SELECT * FROM teretory Where AreaId = '$AreaId'");
      $count = mysql_num_rows($sql);
      return $count;
    }



    /*
    Filtering function
    */

    public function get_area()
    {
        return mysql_query("SELECT AreaName, AreaId  FROM area");
    }

    public function get_territory($AreaId)
    {
        return mysql_query("SELECT TeretoryName, TeretoryId FROM teretory WHERE AreaId='$AreaId'");
    }

    public function get_route($TeretoryId)
    {
        return mysql_query("SELECT RouteName, RouteId FROM route WHERE TeretoryId='$TeretoryId' ");
    }



    /*
    form Processing function
    */

    public function getAreaName($area_name){
        $query = "SELECT AreaName FROM area WHERE AreaName = '$area_name' LIMIT 1";
    }




    /*testing purposes */
    public function get(){
        return mysql_query("SELECT * FROM ajaxtrap");
    }
}
?>
