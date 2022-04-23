<?php
ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
   $conn = mysqli_connect('db', 'root', 'example', 'cars');

   if (!$conn) {
       die("Failed to connect" . mysqli_connect_error());
   }

   $mysqli = new mysqli('db','root','example','cars');

if ($mysqli -> connect_error) {
  echo "Failed to connect to cars MySQL: " . $mysqli -> connect_error;
  exit();
}
date_default_timezone_set('Asia/Kolkata');
$error = "";
?>