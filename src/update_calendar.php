<?php
ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$connect = mysqli_connect('db', 'root', 'example', 'cars');


if(isset($_POST["id"]))
{
   $title = $_POST['title'];
   $start = $_POST['start'];
   $end = $_POST['end'];
   $id = $_POST['id'];
   $employee = $_POST['employee'];
   $hours = $_POST['hours'];
   $description = $_POST['description'];
   $sql = "UPDATE events SET title='$title', start_event='$start', end_event='$end', employee='$employee', hours='$hours', description='$description'  WHERE id = $id";
   $connect->query($sql);
}





?>