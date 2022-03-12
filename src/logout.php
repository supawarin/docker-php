<?php

  session_start();
  session_destroy();

  //echo "logged out";
  header('location: login.html');
  ?>

  