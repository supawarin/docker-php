<?php

   $conn = mysqli_connect('db', 'root', 'example', 'cars');

   if (!$conn) {
       die("Failed to connect" . mysqli_connect_error());
   }