<?php ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);


include('connection.php');
//$conn = new mysqli('db','root','example','cars');


$title=$_POST['title'];
$employee=$_POST['employee'];
$start_event=$_POST['start_event'];
$end_event=$_POST['end_event'];
$hours=$_POST['hours'];
$description=$_POST['description'];
$sql = "INSERT INTO events ( title, employee, start_event, end_event, hours, description) VALUES ( '$title', '$employee', '$start_event', '$end_event','$hours', '$description') ";
$result =mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('Add New Timeslip Successfuly!');</script>";
    echo "<script>window.location='timeslips.php';</script>";
}else{
    echo "<script>alert('Error Database !');</script>";
    echo "<script>window.location='add_timeslip.php';</script>";
}
mysqli_close($conn);
















?>