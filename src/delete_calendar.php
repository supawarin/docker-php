<?php

      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

$connect = mysqli_connect('db', 'root', 'example', 'cars');

if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $sql = "DELETE FROM events WHERE id = $id";
    $connect->query($sql);
}






?>