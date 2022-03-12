<?php

   //session_start();
   $conn = new mysqli('db','root','example','cars');
   
   

   if(isset($_POST['submit'])) {
        $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);
        if($password !== $confirm_password){
            echo "<script>";
               
                echo "alert(\" password not matched!\");";
                echo "window.history.back()";
            echo "</script>";

            
        }
        $email_check = "SELECT email FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $email_check);
        if(mysqli_num_rows($res) > 0){
            echo "<script>";
               
                echo "alert(\" Email that you have entered is already exist!\");";
                echo "window.history.back()";
            echo "</script>";
            
        }
        if(count($errors) == 0){
            $code = "";
            $status = "U";
            $insert_data = "INSERT INTO users (firstname, lastname, email, password, status, code) 
                            VALUES ('$firstname', '$lastname', '$email' ,'$password' ,'$status', '$code')";
            $result = mysqli_query($conn, $insert_data);    

            if ($result) {
               header('location: regis_success.html');
            }
            else {
               $errors['database'] = "Failed while inserting data into database!";
               header('location: register.php');
            }

        }
            
        
        
        
       
   }
   









?>