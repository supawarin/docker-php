<?php

  session_start();
  
  if (!isset($_SESSION['firstname'])) {
    $_SESSION['msg'] = "You must login first";
    header('location: index.html');
  }



  include('connection.php');




  $sql = "SELECT  *  FROM cars";
  
  
  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars list</title>
    <link rel="stylesheet" href="style.css"> 

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Cars Dashboard</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Page 1-1</a></li>
              <li><a href="#">Page 1-2</a></li>
              <li><a href="#">Page 1-3</a></li>
            </ul>
          </li>
          <li><a href="#">Page 2</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>   Hello , <?php  echo $_SESSION['firstname']; ?>     <span class="caret"></span></a></td>
               
               <ul class="dropdown-menu">
               <li><a href="userProfile.php">Seting</a></li>
               <li><a href="change_password.php" target="_blank">Change Password</a></li>
               <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>


    <div class="container">
      
      <h2>example cars</h2>
      

      <table>
        <thead>
          <tr>
            <th width="5%">id</th>
            <th width="10%">Model</th>
            <th width="10%">Make</th>
            <th width="20%">image</th>
            <th while="10%">price</th>
            <th while="20%">color</th>
            

          </tr>
        </thead>
        <tbody>
          <!-- data fetch from data cars-->
          <?php
            
            
               while($row = $result->fetch_assoc()): 
          ?>
            <tr>
              <td><?php echo $row["id"]; ?></td>
              <td class="name"><?php echo $row["model"]; ?></td>
              <td><?php echo $row["make"]; ?></td>
              
              <td><?php echo '<img src="data:image;base64,'.base64_encode($row["image"]).'"alt="Image" style="width: 250px; height:150px;">'; ?></td>

                        
                       
                        
                         
                      
                
                
              <td><?php echo $row["price"]; ?></td>
              <td><?php echo $row["color"]; ?></td>
            </tr>

            
          <?php endwhile ?>  
        </tbody>
      </table>

      
    </div>
  </body>
</html>
