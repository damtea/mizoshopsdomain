<?php
include 'dbconnection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['customer_id']))
{
    $customer_id=$_SESSION['customer_id'];
    
    $querys="SELECT * from cart where CUSTOMER_ID='$customer_id'";
    $results= mysqli_query($conn,$querys);
    $counts=(int)mysqli_num_rows($results);
    $_SESSION['cart']=$counts;
}
else
{
    $_SESSION['cart']='0';
    
}
  
?>