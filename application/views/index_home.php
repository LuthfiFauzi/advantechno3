<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/assets/css/model.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/normalize.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css">   
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/media-queries.css">    
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/assets/css/styles.css">
  <link rel="stylesheet" href="">
  
  <style>
.navbar {
    height: 60px;
    background-color: #353A40;
    font-family: Arial, Helvetica, sans-serif;
}
.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
}
.navbar a:hover, .dropdown:hover .dropbtn, .dropbtn:focus {
    color: #ffcc80;
}
.dropbtn {
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    background-color: transparent;
}
.dropbtn:hover, .dropbtn:focus {
    color: #ffcc80;
}
.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    background-color: #353A40;
    min-width: 160px;
    overflow: auto;
    background-color: 
    z-index: 1;
}
.dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.dropdown a:hover {background-color: transparent;
}
.show {display}
</style>
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-2">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar" style="width: 100%">
            <img src="img/atf-01.png" width="115" \></img>
          <div class="navbar">
            <a class="nav-link" style="text-transform: uppercase; background-color: transparent;" href="#Home"><b>Home</b></a>
            <a class="nav-link" style="text-transform: uppercase; background-color: transparent;" href="#Introduction"><b>Introduction</b></a>
            <a class="nav-link" style="text-transform: uppercase; background-color: transparent;" href="#Service"><b>Service</b></a>
<div class="dropdown">
<button onclick="myFunction()" class="dropbtn" style="text-transform: uppercase;"><b>Product</b></button>
  <div id="myDropdown" class="dropdown-content">
    <a href="media.php?hal=produk-lists" style="text-transform: uppercase;"><b>Our Product</b></a>
    <a href="media.php?hal=carabeli" style="text-transform: uppercase;"><b>How to Buy</b></a>
    <a href="media.php?hal=cart" style="text-transform: uppercase;"><b>Your Cart</b></a>
  </div>
</div>
<a class="nav-link" style="text-transform: uppercase; background-color: transparent;" href="#Contact"><b>Contact</b></a>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
    </div>
  </nav>


          <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselIndicators" data-slide-to="1"></li>
              <li data-target="#carouselIndicators" data-slide-to="2"></li>
            </ol>
            <section id="Home">
            <div class="carousel-inner shadow-div-black">
              <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo base_url()?>assets/assets/img/1.jpg" alt="First slide" height="630">
                <div class="carousel-caption d-none d-md-block">
                  <h5 style="color: white;">Advanced Technology Facility</h5>
                  <p>.  .  .</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="assets/img/2.jpeg" alt="Second slide" height="630">
                <div class="carousel-caption d-none d-md-block">
                  <h5 style="color:white">Advanced Technology Facility</h5>
                  <p>.  .  .</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="assets/img/3.jpg" alt="Third slide" height="630">
                <div class="carousel-caption d-none d-md-block">
                  <h5 style="color:white">Advanced Technology Facility</h5>
                  <p>.  .  .</p>
                </div>
              </div>
            </div>
            </section>
            <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
            <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
          </div>
        </div>
      </div>
    </div>
  </section>

    </p>
        <section id="Introduction">
        <div class="col-md-12 shadow-div-orange bg-white">
          <h1 class="h1 pt-3"><center>Introduction</center></h1>
          <hr class="bg-yellow" width="1150" > 
  <section id="">
    <div class="container bg-light ">
      <div class="row ">
        <div class="col-md-6 py-4 ">
              <p class="text-justify"> We are pleased to introduce ADVANCED TECHNOLOGY FACILITY PT, Register No 101114616882, a company specialized in providing services and support to the aviation organization such as provisioning for Aircraft Leasing, Purchase and Rental, Spare Parts as well as Repair / Overhaul of Fixed and Rotary Wing engines and accessories to the South East Asia, Asia Pacific, Middle East and the rest of the world.
              <p class="text-justify">
              Previously our name is ADVANCED TECHNOLOGY FACILITY CV, Reg No 101135215697, since 25 August 2011, we upgrade our company status to Company Limited (Perseroan Terbatas - PT) Reg No 10114616882 Incorporated and established since 2007 with more than 15 years experience in the industries, we have expanded our horizon to serve and help client to eliminate boundaries,  and collaborate in new ways, establishing trust and prompt response. </br>
            </div>
            <div class="col-md-6 py-4">
              <p class="text-justify">  
               We are a Distributor of Aeronautical Products and In addition as a member of:
                <li> Aviation Association Supplier </li>  
                <li> The Chamber of Commerce and Industries </li>  
                <li> The Association of middle Enterprise of Indonesia.</li></p>
              <div class='text-justify'>
              
              We are globally expanding the full array of services to meet unique, local and regional needs. These cover the commercial and the aviation business sectors which include fixed and rotary wing. </p>
              With strategic partners and alliances / collaboration with many local partners in Asia countries, many reputable various vendors, repair shops and manufactures of aeronautical products. We can be your source for all you needs under one roof   
            </div> </p>  
              ADVANCED TECHNOLOGY FACILITY, operate in:<br>
              HEAD OFFICE </br>
              Bandung - Indonesia </p>
              
            </div>
          </div>
        </div></p></p> 

        <section id="Service">
          <h1 class="h1 pt-3" style="background-color: white">
            <center>Our Service</center></h1>
            <div class="container bg-light ">
              <hr class="bg-yellow" style="">
              <div class="row ">
        <div class="col-md-6 py-4 ">
          <p class="text-justify">
          <b> SPARES AIRCRAFT COMPONETS SUPPORTED </b> </p>
          To give best support for our customers, we believe that our expertise must cover several aircrafts types. We can aim to provide total support for our customers needs. We can provide spares support especially for the following aircraft types
          <li>Bell Helicopter all series</li>
          <li>Fokker 27, 28, 100</li>
          <li>Boeing 727/737/747 Series</li>
          <li>Airbus A300-A330 Series</li>
          <li>NC212,CN235 and others Indonesia aircraft products</li></p>
          <p class="text-justify">We concern to keep in touch with our customers fleet, we buy stock and surplus packages on regular basis. If you do not see your fleet type above. Please contact us so we can inform you of our stock latest holding.</p>
        </div>
        <div class="col-md-6 py-4">
          <p class="text-justify">
            <b>REPAIR AND SERVICES</b> </p>
            We can offer third party repair and overhaul management service. We elaborate with our thrust partners either manufactures or approved repair shops to provide best quality product with competitive price and reasonable turn around time. </p> </p>
            <b>OTHER AIRCRAFT OPERATION SUPPORT SERVICES</b> </p>
            Aircraft and Engines maintenance support Aircraft and Engines purchasing, selling and leasing support Most of the above products comes traceability or manufacturer recommended Shelf Life, technical support data and product labels upon purchase.</p>
            We can be your source for all you needs under one roof 
            
        </div>
      </div>
    </div>
  </section></p>

        <section id="Contact">
          <h1 class="h1 py-4" style="background-color: white">
            <center>Contact</center></h1>
            <div class="container bg-light ">
              <hr class="bg-yellow" style="">
              <div class="row ">
        <div class="col-md-6 py-2 ">
          <p class="text-justify">
          <center><b>INDONESIA HEAD OFFICE </p></b>
            Metro Trade Center Kav. B35 </br>
            No. 590 Soekarno-Hatta Street </br>
          Bandung 40286 . Indonesia </br>
        Telp/Fax: +62.22.753.6432 </p>
      For general information you can send email to info@advantechno.com  </b></center>
        </div>
        <div class="col-md-6 py-4">
<div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63369.29936051163!2d107.6659688808383!3d-6.940549516219248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e81a24f77379%3A0xb0accb4da44b3c8b!2sPT.+Advanced+Technology+Facility!5e0!3m2!1sen!2sus!4v1518497336928" width="550" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    </div>
      </div>

    </div>
  </section>

  <div class="footer text-white pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="offset-md-11 offset-xs-11"></div>
        <div class="col-md-1 col-xs-1">
          <i class="fa fa-3x bg-dark fa-angle-up px-3 mr-2" aria-hidden="true" style="color:white;" id="scrollup"></i>
        </div>
      </div>
      <div class="row bg-dark pt-2">
        <div class="col-md-4 col-xs-4">
          <p>
            Follow : <i class="fa fa-facebook-square mr-1" aria-hidden="true"></i>advantechno
          </p>

        </div>
        <div class="offset-md-4 offset-xs-4"></div>
        <div class="col-md-4 col-xs-4">
          <p class="text-right">&copy; Web Designed by ATF. All rights reserved</p>
        </div>
      </div>
    </div>
  </div>

</body>
<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/scroll.js"></script>

</html>
