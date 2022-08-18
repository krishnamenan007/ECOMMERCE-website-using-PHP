 <?php
include('includes/connect.php');
include('function.php');
session_start();
?>

<!DOCTYPE html>
<html lang ="en">
    <head>
    <meta charset="UTF-8">
    <title>All products-Bikers Corner</title>
    
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


                        ?></ul>
                
                
                <?php cart(); ?>
                </nav>
            </div>
            <form action="search_product.php" method="get">
                <div class="input-mb-3 w-25">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search_data">
                <!-- <button class="btn"  type="submit">Search</button> -->
                <input type="submit" value="Search" class="btn" name="search_data_product">

                </div>
                </form>
           
    
    <!--featured products-->
        <div class="row px-1">
            
            <div class="col-md-10">
                <!--products-->
                <div class="row overflow-hidden">
                <!--fetching products-->
                    <?php
                    
                    

                    if(isset($_GET['brand'])){
                        $brand_id=$_GET['brand'];

                        $select_query="Select * from `products` where id= $brand_id";
                        $result_query=mysqli_query($con,$select_query);
                        $num_of_rows=mysqli_num_rows($result_query);
                        if($num_of_rows==0){
                            echo "<h1 class='text-center text-danger'>NO STOCK AVAILABLE NOW</h1>";
                        }
                       // 
                        while($row=mysqli_fetch_assoc($result_query)){
                            $product_id=$row['product_id'];
                            $product_title=$row['product_title'];
                            $product_description=$row['product_description'];
                            $product_image1=$row['product_image1'];
                            $product_price=$row['product_price'];
                            $brand_id=$row['id'];
                            echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img class='card-img-top' src='./admin_area/product_images/$product_image1' alt='$product_title'>
                                <div class='card-body'>
                                  <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'> $product_description</p>
                                    <p class='card-text'> price: $product_price/-</p>
                                    <a href='product.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-info' >view more</a>
                                </div>
                            </div>
                            </div>";
                        }
                    }else{
                        
                        $select_query="Select * from `products` order by rand()";
                        $result_query=mysqli_query($con,$select_query);
                       // 
                        while($row=mysqli_fetch_assoc($result_query)){
                            $product_id=$row['product_id'];
                            $product_title=$row['product_title'];
                            $product_description=$row['product_description'];
                            $product_image1=$row['product_image1'];
                            $product_price=$row['product_price'];
                            $brand_id=$row['id'];
                            echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img class='card-img-top' src='./admin_area/product_images/$product_image1' alt='$product_title'>
                                <div class='card-body'>
                                  <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'> $product_description</p>
                                    <p class='card-text'> price: $product_price/-</p>
                                    <a href='product.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                    <a href='product_details.php?product_id=$product_id'class='btn btn-secondary'>view more</a>
                                </div>
                            </div>
                            </div>";
                        }


                    }
                    // $ip = getIPAddress();  
                    // echo 'User Real IP Address - '.$ip;  

                    ?>
                    
                </div>
            </div>    
                
                            
            
            <div class="col-md-2 bg-secondary p-0">
                
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>BRANDS</h4></a>
        	        </li>


                <?php
                $select_brands="Select * from `brand`";
                $result_brands=mysqli_query($con,$select_brands);
                
               // echo $row_data['brand_title'];
               while($row_data=mysqli_fetch_assoc($result_brands)){
                   $brand_title=$row_data['brand_title'];
                   $brand_id=$row_data['id'];
                   echo "<li class='nav-item'>
                   <a href='product.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
               </li>";
               }
               ?>
            </div>
        </div>
    </div>
      
    
<?php
include("./includes/footer.php")
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>