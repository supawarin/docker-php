<?php

   session_start();

   include('connection.php');
//print_r($_POST);die;
   if (isset($_POST['submit'])) {
           //if ($_POST['password']) { means password issomething not empty
      if (! $_POST['password']) {
          $_SESSION['err_password'] = "password is empty";
          header('location: index.php?err=password is empty');
      }

      $email = $_POST['email'];
      $password = $_POST['password'];
      $car_reg = $_POST['car_reg'];

      $query = "SELECT * FROM users WHERE email='".$email."' AND password='".$password."' AND car_reg_no='".$car_reg."'";
     
      $result = mysqli_query($conn, $query);

      if ($result) {
          $row = mysqli_fetch_assoc($conn, $result);

         // echo "User login OK";
         $_SESSION['user_id'] = $row['id'];
          $_SESSION['user_authenticated'] = true;
          header('location: cars.php');
      }
      else {
         // echo "User login NOT OK";
          $_SESSION['err_query'] = "query ผิดพลาด";
         header('location: index.php?err=email or car reg or password is invalid');
      }

      
   }

   ?>