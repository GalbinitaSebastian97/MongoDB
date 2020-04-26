<!doctype html>
<?php session_start();
 require_once 'connection/db_inc_article.php';
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/jumbotron/">
    <link rel="stylesheet" href="css/add-image.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

  <body>
<?php include'connection/header.php'?>
    <main role="main">
      <div class="jumbotron big-banner">
        <div class="container">
          <h1 class="display-3">Hello, 
          <?php 
          if(isset($_SESSION['username'])){
              echo $_SESSION['username'];
          }else{
              echo "world!";
          }
          ?>
          </h1>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        
<div class="row">
          <?php
try{
 include 'connection/db_inc_article.php';
$query=new MongoDb\Driver\Query([]);

$rows=$manager->executeQuery($dbname, $query);

foreach($rows as $row){
    echo 
         "<div class='col-md-4'>".
            "<h2>".$row->articlename."</h2>".
            "<p>".$row->articletext."</p>".
            "<td><img src=".$row->imagine." width='300' height='100'></td>".
            "<br></br>".
            "<td><a class='file-upload-btn' href='viewarticle.php?id=".$row->_id.
            "&articlename=".$row->articlename.
            "&articletext=".$row->articletext.
            "&imagine=".$row->imagine.
            "<br></br>".
            "<p><a class='file-upload-btn' href='articleposted.php'>View details &raquo;</a></p>".
          "</div>";
}
}catch(MongoDB\Driver\Exception\Exception $e){
    die("Error Encountered: ".$e);
}

?>
        </div>

        <hr>

      </div> <!-- /container -->

    </main>

    <footer class="container">
      <p>&copy; Galbinita Sebastian 2019</p>
    </footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>