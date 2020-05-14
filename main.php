<?php
// Cache Controll
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: max-age=2592000");

// Import Library Files
  include "config/config.php";
  include "lib/Database.php";


// Import All Classes
  spl_autoload_register(function($file){
    require_once "classes/".$file.".php";
  });

// All Objects
  $db = new Database();
  $valid = new Validate($db);
  $logObj = new Login($db,$valid);
  $empObj = new Employee($db,$valid);

// Ajax Calls
  if(isset($_POST['loginForm'])){
    $logObj->matchLogin();
  }

  if(isset($_POST['empForm'])){
    $empObj->insertEmployee();
  }

// Pagination Code
  $empNum  = $empObj->numOfEmployee();
  $totPage = ceil($empNum / 6);

  if(isset($_POST['action']) && $_POST['action'] == "pagination"){
    $pageNum = htmlspecialchars($_POST['pageNum']);
    $empObj->prevANDnext($pageNum*6);
  }

// Collect Employee List
  $empList = $empObj->getEmployeeList(0);


// Logout User
  if(isset($_GET['logout']) && $_GET['logout'] == "yes"){
    Session::destroy();
    exit(header("Location: login.php"));
  }

// Delete Employee Data
  if(isset($_POST['action']) && $_POST['action']=="delete"){
    $empObj->removeEmpData();
  }

// Get Edit Employee Data
  if(isset($_POST['action']) && $_POST['action']=="edit"){
    $empObj->getUpEmpData();
  }

// Update Employee Data
  if(isset($_POST['upForm'])){
    $empObj->updateEmpData();
  }

// Search Data
  if(isset($_POST['action']) && $_POST['action'] == "search"){
    $empObj->getSearchdData();
  }
?>
