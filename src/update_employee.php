<?php ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);


include('connection.php');


$id=$_POST['id_employee'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$rate=$_POST['rate'];

$sql = "UPDATE employee set firstname='$firstname', lastname='$lastname', email='$email', address='$address', phone='$phone', rate='$rate'   WHERE id= '$id' ";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('Updated Successfuly!');</script>";
    echo "<script>window.location='employee.php';</script>";
}else{
    echo "<script>alert('Error Database !');</script>";
    echo "<script>window.location='edit_employee.php';</script>";
}
mysqli_close($conn);
?>