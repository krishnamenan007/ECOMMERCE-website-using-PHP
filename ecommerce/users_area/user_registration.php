<?php include('../includes/connect.php');
    include('../function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
     <!-- bootstrap cslink-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- style sheet -->
    <link rel="stylesheet" style="text/css" href="../style.css">
</head>
<body>
    <div class="container-fluid m-3 ">
    <h2 class="text-center">New User Registration
    </h2>
    <div class="row d-flex align-items-center justify-content-center">
    <div class="col-lg-12 col-xl-6">
    <form action="" method="post" enctype="multipart/form-data">
    <!-- username -->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="user_username" class="form-label">username</label>
     <input type="text" name="user_username"  id="user_username" class="form-control" placeholder="Enter your Username" required="required">
    </div>
    <!--email-->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="user_email" class="form-label">Email</label>
     <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter your email" required="required">
    </div>
    <!--image-->
    <!-- <div class="form-outline mb-4 w-50 m-auto">
     <label for="user_image" class="form-label">User image</label>
     <input type="file" name="user_image" id="user_image" class="form-control" required="required">
    </div> -->
    <!--password-->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="user_password" class="form-label">Password</label>
     <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password" required="required">
    </div>
    <!--confirm password-->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="conf_user_password" class="form-label">Confirm Password</label>
     <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" placeholder="Confirm your password" required="required">
    </div>
     <!-- address -->
     <div class="form-outline mb-4 w-50 m-auto">
     <label for="user_address" class="form-label">Address</label>
     <input type="text" name="user_address"  id="user_address" class="form-control" placeholder="Enter your Address" required="required">
    </div>
     <!-- contact -->
     <div class="form-outline mb-4 w-50 m-auto">
     <label for="user_contact" class="form-label">Contact</label>
     <input type="text" name="user_contact"   id="user_contact"  class="form-control" placeholder="Enter your Mobile number" required="required">
    </div>

    <div class="form-outline mb-4 w-50 m-auto">
     <input type="submit" name="user_register" class="btn" value="Register">
     <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php" style="color:red;">Login</a></p>
    </div>
    
    
    
    </form>
    </div>
    </div>

    </div>
</body>
<?php
include("../includes/footer.php")
?>
</html>
<!-- php -->
<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $cong_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_ip=getIPAddress();

    $select_query="Select * from `user_table` where user_email='$user_email' or username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);

    if($rows_count>0){
        echo "<script>alert('Username or Email already exist')</script>";
    }elseif($user_password!=$cong_user_password){
        echo "<script>alert('Passwords donot match')</script>";
    }else{
        $insert_query="insert into `user_table` (username,user_email,user_password,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$user_password','$user_ip','$user_address','$user_contact')";
        $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute){
            echo "<script>alert('Account created sucessfully')</script>";
        }
    }

// selecting cart items
$select_cart_items="Select * from `cart_details` where ip_address='$user_ip')";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
    session_start();
    $_SESSION['username']=$user_username;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
}else{
    echo "<script>window.open('../product.php','_self')</script>";
}

    
    
}






?>