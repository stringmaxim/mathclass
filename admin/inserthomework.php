<?php 

    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
     
    // At the top of the page we check to see whether the user is logged in or not
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: login.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to login.php"); 
    } 
     
    // Everything below this point in the file is secured by the login system 
     
    // We can display the user's username to them by reading it from the session array.  Remember that because 
    // a username is user submitted content we must use htmlentities on it before displaying it to the user. 
?> 
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">

    <title>Admin Login</title><!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
</head>

<center> <div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
  <span class="sr-only">  Success:</span>
  Welcome to the Homework Panel!
</div> </center>

<div class="container">

<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="..." alt="View Homework">
      <div class="caption">
        <center> <h3>View Homework</h3>
        <p><a href="homeworklist.php" class="btn btn-success" role="button">View Homework</a> </center>
      
    </div>
  </div>
</div>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="..." alt="Add Math Analysis Homework">
      <div class="caption">
        <center> <h3>Add Math Analysis Homework</h3>
        <p><a href="insertmahomework.php" class="btn btn-success" role="button">Add</a> </center>
      
    </div>
  </div>
</div>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="..." alt="Add Statistics Homework">
      <div class="caption">
        <center> <h3>Add Statistics Homework</h3>
        <p><a href="insertshomework.php" class="btn btn-success" role="button">Add</a> </center>
      </div>
    </div>
  </div>
</div>

<div class="row">
 <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="..." alt="Add Algebra 1 Homework">
      <div class="caption">
        <center> <h3>Add Algebra 1 Homework</h3>
        <p><a href="insertahomework.php" class="btn btn-success" role="button">Add</a> </center>
      
    </div>
  </div>
</div>

 <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="..." alt="Add Calculus Homework">
      <div class="caption">
        <center> <h3>Add Calculus Homework</h3>
        <p><a href="insertchomework.php" class="btn btn-success" role="button">Add</a> </center>
      
    </div>
  </div>
</div>

 <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="..." alt="Add Honors Math Analysis Homework">
      <div class="caption">
        <center> <h3>Add Honors Math Analysis Homework</h3>
        <p><a href="inserthmahomework.php" class="btn btn-success" role="button">Add</a> </center>
      </div>
    </div>
  </div>
</div>
