<?php
   
  ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

   //include('connection.php');
   $conn = new mysqli('db','root','example','cars');
   
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    
    <link rel="stylesheet" href="style.css"> 
    
</head>
<body>
    <div class="container">

      <form action="register_user.php" method="post" style="width: 40%; margin: 0 auto;" class="text-center mt-5">

           <h2>REGISTER</h2><br>
           

           
          
           
           
           


          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
              <div class="col">
                   <div class="form-outline">
                       <input type="text" name="firstname" id="form3Example1" class="form-control" required/> 
                       <label class="form-label" for="form3Example1">First name</label>
                   </div>
              </div>
              <div class="col">
                    <div class="form-outline">
                       <input type="text" name="lastname" id="form3Example2" class="form-control" required/> 
                       <label class="form-label" for="form3Example2">Last name</label>
                   </div>
             </div>
          </div>
  

           <!-- Email input -->
          <div class="form-outline mb-4">
              <input type="email" name="email" id="form3Example3" class="form-control" required/>
              <label class="form-label" for="form3Example3">Email address</label>
              
          </div>

            <!-- Password input -->
          <div class="form-outline mb-4">
              <input type="password" name="password" id="password" class="form-control" required/>
              
              <label class="form-label" for="form3Example4">Password</label>
              
          </div>
            
             <!-- Confirm Password input -->
          <div class="form-outline mb-4">
              <input type="password" name="confirm_password" id="confirm_password" class="form-control" required/>
              
              <label class="form-label" for="form3Example4">Confirm Password</label>
          </div>

           

             <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

          

             <!-- Register buttons -->
          <div class="text-center">
             
             <p>Already a member? <a href="login.html">Login Here</a></p>
             
           </div>
     </form>

    </div>



 
    








    <!-- MDB -->
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"
   ></script>
   
   

</body>
</html>

