<?php

   session_start();

   include('connection.php');
   //$errors = array();
 
   if (isset($_POST['login'])) {
           
         $firstname = $_POST['firstname'];
         $email = $_POST['email'];
         $password = $_POST['password'];
         

         $query = "SELECT * FROM users WHERE firstname='".$firstname."' AND email='".$email."' AND password='".$password."'";
         $result = mysqli_query($conn, $query);
         $row = mysqli_fetch_assoc($result);

         //if (password_verify($password, $row['password'])) {
         if (mysqli_num_rows($result) == 1) {
            
            if ($row['status'] == 'U') {
               $_SESSION['firstname'] = $row['firstname'];
               header('location: cars.php');
            }
            else if ($row['status'] == 'A') {
               $_SESSION['firstname'] = $row['firstname'];
               header('location: admin_page.php');
            }
            

         }
         else {
            //$errors['email'] = "Incorrect email or password!";
            echo "<script>";
               
                echo "alert(\" email or password incorrect\");";
                echo "window.history.back()";
            echo "</script>";

           // $_SESSION['err_password'] = "email or password not correct";
            //header('location: index.php?err=email or car reg or password is invalid');
         }


      
      

      
      
   }
   else {
      $_SESSION['err_password'] = "email or password not correct";
      header('location: login.html'); //user & password incorrect back to login again
   }

   ?>
