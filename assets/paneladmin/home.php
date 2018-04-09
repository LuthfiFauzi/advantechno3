<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Simple Admin</a> <span class="divider">></span></li>                
                <li class="active">Dashboard</li>
            </ul>
                        

            
        </div>
        
        <div class="workplace">
                                    
            <div class="row-fluid">
                <div class="span12">
                    
                    <div class='widgetButtons'>
                       <?php
					   $jmlprod=mysql_num_rows(mysql_query("select * from produk"));
					   ?>                       
                        <div class='bb'>
                            <a href='#' class='tipb' title='Total Produk'><span class='ibw-archive'></span></a>
                            <div class='caption red'><?php echo "$jmlprod"; ?></div>
                        </div>
                        
                       <?php
					   $jmlorder=mysql_num_rows(mysql_query("select * from orders"));
					   ?> 
                        <div class='bb gray'>
                            <a href='#' class='tipb' title='Total Orders'><span class='ibw-calc'></span></a>
                            <div class='caption'><?php echo "$jmlorder"; ?></div>
                        </div>
                        
                       <?php
					   $jmlcus=mysql_num_rows(mysql_query("select * from kustomer"));
					   ?> 
                        <div class='bb yellow'>
                            <a href='#' class='tipb' title='Total Customer'><span class='ibw-user'></span></a>
                            <div class='caption green'><?php echo "$jmlcus"; ?></div>
                        </div>
                        
                       <?php
					   $jmlkomen=mysql_num_rows(mysql_query("select * from komentar"));
					   ?> 
                        <div class='bb red'>
                            <a href='#' class='tipb' title='Total Komentar'><span class='ibw-chats'></span></a>
                            <div class='caption blue'><?php echo "$jmlkomen"; ?></div>
                        </div>
                        
                       <?php
					   $jmlhubungi=mysql_num_rows(mysql_query("select * from hubungi"));
					   ?> 
                        <div class='bb green'>
                            <a href='#' class='tipb' title='Total Hubungi'><span class='ibw-mail'></span></a>                            
                            <div class='caption yellow'><?php echo "$jmlhubungi"; ?></div>
                        </div>
                        
                       <?php
					   $jmlpengunjung=mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0);
					   ?> 
                        <div class='bb blue'>
                            <a href='#' class='tipb' title='Total Pengunjung'><span class='ibw-users'></span></a>
                            <div class='caption gray'><?php echo "$jmlpengunjung"; ?></div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="row-fluid">

                <div class="span4">                    

                    <div class="wBlock red clearfix">                        
                        <div class="dSpace">
                        <?php
						$sorder=mysql_query("select * from orders");
						$torder=mysql_num_rows($sorder);
						
						$sorder1=mysql_query("select * from orders where status_order='Baru'");
						$torder1=mysql_num_rows($sorder1);
						
						$selisihorder=$torder-$torder1;
						?>
                            <h3>Statistik Order</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--130,190,260,230,290,400,340,360,390--></span>
                            <span class="number"><?php echo"$torder"; ?></span>                    
                        </div>
                        
                        <div class="rSpace">
                            <span><?php echo"$torder"; ?> <b>Total Invoice</b></span>
                            <span><?php echo"$torder1"; ?> <b>Belum Lunas</b></span>
                            <span><?php echo"$selisihorder"; ?> <b>Lunas</b></span>
                        </div>                          
                    </div>                     
                    
                </div>                
                
                <div class="span4">                    
                 <?php
				 $cus=mysql_query("select distinct id_kustomer from orders")or die(mysql_error());
				 $jcus=mysql_num_rows($cus);
				 
				 $tcus=mysql_query("select * from kustomer ");
				 $tjcus=mysql_num_rows($tcus);
				 
				 $selisih=$tjcus-$jcus;
				 ?>
                    <div class="wBlock green clearfix">                        
                        <div class="dSpace">
                            <h3>Kustomer</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--5,10,15,20,23,21,25,20,15,10,25,20,10--></span>
                            <span class="number"><?php echo" $tjcus"; ?> </span>                    
                        </div>
                        <div class="rSpace">
                            <span><?php echo"$tjcus"; ?> <b>Total Kustomer</b></span>
                            <span><?php echo"$jcus"; ?> <b> Kustomer Aktif</b></span>
                            <span><?php echo"$selisih"; ?> <b>Kustomer Pasif</b></span>
                        </div>                          
                    </div>                                                            
                    
                </div>

                <div class="span4">                    
                 <?php
				  // Statistik user
					  // Statistik user
					$qstatistik=mysql_num_rows(mysql_query("select * from modul where nama_modul='Statistik User' and publish='Y'"));
					// Apabila modul Statistik diaktifkan Publish=Y, maka tampilkan modul Statistik
					//if ($qstatistik > 0){
					//  echo "<hr color=#e0cb91 noshade=noshade /><br />
					//        <img src='$f[folder]/images/statistik.jpg' /><br />";
					
					  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
					  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
					  $waktu   = time(); // 
					
					  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
					  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
					  // Kalau belum ada, simpan data user tersebut ke database
					  if(mysql_num_rows($s) == 0){
						mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
					  } 
					  else{
						mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
					  }
					
					  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
					  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
					  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
					  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
					  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
					  $bataswaktu       = time() - 300;
					  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));
					
					  $path = "counter/";
					  $ext = ".png";
					
					  $tothitsgbr = sprintf("%06d", $tothitsgbr);
					  for ( $i = 0; $i <= 9; $i++ ){
						   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
					  }
				 ?>				 
                    <div class="wBlock blue clearfix">
                        <div class="dSpace">
                            <h3>Total Hits</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--240,234,150,290,310,240,210,400,320,198,250,222,111,240,221,340,250,190--></span>
                            <span class="number"><?php echo"$totalhits ";?></span>
                        </div>
                        <div class="rSpace">                                                                           
                            <span><?php echo"$pengunjung ";?><b>Pengunjung Hari ini</b></span>
                            <span><?php echo"$totalpengunjung";?> <b> TotalPengunjung</b></span>
                            <span><?php echo"$pengunjungonline";?> <b>Pengunjung Online</b></span>                                                        
                        </div>
                    </div>                      
                    
                </div>                
            </div>            
            
            <div class="dr"><span></span></div> 
            
            <div class="row-fluid">
                
                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-archive"></div>
                        <h1>Tabs</h1>
                        <ul class="buttons">        
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block-fluid accordion">
              		<h3>Produk Terbaru</h3>
                        <div>
                            <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                                <thead>
                                    <tr>
                                        <th width="60">Tgl Masuk</th><th>Nama Produk</th><th width="60">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
								$tampilproduk=mysql_query("select * from produk order by id_produk ASC limit 3");
                                while($produk=mysql_fetch_array($tampilproduk))
								{
								echo"<tr>
                                        <td><span class='date'>$produk[tgl_masuk]</span><span class='time'>stok : $produk[stok]</span></td>
                                        <td><a href='#'>$produk[nama_produk]</a></td>
                                        <td><span class='price'>$produk[harga]</span></td>
                                    </tr>";
								}
								?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" align="right"><button class="btn btn-small">More...</button></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>                        

                        <h3>Order</h3>
                        <div>
                            <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                                <thead>
                                    <tr>
                                        <th width="60">Tanggal</th><th>Nama Kustomer</th><th width="60">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $tampilorder=mysql_query("select * from orders order by id_orders ASC limit 3");
                                while($order=mysql_fetch_array($tampilorder))
								{
                              echo "<tr>
                                        <td><span class='date'>$order[tgl_order]</span><span class='time'>$order[jam_order]</span></td>";
									
								   $tampilkustomer=mysql_query("select * from kustomer order by id_kustomer='$order[id_kustomer]' ASC limit 3");	
                                   $kustomer=mysql_fetch_array($tampilkustomer);
								   echo"<td><a href='#'>$kustomer[nama_lengkap]</a></td>";
                                   echo"<td><span class='price'>$order[status_order]</span></td>";
                                  echo"</tr>";
								}
								?>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" align="right"><button class="btn btn-small">More...</button></td>
                                    </tr>
                                </tfoot>                                
                            </table>                           
                        </div>
                        
                        <h3>Data Kota</h3>
                        <div>
                            <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                                <thead>
                                    <tr>
                                        <th width="60">Paket</th><th>Nama Kota</th><th width="60">Ongkir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
								$tampilkota=mysql_query("select * from kota limit 3");
								while($kota=mysql_fetch_array($tampilkota))
								{
							    $tampilshop=mysql_query("select * from shop_pengiriman where id_perusahaan='$kota[id_perusahaan]'");
								$shop=mysql_fetch_array($tampilshop);
                                echo"<tr>
                                        <td><span class='date'>$shop[nama_perusahaan]</span></td>
                                        <td><a href='#'>$kota[nama_kota]</a></td>
                                        <td><span class='price'>$kota[ongkos_kirim]</span></td>
                                     </tr>";
								}
								?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" align="right"><button class="btn btn-small">More...</button></td>
                                    </tr>
                                </tfoot>                                
                            </table>                              
                        </div>                        
                        
                    </div>
                </div>
                
                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-edit"></div>
                        <h1>Sekilas Info</h1>
                        <ul class="buttons">        
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block news scrollBox">
                        
                        <div class="scroll" style="height: 270px;">
                          <?php 
						  $tampilsekilas=mysql_query("select * from sekilasinfo");
						  while($sekilas=mysql_fetch_array($tampilsekilas))
						  { 
                       echo"<div class='item'>
                                <a href='#'></a>
                                <p>$sekilas[info]</p>
                                <span class='date'>$sekilas[tgl_posting]</span>
                                <div class='controls'>                                    
                                    <a href='#' class='icon-pencil tip' title='Edit'></a>
                                    <a href='#' class='icon-trash tip' title='Remove'></a>
                                </div>
                            </div>";
						  }
						  ?>
                                                
                            
                        </div>
                        
                    </div>
                </div>                               

                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-cloud"></div>
                        <h1>Kustomer</h1>
                        <ul class="buttons">        
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block users scrollBox">
                        
                        <div class="scroll" style="height: 270px;">
                     <?php 
					 $tampilcus=mysql_query("select * from kustomer");
					 while($customer=mysql_fetch_array($tampilcus))
					 {	   
                     echo"<div class='item clearfix'>
                                <div class='image'><a href='#'><img src='img/users/aqvatarius_s.jpg' width='32'/></a></div>
                                <div class='info'>
                                    <a href='#' class='name'>$customer[nama_lengkap]</a>                                                                    
                                    <div class='controls'>"; 
								   if ($customer[aktif]=="Y")
								   {                                   
                                   echo"<a href='#' class='icon-ok'></a>";
								   }
								   else
								   {
                                   echo"<a href='#' class='icon-remove'></a>";
								   }
							  echo"</div>                                                                    
                                </div>
                            </div>";
					 }
						 ?>
                                    
                            
                        </div>
                        
                    </div>
                </div>                
                
                
            </div>

            <div class="dr"><span></span></div>            

            
            <div class="row-fluid">
                
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-chats"></div>
                        <h1>Komentar</h1>
                        <ul class="buttons">        
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block messaging">
                       
                      <?php
				   $tampilpesan=mysql_query("select * from komentar");
				   while ($pesan=mysql_fetch_array($tampilpesan))
				   {
				  $tgl=tgl_indo($pesan[tgl]);	    
                   echo"<div class='itemIn'>
                            <a href='#' class='image'><img src='img/users/olga.jpg' class='img-polaroid'/></a>
                            <div class='text'>
                                <div class='info clearfix'>
                                    <span class='name'>$pesan[nama_komentar]</span>
                                    <span class='date'>$tgl--$pesan[jam_komentar]</span>
                                </div>  
                               $pesan[isi_komentar]
                            </div>
                        </div>";
				    }
                        ?>
						
                    </div>
                </div>                
                
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-calendar"></div>
                        <h1>Calendar</h1>
                    </div>
                    <div class="block-fluid">
                        <div id="calendar" class="fc"></div>
                    </div>
                </div>
                
            </div>            
                        
            
            
            
            <div class="dr"><span></span></div>
        
        </div>
        
    </div>
</body>
</html>