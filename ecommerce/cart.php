<?php
include('includes/connect.php');
include('function.php');
?>

<!DOCTYPE html>
<html lang ="en">
    <head>
    <meta charset="UTF-8">
    <title>Bikers Corner-Cart details</title>
    
    <!-- bootstrap cslink-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>.cart_img{
  width: 100px;
  height: 100px; 
  object-fit:contain;
}
    </style>
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
                             welcome ".$_SESSION['username']."!😎<b>
                             </li></b>";
                             
                         } 


                        ?>
                    </ul> 
                </div>
                <?php cart(); ?>
                </nav>
            </div>
            <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan="2">Operations</th>
                </tr>    
                </thead>
                <tbody>
                <?php
                    global $con;
                    $get_ip_add = getIPAddress();
                    $total_price=0;
                    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                    $result=mysqli_query($con,$cart_query);
                    while($row=mysqli_fetch_array($result)){
                        $product_id=$row['product_id'];
                        $select_products="Select * from `products` where product_id='$product_id'";
                        $result_products=mysqli_query($con,$select_products);
                        while($row_product_price=mysqli_fetch_array($result_products)){
                            $product_price=array($row_product_price['product_price']);
                            $price_table=($row_product_price['product_price']);
                            $product_title=($row_product_price['product_title']);
                            $product_image1=($row_product_price['product_image1']);
                            $product_values=array_sum($product_price);
                            $total_price+=$product_values;
                     
                    ?>
                
                <tr>
                <td><?php echo $product_title ?></td>
                <td><img src=".\admin_area\product_images\<?php echo $product_image1?>" alt="ee" class="cart_img"></td>
                <td><input type="text" name="qty" class="form-input w-50"></td>
                <?php 
                $get_ip_add=getIPAddress();
                if(isset($_POST['update_cart'])){
                    $quantities=$_POST['qty'];
                    $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                    $result_products_quantity=mysqli_query($con,$update_cart);
                    $total_price=$total_price*$quantities;
                }
                ?>
                <td><?php echo $price_table?>/-</td>
                <td><input type="checkbox"  value="<?php echo $product_id ?>" name="removeitem[]"></td>
                <td>
                <!-- <button class="bg-secondary px-3 py-2 border-1 mx-3">Update</button> -->
                <input type="submit" value="Update Cart" class="bg-secondary px-3 py-2 border-1 mx-3" name="update_cart" >
                <input type="submit" value="Remove Cart" class="bg-secondary px-3 py-2 border-1 mx-3" name="remove_cart" >
                </td>
                </tr>
                <?php
                   }
                }
                ?>
                </tbody>
                </table>
                <!-- subtotal -->
                <div class="d-flex">
                <h4 class="px-3">Subtotal:<strong class="text-dark"><?php echo $total_price ?>/-</strong></h4>
                <a href="product.php" class="btn  px-3 py-2 border-0 mx-3">Continue Shopping</a>
                <a href="./users_area/checkout.php"class="btn bg-secondary px-3 py-2 border-0 mx-3">Checkout</a>
    
                
                </div>
            </div>
        </div>
        </form>
        <!-- function to remove item from cart -->
        <?php
        function remove_cart_item(){
            global $con;
            if(isset($_POST['remove_cart'])){
                foreach($_POST['removeitem'] as $remove_id){
                    echo $remove_id;
                    $delete_query="Delete from `cart_details` where product_id=$remove_id";
                    $run_delete=mysqli_query($con,$delete_query);
                    if($run_delete){
                        echo "<script> window.open('cart.php','_self') </script>";

                    }
                }
                
            }


        }
        echo $remove_item=remove_cart_item();

        ?>
    
<?php
include("./includes/footer.php")
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>