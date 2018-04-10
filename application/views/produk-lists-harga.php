<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<hr/>
      
      <div role="main" class="container products list">        
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
            
            <div class="clearfix hidden-phone">
              <figure>
                <img src="img/Untitled-2.png" width="700px">
              </figure>
              <div class="content">
                 <a><h1 class="featured-title">Our Product</h1></a>
                <p>
                  Choose your product what you want by click buy
                </p>
              </div>
            </div>
            
            <div class="products-view-nav row">
            
              <div class="span3">
                <ul class="views rr">
                  <li><a href="?hal=produk-grid" class="grid ir ">Grid view</a></li>
                  <li class="current"><a href="?hal=produk-lists" class="list ir">List view</a></li>
                </ul>
              </div>
              
             
              
            </div>
            
            <ul class="row clearfix rr list-display product">
		<?php
		$p1     = new PagingProduk;
		$batas  = 3;
		$posisi = $p1->cariPosisi($batas);
		
		if ($_GET[harga]=='r1')
		{
		$produk=mysql_query("SELECT * FROM produk WHERE harga BETWEEN '0' AND '50000' ORDER BY id_produk ASC LIMIT $posisi, $batas");
		}
		else
		if ($_GET[harga]=='r2')
		{
		$produk=mysql_query("SELECT * FROM produk WHERE harga BETWEEN '50000' AND '100000' ORDER BY id_produk ASC LIMIT $posisi, $batas");
		}
		else
		if ($_GET[harga]=='r3')
		{
		$produk=mysql_query("SELECT * FROM produk WHERE harga BETWEEN '100000' AND '200000' ORDER BY id_produk ASC LIMIT $posisi, $batas");
		}
		else
		if ($_GET[harga]=='r4')
		{
		$produk=mysql_query("SELECT * FROM produk WHERE harga BETWEEN '200000' AND '300000' ORDER BY id_produk ASC LIMIT $posisi, $batas");
		}
		else
		if ($_GET[harga]=='r5')
		{
		$produk=mysql_query("SELECT * FROM produk WHERE harga BETWEEN '300000' AND '400000' ORDER BY id_produk ASC LIMIT $posisi, $batas");
		}
		else
		if ($_GET[harga]=='r6')
		{
		$produk=mysql_query("SELECT * FROM produk WHERE harga BETWEEN '400000' AND '500000' ORDER BY id_produk ASC LIMIT $posisi, $batas");
		}
		else
		if ($_GET[harga]=='r7')
		{
		$produk=mysql_query("SELECT * FROM produk WHERE harga >= '500000' ORDER BY id_produk ASC LIMIT $posisi, $batas");
		}
		
		$no = $posisi+1;
		
		while ($p=mysql_fetch_array($produk))
		{ 
		
		//$harga    = number_format(($p[harga]),0,",",".");
		$pothar   = $p['diskon'];
		
		$disisi="<span class=badge corner-badges>$p[diskon]</span>";
		$diskosong="";
		
		if ($pothar!="0")
		{
		 $divdiskon=$disisi;
		}
		
		
		$harga = format_rupiah($p[harga]);
		$disc     = ($p[diskon]/100)*$p[harga];
		$hargadisc     = number_format(($p[harga]-$disc),0,",",".");
		$d=$p['diskon'];
		$htetap=" <span class='currency' style='font-size:12px'>$ </span><span class='value'>$harga</span>";
		$hdiskon=" <span class='currency' style='font-size:11px'>$ </span><span class='value'  style='text-decoration:line-through;font-size:16px'>$harga</span><br>
				   <span class='currency' style='font-size:13px'>$ </span><span class='value'>$hargadisc</span>";
					  
		if ($d!= "0"){
		$divharga=$hdiskon;
		}else{
		$divharga=$htetap;
		}
        echo"<li class='span9'>
                <div class='row'>
                  <div class='span3 desat photo-wrapper'>";
				  if ($pothar!="0")
					{
                   echo"<span class='badge corner-badges'>$p[diskon]%</span>";
					}
					else
					{
					  echo "<span class='badge corner-badge hot ir hidden'>Hot</span>";	
					}
                   echo" <a href=''produk-$p[id_produk]-$p[produk_seo]'>
                      <img src='foto_produk/$p[gambar]' alt=''/>
                    </a>
                  </div>
                  <div class='span6 info clearfix'>
                    <h1>$p[nama_produk]</h1>
                    <p style='text-align:justify'>";
					$desk = htmlentities(strip_tags($p['deskripsi'])); // membuat paragraf pada isi berita dan mengabaikan tag html
    				$deskripsi = substr($desk,0,250); // ambil sebanyak 220 karakter
    			 	$deskripsi = substr($desk,0,strrpos($deskripsi," ")); // potong per spasi kalimat
                 echo"$deskripsi...
                    </p>
                    <hr/>
                    <div class='row price-wrapper'>
                      <div class='span2 clearfix'>
                        <a href='aksi.php?module=keranjang&act=tambah&id=$p[id_produk]' class='add-to-cart'>
                          <span class='icon ir'>Cart</span>
                          <span class='text'>Beli</span>
                        </a>
                      </div>";
                  echo"<div class='span2'>
                        <span class='price'>
                          $divharga
                        </span>
                      </div>
                    </div>
                    <hr/>
                    
                  </div>
                </div>
              </li>";
			  $no++;
		  }
       		 ?>      
            </ul>
            
            <div class="products-view-nav row bottom">
            
              <div class="span3">
                <ul class="views rr">
                  <li><a href="?hal=produk-grid" class="grid ir ">Grid view</a></li>
                  <li class="current"><a href="?hal=produk-lists" class="list ir">List view</a></li>
                </ul>
              </div>
              
              <div class="span6">
                <ul class="navigation rr">
                
                </ul>
              </div>
              
            </div>
            
          </div>
          
        </div>
      </div>
</body>
</html>