<?php include('../includes/connect.php');
    include('../function.php');
    @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
     <!-- bootstrap cslink-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<h2 class="text-center mb-5">Admin Login</h2>
<div class="row d-flex justify-content-center align-items-center">
<div class="col-lg-6">
    <img src="../images/admin.png" alt="" class="img-fluid">
</div>
<div class="col-lg-6">
<form action="" method="post" enctype="multipart/form-data">
    <!-- username -->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="username" class="form-label">username</label>
     <input type="text" name="username"  id="username" class="form-control" placeholder="Enter your Username" required="required">
    </div>
    <!--password-->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="password" class="form-label">Password</label>
     <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
     <input type="submit" name="admin_login" class="btn" value="Login">
     <p class="small fw-bold mt-2 pt-1 mb-0">Don't you have an account? <a href="admin_registration.php" style="color:red;">Register</a></p>
    </div>
</form>
</div>


</div>  
</body>
<?php
include("../includes/footer.php")
?>
</html>
<?php  
if(isset($_POST['admin_login'])){
$admin_username=$_POST['username'];
$admin_password=$_POST['password'];

$select_query="Select * from `admin_table` where admin_name='$admin_username'";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
$row_data=mysqli_fetch_assoc($result);
if($row_count>0){
    
    $_SESSION['username']=$admin_username;  
        if($admin_password==$row_data['admin_password']){
                    $_SESSION['username']=$admin_username;  
                    echo "<script>alert('Loggedin Sucessfully')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
        }else{
        echo "<script>alert('Invalid Credentials, Incorrect password')</script>";
        }
}else{
    echo "<script>alert('Invalid Credentials, You need register first')</script>";
}
}

?>