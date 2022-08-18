<h3 class="text-center ">All Products</h3>
<table class="table table-bordered mt-5">
<thead class="bg-secondary">
<tr>
<th>Product ID</th>
<th>Product Title</th>
<th>Product Image</th>
<th>Product Price</th>
<th>Total Sold</th>
<th>Status</th>
<th>Delete</th>
</tr>
</thead>
<tbody class="bg-dark text-light">
<?php
$get_products="Select * from `products`";
$result=mysqli_query($con,$get_products);
while($row=mysqli_fetch_assoc($result)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $status=$row['status'];
    echo "<tr class='text-center'>
    <td>$product_id</td>
    <td>$product_title</td>
    <td> <img src='./product_images/$product_image1' class='cart_img'></td>
    <td>$product_price/-</td>
    <td>0</td>
    <td>$status</td>
    <td><a href='index.php?delete_product=$product_id' class='text-light'><i class='fa-solid fa-trash'></a></td>
    </tr>";
}
?>


</tbody>


</table>
