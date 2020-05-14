<?php
  include "main.php";
?>
<!doctype html>
<html lang=en-US>
  <head>
    <title>Simple Crud App</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <header class="panel panel-default">
        <div class="panel-heading">
          <div class="container">
            <h3 style="display: inline;">Simple Crud App</h3>
              <?php
                if(Session::get("login")==true){
              ?>
              <a class="pull-right logout btn btn-info" href="?logout=yes">Logout</a>
              <?php
                }
              ?>
          </div>
        </div>
      </header>

      <div class="errors" style="width: 35%;margin:0 auto;">
        <div class="allErrors text-center alert alert-danger" style="display:none;"></div>
        <div class="allSuccess text-center alert alert-success" style="display:none;"></div>
        <div class="allNotice text-center alert alert-info" style="display:none;"></div>
      </div>
