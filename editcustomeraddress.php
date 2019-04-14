<?php
include 'dbconnection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
     if($_SERVER["REQUEST_METHOD"] == "POST") 
{
if(isset($_POST['locality']) || isset($_POST['address']) || isset($_POST['pincode']) || isset($_POST['landmark']) || isset($_POST['state']))
  {

   
    $query="UPDATE customer SET CUSTOMER_LOCALITY='".$_POST['locality']."', CUSTOMER_ADDRESS='".$_POST['address']."', CUSTOMER_PINCODE=".(int)$_POST['pincode'].", CUSTOMER_STATE='".$_POST['state']."', CUSTOMER_LANDMARK='".$_POST['landmark']."' where CUSTOMER_ID='".$_SESSION['customer_id']."'";
                if (mysqli_query($conn, $query)) {
                    echo "Success";
                }
                else
                {
                    echo "<label class='text-danger'>There is some error</label>";
                    
                }
                }
                }
    
  

?>