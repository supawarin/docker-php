<?php
ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

include('connection.php');

$ids=$_GET['id'];
$sql="DELETE FROM employee WHERE id='$ids' ";

if(mysqli_query($conn,$sql)){
    echo "<script>alert('Deleted employee id from database!');</script>";
    echo "<script>window.location='employee.php';</script>";
}else{
    echo "Error : " . $sql . "<br>" . mysqli_error($conn);
    echo "<script>alert('Error ,Can not delete !');</script>";
}

mysqli_close($conn);

?>
