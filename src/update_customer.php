<?php
include('connection.php');
$id=$_POST['id'];
$company=$_POST['company'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$address=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$post=$_POST['post'];
$phone=$_POST['phone'];
$note=$_POST['note'];


$sql = "UPDATE customers set company='$company',contact='$contact', email='$email', address='$address', city='$city', country='$country', post='$post',  phone='$phone', note='$note'  WHERE id= '$id' ";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('Updated Successfuly!');</script>";
    echo "<script>window.location='customers.php';</script>";
}else{
    echo "<script>alert('Error Database !');</script>";
    echo "<script>window.location='edit_customer.php';</script>";
}
mysqli_close($conn);










?>