<?php 
session_start();
include '../config/connect.php' ;

$sql8 = "SELECT * FROM products where id";
$result8 = $conn->query($sql8);
$id = $_SESSION['id'];
$role_id = $_SESSION['role_id'];

  if($role_id==999){

    require_once("../config/alertorder.php");
  }
  else { 

    $role_id = $_SESSION['role_id'];
  }

  $empid = $_SESSION['id'];
  $sql_admin = "SELECT fullname,repair_id,repair_code,repair_date,repair_detail,uploadfiles,category_name,category_color,repair.status_id as status_id 
  FROM repair,category_repair,tblusers where repair.category_id=category_repair.category_id and repair.employee_id=tblusers.id";
  $result_admin = $conn->query($sql_admin);
  
  $sql = "SELECT repair_code,repair_date,repair_detail,uploadfiles,category_color,category_name,repair.status_id as pid , repair_id FROM repair,category_repair where repair.category_id=category_repair.category_id and employee_id=$empid";
  $result = $conn->query($sql);

  $sqlp = "SELECT * FROM products";
  $resultp = $conn->query($sqlp);

  $sqlo = "SELECT * FROM products where status_id=0 ";
  $resulto = $conn->query($sqlo);

  $sqloo = "SELECT * FROM products where qty<lowvalue ";
  $resultoo = $conn->query($sqloo);