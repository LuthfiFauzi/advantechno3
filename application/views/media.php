  <?php 
  error_reporting(0);
  session_start();  
  include "<?php echo base_url()?>assets/config/koneksi.php";
  include "<?php echo base_url()?>assets/config/fungsi_indotgl.php";
  include "<?php echo base_url()?>assets/config/pagingproduk.php";
  include "<?php echo base_url()?>assets/config/fungsi_combobox.php";
  include "<?php echo base_url()?>assets/config/library.php";
  include "<?php echo base_url()?>assets/config/fungsi_autolink.php";
  include "<?php echo base_url()?>assets/config/fungsi_rupiah.php";
  include "<?php echo base_url()?>assets/hapus_orderfiktif.php";
  
  if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  $user="Pengunjung";
  }
  else
  {
  $user="$_SESSION[namalengkap]";  
  }
  ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gte IE 9]>         <html class="no-js gte-ie9"> <![endif]-->
<!--[if gt IE 99]><!--> <html class="no-js"> <!--<![endif]-->
    <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
      <title>Advantechno</title>
      <meta name="description" content="">
  
      <meta name="viewport" content="width=device-width">

      <link rel="stylesheet" href="<?php echo base_url()?>assets/css/normalize.min.css">
      <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css">   
      <link rel="stylesheet" href="<?php echo base_url()?>assets/css/media-queries.css">    
      <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">    

      <script src="<?php echo base_url()?>assets/js/vendor/modernizr-2.6.1.min.js"></script>
              <style>
.navbar {
    height: 50px;
    background-color: transparent;
    font-family: Arial, Helvetica, sans-serif;

}
.navbar a {
    float: left;
    font-size: 16px;
    color: black;
    text-align: center;
    padding: 14px 16px;
}
.navbar a:hover, .dropdown:hover .dropbtn, .dropbtn:focus {
    color: #ffcc80;
}
.dropbtn {
    color: black;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    background-color: transparent;
}
.dropbtn:hover, .dropbtn:focus {
    color: #DF7401;
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
    
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css_ticker/style.css">  
    <script type="text/javascript" src="<?php echo base_url()?>assets/js_ticker/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js_ticker/jquery.totemticker.js"></script>
  <script type="text/javascript">
    $(function(){
      $('#vertical-ticker').totemticker({
        row_height  : '100px',
        next    : '#ticker-next',
        previous  : '#ticker-previous',
        stop    : '#stop',
        start   : '#start',
        mousestop : true,
      });
    });
  </script>


    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

    
    
    
      <div class="top-bar" style="background-color: #353A40">
        <div class="container">
          <div class="row">
          
            
            <div class="span9 menu clearfix">
              <ul class="clearfix rr">
                <li>
                  <a href="">
                    <span class="ir icon my-account"></span>
                    <span style="color:#FFF; font-size:10px"><?php echo "Halo, &nbsp; $user"; ?></span>
                  </a>
                </li>
               <?php
               if (!empty($_SESSION['namauser']) AND !empty($_SESSION['passuser'])){
        ?>
                <li>
                  <a href="logout.php">
                    <span class="ir icon log-in"></span>
                    <span style="color:#FFF;font-size:10px">&nbsp;Logout</span>
                  </a>
                </li>
                <?php
          }
          
                if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
        ?>  
                <li>
                  <a href="?hal=login">
                    <span class="ir icon log-in"></span>
                    <span style="color:#FFF;font-size:10px">&nbsp;Log in</span>
                  </a>
                </li>
                <?php
        }
        ?>
              </ul>
            </div>
            
          </div>
        </div>
      </div>
      
      
      <header class="container">      
        <div class="row">
        
          <div class="span3 logo-wrapper">
           
          </div>
          
          <div class="span5 collections">
            <div><span class="ir arrow up">Up</span></div>
            <div>
              <ul class="content rr" >
                <li class="current" style="color: style=#353A40" href="">Advanced Technology Facility</a></li>
                <li><a href="" style="color:#353A40">a specialized company to support aviation organization</a></li>
                <li><a href="" style="color:#353A40">since Agust, 25 2011</a></li>
              </ul>
            </div>
            <div><span class="ir arrow down">Down</span></div>
          </div>
          
          <div class="span4">
           <div class="searchspan">
            <input type="text" class="search-box" placeholder="Search..." value="" style="background:#FFF"/>
           </div>
              
                           
            </div>
           
            
            <div class="shopping-cart">
              <span class="icon ir">Cart</span>
               <?php
        $sid = session_id();
        $sql = mysql_query("SELECT SUM(jumlah*harga) as total,SUM(jumlah) as totaljumlah FROM orders_temp, produk 
                WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
          $r=mysql_fetch_array($sql);
          if ($r['totaljumlah'] != ""){
          $total_rp    = format_rupiah($r[total]);  
            echo "<span class='text'><a href='?hal=cart'><span class='title'>Shopping Cart</span></a> (<span>$r[totaljumlah]</span> items) - </span>
            <span class='price'><span>Rp.</span><span>$total_rp</span></span>";
          }
          else
          {
          echo "<span class='text'><a href='?hal=cart'><span class='title'>Shopping Cart</span></a> (<span>0</span> items) - </span>
            <span class='price'><span>Rp.</span><span>0</span></span>"; 
          }
        ?>
            </div>
            
          </div>
          
        </div>  
      </p>

         <div class="navbar">
          <div class="navbar">
            <a class="dropbtn" style="text-transform: uppercase; text-decoration: none;" href="index.php"><b>Home</b></a>
            <a class="dropbtn" style="text-transform: uppercase; text-decoration: none;" 
            href="media.php?hal=produk-lists"><b>our product</b></a>
            <a class="dropbtn" style="text-transform: uppercase; text-decoration: none" 
            href="media.php?hal=carabeli"><b>how to buy</b></a>
            <a class="dropbtn" style="text-transform: uppercase; text-decoration: none" 
            href="media.php?hal=cart"><b>your cart</b></a>
            <a class="dropbtn" style="text-transform: uppercase; text-decoration: none" 
            href="media.php?hal=contact"><b>contact</b></a>
</div>


    </div>
      </header>
      
      <?php
     include "konten.php";
    ?>
      
      
      
      <footer>
        <div class="top" style="background-color: black">
          <div class="container">
            <div class="row">
            
    
              
            </div>
          </div>
        </div>
        
        <div style="background-color: #2E2E2E">
          <div class="container">
            <div class="row footer-menu">
            
              <div class="span3" style="color:#FFF;font-size:0.8em">
                <?php
        include "statistik.php";  
        ?>
              </div>
              
              <div class="span6">
                <h2>My Account</h2>
                <ul class="rr">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="media.php?hal=produk-lists">Our Product</a></li>
                  <li><a href="media.php?hal=carabeli">How to Buy</a></li>
                  <li><a href="media.php?hal=cart">Your Chart</a></li>
                </ul>
              </div>
              
              
              <div class="span3">
                <h2>Connect with Us</h2>
                <ul class="connect rr">
                  <li>
                    <a href="#" class="clearfix">
                      <span class="ir icon phone">Phone</span>
                      <span class="phone-no">+62.22.753.6432</span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="clearfix">
                      <span class="ir icon mobile">Mobile</span>
                      <span class="phone-no">+62.22.753.6432</span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="clearfix">
                      <span class="ir icon mail">Mail</span>
                      <span>info@advantechno.com</span>
                    </a>
                  </li>
                </ul>
              </div>
              
            </div>
            
            <div class="row">
              <div class="span12 credit-cards">
                <ul class="rr">
                <?php
        $bank=mysql_query("select gambar from bank order by id_bank ASC");
        while($b=mysql_fetch_array($bank)){
                  echo "<li><img src='foto_banner/$b[gambar]'></li>";
        }
        ?>
                </ul>
              </div>
            </div>
            
          </div>
        </div>
        
        <div class="bottom">
          Copyright &copy; 2018 advantechno.com
        </div>
      </footer>
      
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>

        <script src="<?php echo base_url()?>assets/js/plugins.js"></script>
        <script src="<?php echo base_url()?>assets/js/main.js"></script>
    </body>
</html>
