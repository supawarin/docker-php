<?php ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);


include('connection.php');
//$conn = new mysqli('db','root','example','cars');


$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$address=$_POST['address'];
$company=$_POST['company'];
$email=$_POST['email'];

$phone=$_POST['phone'];


$sql = "INSERT INTO contact ( firstname, lastname, address, company, email, phone  ) VALUES ( '$firstname', '$lastname', '$address', '$company', '$email', '$phone'  ) ";
$result =mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('Add New Contact Successfuly!');</script>";
    echo "<script>window.location='contact.php';</script>";
}else{
    echo "<script>alert('Error Database !');</script>";
    echo "<script>window.location='form_contact.php';</script>";
}
mysqli_close($conn);















?>