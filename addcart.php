<?php

include 'dbconnection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
     if($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if(isset($_POST['product_id']))
  {

    $product_id=$_POST['product_id'];
    $customer_id=$_SESSION['customer_id'];
    $queryc="SELECT * from cart where CUSTOMER_ID=$customer_id and PRODUCT_ID=$product_id";
    $querys="SELECT * from cart where CUSTOMER_ID=$customer_id";
    $results= mysqli_query($conn,$querys);
    $counts=(int)mysqli_num_rows($results);
    $result=mysqli_query($conn, $queryc);
    $count=mysqli_num_rows($result);
    $_SESSION['counts']=$counts;
     $prefix="msdcrt";
    $id=uniqid($prefix);
    if($count==0)
    {
            $query="INSERT INTO cart (`CART_ID`,`CUSTOMER_ID`, `PRODUCT_ID`, `CART_DATE`, `CART_QTY`) VALUES ('$id','$customer_id','$product_id',now(),1)";
                if (mysqli_query($conn, $query)) {
                    $counts=$counts+1;
                    echo $counts;
            } 
            $conn->close();
    }
    else
    {
        $counts=$counts+1;
        $query="UPDATE cart SET CART_DATE=now(), CART_QTY=$counts where CUSTOMER_ID='$customer_id' and PRODUCT_ID=$product_id";
                if (mysqli_query($conn, $query)) {
               echo $_SESSION['counts'];
                } 
            $conn->close();
    }
}
  }
?>