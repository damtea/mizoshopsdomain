<?php

include 'dbconnection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
     if($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpassword']) && isset($_POST['gender']) && isset($_POST['locality']) && isset($_POST['address']) && isset($_POST['state']) && isset($_POST['pincode']) && isset($_POST['contact'])&& isset($_POST['landmark']))
  {

    $name=$_POST['name'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $cpassword=$_POST['cpassword'];
    $gender=$_POST['gender'];
    $locality=$_POST['locality'];
    $address=$_POST['address'];
    $state=$_POST['state'];
    $pincode=$_POST['pincode'];
    $contact= doubleval($_POST['contact']);
    $landmark=$_POST['landmark'];
    $prefix="dawrcus";
    $id= uniqid($prefix);
        if($password==$cpassword)
         {
            $password= md5($password);
            $query="INSERT INTO customer (`CUSTOMER_ID`, `CUSTOMER_NAME`, `CUSTOMER_EMAIL`, `CUSTOMER_PASSWORD`, `CUSTOMER_CONTACT`, `CUSTOMER_GENDER`, `CUSTOMER_LOCALITY`, `CUSTOMER_ADDRESS`, `CUSTOMER_STATE`, `CUSTOMER_LANDMARK`, `CUSTOMER_PINCODE`) VALUES ('$id','$name','$email','$password',$contact,'$gender','$locality','$address','$state','$landmark',$pincode)";
                if (mysqli_query($conn, $query)) {
               $_SESSION['customer_name'] = $name;
               $query1="SELECT * from customer where CUSTOMER_EMAIL='$email' and CUSTOMER_PASSWORD='$password'";
                $result = mysqli_query($conn,$query1);
     while($customer=mysqli_fetch_assoc($result))
      {
      $_SESSION['customer_id'] = $customer['CUSTOMER_ID'];
       $_SESSION['customer_email'] = $customer['CUSTOMER_EMAIL'];
       $_SESSION['customer_name'] = $customer['CUSTOMER_NAME'];
       $_SESSION['customer_contact'] = $customer['CUSTOMER_CONTACT'];
       $_SESSION['login'] = "yes";
     
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