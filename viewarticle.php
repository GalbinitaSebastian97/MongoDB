<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
        <body>
<?php include'connection/header.php'?>
            <div class="container mt-5 pt-5">
                <div class="text-center">
                <h2 class="text-center display-4 "><?php
                echo $_GET['articlename'];
                ?></h2>               
                </div>
                <?php
                 include 'connection/db_inc_article.php';
                 $query=new MongoDb\Driver\Query([]);
                 $rows=$manager->executeQuery($dbname, $query);
                 $imagine=$_GET['imagine'];
                 foreach($rows as $row){
                  if($_GET['id']==$row->_id){
                      echo "<br><img src=".$row->imagine." width='1100' height='600'>";
                  }
                 }
                echo  "<td><a class='btn btn-info' href='editarticle.php?id=".$row->_id.
                        "&articlename=".$row->articlename.
                        "&articletext=".$row->articletext.
                        "&imagine=".$row->imagine.
                        "'>Edit</a> ".
                        "<a class='btn btn-danger'href='php/delete.php?id=".$row->_id."'>Delete</a></td>";
                ?>
                <h4 style="padding-left: 50px;"><br><?php echo $_GET['articletext'];?><h4>
            </div>
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
</html>
