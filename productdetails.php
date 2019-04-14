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
        <a class="navbar-brand" href="#"><i class="fa d-inline fa-lg fa-cloud"></i><b>  Hereus</b></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false"
          aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent"> 
          <a href="" class="text-light"> Sell on Hereus </a> &nbsp;|&nbsp;
          <a class="text-light" href=""> About us</a> &nbsp;|&nbsp;
          <a class="text-light" href=""> Contact us</a> &nbsp;|&nbsp;
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
            <form class="form-inline" method="post" action="">
              <input type="search" name="search" style="width:68%;margin:auto;" placeholder="Search..." class="form-control">
              <button type="submit" class="btn btn-primary" style="width:10%;margin-right:auto;"><i class="fa d-inline fa-lg fa-search"></i></button>&nbsp;
            </form>
          </div>
        </div>
      </div>
    </nav>
  </nav>
  <div class="" style="margin-top: 50px;">
    <nav style="background: inherit;">
      <div class="">
        <div class="container">
          <div class="row">
            <div class="col-md-12 w-100 text-center">
              <div class="drp">
                <a class="drp btn text-muted" data-toggle="dropdown" href="" aria-expanded="false" aria-haspopup="true" id="dropdown01"> Electronics </a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="#">Computer</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Laptop</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Mobile phones</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Accessories</a>
                </div>
              </div>
              <div class="drp">
                <a class="drp btn text-muted" data-toggle="dropdown" href=""> Home appliances </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Inchhung</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Pawn</a>
                </div>
              </div>
              <div class="drp" href="">
                <a class="drp btn text-muted" href="" data-toggle="dropdown"> Clothing </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Mipa kawr</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Mipa kekawr</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Mipa pheikhawk</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Mipa incheina dang</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Hmeichhe kawr</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Hmeichhe kekawr</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Hmeichhe pheikhawk</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Hnam incheina</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Lukhum</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Hmeichhe incheina dawng</a>
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
          <div class="col-md-2" id="title_message">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#"><i class="fa fa-home fa-home"></i>&nbsp;Home</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">Item</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">Item</a>
              </li>
            </ul>
             
            <ul id="sideManu" class="nav nav-tabs nav-stacked">
              <li class="subMenu open w-100">
                <a class="nav-link active bg-primary text-light" href="">Electronics <i class="fa fa-angle-double-down"></i></a>
                <ul>
                  <li>
                    <a href="products.html" class="active"><i class="icon-chevron-right"></i>Cameras (100) </a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Computers, Tablets &amp; laptop (30)</a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Mobile Phone (80)</a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Sound &amp; Vision (15)</a>
                  </li>
                </ul>
              </li>
              <li class="subMenu w-100">
                <a class="nav-link active bg-primary text-light" href="">Clothings <i class="fa fa-angle-double-down"></i></a>
                <ul style="display:none">
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Women's Clothing (45)</a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Women's Shoes (8)</a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Women's Hand Bags (5)</a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Men's Clothings (45)</a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Men's Shoes (6)</a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Kids Clothing (5)</a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Kids Shoes (3)</a>
                  </li>
                </ul>
              </li>
              <li class="subMenu w-100">
                <a class="nav-link active bg-primary text-light" href="">Home appliances <i class="fa fa-angle-double-down"></i></a>
                <ul style="display:none">
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Angoves (35)</a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Bouchard Aine &amp; Fils (8)</a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>French Rabbit (5)</a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Louis Bernard (45)</a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>BIB Wine (Bag in Box) (8)</a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Other Liquors &amp; Wine (5)</a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Garden (3)</a>
                  </li>
                  <li>
                    <a href="products.html"><i class="icon-chevron-right"></i>Khao Shong (11)</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="products.html">HEALTH &amp; BEAUTY [18]</a>
              </li>
              <li>
                <a href="products.html">SPORTS &amp; LEISURE [58]</a>
              </li>
              <li>
                <a href="products.html">BOOKS &amp; ENTERTAINMENTS [14]</a>
              </li>
            </ul>
          </div>
          <div class="col-md-10 offset-md-2">
            <div class="row">
              <div class="col-md-3 w-25">
                <a href="themes/images/products/large/f1.jpg" title="Fujifilm FinePix S2950 Digital Camera">
                  <img src="themes/images/products/large/3.jpg" style="width:100%" alt="Fujifilm FinePix S2950 Digital Camera" class=""> </a>
                <div id="differentview" class="moreOptopm carousel slide">
                  <div class="carousel-inner">
                    <div class="item active">
                      <a href="themes/images/products/large/f1.jpg">
                        <img style="width:29%" src="themes/images/products/large/f1.jpg" alt=""> </a>
                      <a href="themes/images/products/large/f2.jpg">
                        <img style="width:29%" src="themes/images/products/large/f2.jpg" alt=""> </a>
                      <a href="themes/images/products/large/f3.jpg">
                        <img style="width:29%" src="themes/images/products/large/f3.jpg" alt=""> </a>
                    </div>
                    <div class="item">
                      <a href="themes/images/products/large/f3.jpg">
                        <img style="width:29%" src="themes/images/products/large/f3.jpg" alt=""> </a>
                      <a href="themes/images/products/large/f1.jpg">
                        <img style="width:29%" src="themes/images/products/large/f1.jpg" alt=""> </a>
                      <a href="themes/images/products/large/f2.jpg">
                        <img style="width:29%" src="themes/images/products/large/f2.jpg" alt=""> </a>
                    </div>
                  </div>
                  <!--  
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
			  -->
                </div>
              </div>
              <div class="col-md-8 w-75">
                <h3> Product name </h3>
                <div class="caption">
                  <p class="text-muted w-50"> Description goes here. </p>
                  <hr>
                  <div class="row">
                    <div class="col-md-2 w-25 py-1">
                      <h4> Price </h4>
                    </div>
                   
                    <div class="col-md-6 text-dark py-1">
                      <div style="text-align:center" class="w-100 text-left">
                        
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <h5>100 items in stock</h5>
                <div class="row">
                  <div class="col-md-8 text-right p-4 w-50">
                    <h5 class="control-label"><span>Color</span></h5>
                  </div>
                  <div class="col-md-4 p-4 w-50">
                    <form class="form-horizontal">
                      <div class="controls"> <select class="span2">
						  <option value="Black">Black</option>
						  <option value="Red">Red</option>
						  <option value="Blue">Blue</option>
						  <option value="Brown">Brown</option>
						</select> </div>
                    </form>
                  </div>
                </div>
                <hr>
                <p> 14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection
                  and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card). </p>
                <a class="btn btn-link" href="#myTabContent">More Details</a>
                <hr>
                <div id="myTabContent" class="tab-content">
                  <div class="tab-pane active in" id="home">
                    <h4>Product Information</h4>
                    <table class="table table-bordered">
                      <tbody>
                        <tr class="techSpecRow">
                          <th colspan="2">Product Details</th>
                        </tr>
                        <tr class="techSpecRow">
                          <td class="techSpecTD1">Brand: </td>
                          <td class="techSpecTD2">Fujifilm</td>
                        </tr>
                        <tr class="techSpecRow">
                          <td class="techSpecTD1">Model:</td>
                          <td class="techSpecTD2">FinePix S2950HD</td>
                        </tr>
                        <tr class="techSpecRow">
                          <td class="techSpecTD1">Released on:</td>
                          <td class="techSpecTD2"> 2011-01-28</td>
                        </tr>
                        <tr class="techSpecRow">
                          <td class="techSpecTD1">Dimensions:</td>
                          <td class="techSpecTD2"> 5.50" h x 5.50" w x 2.00" l, .75 pounds</td>
                        </tr>
                        <tr class="techSpecRow">
                          <td class="techSpecTD1">Display size:</td>
                          <td class="techSpecTD2">3</td>
                        </tr>
                      </tbody>
                    </table>
                    <h5>Features</h5>
                    <p> 14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink
                      detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card).
                      <br> OND363338 </p>
                    <h4>Editorial Reviews</h4>
                    <h5>Manufacturer's Description </h5>
                    <p> With a generous 18x Fujinon optical zoom lens, the S2950 really packs a punch, especially when matched with its 14 megapixel sensor, large 3.0" LCD screen and 720p HD (30fps) movie capture. </p>
                    <h5>Electric powered Fujinon 18x zoom lens</h5>
                    <p> The S2950 sports an impressive 28mm – 504mm* high precision Fujinon optical zoom lens. Simple to operate with an electric powered zoom lever, the huge zoom range means that you can capture all the detail, even when you're at a considerable
                      distance away. You can even operate the zoom during video shooting. Unlike a bulky D-SLR, bridge cameras allow you great versatility of zoom, without the hassle of carrying a bag of lenses. </p>
                    <h5>Impressive panoramas</h5>
                    <p> With its easy to use Panoramic shooting mode you can get creative on the S2950, however basic your skills, and rest assured that you will not risk shooting uneven landscapes or shaky horizons. The camera enables you to take three successive
                      shots with a helpful tool which automatically releases the shutter once the images are fully aligned to seamlessly stitch the shots together in-camera. It's so easy and the results are impressive. </p>
                    <h5>Sharp, clear shots</h5>
                    <p> Even at the longest zoom settings or in the most challenging of lighting conditions, the S2950 is able to produce crisp, clean results. With its mechanically stabilised 1/2 3", 14 megapixel CCD sensor, and high ISO sensitivity settings,
                      Fujifilm's Dual Image Stabilisation technology combines to reduce the blurring effects of both hand-shake and subject movement to provide superb pictures. </p>
                  </div>
                  <div class="tab-pane fade" id="profile">
                    <div id="myTab" class="pull-right">
                      <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
                      <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
                    </div>
                    <br class="clr">
                    <hr class="soft">
                    <div class="tab-content">
                      <div class="tab-pane" id="listView">
                        <div class="row">
                          <div class="span2">
                            <img src="themes/images/products/4.jpg" alt=""> </div>
                          <div class="span4">
                            <h3>New | Available</h3>
                            <hr class="soft">
                            <h5>Product Name </h5>
                            <p> Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - that is why our goods are so popular.. </p>
                            <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
                            <br class="clr"> </div>
                          <div class="span3 alignR">
                            <form class="form-horizontal qtyFrm">
                              <h3> $222.00</h3> <label class="checkbox">
						<input type="checkbox" value="on">  Adds product to compair
					</label>
                              <br>
                              <div class="btn-group">
                                <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                              </div>
                            </form>
                          </div>
                        </div>
                        <hr class="soft">
                        <div class="row">
                          <div class="span2">
                            <img src="themes/images/products/5.jpg" alt=""> </div>
                          <div class="span4">
                            <h3>New | Available</h3>
                            <hr class="soft">
                            <h5>Product Name </h5>
                            <p> Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - that is why our goods are so popular.. </p>
                            <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
                            <br class="clr"> </div>
                          <div class="span3 alignR">
                            <form class="form-horizontal qtyFrm">
                              <h3> $222.00</h3> <label class="checkbox">
						<input type="checkbox" value="on">  Adds product to compair
						</label>
                              <br>
                              <div class="btn-group">
                                <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                              </div>
                            </form>
                          </div>
                        </div>
                        <hr class="soft">
                        <div class="row">
                          <div class="span2">
                            <img src="themes/images/products/6.jpg" alt=""> </div>
                          <div class="span4">
                            <h3>New | Available</h3>
                            <hr class="soft">
                            <h5>Product Name </h5>
                            <p> Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - that is why our goods are so popular.. </p>
                            <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
                            <br class="clr"> </div>
                          <div class="span3 alignR">
                            <form class="form-horizontal qtyFrm">
                              <h3> $222.00</h3> <label class="checkbox">
						<input type="checkbox" value="on">  Adds product to compair
					</label>
                              <br>
                              <div class="btn-group">
                                <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                              </div>
                            </form>
                          </div>
                        </div>
                        <hr class="soft">
                        <div class="row">
                          <div class="span2">
                            <img src="themes/images/products/7.jpg" alt=""> </div>
                          <div class="span4">
                            <h3>New | Available</h3>
                            <hr class="soft">
                            <h5>Product Name </h5>
                            <p> Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - that is why our goods are so popular.. </p>
                            <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
                            <br class="clr"> </div>
                          <div class="span3 alignR">
                            <form class="form-horizontal qtyFrm">
                              <h3> $222.00</h3> <label class="checkbox">
						<input type="checkbox" value="on">  Adds product to compair
						</label>
                              <br>
                              <div class="btn-group">
                                <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                              </div>
                            </form>
                          </div>
                        </div>
                        <hr class="soft">
                        <div class="row">
                          <div class="span2">
                            <img src="themes/images/products/8.jpg" alt=""> </div>
                          <div class="span4">
                            <h3>New | Available</h3>
                            <hr class="soft">
                            <h5>Product Name </h5>
                            <p> Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - that is why our goods are so popular.. </p>
                            <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
                            <br class="clr"> </div>
                          <div class="span3 alignR">
                            <form class="form-horizontal qtyFrm">
                              <h3> $222.00</h3> <label class="checkbox">
						<input type="checkbox" value="on">  Adds product to compair
						</label>
                              <br>
                              <div class="btn-group">
                                <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                              </div>
                            </form>
                          </div>
                        </div>
                        <hr class="soft">
                        <div class="row">
                          <div class="span2">
                            <img src="themes/images/products/9.jpg" alt=""> </div>
                          <div class="span4">
                            <h3>New | Available</h3>
                            <hr class="soft">
                            <h5>Product Name </h5>
                            <p> Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - that is why our goods are so popular.. </p>
                            <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
                            <br class="clr"> </div>
                          <div class="span3 alignR">
                            <form class="form-horizontal qtyFrm">
                              <h3> $222.00</h3> <label class="checkbox">
						<input type="checkbox" value="on">  Adds product to compair
						</label>
                              <br>
                              <div class="btn-group">
                                <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                              </div>
                            </form>
                          </div>
                        </div>
                        <hr class="soft"> </div>
                      <div class="tab-pane active" id="blockView">
                        <ul class="thumbnails">
                          <li class="span3">
                            <div class="thumbnail">
                              <a href="product_details.html">
                                <img src="themes/images/products/10.jpg" alt=""> </a>
                              <div class="caption">
                                <h5>Manicure &amp; Pedicure</h5>
                                <p> Lorem Ipsum is simply dummy text. </p>
                                <h4 style="text-align:center">
                                  <a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
                                  <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a>
                                  <a class="btn btn-primary" href="#">€222.00</a>
                                </h4>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail">
                              <a href="product_details.html">
                                <img src="themes/images/products/11.jpg" alt=""> </a>
                              <div class="caption">
                                <h5>Manicure &amp; Pedicure</h5>
                                <p> Lorem Ipsum is simply dummy text. </p>
                                <h4 style="text-align:center">
                                  <a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
                                  <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a>
                                  <a class="btn btn-primary" href="#">€222.00</a>
                                </h4>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail">
                              <a href="product_details.html">
                                <img src="themes/images/products/12.jpg" alt=""> </a>
                              <div class="caption">
                                <h5>Manicure &amp; Pedicure</h5>
                                <p> Lorem Ipsum is simply dummy text. </p>
                                <h4 style="text-align:center">
                                  <a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
                                  <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a>
                                  <a class="btn btn-primary" href="#">€222.00</a>
                                </h4>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail">
                              <a href="product_details.html">
                                <img src="themes/images/products/13.jpg" alt=""> </a>
                              <div class="caption">
                                <h5>Manicure &amp; Pedicure</h5>
                                <p> Lorem Ipsum is simply dummy text. </p>
                                <h4 style="text-align:center">
                                  <a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
                                  <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a>
                                  <a class="btn btn-primary" href="#">€222.00</a>
                                </h4>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail">
                              <a href="product_details.html">
                                <img src="themes/images/products/1.jpg" alt=""> </a>
                              <div class="caption">
                                <h5>Manicure &amp; Pedicure</h5>
                                <p> Lorem Ipsum is simply dummy text. </p>
                                <h4 style="text-align:center">
                                  <a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
                                  <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a>
                                  <a class="btn btn-primary" href="#">€222.00</a>
                                </h4>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail">
                              <a href="product_details.html">
                                <img src="themes/images/products/2.jpg" alt=""> </a>
                              <div class="caption">
                                <h5>Manicure &amp; Pedicure</h5>
                                <p> Lorem Ipsum is simply dummy text. </p>
                                <h4 style="text-align:center">
                                  <a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
                                  <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a>
                                  <a class="btn btn-primary" href="#">€222.00</a>
                                </h4>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <hr class="soft"> </div>
                    </div>
                    <br class="clr"> </div>
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
            <h2 class="mb-4 text-secondary">Hereus</h2>
            <p class="text-white">Mizorama sumdawng hrang hrang ten Online-a thil an zawrh theihna tur hmun.</p>
          </div>
          <div class="p-4 col-md-3">
            <h2 class="mb-4 text-secondary">Mapsite</h2>
            <ul class="list-unstyled">
              <a href="#" class="text-white">Home</a>
              <br>
              <a href="#" class="text-white">About us</a>
              <br>
              <a href="#" class="text-white">Our services</a>
              <br>
              <a href="#" class="text-white">Stories</a>
            </ul>
          </div>
          <div class="p-4 col-md-3">
            <h2 class="mb-4">Contact</h2>
            <p>
              <a href="tel:+246 - 542 550 5462" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-phone"></i>+246 - 542 550 5462</a>
            </p>
            <p>
              <a href="mailto:info@pingendo.com" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>info@pingendo.com</a>
            </p>
            <p>
              <a href="https://goo.gl/maps/AUq7b9W7yYJ2" class="text-white" target="_blank"><i class="fa d-inline mr-3 fa-map-marker text-secondary"></i>365 Park Street, NY</a>
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
            <p class="text-center text-white">Â© Copyright <?php echo date("Y");?> Pingendo - All rights reserved. </p>
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
        