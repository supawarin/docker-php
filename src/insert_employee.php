<?php ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);


include('connection.php');
//$conn = new mysqli('db','root','example','cars');


$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$address=$_POST['address'];
$rate=$_POST['rate'];
$phone=$_POST['phone'];


$sql = "INSERT INTO employee ( firstname, lastname, email, address, phone,  rate) VALUES ( '$firstname', '$lastname', '$email','$address', '$phone',  '$rate') ";
$result =mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('Add New Employee Successfuly!');</script>";
    echo "<script>window.location='employee.php';</script>";
}else{
    echo "<script>alert('Error Database !');</script>";
    echo "<script>window.location='form_employee.php';</script>";
}
mysqli_close($conn);















?>