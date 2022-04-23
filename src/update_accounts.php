<?php
ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
include('connection.php');
$id=$_POST['id_user'];
$status=$_POST['status'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password = $_POST['confirm_password'];
if($password !== $confirm_password){
    echo "<script>alert('Password not match !');</script>";
    echo "<script>window.location='edit_accounts.php';</script>";
}
$sql = "UPDATE users set firstname='$firstname', lastname='$lastname', email='$email', password='$password' WHERE id= '$id' ";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('Updated Successfuly!');</script>";
    echo "<script>window.location='accounts.php';</script>";
}else{
    echo "<script>alert('Error Database !');</script>";
    echo "<script>window.location='edit_accounts.php';</script>";
}
mysqli_close($conn);










?>