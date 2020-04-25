<?php
    session_start();
    if(isset($_SESSION['username'])){
    setcookie("theuser",$_SESSION['username'],time()+8640);}
    ?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="index.php">
       <?php 
        if(isset($_SESSION["username"])){echo $_COOKIE['theuser'];}
        else {echo"PHPMongoDB";}
      ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
           <?php
              if(isset($_SESSION['username'])=='admin'){
              echo "<li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='http://example.com' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Users</a>
            <div class='dropdown-menu' aria-labelledby='dropdown01'>
              <a class='dropdown-item' href='userlist.php'>User List</a>
            </div>
          </li>";}
                  ?>

          <li>
              <?php
              if(!isset($_SESSION['username'])){
              echo "<li class='nav-item'>
                  <a class='nav-link' href='login.php'>Login</a>
              </li>";}
                      ?>
              <?php
              if(!isset($_SESSION['username'])){
              echo "<li class='nav-item'>
                  <a class='nav-link' href='register.php'>Register</a>
              </li>";}
                      ?>

           <?php 
          if(isset($_SESSION['username'])){
              echo "<li class='nav-item'>
                  <a class='nav-link' href='addarticle.php'>Add article</a>
                </li>";
             }
          ?>                       
          </li>
        </ul>
      </div>
       <div class="navbar-collapse collapse ">
        <ul class="navbar-nav ml-auto">
         <?php 
          if(isset($_SESSION['username'])){
              echo "<li class='nav-item'>
                  <a class='nav-link' href='php/logout.php'>Logout</a>
                </li>";
             }
          ?>    
        </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>     
    </div>
    </nav>
