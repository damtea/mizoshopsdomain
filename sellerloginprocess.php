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

$query="SELECT * from sellers where SELLER_EMAIL='$email' and SELLER_PASSWORD='$password'";
$result = mysqli_query($conn,$query);
$count = mysqli_num_rows($result);

 }
if($count == 1) {
     while($customer=mysqli_fetch_assoc($result))
      {
      $_SESSION['seller_id'] = $customer['SELLER_ID'];
       $_SESSION['seller_email'] = $customer['SELLER_EMAIL'];
       $_SESSION['seller_company'] = $customer['SELLER_COMPANY'];
       $_SESSION['seller_contact'] = $customer['SELLER_CONTACT'];
       
      echo "Success";
      }
      }else {
         echo "Email or Password Incorrect!";
         
      }
      mysqli_close($conn);
}
else{
    echo "Chhut kim vek a ngai!";
   
}


?>