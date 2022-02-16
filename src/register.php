<?php
   session_start();?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <div class="container">

      <form action="register_db.php" method="post" style="width: 40%; margin: 0 auto;" class="text-center mt-5">

           <h2>REGISTER</h2>

           <?php if (isset($_SESSION['err_password'])) : ?>
            <div class="alert alert-danger" rol="alert">
              <?php echo $_SESSION['err_password']; ?>
            </div>
           <?php endif; ?>


          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
              <div class="col">
                   <div class="form-outline">
                       <input type="text" name="firstname" id="form3Example1" class="form-control" />
                       <label class="form-label" for="form3Example1">First name</label>
                   </div>
              </div>
              <div class="col">
                    <div class="form-outline">
                       <input type="text" name="lastname" id="form3Example2" class="form-control" />
                       <label class="form-label" for="form3Example2">Last name</label>
                   </div>
             </div>
          </div>
  

           <!-- Email input -->
          <div class="form-outline mb-4">
              <input type="email" name="email" id="form3Example3" class="form-control" />
              <label class="form-label" for="form3Example3">Email address</label>
          </div>

            <!-- Password input -->
          <div class="form-outline mb-4">
              <input type="password" name="password" id="form3Example4" class="form-control" />
              <label class="form-label" for="form3Example4">Password</label>
          </div>
            
             <!-- Confirm Password input -->
          <div class="form-outline mb-4">
              <input type="password" name="confirm_password" id="form3Example4" class="form-control" />
              <label class="form-label" for="form3Example4">Confirm Password</label>
          </div>

           

             <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

             <!-- Register buttons -->
          <div class="text-center">
             <p>or sign up with:</p>
             <button type="button" class="btn btn-primary btn-floating mx-1">
                 <i class="fab fa-facebook-f"></i>
             </button>

             <button type="button" class="btn btn-primary btn-floating mx-1">
                 <i class="fab fa-google"></i>
             </button>

             <button type="button" class="btn btn-primary btn-floating mx-1">
                 <i class="fab fa-twitter"></i>
             </button>

             <button type="button" class="btn btn-primary btn-floating mx-1">
                 <i class="fab fa-github"></i>
             </button>
           </div>
     </form>

    </div>



 
    








    <!-- MDB -->
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"
   ></script>
  
   
</body>
</html>