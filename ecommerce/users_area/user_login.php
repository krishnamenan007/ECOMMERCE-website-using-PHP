<?php 
include('../includes/connect.php');
include('../function.php');
@session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
     <!-- bootstrap cslink-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" style="text/css" href="../style.css">
   
</head>
<style>
body{
    overflow-x:hidden;
}
</style>
<body>
    <div class="container-fluid m-3 ">
    <h2 class="text-center">User Login
    </h2>
    <div class="row d-flex align-items-center justify-content-center">
    <div class="col-lg-12 col-xl-6">
    <form action="" method="post">
    <!-- username -->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="user_username" class="form-label">Username</label>
     <input type="text" name="user_username"  id="user_username" class="form-control" placeholder="Enter your Username" required="required">
    </div>

    <!--password-->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="user_password" class="form-label">Password</label>
     <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password" required="required">
    </div>
    
    <div class="form-outline mb-4 w-50 m-auto">
     <input type="submit" name="user_login" class="btn" value="Login">
     <p class="small fw-bold mt-2 pt-1 mb-0">Dont't have an account? <a href="user_registration.php" class="text-danger">Register</a></p>
    </div>
    
    
    
    </form>
    </div>
    </div>

    </div>
</body>
</html>
<?php  
if(isset($_POST['user_login'])){
$user_username=$_POST['user_username'];
$user_password=$_POST['user_password'];

$select_query="Select * from `user_table` where username='$user_username'";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
$row_data=mysqli_fetch_assoc($result);
$user_ip=getIPAddress();


$select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
$select_cart=mysqli_query($con,$select_query_cart);
$row_count_cart=mysqli_num_rows($select_cart);

if($row_count>0){
    
    $_SESSION['username']=$user_username;  
         if($user_password==$row_data['user_password']){
                if($row_count==1 and $row_count_cart==0){
                    $_SESSION['username']=$user_username;  
                    echo "<script>alert('Loggedin Sucessfully')</script>";
                   
                    echo "<script>window.open('../product.php','_self')</script>";
                    
        }else{
            
            $_SESSION['username']=$user_username;  
            echo "<script>alert('You have pending payments for your orders so you willbe redirected to Cart section')</script>";
            echo "<script>window.open('../cart.php','_self')</script>";

        }
    }else{
        echo "<script>alert('Invalid Credentials, Incorrect password')</script>";
    }
}else{
    echo "<script>alert('Invalid Credentials, You need register first')</script>";
}



}

?>