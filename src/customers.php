<?php
session_start();

include('connection.php');




  $sql = "SELECT  *  FROM cars";
  
  
  $result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Customers Page</title>
      <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
      <!---------------bootstrap 5 css ------------------>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
      <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

      
      

      


      <!----------------------------style css---------------->
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
                padding: 1rem 0rem 2rem 3rem;
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
                

            }
            .sidebar-menu a {
                padding-left: 1rem;
                display: block;
                color: #fff;
                font-size: 1.1rem;
            }
            .sidebar-menu a:hover{
                background: #fff;
                
                color: #39a693;
                border-radius: 30px 0px 0px 30px;
                
            }
            .sidebar-menu a.active {
                background: #fff;
                padding-top: .5rem;
                padding-bottom: .5rem;
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
            table{
                 
                 border-collapse: collapse;
             }
             th,td{
                 text-align: center;
                 padding: 1rem;
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
             #menu:checked ~ .sidebar{
                 width: 80px;

                 
             }
             
             #menu:checked ~ .sidebar .sidebar-brand, h1 span:last-child,
             #menu:checked ~ .sidebar li a span:last-child{
                 display: none;
             }
             #menu:checked ~ .main-content{
                 margin-left: 80px;
             }
             #menu:checked ~ .main-content header{
                 width: calc(100% - 80px);
                 left: 80px;
             }
             .la-bars{
                 cursor: pointer;
                 font-size: 1.3rem;
             }
             .name_table{
                 padding-top: 150px;
                 padding-left: 50px;
             }
             .list-accounts{
                 padding-top: 50px;
                 padding-left: 50px;
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
                      <a href="admin.php" class="nav-link"><span class="las la-igloo"></span>
                      <span>Dashboard</span></a>
                  </li>
                  <li>
                      <a href="customers.php" class="nav-link active"><span class="las la-users"></span>
                      <span>Customers</span></a>
                  </li>
                  <li>
                      <a href="tasks.php" class="nav-link"><span class="las la-clipboard-list"></span>
                      <span>Tasks</span></a>
                  </li>
                  <li>
                      <a href="order.php" class="nav-link"><span class="las la-shopping-bag"></span>
                      <span>Orders</span></a>
                  </li>
                  <li>
                      <a href="accounts.php" class="nav-link"><span class="las la-user-circle"></span>
                      <span>Accounts</span></a>
                  </li>
                  <li>
                      <a href="inventory.php" class="nav-link"><span class="las la-receipt"></span>
                      <span>Inventory</span></a>
                  </li>
                  <li>
                      <a href="model.php" class="nav-link "><span class="las la-car-side"></span>
                      <span>Model cars</span></a>
                  </li>
                  <li>
                      <a href="documents.php" class="nav-link"><span class="las la-file"></span>
                      <span>Documents</span></a>
                  </li>
                  <li>
                      <a href="calendar.php" class="nav-link"><span class="las la-calendar-alt"></span>
                      <span>Calendar</span></a>
                  </li>
                  <li>
                      <a href="invoice.php" class="nav-link"><span class="las la-file-invoice"></span>
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
                  </label><span class="accueil">Customers</span>
                  
              </p>

              <div class="search-wrapper">
                  <span class="las la-search"></span>
                  <input type="search" name="" placehoder="Search here" />
              </div>

              <div class="dropdown">
                   
                   <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                      Hello,<?php  echo $_SESSION['firstname']; ?><img src="img/avatar-11.png" width="30px" height="30px" class="logo-admin">
                   </button>
                   <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <li><a class="dropdown-item" href="#">Setting</a></li>
                     <li><a class="dropdown-item" href="#">Change Password</a></li>
                     <li><a class="dropdown-item" href="#">Logout</a></li>
                   </ul>
             </div>

              
          </header>

               

               <div class="name_table">
                   <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Customers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Overview</li>

                        </ol>
                    </nav>
                   <h2>Customers list </h2><br />

                   
               </div>
               
              




     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
     <!--------------datatable------------------>
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
     
              
     </body>

          

          

        







</html>
