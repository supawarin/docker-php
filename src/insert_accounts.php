<?php ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);


//include('connection.php');
$conn = new mysqli('db','root','example','cars');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
if($password !== $confirm_password){
    echo "<script>alert('Password not match !');</script>";
    echo "<script>window.location='form_accounts.php';</script>";
}
$email_check = "SELECT email FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $email_check);
        if(mysqli_num_rows($res) > 0){
            echo "<script>alert('Email that you have entered is already exist!');</script>";
            echo "<script>window.location='form_accounts.php';</script>";
        }
$code = "";
$status = "A";
$sql = "INSERT INTO users (firstname, lastname, email, password, status, code) VALUES ('$firstname', '$lastname', '$email', '$password','$status', '$code') ";
$result =mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('Add New Account Successfuly!');</script>";
    echo "<script>window.location='accounts.php';</script>";
}else{
    echo "<script>alert('Error Database !');</script>";
    echo "<script>window.location='form_accounts.php';</script>";
}
mysqli_close($conn);
















?>