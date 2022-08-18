<?php
include('../includes/connect.php');
?>
<!DOCTYPE html>
<html lang ="en">
    <head>
    <meta charset="UTF-8">
    <title>Checkout-Bikers Corner</title>
    
    <!-- bootstrap cslink-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" style="text/css" href="../style.css">
    <style>
 
    </style>
    </head>
    <body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="../images/logo.png" width="100px">
                </div>
                <nav>
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../product.php">Products</a></li>
                        <li><a href="../about.php">About</a></li>
                        <?php
                        session_start();
                        if(!isset($_SESSION['username'])){
                        echo "<li ><a href='user_login.php'>Login</a></li>";
                        echo "<li ><a href='user_registration.php'>Register</a></li>";
                        }else{

                            echo "<li ><a href='logout.php'>Logout</a></li>";
                        }
                        if(!isset($_SESSION['username'])){
                            echo "<li class='nav-item'>welcome guest!</li>";
                            

                         }else{
                            echo "<li><b>
                            welcome ".$_SESSION['username']."!😎<b>
                            </li></b>";
                             
                         } 


                        ?>             
                    </ul> 
                <form action="search_product.php" method="get">
                <div class="input-mb-3 w-25">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search_data">
                <!-- <button class="btn"  type="submit">Search</button> -->
                <input type="submit" value="Search" class="btn" name="search_data_product">
                </form>
                </div>
                </nav>
            </div>
        </div>

        <div class="row px-1">
        <div class="col-md-12">
        <div class="row">
        <?php
        if(!isset($_SESSION['username'])){
            include('user_login.php');
        }else{
            include('../payment.php');
        }
        ?>
        </div>
        </div>
        </div>


    </div>

        
    
 
       
<?php
include("../includes/footer.php")
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>