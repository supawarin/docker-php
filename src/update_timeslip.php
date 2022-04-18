<?php
include('connection.php');
$id=$_POST['id'];
$employee=$_POST['employee'];
$title=$_POST['title'];
$start_event=$_POST['start_event'];
$end_event=$_POST['end_event'];
$hours=$_POST['hours'];
$description=$_POST['description'];


$sql = "UPDATE events set title='$title', employee='$employee', start_event='$start_event', end_event='$end_event', hours='$hours', description='$description'  WHERE id= '$id' ";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('Updated Successfuly!');</script>";
    echo "<script>window.location='timeslips.php';</script>";
}else{
    echo "<script>alert('Error Database !');</script>";
    echo "<script>window.location='edit_timeslip.php';</script>";
}
mysqli_close($conn);










?>