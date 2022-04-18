<?php 
//phpinfo();die;
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
  
  



  include('connection.php');
  //$sql = "SELECT  *  FROM cars";
  //$result = $conn->query($sql);


  
  
  
  

  $statement = $conn->prepare("SELECT * FROM tbl_order ORDER BY order_id DESC");
   

    $statement->execute();

    $all_result = $statement->fetchAll();

    $total_rows = $statement->rowCount();

  

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex, nofollow">
        <title>Invoices Page</title>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">



      
      <style>
          * {
           padding: 0;
           margin: 0;
           box-sizing: border-box;
           list-style-type: none;
           text-decoration: none;
           font-family: 'Nanum Gothic', sans-serif;
           }

           .sidebar {
            width: 300px;
            position: fixed;
            height: 100vh;
            background: #39a693;
            z-index: 100;
            transition: width 300ms;

            }

            .sidebar-brand {
                height: 90px;
                padding: 1rem 0rem 1rem 2rem;
                color: #fff;

            }
            .sidebar-menu {
                margin-top: 1rem;
            }

            .sidebar-brand span {
                display: inline-block;
                padding-right: 1rem;

            }

            .sidebar-menu li {
                width:100%;
                margin-bottom: 1.3rem;
                padding-left: 1rem;

            }
            .sidebar-menu a {
                padding-left: 1rem;
                display: block;
                color: #fff;
                font-size: 1.1rem;
            }
            .sidebar-menu a.active {
                background: #fff;
                padding-top: 1rem;
                padding-bottom: 1rem;
                color: #39a693;
                border-radius: 30px 0px 0px 30px;
            }
            .sidebar-menu a span {
                font-size: 1.3rem;
                padding-right: 1rem;
            }

            .main-content {
                transition: left 300ms;
                margin-left: 22%;
            }
            header {
                background-color: #fff;
                display: flex;
                justify-content: space-between;
                padding: 1rem;
                box-shadow: 2px 5px 15px 2px rgba(0 0 0 / 10%);
                position: fixed;
                left: 300px;
                width: calc(100% - 300px);
                top: 0;
                z-index: 100;
                transition: left 300ms;
            }
            .accueil {
                font-size: 1.5rem;
                padding-right: 1rem;
                margin-left: 15px;
                color: #008ea1;
            }
            .search-wrapper {
                border: 1px solid #008ea1;
                border-radius: 20px;
                height: 38px;
                display: flex;
                align-items: center;
                overflow-x: hidden;
            }
            .search-wrapper input {
                height: 100%;
                padding: .5rem;
                border: none;
                outline: none;
            }
            .search-wrapper span {
                display: inline-block;
                padding: 0rem 1rem;
                font-size: 1.5rem;
                color: #008ea1;
            }
            .user-wrapper {
                display: flex;
                align-items: center;
            }
            .user-wrapper img {
                border-radius: 50%;
                margin-right: 6rem;

            }
            
            
            .logo-admin {
                cursor: pointer;
            }
            #dropdown {
                position: relative;
                display: inline-block;
            }
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 180px;
                height: 112px;
                color: #008ea1;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                padding: 5px;
                z-index: 1;
            }
            #dropdown:hover .dropdown-content {
                display: block;
                cursor: pointer;
            }
            .dropdown-content li{
                padding: .5rem;
            }
            .dropdown-content li a{
                color: #008ea1;
            }
            .dropdown-content li:hover {
                background: #d8fdf0;
                

            }
            #menu {
                 display: none;
             }
             .la-bars{
                 cursor: pointer;
             }
             #menu:checked ~ .sidebar{
                 width: 60px;
                 
             }
             #menu:checked ~ .sidebar .sidebar-brand, h1 span:last-child,
             #menu:checked ~ .sidebar li a span:last-child{
                 display: none;
             }
             #menu:checked ~ .main-content{
                 margin-left: 60px;
             }
             #menu:checked ~ .main-content header{
                 width: calc(100% - 60px);
                 left: 60px;
             }
             section {
                
                
                padding: 2rem 1.5rem;
                min-height: calc(100vh);
                width: calc(100% - 320px);
            }
            .container-fluid{
                margin-top: 100px;
            }
            </style>

    </head>

    <body>
      <input type="checkbox" name="checkbox" id="menu">
       <!-------------------------------sidebar------------------------------->
      <div class="sidebar">
          <div class="sidebar-brand">
              <h1><span class="lab la-phoenix-framework"></span>CARS</h1>
          </div> 
              
          

          <div class="sidebar-menu">
              <ul>
                  <li>
                      <a href="admin.php" ><span class="las la-igloo"></span>
                      <span>Dashboard</span></a>
                  </li>
                  <li>
                      <a href="customers.php"><span class="las la-users"></span>
                      <span>Customers</span></a>
                  </li>
                  <li>
                      <a href="tasks.php"><span class="las la-clipboard-list"></span>
                      <span>Tasks</span></a>
                  </li>
                  <li>
                      <a href="order.php"><span class="las la-shopping-bag"></span>
                      <span>Orders</span></a>
                  </li>
                  <li>
                      <a href="accounts.php"><span class="las la-user-circle"></span>
                      <span>Accounts</span></a>
                  </li>
                  <li>
                      <a href="inventory.php"><span class="las la-receipt"></span>
                      <span>Inventory</span></a>
                  </li>
                  <li>
                      <a href="model.php"><span class="las la-car-side"></span>
                      <span>Model cars</span></a>
                  </li>
                  <li>
                      <a href="documents.php"><span class="las la-file"></span>
                      <span>Documents</span></a>
                  </li>
                  <li>
                      <a href="calendar.php"><span class="las la-calendar-alt"></span>
                      <span>Calendar</span></a>
                  </li>
                  <li>
                      <a href="timeslips.php" class="nav-link"><span class="las la-file-invoice"></span>
                      <span>Timeslips</span></a>
                  </li>
                  <li>
                      <a href="invoice.php" class="active"><span class="las la-file-invoice"></span>
                      <span>Invoices</span></a>
                  </li>
                  
              </ul>
          </div>
      </div>

      <div class="main-content">
          <header>
              <p>
                  <label for="menu">
                      <span class="las la-bars"></span>
                  </label><span class="accueil">Invoices</span>
                  
              </p>

              <div class="search-wrapper">
                  <span class="las la-search"></span>
                  <input type="search" name="" placehoder="Search here" />
              </div>

              <div id="dropdown" class="user-wrapper">
                  
                  <div>
                      <h3>Hi, <?php  echo $_SESSION['firstname']; ?></h3>
                      
                  </div>
                  <img src="img/avatar-11.png" width="40px" height="40px" class="logo-admin">
                  
                  <div class="dropdown-content">
                      <ul class="dropdown-menu">
                          <li><a href="userProfile.php">Seting</a></li>
                          <li><a href="change_password.php" target="_blank">Change Password</a></li>
                          <li><a href="logout.php"> Logout</a></li>
                          
                      </ul>
                  </div>

              </div>
          </header>

          <section>
              <div class="container-fluid">
                  <h2>Invoices List</h2><br />
                  <div></div><br/>
              </div>

              <br />

              <table id="data-table" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th>Invoice No.</th>
                          <th>Invoice Date</th>
                          <th>Receiver Name</th>
                          <th>Invoice Total</th>
                          <th>PDF</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                  </thead>

                  <?php
                  if($total_rows > 0)
                  {
                      foreach($all_result as $row)
                      {
                          echo '
                            <tr>
                              <td>'.$row["order_no"].'</td>
                              <td>'.$row["order_date"].'</td>
                              <td>'.$row["order_receiver_name"].'</td>
                              <td>'.$row["order_total_after_tax"].'</td>
                              <td><a href="print_invoice.php?pdf=1&id='.$row["order_id"].'">PDF</a></td>
                              <td><a href="invoice.php?update=1&id='.$row["order_id"].'"<span class="glyphicon glyphicon-edit"></span></a></td>
                              <td><a href="#" id="'.$row["order_id"].'" class="delete"><span class="glyphicon glyphicon-remove"></span></a></td>
                              
                            </tr>
                          ';
                      }
                  }


                  ?>
                  
              </table>

              <footer class="container-fluid text-center">
                  <p>Footer Text</p>
              </footer>


               
          </section>







          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
              
          

          <script tye="text/javascript">
              $(document).ready(function(){
                  var table = $('#data-table').DataTable();

              });
          </script>

          
</html>