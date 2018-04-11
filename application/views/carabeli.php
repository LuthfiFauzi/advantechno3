<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div role="main" class="container contact">        

        <div class="row top-spacing">
          <div class="span5">
          
            <h1>Cara Beli</h1>
             <?php
       $q=mysql_query("select * from modul where id_modul='45'");
       $carabeli=mysql_fetch_array($q);
            echo "<p align='justify'>$carabeli[static_content] </p>";
          ?>
          </div>
          
          <div class="span6 offset1">
            
            <h1>Contact details</h1>
            
             <?php
       $q=mysql_query("select * from modul where id_modul='66'");
       $carabeli=mysql_fetch_array($q);
            echo "<p align='justify'>$carabeli[static_content] </p>";
          ?>
            
            <ul class="rr info clearfix">
              <li>
                Phone: <span class="val">+62.22.753.6432</span>
              </li>
               <li>
                Email: <span class="val">info@advantechno.com</span>
              </li>
              <li>
                Fax: <span class="val">+62.22.753.6432</span>
              </li>             
              <li>
                Web: <span class="val">www.advantechno.com</span>
              </li>
            </ul>
            
          </div>
        </div>
      </div>    
</body>
</html>