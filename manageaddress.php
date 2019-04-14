<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'cartqty.php';
require_once 'dbconnection.php';

if(isset($_SESSION['customer_id'])){
$query="SELECT * FROM customer where CUSTOMER_ID='".$_SESSION['customer_id']."'";
 $result=mysqli_query($conn,$query);
 while($customer=mysqli_fetch_assoc($result))
 {
    $locality=$customer['CUSTOMER_LOCALITY'];
    $address=$customer['CUSTOMER_ADDRESS'];
    $state=$customer['CUSTOMER_STATE'];
    $landmark=$customer['CUSTOMER_LANDMARK'];
    $pincode=$customer['CUSTOMER_PINCODE'];
     
 }       
}
else
{
    header("Location: index");
    
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
  <?php
  if(isset($_SESSION['customer_name'])){
echo '<script>'
     .'$(function(){'
  .'$(".btn.btn-primary.py-2").click(function () {'
          .'var product_id=$(this).data("item");'
        .'alert(product_id);'
          .'var dataString="product_id="+product_id;' 
	.'$.ajax({'
		.'type: "POST",'
		.'url: "addcart.php",'
		.'data: dataString,'
		.'success: function(msg){'
                      .'$("#cartqty").html(msg);' 
                .'}'
			
	.'});'
            .'});'
  .'});'
     .'</script>';
}
else
{
    echo '<script src="JQUERY/jquery_1.js"></script> 
            <script type="text/javascript">
    $(document).ready(function(){
        $("#loginmodal").modal("show");
    });
</script>';
}
?>
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
		url: "loginprocess.php",
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
    
    var gender=$('input[type=radio][name=gender]:checked').val();
    var name=document.getElementById('rname').value;
	var email=document.getElementById('remail').value;
	var password=document.getElementById('rpassword').value;
        var cpassword=document.getElementById('rconfirm').value;
        var contact=document.getElementById('rcontact').value;
        var locality=document.getElementById('rlocality').value;
        var address=document.getElementById('raddress').value;
        var state=document.getElementById('rstate').value;
        var pincode=document.getElementById('rpincode').value;
         var landmark=document.getElementById('rlandmark').value;
       
        if(name==="" || gender==="" || email==="" || cpassword==="" || contact==="" || locality==="" || address==="" || state==="" || pincode==="")
        {
            alert("Chhut kim vek a ngai!");
        }
        else
        {
            
	var dataString='gender='+ gender + '&name='+name + '&email='+email + '&password='+password + '&cpassword='+cpassword + '&contact='+contact + '&locality='+locality + '&address='+address + '&state='+state + '&pincode='+pincode+ '&landmark='+landmark; 
	$.ajax({
		type: "POST",
		url: "register.php",
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
function saveaddress()
{
    
   
   
       
        var locality=document.getElementById('clocality').value;
        var address=document.getElementById('caddress').value;
        var state=document.getElementById('cstate').value;
        var pincode=document.getElementById('cpincode').value;
         var landmark=document.getElementById('clandmark').value;
       
        if(locality==="" || address==="" || state==="" || pincode==="")
        {
            alert("Chhut kim vek a ngai!");
        }
        else
        {
            
	var dataString='locality='+locality + '&address='+address + '&state='+state + '&pincode='+pincode+ '&landmark='+landmark; 
	$.ajax({
		type: "POST",
		url: "editcustomeraddress.php",
		data: dataString,
		
                
		success: function(msg){
                    if(msg!=="Success")
                    {
                      $('#addmsg').html(msg);
//                      
                    }
                    else
                    {
                        $('#addmsg').html(msg);
                    }
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


</style>
</head>
<body class="">
  <nav class="navfix" style="background: inherit;">
    <nav class="navbar navbar-expand-md py-0 bg-primary navbar-dark" style="background: inherit;">
      <div class="container">
        <a class="navbar-brand" href="index"><i class="fa d-inline fa-lg fa-cloud"></i><b>  Mizo Shops Domain</b></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false"
          aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent"> 
          <a href="sellers" class="text-light"> Sell on Mizo Shops Domain </a> &nbsp;|&nbsp;
          <a class="text-light" href="aboutus"> About us</a> &nbsp;|&nbsp;
          <a class="text-light" href="contactus"> Contact us</a> &nbsp;|&nbsp;
          <a class="text-light" href=""> Customer care </a> &nbsp;|&nbsp;
          <a class="text-light" href=""> <i class="fa d-inline fa-bell fa-lg text-warning"></i><span class="badge badge-primary">0</span></a> &nbsp;|&nbsp;
          <?php
         
          if(!isset($_SESSION['customer_name']))
          {
          echo '<a class="text-light" href="" data-toggle="modal" data-target="#registermodal"> Register </a> &nbsp;|&nbsp;';
         echo ' <a class="text-light" href="" data-toggle="modal" data-target="#loginmodal"> Login </a>';
          }
          else
          {
               
         echo ' <div class="drp text-light">Hi!<a class="drpbtn text-light">  '.$_SESSION["customer_name"].' ▼ </a>'
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
    <nav style="background: inherit;" class="py-2">
      <div class="container">
        <div class="row">
          <div class="" style="width:100%;margin:0;">
            <form class="form-inline">
              <input type="search" name="search" style="width:68%;margin:auto;" placeholder="Search..." class="form-control">
              <button type="submit" class="btn btn-primary" style="width:10%;margin-right:auto;"><i class="fa d-inline fa-lg fa-search"></i></button>&nbsp;
             <button type="submit" class="btn btn-warning text-light" style="margin:auto;width:18%;"><i class="fa d-inline fa-lg fa-shopping-cart px-0"></i> <b class="px-0"><i>Cart</i> <i id="cartqty"><?php echo $_SESSION['cart']; ?></i></b></button>
            </form>
          </div>
        </div>
      </div>
    </nav>
  </nav>
  <div class="" style="margin-top: 95px;">
    <nav style="background: inherit;">
      <div class="">
        <div class="container">
          <div class="row">
            <div class="col-md-12 w-100 text-center">
              <div class="drp">
                <a class="drp btn text-muted" data-toggle="dropdown" href="" aria-expanded="false" aria-haspopup="true" id="dropdown01"> Electronics </a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="products?productcategories=1">Computer</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="products?productcategories=2">Laptop</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="products?productcategories=3">Mobile phones</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="products?productcategories=4">Cameras</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="products?productcategories=5">Accessories</a>
                
                </div>
                
              </div>
              <div class="drp">
                <a class="drp btn text-muted" data-toggle="dropdown" href=""> Home appliances </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="products?productcategories=6">Inchhung</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="products?productcategories=7">Pawn</a>
                </div>
              </div>
              <div class="drp" href="">
                <a class="drp btn text-muted" href="" data-toggle="dropdown"> Clothing </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="products?productcategories=8">Mipa kawr</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="products?productcategories=9">Mipa kekawr</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="products?productcategories=10">Mipa pheikhawk</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="products?productcategories=11">Mipa incheina dang</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="products?productcategories=12">Hmeichhe kawr</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="products?productcategories=13">Hmeichhe kekawr</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="products?productcategories=14">Hmeichhe pheikhawk</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="products?productcategories=15">Hnam incheina</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="products?productcategories=16">Lukhum</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="products?productcategories=17">Hmeichhe incheina dang</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-3" id="title_message">
              <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12" >
          <div class="card">
            
            <div class="card-body">
             Hi! <?php echo $_SESSION['customer_name']; ?>
            </div>
          </div>
        </div>
      </div>
    </div>         
  </div>  
              <br />
         <ul id="sideManu" class="nav nav-tabs nav-stacked">
              <li class="subMenu open w-100">
                <a class="nav-link active bg-secondary text-dark" href="">Account Settings <i class="fa fa-angle-double-down"></i></a>
                <ul>
                  <li>
                      <a href="account" class=""><i class="icon-chevron-right"></i>Profile Information </a>
                  </li>
                  <li>
                    <a href="manageaddress" class="active"><i class="icon-chevron-right"></i>Manage Addresses </a>
                  </li>
                  <li>
                    <a href="notificationsettings"><i class="icon-chevron-right"></i>Notification Settings </a>
                  </li>
                  
                </ul>
              </li>
            </ul>     
              
          </div>
          <div class="col-md-8 offset-md-2">
            <div class="row">
               
                    <table>
                        <tr>
                            <td><h5> Locality </h5> </td>
                            </tr>
                        
                    </table>
                    <input type="text" id='clocality' class="form-control" value="<?php echo $locality; ?>">
                     <br /><br />
                     <table>
                        <tr>
                            <td><h5> Address </h5> </td>
                             </tr>
                        
                    </table>
                     <input type="text" id='caddress' class="form-control" value="<?php echo $address; ?>">
                     <br /><br />
                      <table>
                        <tr>
                            <td><h5> State </h5></td>
                             </tr>
                        
                    </table>
                     <input type="text" id='cstate' class="form-control" value="<?php echo $state; ?>">
                      <br /><br />
                      <table>
                        <tr>
                            <td><h5> Landmark </h5></td>
                             </tr>
                        
                    </table>
                     <input type="text" id='clandmark' class="form-control" value="<?php echo $landmark; ?>" />
                      <br /><br />
                      <table>
                        <tr>
                            <td><h5> Pincode </h5></td>
                             </tr>
                        
                    </table>
                       <input type="text" id='cpincode' class="form-control" value="<?php echo $pincode; ?>" />
                    
                       <div class="text-right">
                           <button type="submit" class="btn btn-success" onclick="saveaddress();"> SAVE </button>
                       </div>
               <p id="addmsg"></p>
               
               
                        
                     
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
            <div class="form-group"> <label>Name</label>
              <input type="text" id='rname' class="form-control" placeholder="Enter owner's name here..."> </div>
            <div class="form-group"> <label>Landmark:</label>
              <input type="text" id='rlandmark' class="form-control" placeholder="Awmna lai vel..."> </div>
              <div class="form-group"> <label>Locality:</label>
              <input type="text" id='rlocality' class="form-control" placeholder="House number leh Veng hming..."> </div>
              <div class="form-group"> <label>Address:</label>
              <input type="text" id="raddress" class="form-control" placeholder="Chen mekna khua..."> </div>
              <div class="form-group"> <label>State:</label>
              <input type="text" id='rstate' class="form-control" placeholder="Chenna ram..."> </div>
              <div class="form-group"> <label>Pin code:</label>
              <input type="text" id='rpincode' class="form-control" placeholder="Chenna post office pin code..."> </div>
            <div class="form-group"> <label>Email address</label>
              <input type="email" id='remail' class="form-control" placeholder="Enter email"> </div>
            <div class="form-group"> <label>Phone number</label>
              <input type="text" id='rcontact' class="form-control" placeholder="Enter phone number here..."> </div>
              
            <div class="form-group"> <label>Password</label>
              <input type="password" id='rpassword' class="form-control" placeholder="Password"> </div>
            <div class="form-group"> <label>Confirm Password</label>
              <input type="password" id='rconfirm' class="form-control" placeholder="Retype Password"> </div>
            <div class="form-group"> <label>Gender</label>
              <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="btn-group" data-toggle="buttons"> <label class="btn btn-primary">
            
                    <input type="radio" name="gender" id="gender" autocomplete="off"  value="Male"> Male
                </label> <label class="btn btn-primary">
                    <input type="radio" name="gender" id="gender" autocomplete="off" value="Female"> Female
            </label> </div>
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
        
