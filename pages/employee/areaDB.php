<?php

$crud = new employeeCRUD();

if(isset($_GET['rem_id'])) //For removing when the deletebutton is clicked
{
    $id = $_GET['rem_id'];
    $crud->remove_employee($id);
    $crud->redirect_to("/?page=employee/ehomearea");
}
//remService_id

if(isset($_GET['remService_id'])) //For removing when the deletebutton is clicked
{
    $id = $_GET['remService_id'];
    $crud->remove_Service($id);
    $crud->redirect_to("/?page=employee/ehomearea");
}

if(isset($_GET['act_id'])) //For removing when the deletebutton is clicked
{
    $id = $_GET['act_id'];
    $crud->change_employee($id);
    $crud->redirect_to("/?page=employee/ehomearea");
}

if(isset($_GET['Inact_id'])) //For removing when the deletebutton is clicked
{
    $id = $_GET['Inact_id'];
    $crud->change2_employee($id);
    $crud->redirect_to("/?page=employee/ehomearea");
}




?>


