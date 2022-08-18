<?php
include('includes/connect.php');?>
<?php
    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }  
    // $ip = getIPAddress();  
    // echo 'User Real IP Address - '.$ip;  

    //cart function
     function cart(){

         if(isset($_GET['add_to_cart'])){
             global $con;
             $get_ip_add = getIPAddress(); 
             $get_product_id=$_GET['add_to_cart'];
             $select_query="Select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
             $result_query=mysqli_query($con,$select_query);
             $num_of_rows=mysqli_num_rows($result_query);
             if($num_of_rows>0){
                 echo "<script>alert('This item is already present in cart')</script>";
                 echo "<script>window.open('product.php','_self')</script>";
             }else{
                 $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
                 $result_query=mysqli_query($con,$insert_query);
                 echo "<script>alert('This item is added in cart')</script>";
                 echo "<script>window.open('product.php','_self')</script>";
             }

         }
     }

// to display cart iem numbers
function cart_item(){

    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress(); 
        $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        }
        else{
            global $con;
            $get_ip_add = getIPAddress(); 
            $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
            $result_query=mysqli_query($con,$select_query);
            $count_cart_items=mysqli_num_rows($result_query);
        }
        echo $count_cart_items;

    }







?>