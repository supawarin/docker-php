<?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
      //echo "loading calendar items please wait"; die;

   
     $connect = mysqli_connect('db', 'root', 'example', 'cars');
     
     if(isset($_POST['title']))
     {
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $hours = $_POST['hours'];
        $description = $_POST['description'];

        $sql = "INSERT INTO events(title, start_event, end_event, hours, description) VALUES ('$title', '$start', '$end', '$hours', '$description')";
        $connect->query($sql);
     }
  

?>