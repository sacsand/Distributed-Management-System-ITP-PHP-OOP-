<?php
$crud = new CRUD();

$nameArr = json_decode($_POST["name"]);

//$crud -> test_insert($nameArr);



//Print  "record added by sam";

//echo json_encode($nameArr);
echo $nameArr;

?>