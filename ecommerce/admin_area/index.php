<?php include('../includes/connect.php');
    include('../function.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="../images/logo.png" width="100px">
                    <?php
                        
                        if(!isset($_SESSION['username'])){
                        echo "<script>window.open('admin_login.php','_self')</script>";
                        }else{
                             echo "<b><big>
                             welcome ".$_SESSION['username']."!😎</b></big>";                           
                         } 
                        ?>
                </div>
                <a href="admin_logout.php" class="btn">Logout</a>
            </div>

            <div class="bg-light"><h3 class="text-center p-2">Manage Details</h3></div>
          
        <div class="row">
            <div class="col-md-8 bg-secondary p-1 d-flex align-items-center">

                <div class=" button text-center">
                    <button class="my-2"><a href="insert_product.php" class="btn nav-link text-light bg-danger my-1">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="btn nav-link text-light bg-danger my-1">View Products</a></button>
                    <button><a href="index.php?insert_brands" class="btn nav-link text-light bg-danger my-1">Insert Brand</a></button>
                    <button><a href="index.php?all_payments" class="btn nav-link text-light bg-danger my-1">All payments</a></button>
                    <button><a href="index.php?list_users" class="btn nav-link text-light bg-danger my-1">List users</a></button>
                    
                </div>
            </div>
        </div>
<?php
    if(isset($_GET['insert_brands'])){
        include('insert_brands.php');}
    if(isset($_GET['view_products'])){
            include('view_products.php');}
    if(isset($_GET['delete_product'])){
            include('delete_product.php');}
    if(isset($_GET['list_users'])){
            include('list_users.php');}
    if(isset($_GET['all_payments'])){
            include('allpayments.php');}
?>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<?php
include("../includes/footer.php")
?>
</html>