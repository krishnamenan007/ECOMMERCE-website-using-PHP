<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    //images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image1']['tmp_name'];
    $temp_image3=$_FILES['product_image1']['tmp_name']; 

    //
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");

    //insertquery
    $insert_products="insert into `products` (product_title,product_description,product_keywords,id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title','$description','$product_keywords', '$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(), '$product_status')";
    $result_query=mysqli_query($con,$insert_products);
    if($result_query){
        echo "<script>alert('Product Added Succesfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container">
    <h1 class="text-center">Insert Products</h1>
    <!--form-->
    <form action="" method="post" enctype="multipart/form-data"> 
    <!--title-->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="product_title" class="form-label">Product title</label>
     <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" required="required">
    </div>
    <!--description-->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="description" class="form-label">Product description</label>
     <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" required="required">
    </div>
    <!--keyword-->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="product_keywords" class="form-label">Product keywords</label>
     <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" required="required">
    </div>
    <!--brands-->
    <div class="form-outline mb-4 w-50 m-auto">
    <select name="product_brands" id="" class="form-select">
    <option value="">Select a Brand</option>
    <?php
        $select_query="Select * from `brand`";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $brand_title=$row['brand_title'];
            $brand_id=$row['id'];
            echo "<option value='$brand_id'>$brand_title</option>";
      }
    ?>
    </select>
    </div>
     <!--img1-->
     <div class="form-outline mb-4 w-50 m-auto">
     <label for="product_image1" class="form-label">Product image 1</label>
     <input type="file" name="product_image1" id="product_image1" class="form-control"  required="required">
    </div>

    <!--img2-->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="product_image2" class="form-label">Product image 2</label>
     <input type="file" name="product_image2" id="product_image2" class="form-control"  required="required">
    </div>

    <!--img3-->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="product_image3" class="form-label">Product image 3</label>
     <input type="file" name="product_image3" id="product_image3" class="form-control"  required="required">
    </div>

    <!--price-->
    <div class="form-outline mb-4 w-50 m-auto">
     <label for="product_price" class="form-label">Product price</label>
     <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" required="required">
    </div>

     <!--price-->
     <div class="form-outline mb-4 w-50 m-auto">
     <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
    </div>

    </form>
    </div>
    <?php
include("../includes/footer.php")
?>
</body>
</html>


     
