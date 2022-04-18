<?php


include('connection.php');

$ids=$_GET['id'];
$sql="DELETE FROM cars WHERE id='$ids' ";

if(mysqli_query($conn,$sql)){
    echo "<script>alert('Deleted model id from database!');</script>";
    echo "<script>window.location='model.php';</script>";
}else{
    echo "Error : " . $sql . "<br>" . mysqli_error($conn);
    echo "<script>alert('Error ,Can not delete !');</script>";
}

mysqli_close($conn);

?>
