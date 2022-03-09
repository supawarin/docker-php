<?php include('connection.php'); ?>

    
            
            <!DOCTYPE html>
            <html lang="en">

                <head>
                 <meta charset="UTF-8">
                 <meta http-equiv="X-UA-Compatible" content="IE=edge">
                 <meta name="viewport" content="width=device-width, initial-scale=1.0">
                 <title>Reset Password</title>


                 <!-- Font Awesome -->
                 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

                  <!-- Google Fonts -->
                  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

                  <!-- MDB -->
                 <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />
                </head>

                <body>
                    <div class="container">

                        <form action="enter_new_pass.php" method="post" style="width: 40%; margin: 0 auto; padding-top:80px;" class="text-center mt-5">
                            <h2>Enter New password</h2>
                              <br />
            

                               <!-- Email input -->
                               <div class="form-outline mb-4">
                                   <input type="text" id="inputName" name="firstname" class="form-control" required>
                                   <label class="form-label" for="inputName"> User firstname</label>
                                </div>



                                <div class="form-outline mb-4">
                                   <input type="email" id="inputEmail" name="email" class="form-control" required>
                                   <label class="form-label" for="inputEmail"> User email</label>
                                </div>
                                
                                <div class="form-outline mb-4">
                                   <input type="password" id="inputPassword" name="npassword" class="form-control" required>
                                   <label class="form-label" for="inputPassword"> New Password</label>
                                </div>

            



                                 <!-- Submit button -->
                                 <button type="submit" name="submit_password" class="btn btn-primary btn-block mb-4">Change Pasword</button>



                        </form>


                     </div>

                       <!-- MDB -->
                         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
                 </body>
            </html>
            
      















             