<h3 class="text-center ">All Users</h3>
<table class="table table-bordered mt-5">
<thead class="bg-secondary">

<?php
$get_payments="Select * from `user_table`";
$result=mysqli_query($con,$get_payments);
$row_count=mysqli_num_rows($result);

if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No Users yet</h2>";
}else{
    echo "<tr>
    <th>User ID</th>
    <th>Username</th>
    <th>User email</th>
    <th>User Address</th>
    <th>User Mobile</th>
    </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
    while($row=mysqli_fetch_assoc($result)){
        $user_id=$row['user_id'];
        $username=$row['username'];
        $user_address=$row['user_address'];
        $user_email=$row['user_email'];
        $user_mobile=$row['user_mobile'];
        echo "<tr class='text-center'>
    <td>$user_id</td>
    <td>$username</td>
    <td> $user_email</td>
    <td>$user_address</td>
    <td>$user_mobile</td>
    </tr>";
    }
}

?>
</tbody>


</table>







