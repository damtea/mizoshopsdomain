<?php
include 'dbconnection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
     if($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if(isset($_POST['name']))
  {

    $name=$_POST['name'];
    $query="UPDATE customer SET CUSTOMER_NAME='".$name."' where CUSTOMER_ID='".$_SESSION['customer_id']."'";
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