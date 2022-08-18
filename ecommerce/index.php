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
            <div class="row">
                <div class="col-2">
                    <h1>We are professional, passionate & driven motorcyclists</h1>
                    <p>Sucess isn't always about greatness. It's about consistency. Consistent<br>hard work gains sucess. Greatness will come.</p>
                    <a href="product.php" class="btn">Explore Now &#10148;</a>
                </div>
                <div class="col-2">
                    <img src="images/img1.jpg">
                </div>
            </div> 
        </div>
    </div>  

    <!--- categories-->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="images/helmet2.jpg">
                </div>
                <div class="col-3">
                    <img src="images/engine1.jpg">
                </div>
                <div class="col-3">
                    <img src="images/shockabs1.jpg">
                </div>
                <div class="col-3">
                    <img src="images/sprocket1.jpg">
                </div>
                <div class="col-3">
                    <img src="images/tire1.jpg">
                </div>
                <div class="col-3">
                    <img src="images/disc1.jpg">
                </div>
            </div>
        </div>
    </div>
    <!--featured products--
    <div class="small-container">
        <h2>Featured products</h2>
        <div class="row">
            <div class="col-4">
                <img src="images/tire1.jpg">
            </div>
        </div>
    </div>-->
    <?php
include("./includes/footer.php")
?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>