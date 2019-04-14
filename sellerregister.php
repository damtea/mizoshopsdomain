<?php

include 'dbconnection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
     if($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if(isset($_POST['company']) && isset($_POST['email']) && isset($_POST['spassword']) && isset($_POST['cpassword']) && isset($_POST['address']) && isset($_POST['contact']) && isset($_POST['description']) && isset($_POST['owner']))
  {
      $company=$_POST['company'];
    $owner=$_POST['owner'];
    $spassword=$_POST['spassword'];
    $email=$_POST['email'];
    $cpassword=$_POST['cpassword'];
    $description=$_POST['description'];
    
    $address=$_POST['address'];
    
    $contact= doubleval($_POST['contact']);
   
    $prefix="hseller";
    $id= uniqid($prefix);
        if($spassword==$cpassword)
         {
            $password= md5($spassword);
            $query="INSERT INTO sellers VALUES ('$id','$owner','$company','$address',$contact,'$email','$description','$password',now())";
                if (mysqli_query($conn, $query)) {
               $_SESSION['seller_owner'] = $owner;
               $query1="SELECT * from sellers where SELLER_EMAIL='$email' and SELLER_PASSWORD='$password'";
                $result = mysqli_query($conn,$query1);
     while($customer=mysqli_fetch_assoc($result))
      {
      $_SESSION['seller_id'] = $customer['SELLER_ID'];
       $_SESSION['seller_email'] = $customer['SELLER_EMAIL'];
       $_SESSION['seller_company'] = $customer['SELLER_COMPANY'];
       $_SESSION['seller_contact'] = $customer['SELLER_CONTACT'];
    
     
      }echo "Success";
            } else {
//               echo "Username/Email hi mi dangin an hmang tawh a. <br />A dang hmang leh chhin teh.";
              echo $contact;
            }
            $conn->close();
}
  
else
{
     echo "Password chhut a inang lo tlat";
    
}

  }
  else
  {
      echo "Receive kim lo";
      
  }
}
else
{
    echo "A lut thla lo";
}
?>