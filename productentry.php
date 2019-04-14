<?php

include 'dbconnection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if($_SERVER["REQUEST_METHOD"] == "GET") 
{
    if(!empty($_GET['categories'])) 
{
$cat=$_GET['categories'];
$query="SELECT c.CID, c.PRODUCT FROM CATPRODUCT as c, CATEGORIES as a where c.CID=a.CID and a.CATEGORIES='".$cat."' ";
$result = mysqli_query($conn,$query);
 }
}
else{
    echo "Chhut kim vek a ngai!";
   
}

function resizeImage($resourceType,$image_width,$image_height) {
    $resizeWidth = 100;
    $resizeHeight = 100;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
}
 
if(isset($_POST['form_submit']))  {
    if(isset($_POST['pname']) && isset($_POST['pbrand']) && isset($_POST['psp']) && isset($_POST['pprice']) && isset($_POST['pqty']) && isset($_POST['pdesc']) && isset($_POST['cat']) )
  {
 
        $imageProcess = 0;
    if(is_array($_FILES)) {
        $fileName = $_FILES['upload_image']['tmp_name']; 
        $file_name=$_FILES['upload_image']['name']; 
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = time();
        $uploadPath = "./uploads/";
        $fileExt = pathinfo($_FILES['upload_image']['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagejpeg($imageLayer,$uploadPath."msdpimg_".$resizeFileName.'.'. $fileExt);
                break;
 
            case IMAGETYPE_GIF:
                $resourceType = imagecreatefromgif($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagegif($imageLayer,$uploadPath."msdpimg_".$resizeFileName.'.'. $fileExt);
                break;
 
            case IMAGETYPE_PNG:
                $resourceType = imagecreatefrompng($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagepng($imageLayer,$uploadPath."msdpimg_".$resizeFileName.'.'. $fileExt);
                break;
 
            default:
                $imageProcess = 0;
                break;
        }
        move_uploaded_file($file, $uploadPath. $resizeFileName. ".". $fileExt);
        $imageProcess = 1;
        $filepath="uploads/msdpimg_".$resizeFileName.".".$fileExt;
        header('Location: upload_success');
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
            $query="INSERT INTO product (`PRODUCT_ID`, `PRODUCT_NAME`, `PRODUCT_BRAND`, `PRODUCT_DESC`, `PRODUCT_DATE`, `SELLER_ID`, `PRODUCT_PRICE`, `PRODUCT_SP`, `CPID`, `PRODUCT_QTY`, `PRODUCT_IMG`) VALUES ('$id','$pname','$pbrand','$pdesc',now(),'$seller_id',$pprice,$psp,$cpid,$pqty,'$filepath')";
                if (mysqli_query($conn, $query)) {
//              
                header("Location: upload_success?productid=".$id);
      }
            } else {
            echo 'Error';
              
            }
            $conn->close();
    
 
	
	

  }
  else
      {
      header("Location: sellers");
      }
}
else
{
    echo "sss";
    
}
?>
        


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS\font-awesome-4.7.0\css\font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="CSS/bootstrap.css" type="text/css"> 
  <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen">
  <script src="JQUERY/jquery_1.js"></script>
  <script>
function chk()
{
	var email=document.getElementById('email').value;
	var password=document.getElementById('password').value;
        if(email==="" || password==="")
        {
            alert("Chhut kim vek a ngai!");
        }
        else
        {
	var dataString='email='+ email + '&password='+password; 
	$.ajax({
		type: "POST",
		url: "sellerloginprocess.php",
		data: dataString,
		
                
		success: function(msg){
                    if(msg!=="Success")
                    {
                      $('#msg').html(msg);
//                      
                    }
                    else
                    {
                        window.location.reload(); 
                    }
                }
			
	});
		return false;
		
}
}

function rchk()
{
    
    
    var company=document.getElementById('company').value;
	var owner=document.getElementById('owner').value;
	var spassword=document.getElementById('spassword').value;
        var cpassword=document.getElementById('sconfirm').value;
        var contact=document.getElementById('contact').value;
        var address=document.getElementById('address').value;
        var description=document.getElementById('description').value;
         var email=document.getElementById('semail').value;
       
        if(owner==="" || company==="" || email==="" || spassword==="" || cpassword==="" || contact==="" || address==="" || description==="")
        {
            alert("Chhut kim vek a ngai!");
        }
        else
        {
            
	var dataString='company='+ company + '&owner='+owner + '&email='+email + '&spassword='+spassword + '&cpassword='+cpassword + '&contact='+contact+ '&address='+address+'&description='+description; 
	$.ajax({
		type: "POST",
		url: "sellerregister.php",
		data: dataString,
		
                
		success: function(msg){
                    if(msg!=="Success")
                    {
                      $('#rmsg').html(msg);
//                      
                    }
                    else
                    {
                        window.location.reload(); 
                    }
                }
			
	});
		return false;
		
}
}



function categories()
{
    
    
  var cat=document.getElementById('cat').value;
	
       alert(cat);
        if(cat==="")
        {
            alert("Select phawt rawh!");
        }
        else
        {
            
	var dataString='categories='+ cat; 
        
	$.ajax({
		type: "GET",
		url: "productentry.php",
		data: dataString,
		
                
		success: function(msg){
                    window.location.href='productentry?categories='+cat;
                }
			
	});
		return false;
		
}
}
</script>


<style>

.drp {
    position: relative;
    display: inline-block;
}

.drp-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    
    min-width: 120px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.drp-content a {
    color: black;
    padding: 2px 1px;
    text-decoration: none;
    display: block;
}

.drp-content a:hover {background-color: #f1f1f1}


.drp:hover .drp-content {
    display: block;
    
}

select {
  margin: 2px;
  border: 1px solid #111;
  background: transparent;
 
  padding: 5px 35px 5px 5px;
  font-size: 16px;
  border: 1px solid #ccc;
  height: 34px;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}
</style>
</head>
<body class="">
  <nav class="navfix" style="background: inherit;">
    <nav class="navbar navbar-expand-md py-0 navbar-dark" style="background: inherit; background-color: #f46242;">
      <div class="container">
        <a class="navbar-brand" href="sellers"><i class="fa d-inline fa-lg fa-cloud"></i><b>  Mizo Shops Domain</b></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false"
          aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent"> 
          <a href="index" class="text-light"> Mizo Shops Domain </a> &nbsp;|&nbsp;
          <a class="text-light" href="aboutus"> About us</a> &nbsp;|&nbsp;
          <a class="text-light" href="contactus"> Contact us</a> &nbsp;|&nbsp;
          <a class="text-light" href=""> Customer care </a> &nbsp;|&nbsp;
          <a class="text-light" href=""> <i class="fa d-inline fa-bell fa-lg text-warning"></i><span class="badge badge-primary">0</span></a> &nbsp;|&nbsp;
          <?php
         
          if(!isset($_SESSION['seller_company']))
          {
          echo '<a class="text-light" href="" data-toggle="modal" data-target="#registermodal"> Register </a> &nbsp;|&nbsp;';
         echo ' <a class="text-light" href="" data-toggle="modal" data-target="#loginmodal"> Login </a>';
          }
          else
          {
               
         echo ' <div class="drp text-light"><a class="drpbtn text-light">  '.$_SESSION["seller_company"].' ▼ </a>'
                 .'<div class="drp-content">'
    .'<a href="#">Account</a>'
    .'<a href="#">Ratings and Reviews</a>'
    .'<a href="logout">Logout</a>'
  .'</div></div>';
          }
         ?>
                  </div>
      </div>
    </nav>
   
  </nav>
  <div class="" style="margin-top: 0px;">
   <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-dark p-5">
            <div class="card-body">
             <div class="w-100" style=" border-color: 1px solid #eeeeee;">
              <form method="POST" enctype="multipart/form-data"> 
                <div class="form-group"> <label>Select Product:</label>
                   <select class="w-100" id='cat' name="cat">
                    <?php 
                    while($cat=mysqli_fetch_assoc($result))
      {
                     
      echo "<option>" . $cat['PRODUCT'] . "</option>";
     
     
      } ?>
                   
                    </select> </div>
                 <div class="form-group">
		<lable class="">Choose Image</lable> <br />
		<input type="file" name="upload_image" required />
	</div>
                <div class="form-group"> <label>Product Name:</label>
                  <input type="text" id="pname" name="pname" class="form-control w-75" placeholder="Product hming..."> </div>
                <div class="form-group"> <label>Brand:</label>
                  <input type="text" id="pbrand" name="pbrand" class="form-control w-75" placeholder="Brand..."> </div>
                  <div class="form-group"> <label>Price:</label>
                  <input type="text" id="pprice" name="pprice" class="form-control w-75" placeholder="A man zat..."> </div>
                  <div class="form-group"> <label>Selling Price:</label>
                  <input type="text" id="psp" name="psp" class="form-control w-75" placeholder="Hralh theihna zat..."> </div>
                  <div class="form-group"> <label>Quantity:</label>
                  <input type="text" id="pqty" name="pqty" class="form-control w-75" placeholder="Product upload tur zat..."> </div>
                <div class="form-group"> <label>Description:</label>
                <textarea class="form-control" id="pdesc" name="pdesc" rows="5" placeholder="Product chungchanga i duh duh ziahna hmun..." name="imgdesc"></textarea> </div>
               
                <div id="pmsg"></div>
                 
           
               
                  <div class="text-right">
                      
                      <button type="submit" name="form_submit" class="btn btn-warning">Submit</button>
                  </div>
              </form>
                  </div>
            </div>
        
                </div> 
                 
            </div>
          
          </div>
        </div>
      </div>
    </div>
  </div>
      
    <div class="bg-dark text-white">
      <div class="container">
        <div class="row">
          <div class="p-4 col-md-3">
            <h2 class="mb-4 text-secondary">Mizo Shops Domain</h2>
            <p class="text-white">Mizorama sumdawng hrang hrang ten Online-a thil an zawrh theihna tur hmun.</p>
          </div>
          <div class="p-4 col-md-3">
            <h2 class="mb-4 text-secondary">Mapsite</h2>
            <ul class="list-unstyled">
              <a href="index" class="text-white">Home</a>
              <br>
              <a href="aboutus" class="text-white">About us</a>
              <br>
              <a href="sellers" class="text-white">Sell on Mizo Shops Domain</a>
              <br>
              <a href="contactus" class="text-white">Contact Us</a>
            </ul>
          </div>
          <div class="p-4 col-md-3">
            <h2 class="mb-4">Contact</h2>
            <p>
              <a href="tel:+91 961-2602-728" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-phone"></i>+91 961-2602-728</a>
            </p>
            <p>
              <a href="mailto:damtearlte@gmail.com.com" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>damtearlte@gmail.com</a>
            </p>
            <p>
              <a href="https://goo.gl/maps/zAnKDRscGuR2" class="text-white" target="_blank"><i class="fa d-inline mr-3 fa-map-marker text-secondary"></i>A-114, Tuikual South, Aizawl, Mizoram</a>
            </p>
          </div>
          <div class="p-4 col-md-3">
            <h2 class="mb-4 text-light">Subscribe</h2>
            <form>
              <fieldset class="form-group text-white"> <label for="exampleInputEmail1">Get our newsletter</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> </fieldset>
              <button type="submit" class="btn btn-outline-secondary">Submit</button>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mt-3">
            <p class="text-center text-white"> © Mizo Shops Domain <?php echo date("Y");?> - All rights reserved. </p>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div id="loginmodal" class="modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content border border-primary">
        <div class="modal-header bg-primary text-light">
          <h5 class="modal-title">LOGIN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">x</span> </button>
        </div>
        <div class="modal-body">
          <form method="POST">
            <div class="form-group"> <label>Email address</label>
              <input type="email" class="form-control" placeholder="Enter email" id="email"> </div>
            <div class="form-group"> <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" id="password"> </div> <label class="text-danger" id='msg'></label> </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-lg" onclick="return chk();">LOGIN</button>
        </div>
      </div>
    </div>
  </div>
    <div class="modal" id="registermodal">
    <div class="modal-dialog" role="document">
      <div class="modal-content border border-primary">
        <div class="modal-header bg-primary text-light">
          <h5 class="modal-title">REGISTER</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">x</span> </button>
        </div>
        <div class="modal-body">
          <form method="POST">
            <div class="form-group"> <label>Business or Company:</label>
              <input type="text" id='company' class="form-control" placeholder="Dawr hming..."> </div>
            <div class="form-group"> <label>OWNER:</label>
              <input type="text" id='owner' class="form-control" placeholder="Dawr neitu hming..."> </div>
              <div class="form-group"> <label>Address:</label>
              <input type="text" id='address' class="form-control" placeholder="Dawr awmna hmun..."> </div>
              <div class="form-group"> <label>Contact number:</label>
              <input type="text" id='contact' class="form-control" placeholder="Phone number..."> </div>
              <div class="form-group"> <label> Email: </label>
              <input type="email" id="semail" class="form-control" placeholder="Dawr email..."> </div> 
            <div class="form-group"> <label>Password:</label>
              <input type="password" id='spassword' class="form-control" placeholder="Password"> </div>
            <div class="form-group"> <label>Confirm Password:</label>
              <input type="password" id='sconfirm' class="form-control" placeholder="Retype Password"> </div>
            <div class="form-group"> <label>Description</label>
                <textarea class="form-control" id="description" rows="5" placeholder="Dawr chungchang hrilhfiahna..." name="sellerdesc"></textarea>
              
            </div> <label class="text-warning" id="rmsg"></label> </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-lg" onclick="return rchk();">REGISTER</button>
        </div>
      </div>
    </div>
  </div>
    
      <script src="jquery/jquery-3.2.1.slim.min.js"></script>
<!--  <link rel="stylesheet" href="CSS/bootstrap.css" type="text/css">-->
  <script src="jquery/popper.min.js"></script>
  <script src="jquery/bootstrap.min.js"></script>
  <script src="themes/js/jquery.js" type="text/javascript"></script>
  <script src="themes/js/google-code-prettify/prettify.js"></script>
  <script src="themes/js/jquery.lightbox-0.5.js"></script>
  <script src="themes/js/bootshop.js"></script>
  <script src="themes/js/bootstrap.min.js"></script>
  
  
</body>

</html>
        