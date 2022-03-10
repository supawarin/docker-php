<?php

   session_start();
   $conn = new mysqli('db','root','example','cars');

   //include('connection.php')

   if(isset($_POST['submit'])) {
        $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);
        if($password !== $confirm_password){
            $_SESSION['err_password'] = "password not matched";
            header('location: register.php');
        }
        $email_check = "SELECT email FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $email_check);
        if(mysqli_num_rows($res) > 0){
            $_SESSION['exist_email'] = "Email that you have entered is already exist!";
        }
        
        $code = "";
        $status = "U";
        $insert_data = "INSERT INTO users (firstname, lastname, email, password, status, code) 
                            VALUES ('$firstname', '$lastname', '$email' ,'$password' ,'$status', '$code')";
        $result = mysqli_query($conn, $insert_data);    

        if ($result) {
            header('location: regis_success.html');
        }
        else {
            $_SESSION['err_query'] = "Failed while inserting data into database!";
            header('location: register.php');
        }
       
   }
   if (isset($_SESSION['err-password']) || isset($_SESSION['err_query']) || isset($_SESSION['exist_email'])) {
     unset($_SESSION['err_password']);
     unset($_SESSION['err_query']);
     unset($_SESSION['exist_email']);
    }










?>