<?php 

    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
     
    // This if statement checks to determine whether the registration form has been submitted 
    // If it has, then the registration code is run, otherwise the form is displayed 
    if(!empty($_POST)) 
    {
        // Ensure that the user has entered a non-empty username 
        if(empty($_POST['number'])) 
        { 
            // Note that die() is generally a terrible way of handling user errors
            // like this.  It is much better to display the error with the form 
            // and allow the user to correct their mistake.  However, that is an 
            // exercise for you to implement yourself. 
            die("Please enter a Homework Number."); 
        } 
         
          if(empty($_POST['chapter'])) 
        { 
            // Note that die() is generally a terrible way of handling user errors
            // like this.  It is much better to display the error with the form 
            // and allow the user to correct their mistake.  However, that is an 
            // exercise for you to implement yourself. 
            die("Please enter a Chapter."); 
        } 
                 
         if(empty($_POST['page'])) 
        { 
            // Note that die() is generally a terrible way of handling user errors
            // like this.  It is much better to display the error with the form 
            // and allow the user to correct their mistake.  However, that is an 
            // exercise for you to implement yourself. 
            die("Please enter a Page Number."); 
        } 
         
        // We will use this SQL query to see whether the username entered by the 
        // user is already in use.  A SELECT query is used to retrieve data from the database. 
        // :username is a special token, we will substitute a real value in its place when 
        // we execute the query. 
        $query = " 
            SELECT 
                1 
            FROM hmahomework
            WHERE 
                number = :number
        "; 
         
        // This contains the definitions for any special tokens that we place in 
        // our SQL query.  In this case, we are defining a value for the token 
        // :username.  It is possible to insert $_POST['username'] directly into 
        // your $query string; however doing so is very insecure and opens your 
        // code up to SQL injection exploits.  Using tokens prevents this. 
        // For more information on SQL injections, see Wikipedia: 
        // http://en.wikipedia.org/wiki/SQL_Injection 
        $query_params = array( 
            ':number' => $_POST['number'] 
        ); 
         
        try 
        { 
            // These two statements run the query against your database table. 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // The fetch() method returns an array representing the "next" row from 
        // the selected results, or false if there are no more rows to fetch. 
        $row = $stmt->fetch(); 
         
        // If a row was returned, then we know a matching username was found in 
        // the database already and we should not allow the user to continue. 
        if($row) 
        { 
            ?> <center> <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only"> Error:</span>
  Homework Number is already in use!
</div> </center> <?php
        } 
         
        // Now we perform the same type of check for the email address, in order 
        // to ensure that it is unique. 
        $query = " 
            SELECT 
                1 
            FROM chomework
            WHERE 
                chapter = :chapter
        "; 
         
        $query_params = array( 
            ':chapter' => $_POST['chapter'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
             ?> <center> <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only"> Error:</span>
  Chapter is already in use!
</div> </center> <?php 
        } 
        
        $query = " 
            SELECT 
                1 
            FROM chomework
            WHERE 
                page = :page
        "; 
         
        $query_params = array( 
            ':page' => $_POST['page'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
             ?> <center> <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only"> Error:</span>
  Page is already in use!
</div> </center> <?php 
        } 
         
        // An INSERT query is used to add new rows to a database table. 
        // Again, we are using special tokens (technically called parameters) to 
        // protect against SQL injection attacks. 
        $query = " 
            INSERT INTO hmahomework ( 
                number, 
                chapter, 
                page 
            ) VALUES ( 
                :number, 
                :chapter, 
                :page
            ) 
        "; 
         
                 
        // Here we prepare our tokens for insertion into the SQL query.  We do not
        // store the original password; only the hashed version of it.  We do store 
        // the salt (in its plaintext form; this is not a security risk). 
        $query_params = array( 
            ':number' => $_POST['number'], 
            ':chapter' => $_POST['chapter'], 
            ':page' => $_POST['page'], 
          
        ); 
         
        try 
        { 
            // Execute the query to create the user 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // This redirects the user back to the login page after they register 
        header("Location: hmahomeworklist.php"); 
         
        // Calling die or exit after performing a redirect using the header function 
        // is critical.  The rest of your PHP script will continue to execute and 
        // will be sent to the user if you do not die or exit. 
        die("Redirecting to hmahomeworklist.php"); 
    } 
     
?> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">

    <title>Add Honors Math Analysis Homework</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
</head>

<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Add Honors Math Analysis Homework</div>
            </div>

            <div style="padding-top:30px" class="panel-body">

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

<form action="inserthmahomework.php" method="post"> 

<div style="margin-bottom: 25px" class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
 <input id="login-number" type="text" class="form-control" name="number" value="" placeholder="Homework Number">
                    </div>

<div style="margin-bottom: 25px" class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
 <input id="login-number" type="text" class="form-control" name="chapter" value="" placeholder="Chapter">
                    </div>

<div style="margin-bottom: 25px" class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
 <input id="login-number" type="text" class="form-control" name="page" value="" placeholder="Homework Page + Numbers">
                    </div>

    <center> <input type="submit" class="btn btn-success" value="Submit Homework" /> </center>
