<?php
    session_start();
    ?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="index.php">PHPMongo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Users</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="form.php">Add New User</a>
              <a class="dropdown-item" href="userlist.php">User List</a>
            </div>
          </li>
          <li>
              <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="register.php">Register</a>
              </li>
           <?php 
          if(isset($_SESSION['username'])){
              echo "<li class='nav-item'>
                  <a class='nav-link' href='register.php'>Add article</a>
              </li>";
          }
          ?>
                          
          </li>
        </ul>

      </div>
    </nav>