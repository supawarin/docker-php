<?php
ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

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
      <title>Admin Page</title>
      <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            section {
                
                
                padding: 2rem 1.5rem;
                min-height: calc(100vh);
                width: calc(100% - 320px);
            }
            .cards {
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                grid-gap: 2rem;
                margin-top: 100px;

            }
            .card-single {
                display: flex;
                text-decoration: none;
                background-color: #fff;
                justify-content: space-between;
                padding: 2rem;
                border-radius: 10px;
                box-shadow: 2px 5px 10px 2px rgba(0 0 0 / 10%);
            }
            .card-single span:first-child {
                color: #ffcd00;
                
            }
            .card-single span:last-child {
                font-size: 2rem;

            }
            .card-single small {
                color: black;
                font-size: 1rem;
            }
            .card-single small:hover {
                color: #fff;

            }
            .card-single:hover {
                background-color: #39a693;
                color: #fff;
            }
            .composant {
                margin-top: 3.5rem;
                display: grid;
                grid-gap: 2rem;
                grid-template-columns: 69% auto;

            }
            .case {
                background-color: #d8fdf0;
                border-radius: 10px;

            }
            .header-case, .body-case {
                padding: .5rem;
            }
            .header-case {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .header-case button {
                background-color: #008ea1;
                border-radius: 5px;
                color: #fff;
                font-size: .8rem;
                padding: .5rem 1rem;
                border: none;
                cursor: pointer;
            }
            .btn {
                background-color: #008ea1;
                border-radius: 5px;
                color: #fff;
                font-size: .8rem;
                padding: .5rem 1rem;
                border: none;
                cursor: pointer;
                margin-bottom: 8px;
                margin-left: 8px;
            }
            table {
                border-collapse: collapse;
            }
            thead tr {
                border-top: 1px solid #008ea1;
                border-bottom: 1px solid #008ea1;
            }
            thead td {
                font-weight: 700;
            }
            td {
                padding: .5rem 1rem;
            }
            td .status-product {
                display: inline-block;
                height: 15px;
                width: 15px;
                margin-right: 1rem;
                border-radius: 50%;
            }
            .status-product.color-one {
                background-color: #ec1c24;
            } 
            .status-product.color-two {
                background-color: #fff200;
            } 
            .status-product.color-three {
                background-color: #b83dba;
            } 
            .status-product.color-four {
                background-color: #00a8f3;
            } 
            .status-product.color-five {
                background-color: #008ea1;
            }
            tr td:last-child{
                display: flex;
                align-items: center;

            } 
            .table {
                overflow-x: auto;
                width: 100%;
            }
            .all-users {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: .5rem .7rem;
                width: 300px;
            }
            .infors {
                display: flex;
                align-items: center;
            }
            .infors img {
                
                border-radius: 50%;
                margin-right: 1rem;
            }
            .user-contact span {
                font-size: 1.5rem;
                display: inline-block;
                margin-left: .5rem;

            }
            .la-facebook {
                color: #4267b2;
                cursor: pointer;
                
            }
            .la-phone {
                color: #128c7e;
                cursor: pointer;
            }
            .la-whatsapp {
                color: #1db954;
                cursor: pointer;
            }
            .la-bars {
                cursor: pointer;
            }
            .statistiques {
                background-color:#d8fdf0;
                display: flex;
                height: 300px;
                align-items: flex-end;
            }
            .statistique-barre {
                flex-grow: 1;
                border: 1px solid #ccc;
                margin: 6px;

            }
            .bar1 {
                height: 50%;
                background-color: #ec1c24;
            }
            .bar2 {
                height: 95%;
                background-color: #00a8f3;
            }
            .bar3 {
                height: 65%;
                background-color: #ec1c24;
            }
            .bar4 {
                height: 95%;
                background-color: #00a8f3;
            }
            .bar5 {
                height: 90%;
                background-color: #00a8f3;
            }
            .legende {
                background-color:   #d8fdf0;
                border-radius: 10px;

            }
             .legende h4 {
                 padding: 1rem;
             }
             td .evolution {
                 display: inline-block;
                 height: 15px;
                 width: 15px;
                 margin-right: 1rem;
                 border-radius: 50%;

             }
             .evolution.color-one{
                 background-color: #ec1c24;
             }
             .evolution.color-two{
                 background-color: #00a8f3;
             }
             .txt-deco {
                 padding: 1rem;
                 font-weight: 500;
                 color: gray;
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
             @media only screen and (max-width: 960px){
                 .cards{
                     grid-template-columns: repeat(3, 1fr);
                 }
                 .recent-grid{
                     grid-template-columns: 60% 40%;
                 }
             }
             @media only screen and (max-width: 768px){
                 .cards{
                     grid-template-columns: 100%;
                 }
                 .composant{
                     grid-template-columns: repeat(1, 1fr);
                 }
                 .search-wrapp{
                     display: none;
                 }
                 .sidebar{
                     left: -100%;
                 }
                 header p {
                     display: flex;
                     align-items: center;
                 }
                 header p label{
                     display: flex;
                     padding-right: 0rem;
                     margin-right: 1rem;
                     height: 40px;
                     width: 40px;
                     border-radius: 50%;
                     color: #fff;
                     align-items: center;
                     justify-content: center;
                     background-color: #008ea1;

                 }
                 header p span {
                     text-align: center;
                     padding-right: 0rem;
                 }
                 .main-content {
                     width: 100%;
                     margin-left: 0rem;

                 }
                 header {
                     width: 100%;
                     left: 0;
                 }
                 #menu:checked ~ .sidebar {
                     left:0;
                     z-index: 100;
                     width: 45%;
                 }
                 #menu:checked ~ .sidebar li a{
                     padding-left: 1rem;
                 }
                 #menu:checked ~ .sidebar .sidebar-brand,
                 #menu:checked ~ .sidebar li{
                     padding-left: 2rem;
                     text-align: left;
                 }
                 #menu:checked ~ .sidebar .sidebar-brand, h1 span:last-child,
                 #menu:checked ~ .sidebar li a span:last-child{
                     display: inline;
                 }
                 #menu:checked ~  .content{
                     margin-left: 0rem;

                 }

             }
             @media only screen and (max-width: 560px){
                 .cards{
                     grid-template-columns: 100%;

                 }
                 
             }
             @media only screen and (max-width: 1200px){
                 .sidebar{
                     width: 60px;
                 }
                 .sidebar .sidebar-brand, h1 span:last-child,
                 .sidebar li a span:last-child{
                     display: none;
                 }
                 .main-content{
                     margin-left: 60px;
                 }
                 .main-content header{
                     width: calc(100% - 60px);
                     left: 60px;
                 }
                }


            
      </style>

      <!-------------------------------end style------------------------------->
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
                      <a href="admin.php" class="nav-link active"><span class="las la-tachometer-alt"></span>
                      <span>Dashboard</span></a>
                  </li>
                  <li>
                      <a href="customers.php" class="nav-link"><span class="las la-users"></span>
                      <span>Customers</span></a>
                  </li>
                  <li>
                      <a href="employee.php" class="nav-link "><span class="las la-user-tie"></span>
                      <span>Employee</span></a>
                  </li>
                  <li>
                      <a href="contact.php" class="nav-link "><span class="las la-address-book"></span>
                      <span>Contacts</span></a>
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
                      <a href="model.php" class="nav-link"><span class="las la-car-side"></span>
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
                      <a href="timeslips.php" class="nav-link "><span class="las la-file-invoice"></span>
                      <span>Timeslips</span></a>
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
                  </label><span class="accueil">Dashboard</span>
                  
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
                     
                     <li><a class="dropdown-item" href="edit_accounts.php">Setting</a></li>
                     <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
                     <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                   </ul>
                </div>

              
          </header>
           <!---------------------section content--------------------->
          <section>
              <div class="cards" >
                  
                  <div class="card-single">
                      <div>
                         <h2>55</h2>
                         <a href="customers.php" class="nav-link"><small>Customers</small></a>
                      </div>
                      <div>
                         <span class="las la-users"></span>
                      </div>
                  </div>
                  

                  <div class="card-single">
                      <div>
                          <h2>20</h2>
                          <a href="order.php" class="nav-link"><small>Orders</small></a>
                      </div>
                      <div>
                          <span class="las la-shopping-bag"></span>
                      </div>
                  </div>
                  

                  <div class="card-single">
                      <dia>
                          <h2>39</h2>
                          <a href="tasks.php" class="nav-link"><small>Tasks</small></a>
                      </dia>
                      <div>
                         <span class="las la-clipboard-list"></span>
                      </div>
                  </div>
                  

                  <div class="card-single">
                      <div>
                          <h2>5k</h2>
                          <small>Income</small>
                      </div>
                      <div>
                         <span class="las la-wallet"></span>
                      </div>
                  </div>
                  
                  <div class="card-single">
                      
                      <div>
                          
                          <h2>20</h2>
                          <a href="model.php" class="nav-link"><small>Model</small></a>
                      </div>
                      <div>
                         <span class="las la-car-side"></span>
                      </div>
                  </div>
                  <div class="card-single">
                      <div>
                          <h2>180</h2>
                          <a href="documents.php" class="nav-link"><small>Documents</small></a>
                      </div>
                      <div>
                         <span class="las la-file"></span>
                      </div>
                  </div>
                  <div class="card-single">
                      <div>
                          <h2>5</h2>
                          <a href="accounts.php" class="nav-link"><small>Accounts</small></a>
                      </div>
                      <div>
                         <span class="las la-user-circle"></span>
                      </div>
                  </div>
                  <div class="card-single">
                      <div>
                          <h2>31</h2>
                          <a href="invoice.php" class="nav-link"><small>Invoices</small></a>
                      </div>
                      <div>
                         <span class="las la-file-invoice-dollar"></span>
                      </div>
                  </div>
                  <div class="card-single">
                      <div>
                          <h2>70</h2>
                          <small>Expenses</small>
                      </div>
                      <div>
                         <span class="las la-credit-card"></span>
                      </div>
                  </div>
                  <div class="card-single">
                      <div>
                          <h2>50</h2>
                          <a href="inventory.php" class="nav-link"><small>Inventory</small></a>
                      </div>
                      <div>
                         <span class="las la-warehouse"></span>
                      </div>
                  </div>
              </div>

              <div class="composant">
                  <div class="ventes">
                      <div class="case">
                          <div class="header-case">
                              <h2>Lists products</h2>
                              <button class="button">view more <span class="las la-arrow-circle-right"></span></button>
                          </div>
                          <div class="body-case">
                              <div class="table">
                                  <table width="100%">
                                      <thead>
                                          <tr>
                                              <td>A</td>
                                              <td>B</td>
                                              <td>C</td>

                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td>A</td>
                                              <td>A</td>
                                              <td><span class="status-product color-one"></span>massage</td>
                                          </tr>
                                          <tr>
                                              <td>A</td>
                                              <td>A</td>
                                              <td><span class="status-product color-two"></span>massage</td>
                                          </tr>
                                          <tr>
                                              <td>A</td>
                                              <td>A</td>
                                              <td><span class="status-product color-three"></span>massage</td>
                                          </tr>
                                          <tr>
                                              <td>A</td>
                                              <td>A</td>
                                              <td><span class="status-product color-four"></span>massage</td>
                                          </tr>
                                          <tr>
                                              <td>A</td>
                                              <td>A</td>
                                              <td><span class="status-product color-five"></span>massage</td>
                                          </tr>
                                      </tbody>

                                  

                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="stock">
                      <div class="case">
                          <div class="header-case">
                              <h2>Clients fideles</h2>
                          </div>

                          <div class="body-case">
                              <div class="all-users">
                                  <div class="infors">
                                      <img src="img/avatar-7.png" width="30" height="30">
                                      <div>
                                          <h4>Omar</h4>
                                          <small>Embulant</small>
                                      </div>
                                  </div>

                                  <div class="user-contact">
                                      <span class="lab la-facebook"></span>
                                      <span class="las la-phone"></span>
                                      <span class="lab la-whatsapp"></span>
                                  </div>
                              </div>

                              <div class="all-users">
                                  <div class="infors">
                                      <img src="img/avatar-7.png" width="30" height="30">
                                      <div>
                                          <h4>Omar</h4>
                                          <small>Embulant</small>
                                      </div>
                                  </div>

                                  <div class="user-contact">
                                      <span class="lab la-facebook"></span>
                                      <span class="las la-phone"></span>
                                      <span class="lab la-whatsapp"></span>
                                  </div>
                              </div>

                              <div class="all-users">
                                  <div class="infors">
                                      <img src="img/avatar-7.png" width="30" height="30">
                                      <div>
                                          <h4>Omar</h4>
                                          <small>Embulant</small>
                                      </div>
                                  </div>

                                  <div class="user-contact">
                                      <span class="lab la-facebook"></span>
                                      <span class="las la-phone"></span>
                                      <span class="lab la-whatsapp"></span>
                                  </div>
                              </div>

                              <div class="all-users">
                                  <div class="infors">
                                      <img src="img/avatar-7.png" width="30" height="30">
                                      <div>
                                          <h4>Omar</h4>
                                          <small>Embulant</small>
                                      </div>
                                  </div>

                                  <div class="user-contact">
                                      <span class="lab la-facebook"></span>
                                      <span class="las la-phone"></span>
                                      <span class="lab la-whatsapp"></span>
                                  </div>
                              </div>

                              
                          </div>
                          <button class="btn">view more <span class="las la-arrow-circle-right"></span></button>
                      </div>
                  </div>

                  <div class="statistiques">
                      <div class="statistique-barre bar1"></div>
                      <div class="statistique-barre bar2"></div>
                      <div class="statistique-barre bar3"></div>
                      <div class="statistique-barre bar4"></div>
                      <div class="statistique-barre bar5"></div>
                      <div class="statistique-barre bar1"></div>
                      <div class="statistique-barre bar2"></div>
                      <div class="statistique-barre bar3"></div>
                      <div class="statistique-barre bar4"></div>
                      <div class="statistique-barre bar5"></div>

                  </div>

                  <div class="legende">
                      <h4>legende</h4>
                      <table>
                          <tr>
                              <td><span class="evolution color-one"></span>Expenses</td>
                          </tr>
                          <tr>
                              <td><span class="evolution color-two"></span>Income</td>
                          </tr>
                          
                      </table>

                      <div class="txt-deco">
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
                      </div>
                  </div>
              </div>

              
          </section>

      </div>




      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  </body>
    



</html>
