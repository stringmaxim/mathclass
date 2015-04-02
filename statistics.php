<?php 

    // First we execute our common code to connection to the database and start the session 
    require("admin/common.php"); 
     
    $query = " 
        SELECT 
            number, 
            chapter, 
            page
        FROM shomework
    "; 
     
    try 
    { 
        // These two statements run the query against your database table. 
        $stmt = $db->prepare($query); 
        $stmt->execute(); 
    } 
    catch(PDOException $ex) 
    { 
        // Note: On a production website, you should not output $ex->getMessage().
        // It may provide an attacker with helpful information about your code.  
        die("Failed to run query: " . $ex->getMessage()); 
    } 
         
    // Finally, we can retrieve all of the found rows into an array using fetchAll
    $rows = $stmt->fetchAll(); 
?> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">

    <title>Valerio's Math Class | AP Statistics</title><!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Valerio's Math Class</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
             <li> <a href="mathanalysis.php">Math Analysis</a></li>
			 <li class="active"><a href="statistics.php">AP Statistics</a></li>
			 <li><a href="#">Algebra 1</a></li>
			 <li><a href="#">AP Calculus</a></li>
			 <li><a href="#">Honors Math Analysis</a></li>
			 <li><a href="contact.php">Contact Me</a></li>
			 <li><a href="extra.php">Extra Links</a></li>
              </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<body>
<div class="container">
<center> <h1>AP Statistics Homework List</h1> </center>
<table class="table table-striped">
<thead>
    <tr> 
        <th>Number</th> 
        <th>Chapter</th> 
        <th>Page</th> 
    </tr>  
</thead>
        <tbody>
        <tr>
        <?php foreach($rows as $row): ?>
            <td><?php echo htmlentities($row['number'], ENT_QUOTES, 'UTF-8'); ?></td> 
            <td><?php echo htmlentities($row['chapter'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlentities($row['page'], ENT_QUOTES, 'UTF-8'); ?></td>  
        </tr> 
        </tbody>
    <?php endforeach; ?> 
</table> 

<br />

<div class="row">
   <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="http://i.imgur.com/5jDOvmd.png" alt="Purple Math">
      <div class="caption">
        <center>  <h3>Online Textbook</h3>
        <p>You can also use the textbook we use in class on your phone or browser!</p>
<a href="https://docs.google.com/viewer?a=v&pid=sites&srcid=ZGVmYXVsdGRvbWFpbnxmZXJyZXJpYW1hdGhjbGFzc2VzfGd4OjNlZjM0Y2U2MDkxYWY1ZTk" class="btn btn-success" role="button">Visit</a></p> </center>
      
    </div>
  </div>
</div>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="http://upload.wikimedia.org/wikipedia/en/thumb/4/44/Khan_Academy_Logo.svg/1280px-Khan_Academy_Logo.svg.png" alt="Purple Math">
      <div class="caption">
        <center>  <h3>Khan Academy </h3>
        <p>Khan Academy helps students review with interactive video lessons!</p>
<a href="http://www.purplemath.com" class="btn btn-success" role="button">Visit</a></p> </center>
      
    </div>
  </div>
</div>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="http://i.imgur.com/9GUGQ8D.png" alt="Purple Math">
      <div class="caption">
        <center>  <h3>Calc Chat </h3>
        <p>Calc Chat shows step by step solutions for problems in the textbook!</p>
<a href="http://www.calcchat.com/book/Precalculus-With-Limits-AGA-5e/" class="btn btn-success" role="button">Visit</a></p> </center>
      
    </div>
  </div>
</div>

</body>
</html>


          
