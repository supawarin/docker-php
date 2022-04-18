<?php ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);


include('connection.php');
//$conn = new mysqli('db','root','example','cars');


$company=$_POST['company'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$address=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$post=$_POST['post'];
$phone=$_POST['phone'];
$note=$_POST['note'];

$sql = "INSERT INTO customers ( company, contact, email, address, city, country, post, phone, note) VALUES ( '$company', '$contact', '$email','$address', '$city', '$country', '$post', '$phone', '$note') ";
$result =mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('Add New Customer Successfuly!');</script>";
    echo "<script>window.location='customers.php';</script>";
}else{
    echo "<script>alert('Error Database !');</script>";
    echo "<script>window.location='form_customer.php';</script>";
}
mysqli_close($conn);
















?>