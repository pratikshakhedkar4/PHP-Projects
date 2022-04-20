<?php
$Id=$_POST['listId'];
include("EmployeeClass.php");
$obj=new Employee();
$obj->delete($Id);
?>