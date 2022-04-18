<?php
include('connection.php');
$id=$_POST['id_model'];
$model=$_POST['model'];
$make=$_POST['make'];
$price=$_POST['price'];
$color=$_POST['color'];
$input_image=$_POST['input_image'];

$sql = "UPDATE cars set model='$model', make='$make', price='$price', color='$color', image='$input_image' WHERE id= '$id' ";


$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('Updated Successfuly!');</script>";
    echo "<script>window.location='model.php';</script>";
}else{
    echo "<script>alert('Error Database !');</script>";
    echo "<script>window.location='edit_model.php';</script>";
}
mysqli_close($conn);

?>