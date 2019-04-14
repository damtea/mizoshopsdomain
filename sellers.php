<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
    <nav class="navbar navbar-expand-md py-0 navbar-dark bg-danger" style="background: inherit;">
      <div class="container">
        <a class="navbar-brand" href="index"><i class="fa d-inline fa-lg fa-cloud"></i><b>  Mizo Shops Domain</b></a>
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
   <div class="py-5 text-dark" style="">
    <div class="container py-5 ">
      <div class="row">
        <div class="col-md-3 text-dark ">
          </div>
        <div class="col-md-9 text-dark align-self-center">
          <h1 class="">Sell on Mizo Shops Domain inside Mizoram</h1>
          <p class="lead mb-5">Sell your product on this website.&nbsp;
            <br> </p>
          <?php
         
          if(!isset($_SESSION['seller_company']))
          {
          
         echo ' <a  class="btn btn-lg mx-1 btn-primary" href="" data-toggle="modal" data-target="#loginmodal"> Sell product </a>';
          }
          else
          {
               
         echo ' <a href="categories" class="btn btn-lg mx-1 btn-warning text-light">Sell product</a>';
          }
         ?>
          
          
        </div>
      </div>
    </div>
  </div>
      <hr />
      <div class="py-5 bg-light">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-12" >
          <h1 class="mb-4 text-danger">Mizo Shop Domain thatna leh a hlawkpuiawmnate</h1>
          <p class="lead">Dawr i nei emaw, sumdawng i nih phawt chuan Mizo Website ah ngei hian rawn zuar ve rawh le.
            <br>Mizo Shop Domain website a i thil zawrh hi Mizo mipuiten an hmu thei vek dawn.</p>
          <div class="row text-left mt-5">
            <div class="col-md-4 my-3">
              <div class="row mb-3">
                <div class="align-self-center col-10 col-md-12">
                  <h5 class="text-primary">
                    <b>Sales</b>
                  </h5>
                </div>
              </div>
              <p>Dawr bungrua awlsam taka hralh i duh chuan, website ah hian lo zuar la, Customer te pawhin awlsam takin an rawn leisak thei ang che</p>
            </div>
            <div class="col-md-4 my-3">
              <div class="row mb-3">
                <div class="align-self-center col-10 col-md-12">
                  <h5 class="text-primary">
                    <b>Traditional</b>
                  </h5>
                </div>
              </div>
              <p>He website hi, eng hnam mah ni lo vin, Mizote tana siam a ni a, hnam intodelhna tur atana hmalakna a ni.</p>
            </div>
            <div class="col-md-4 my-3">
              <div class="row mb-3">
                <div class="align-self-center col-10 col-md-12">
                  <h5 class="text-primary">
                    <b>People</b>
                  </h5>
                </div>
              </div>
              <p>Mizoram chhunga mipui zawng zawng, Internet hmang thei chuan i thil zawrh te hi an rawn lei thei vek a ni.</p>
            </div>
            <div class="col-md-4 my-3">
              <div class="row mb-3">
                <div class="align-self-center col-10 col-md-12">
                  <h5 class="text-primary">
                    <b>Secure</b>
                  </h5>
                </div>
              </div>
              <p>Website hi a him em em a. I thil zawrhte chu mi dangin an ru emaw, an khawih danglamsak thei lo che.</p>
            </div>
            <div class="col-md-4 my-3">
              <div class="row mb-3">
                <div class="align-self-center col-10 col-md-12">
                  <h5 class="text-primary">
                    <b>Categories</b>
                  </h5>
                </div>
              </div>
              <p>Thil zawrh theihah hian tih bik a awm chuang lo va. Eng thil pawh i rawn zuar thei a ni.</p>
            </div>
            <div class="col-md-4 my-3">
              <div class="row mb-3">
                <div class="align-self-center col-10 col-md-12">
                  <h5 class="text-primary">
                    <b>Ease of use</b>
                  </h5>
                </div>
              </div>
              <p>Website a thil i zuar duh a nih chuan awlsam takin a tih theih a ni. Thil harsa a awm lo va, zawh duh i neih pawhin contact kan dah e.</p>
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
        <div class="modal-header text-light" style="background: inherit; background-color: #f46242;">
          <h5 class="modal-title">LOGIN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">x</span> </button>
        </div>
        <div class="modal-body">
          <form method="POST">
            <div class="form-group"> <label>Email address</label>
              <input type="email" class="form-control" placeholder="Enter email" id="email"> </div>
            <div class="form-group"> <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" id="password"> </div> <label class="text-danger" id='msg'></label> </form>
        <br> Do not have an account?<a class="text-primary" href="" data-toggle="modal" data-target="#registermodal">  Click here </a>
        </div>
        <div class="modal-footer">
            
            <button type="submit" class="btn btn-primary btn-lg" onclick="return chk();">LOGIN</button>
        </div>
      </div>
    </div>
  </div>
    <div class="modal" id="registermodal">
    <div class="modal-dialog" role="document">
      <div class="modal-content border border-primary">
        <div class="modal-header text-light" style="background: inherit; background-color: #f46242;">
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
          <button type="button" class="btn btn-dark btn-lg" onclick="return rchk();">REGISTER</button>
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
        