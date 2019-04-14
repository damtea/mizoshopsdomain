<?php

include 'dbconnection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if(!empty($_POST['email']) && !empty($_POST['password'])) 
{
    
    
$email=$_POST['email'];
$password=$_POST['password'];
$password= md5($password);
$query="SELECT * from customer where CUSTOMER_EMAIL='$email' and CUSTOMER_PASSWORD='$password'";
$result = mysqli_query($conn,$query);
$count = mysqli_num_rows($result);

 }
if($count == 1) {
     while($customer=mysqli_fetch_assoc($result))
      {
      $_SESSION['customer_id'] = $customer['CUSTOMER_ID'];
       $_SESSION['customer_email'] = $customer['CUSTOMER_EMAIL'];
       $_SESSION['customer_name'] = $customer['CUSTOMER_NAME'];
       $_SESSION['customer_contact'] = $customer['CUSTOMER_CONTACT'];
       $_SESSION['login'] = "yes";
      echo "Success";
      }
      }else {
         echo "Username or Password Incorrect!";
         
      }
      mysqli_close($conn);
}
else{
    echo "Chhut kim vek a ngai!";
   
}


?>