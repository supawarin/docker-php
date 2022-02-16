<?php

   session_start();

   include('connection.php');

      if ($_SESSION['user_authenticated'] === false) {
          $_SESSION['err_password'] = "user is not known";
          header('location: index.php?err=user is not known');
      } else {


              $query = "SELECT * FROM cars";
     
      $result = mysqli_query($conn, $query);

      if ($result) {
          $row = mysqli_fetch_assoc($conn, $result);
          echo "Display cars found in maridb";
        
      } else {
          echo "No cars found";
              }
      }

   ?>