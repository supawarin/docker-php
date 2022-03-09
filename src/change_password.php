<?php //ini_set('display_errors', 1);
      //ini_set('display_startup_errors', 1);
      //error_reporting(E_ALL);
  session_start(); 




  include('connection.php');


  if (isset($_POST['submit'])){

    $email = $_POST['useremail'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $cpass = $_POST['cpass'];

    $query = mysqli_query($conn,"SELECT email, password FROM `users` WHERE email = '$email' AND password = '$oldpass'");
    $num = mysqli_fetch_array($query);

    if($num>0){

      $con = mysqli_query($conn,"UPDATE `users` set password = '$newpass' WHERE email = '$email'");
      //$_SESSION['msg1'] = "Password Change Successfully ";
      header('location: success.html');

    } else {
      $_SESSION['msg2'] = "Password does not match";
    }
  }


























?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    />
  
     <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
  
      <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css"
       rel="stylesheet"
     
    />
</head>
<body>
  <div class="container" >

    

    <form name="changepass" action="" method="post" style="width: 40%; margin: 0 auto; padding-top:80px;" class="text-center mt-5">
     <h2>Change Password</h2><br />
     <p style="color:green;"><?php echo $_SESSION['msg1'];?><?php $_SESSION['msg1'] = ""; ?></p>
     <p style="color:red;"><?php echo $_SESSION['msg2'];?><?php $_SESSION['msg2'] = ""; ?></p>
     
     
     
     <!-- Email input -->

     <div class="form-outline mb-4">
       <input type="text" id="useremail" name="useremail" class="form-control" required/>
       <label class="form-label" for="form2Example1">User Email</label>
     </div>
     
     <div class="form-outline mb-4">
       <input type="password" id="oldpass" name="oldpass" class="form-control" required/>
       <label class="form-label" for="form2Example1">Old Password</label>
     </div>
     <div class="form-outline mb-4">
       <input type="password" id="newpass" name="newpass" class="form-control" required/>
       <label class="form-label" for="form2Example1">New Password</label>
     </div>

    <div class="form-outline mb-4">
       <input type="password" id="cpass" name="cpass" class="form-control" required/>
       <label class="form-label" for="form2Example1">Comfirm New Password</label>
     </div>

          <!-- Submit button -->
        <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Change</button>
        

         
    </form>
    

  </div>
    








    <!-- MDB -->
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"
   ></script>
  
   
</body>
</html>