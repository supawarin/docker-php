<?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
//echo "loading calendar items please wait"; die;
    $connect = mysqli_connect('db', 'root', 'example', 'cars');
   

    $query = "SELECT * FROM events";

    if ($result = $connect->query($query)) {
          while ($obj = $result->fetch_object()) {
                $data[] = array(
                      'id' => $obj->id,
                      'title' => $obj->title,
                      'start' => $obj->start_event,
                      'end' => $obj->end_event,
                      'hours' => $obj->hours,
                      'description' => $obj->description
                );
          }
          echo json_encode($data);
          $result->close();
    }
    mysqli_close($connect);
    
    
   

    
?>