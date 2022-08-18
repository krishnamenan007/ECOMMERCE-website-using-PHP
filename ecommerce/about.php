<?php
include('includes/connect.php');
include('function.php');
?>
<!DOCTYPE html>
<html lang ="en">
    <head>
    <meta charset="UTF-8">
    <title>Bikers Corner</title>
    
    <!-- bootstrap cslink-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="images//logo.png" width="100px">
                </div>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="product.php">Products</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a></li>
                        <?php
                        session_start();
                        if(!isset($_SESSION['username'])){
                        echo "<li ><a href='./users_area/user_login.php'>Login</a></li>";
                        echo "<li ><a href='./users_area/user_registration.php'>Register</a></li>";
                        }else{

                            echo "<li ><a href='./users_area/logout.php'>Logout</a></li>";
                        }
                        if(!isset($_SESSION['username'])){
                            echo "<li class='nav-item'><b>welcome guest!</b></li>";
                            

                         }else{
                             echo "<li><b>
                             welcome ".$_SESSION['username']."!😎</b>
                             </li>";
                             
                         } 


                        ?>
                    </ul>
                          

                </nav>
            </div>
<head>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background: ;
  color: red;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<div class="about-section">
  <h1 class="text-dark"><b>About Us</b> </h1>
  <p><big><b>We are professional, passionate & driven motorcyclists. we import the products which are needed for our customers and ensure a safe delivery for you.</big></b></p>
  
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="./images/krishna.jpg" alt="Jane" style="width:100%">
      <div class="container">
        <h2>Krishnamenan</h2>
        <p class="title">CEO & Founder</p>
        <p>i'm the CEO of this company. Feel free to contact me any time.</p>
        <p>krishna007@gmail.com</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="./images/kassa.jpg" alt="Mike" style="width:100%">
      <div class="container">
        <h2>Thiviyan</h2>
        <p class="title">Manager & Co Founder</p>
        <p>I'm the manager of this company. How can i help you?</p>
        <p>kassa690@gmail.com</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="./images/bariya.jpg" alt="John" style="width:100%">
      <div class="container">
        <h2>Mydreyan</h2>
        <p class="title">Designer</p>
        <p>I'm the designer of this platform.Any troubles,i'm always available.</p>
        <p>barya420@example.com</p>
      </div>
    </div>
  </div>
</div>
<?php
include("./includes/footer.php")
?>
</html>