<?php include('connection.php');

  if (isset($_POST['submit_password'])) {
      //$code = $_POST['code'];
      $firstname = $_POST['firstname'];
      $email = $_POST['email'];
      $npassword = $_POST['npassword'];

      $query = mysqli_query($conn,"SELECT firstname, email  FROM `users` WHERE firstname = '$firstname' AND email = '$email'");
      $num = mysqli_fetch_array($query);

      if ($num>0) {
          $con = mysqli_query($conn,"UPDATE `users` SET password = '$npassword' WHERE firstname = '$firstname' AND email = '$email'");
          header('location: success.html');
        }
    }
    else {
            echo "<script>";
               
                echo "alert(\" email or password incorrect\");";
                echo "window.history.back()";
            echo "</script>";
         }


?>