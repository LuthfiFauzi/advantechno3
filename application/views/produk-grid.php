<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
 <hr/>
      
      <div role="main" class="container products grid">        
        <div class="row">
        
          <aside class="span3 left-nav">
          
            <div class="row">
              <div class="span3">
                <h5>Show By Kategori</h5>
                
                <hr>
                
                <ul class="category">
                <?php
				$kategori=mysql_query("select * from kategori");
				while($k=mysql_fetch_array($kategori)){				
                  echo "<li><a href='?hal=produk-lists-kategori&id=$k[id_kategori]'>$k[nama_kategori]</a></li>";
				   }
				  ?>
                </ul>
              </div>
              

              
              <div class="span3">
                <h5>Show By Price</h5>
                
                <hr>
                
                <ul class="price">
                <li>
                    <a href="?hal=produk-lists-harga&harga=r1">
                      <span class="currency">$</span>
                      <span class="min-val">0</span>
                      <span class="dash">-</span>
                      <span class="currency">$</span>
                      <span class="min-val">50</span>
                    </a>
                  </li>
                  <li>
                    <a href="?hal=produk-lists-harga&harga=r2">
                      <span class="currency">$</span>
                      <span class="min-val">50</span>
                      <span class="dash">-</span>
                      <span class="currency">$</span>
                      <span class="min-val">100</span>
                    </a>
                  </li>
                  <li>
                    <a href="?hal=produk-lists-harga&harga=r3">
                      <span class="currency">$</span>
                      <span class="min-val">100</span>
                      <span class="dash">-</span>
                      <span class="currency">$</span>
                      <span class="min-val">200</span>
                    </a>
                  </li>
                  <li>
                    <a href="?hal=produk-lists-harga&harga=r4">
                      <span class="currency">$</span>
                      <span class="min-val">200</span>
                      <span class="dash">-</span>
                      <span class="currency">$</span>
                      <span class="min-val">300</span>
                    </a>
                  </li>
                  <li>
                    <a href="?hal=produk-lists-harga&harga=r5">
                      <span class="currency">$</span>
                      <span class="min-val">300</span>
                      <span class="dash">-</span>
                      <span class="currency">$</span>
                      <span class="min-val">400</span>
                    </a>
                  </li>
                  <li>
                    <a href="?hal=produk-lists-harga&harga=r6">
                      <span class="currency">$</span>
                      <span class="min-val">400</span>
                      <span class="dash">-</span>
                      <span class="currency">$</span>
                      <span class="min-val">500</span>
                    </a>
                  </li>
                  <li>
                    <a href="?hal=produk-lists-harga&harga=r7">
                      <span class="currency">$</span>
                      <span class="min-val">500</span>
                      <span class="dash">+</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            
          </aside>
          
          <div class="span9">
            
           
              
              <figure>
                <img src="img/Untitled-2.png" width="700px">
              </figure>
              <div class="content">
                <a href="#"><h1 class="featured-title">New trend for men 2012</h1></a>
                <p>
                  Sed eu lorem sit amet tellus hendrerit dignissim ac id nibh. In hac habitasse platea dictumst
                </p>
              </div>
            </div>
            
            <div class="products-view-nav row">
            
              <div class="span3">
                <ul class="views rr">
                  <li class="current"><a href="?hal=produk-grid" class="grid ir ">Grid view</a></li>
                  <li><a href="?hal=produk-lists" class="list ir">List view</a></li>
                </ul>
              </div>
              
             
              
            </div>
            
            <ul class="row-fluid clearfix rr grid-display">
            <?php
			$p1     = new PagingProdukGrid;
			$batas  = 9;
			$posisi = $p1->cariPosisi($batas);
			$q=mysql_query("SELECT * FROM produk ORDER BY id_produk ASC LIMIT $posisi, $batas");
			$no = $posisi+1;
			
            //$q=mysql_query("select * from produk where status<>'featured' LIMIT 9");
            while ($r=mysql_fetch_array($q))
            {
					  $harga = format_rupiah($r[harga]);
					  $disc     = ($r[diskon]/100)*$r[harga];
					  $hargadisc     = number_format(($r[harga]-$disc),0,",",".");
					  $d=$r['diskon'];
					  $htetap="<span>$r[harga]</span>";
					  $hdiskon="<span style='text-decoration:line-through;font-size:0.9em'>$r[harga]</span><span></span>";
					  
					   if ($d!= "0"){
					  $divharga=$hdiskon;
					  }else{
					  $divharga=$htetap;
					  } 	
					  
					  $stok=$r['stok'];
			          $tombolbeli="<a href='aksi.php?module=keranjang&act=tambah&id=$r[id_produk]' class='text'>Beli</a>";
			          $tombolhabis="<span style='color:#868484;font-size:0.7em;'>Stok Habis</span>";
					  if ($stok!= "0"){
					  $tombol=$tombolbeli;
					  }else{
					  $tombol=$tombolhabis;
					  } 
						
						
					  
         echo"<li class='span4 alpha33 desat'>
                <div class='prod-wrapper'>";
				if ($r[status]=="baru")
				{
				 echo "<span class='corner-badge hot-right ir'>Hot</span>";
				}
				else
				{
				 echo "<span class='corner-badge hot-right ir hidden'>Hot</span>";
				}
				
             if ($r[diskon]!="0")
					{
                   //echo"<span class='badge corner-badges-grid'>$r[diskon]%</span>";
					echo "<span class='badge corner-badge off-35'>$r[diskon] % Off</span>";
					}
					else
					{
					  echo "<span class='badge corner-badge off-35 hidden'></span>";	
					}
                 echo" <span class='badge price-badge'>
                    <span class='value'>
                      <span>$</span>
                      <span>$divharga</span>
                    </span>
                  </span>    
                  <a href='?hal=detail&id=$r[id_produk]'>
                     <img src='foto_produk/medium_$r[gambar]' class='desat-ie' alt='' width='238' height='288' style='border:0px solid #F03;margin-bottom:3px;'>
                  </a>
                
                  <span class='info gradient'>
                    <span class='title'>$r[nama_produk]</span>
                    <span class='add-to-cart clearfix'>
                      <span class='icon ir'>Cart</span>
					    $tombol
                    </span>
                  </span>
                </div>
              </li>";
			}
			?>
            </ul>
            
            <div class="products-view-nav row bottom">
            
              <div class="span3">
                <ul class="views rr">
                  <li class="current"><a href="?hal=produk-grid" class="grid ir ">Grid view</a></li>
                  <li><a href="?hal=produk-lists" class="list ir">List view</a></li>
                </ul>
              </div>
              
              <div class="span6">
                <ul class="navigation rr">
                  <?php
				  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk"));
				  $jmlhalaman  = $p1->jumlahHalaman($jmldata, $batas);
				  $linkHalaman = $p1->navHalaman($_GET[halproduk], $jmlhalaman);
				  
				  echo "<li><a href='#'>$linkHalaman</a></li>";
				  ?>
                </ul>
              </div>
              
            </div>
            
          </div>
          
        </div>
      </div>
      
</body>
</html>