<?php

   session_start();

   include('connection.php');


   if (isset($_POST['submit'])) {
        
      if ($_POST['password'] !=$_POST['confirm_password']) {
          $_SESSION['err_password'] = "password not matched";
          header('location: register.php');
      }
      else {
          $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
          $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
          $email = mysqli_real_escape_string($conn,$_POST['email']);
          $password = mysqli_real_escape_string($conn,$_POST['password']);

          $query = "INSERT INTO users (firstname, lastname, email, password, status) VALUES ('$firstname', '$lastname', '$email', '$password', 'U')";
       
          $result = mysqli_query($conn, $query);

          if ($result) {
              header('location: index.php');
            }
          else {
             $_SESSION['err_query'] = "query error";
              header('location: register.php');
            }


        }

      
      
    }

?>
