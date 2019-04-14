<?php

include 'dbconnection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
     if($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if(isset($_POST['pname']) && isset($_POST['pbrand']) && isset($_POST['psp']) && isset($_POST['pprice']) && isset($_POST['pqty']) && isset($_POST['pdesc']) && isset($_POST['cat']) )
  {

    $pname=$_POST['pname'];
    $pbrand=$_POST['pbrand'];
    $psp=(double)$_POST['psp'];
    $pprice=(double)$_POST['pprice'];
    $pqty=(double)$_POST['pqty'];
    $cat=$_POST['cat'];
    $pdesc=$_POST['pdesc'];
   
    $prefix="msdp";
    $id= uniqid($prefix);
        
    $query2="SELECT CPID from catproduct where PRODUCT='$cat'";
    $result = mysqli_query($conn,$query2);
    while($cpids= mysqli_fetch_assoc($result))
    {
    $cpid=(int)$cpids['CPID'];
    }
   $seller_id=$_SESSION['seller_id'];
            $query="INSERT INTO product (`PRODUCT_ID`, `PRODUCT_NAME`, `PRODUCT_BRAND`, `PRODUCT_DESC`, `PRODUCT_DATE`, `SELLER_ID`, `PRODUCT_PRICE`, `PRODUCT_SP`, `CPID`, `PRODUCT_QTY`) VALUES ('$id','$pname','$pbrand','$pdesc',now(),'$seller_id',$pprice,$psp,$cpid,$pqty)";
                if (mysqli_query($conn, $query)) {
//              
     echo '<div class="alert icon-alert with-arrow alert-success form-alter" role="alert">
			<i class="fa fa-fw fa-check-circle"></i>
			<strong> Success ! </strong> <span class="success-message"></span>
		</div>';
      }
            } else {
            echo 'Error';
              
            }
            $conn->close();

  //}
//  else
//  {
//      echo "Receive kim lo";
//      
//  }
//}
//else
//{
//    echo "A lut thla lo";
//}
}
?>