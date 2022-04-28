<?php ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);


include('connection.php');


$id=$_POST['id_contact'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$address=$_POST['address'];
$company=$_POST['company'];
$email=$_POST['email'];

$phone=$_POST['phone'];


$sql = "UPDATE contact set firstname='$firstname', lastname='$lastname', address='$address', company='$company', email='$email',  phone='$phone'    WHERE id= '$id' ";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('Updated Successfuly!');</script>";
    echo "<script>window.location='contact.php';</script>";
}else{
    echo "<script>alert('Error Database !');</script>";
    echo "<script>window.location='edit_contact.php';</script>";
}
mysqli_close($conn);
?>