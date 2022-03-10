
<?php session_start();

include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

    <form action="index_db.php" method="post" style="width: 40%; margin: 0 auto;" class="text-center mt-5">
     <h2>LOGIN</h2> <br />

       <?php if (isset($_SESSION['err_password'])) : ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_SESSION['err_password']; ?>
            </div>
           <?php endif; ?>
           <?php if (isset($_SESSION['err_query'])) : ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_SESSION['err_query']; ?>
            </div>
           <?php endif; ?>
           
      <?php endif; ?>
     


     <!-- Email input -->
     <div class="form-outline mb-4">
       <input type="firstname" id="form2Example1" name="firstname" class="form-control" required/>
       <label class="form-label" for="form2Example1">First name</label>
     </div>
     <div class="form-outline mb-4">
       <input type="email" id="form2Example1" name="email" class="form-control" required/>
       <label class="form-label" for="form2Example1">Email address</label>
     </div>

          
     <!-- Password input -->
     <div class="form-outline mb-4">
       <input type="password" id="form2Example2" name="password" class="form-control" required/>
       <label class="form-label" for="form2Example2">Password</label>
     </div>

      <!-- 2 column grid layout for inline styling -->
      <div class="row mb-4">
        <div class="col d-flex justify-content-center">
           <!-- Checkbox -->
          <div class="form-check">
             <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
             <label class="form-check-label" for="form2Example34"> Remember me </label>
          </div>
        </div>

        <div class="col">
           <!-- Simple link -->
          <a href="forgot_password.html">Forgot password?</a>
        </div>
      </div>

          <!-- Submit button -->
        <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Login</button>

          <!-- Register buttons -->
      <div class="text-center">
        <p>Not a member? <a href="/register.php">Register</a></p>
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