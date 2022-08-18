<?php include('../includes/connect.php');
    include('../function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
     <!-- bootstrap cslink-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<h2 class="text-center mb-5">Admin Registration</h2>
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
    <!--email-->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="email" class="form-label">Email</label>
     <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required="required">
    </div>
    <!--password-->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="password" class="form-label">Password</label>
     <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required="required">
    </div>
    <!--confirm password-->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="confirm_password" class="form-label">Confirm Password</label>
     <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm your password" required="required">
    </div>

    <div class="form-outline mb-4 w-50 m-auto">
     <input type="submit" name="admin_registration" class="btn" value="Register">
     <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="admin_login.php" style="color:red;">Login</a></p>
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
if(isset($_POST['admin_registration'])){
    $admin_username=$_POST['username'];
    $admin_email=$_POST['email'];
    $admin_password=$_POST['password'];
    $cong_admin_password=$_POST['confirm_password'];
    

    $select_query="Select * from `admin_table` where admin_email='$admin_email' or admin_name='$admin_username'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);

    if($rows_count>0){
        echo "<script>alert('Username or Email already exist')</script>";
    }elseif($admin_password!=$cong_admin_password){
        echo "<script>alert('Passwords donot match')</script>";
    }else{
        $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password) values ('$admin_username','$admin_email','$admin_password')";
        $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute){
            echo "<script>alert('Account created sucessfully')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";

        }
    }
}






?>