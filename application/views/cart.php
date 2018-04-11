<script>
function harusangka(jumlah){
  var karakter = (jumlah.which) ? jumlah.which : event.keyCode
  if (karakter > 31 && (karakter < 48 || karakter > 57))
    return false;

  return true;
}
</script>
      <hr/>
      <div class="container breadcrumb-wrapper">
        <div class="row">
          <div class="span12 breadcrumb">
            <ul class="rr">
              <li>
                <span class="splitter">/</span>
                <a href="#">Home</a>
              </li>
              <li>
                <span class="splitter">/</span>
                <a href="#">Shop</a>
              </li>
              <li>
                <span class="splitter">/</span>
                <a href="#">Your Chart</a>
              </li>
            </ul>
          </div>
        </div>
      </div>      
      
      
      
      
      <div role="main" class="container cart">
    <?php
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM orders_temp, produk 
			                WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
	  $ketemu=mysql_num_rows($sql);
	  if($ketemu < 1){
		echo "<script>window.alert('Keranjang Belanjanya masih kosong. Silahkan Anda berbelanja terlebih dahulu');
			window.location=('media.php?hal=produk-lists')</script>";
		}
	  else{ 
	  echo"<form method=post action=aksi.php?module=keranjang&act=update> ";
      ?>    
        <table>
          <tr class="headers">
          <th class="alpha16">
          No
          </th>
            <th class="alpha50 dark">
              Nama Barang
            </th>
            <th class="alpha16">
              Quantity
            </th>
            <th class="alpha16">
              Diskon
            </th>
            <th class="alpha16 dark">
              Unit price
            </th>
            <th class="alpha16">
              Price
            </th>
            
          </tr>
          <?php
		  $no=1;
		  while($r=mysql_fetch_array($sql)){
			$disc        = ($r[diskon]/100)*$r[harga];
			$hargadisc   = number_format(($r[harga]-$disc),0,",",".");
			$subtotal    = ($r[harga]-$disc) * $r[jumlah];
			$total       = $total + $subtotal;  
			$vat         = $total*0.1;
			$vat_rp      = format_rupiah($vat);
			$ttl_rp      = $total+$vat;
			$subtotal_rp = format_rupiah($subtotal);
			$total_rp    = format_rupiah($ttl_rp);

			$harga       = format_rupiah($r[harga]);
			?>
          <tr>
          <td>
          <?php echo "$no";  ?>
          </td>
            <td class="article clearfix">
              <figure>
               <?php
			   echo"<img src='foto_produk/$r[gambar]' alt=''/>";
				?>
              </figure>
              
              <div class="info-wrapper">
                <h2><?php echo "$r[nama_produk]"; ?></h2>
                <div class="info">
                  
                </div>
              </div>
              
            </td>
            <td class="quantity dark">
              <div class="quant-input">
                <div class="arrows">
                  
                </div>
                <?php
				 echo "<input type=text name='jml[$no]' value=$r[jumlah] size=1 onchange=\"this.form.submit()\" onkeypress=\"return harusangka(event)\"><br>";
				 echo "<input type=hidden name=id[$no] value=$r[id_orders_temp]>";
				?>
              </div>
              
            </td>
             <td class="quantity dark">
              <div class="quant-input">
                <div class="arrows">
                  
                </div>
                <?php
				   echo "$r[diskon] %";
				?>
              </div>
              
            </td>
            <td class="price">
            <?php
			$harga    = number_format(($r[harga]),0,",",".");
			?>
              <span class="currency">$</span><span class="value"> <?php echo "$hargadisc"; ?> </span>
            
            </td>
            <td class="price dark">
            <?php
      $harga    = number_format(($r[harga]),0,",",".");
      ?>
              <span class="currency">$</span><span class="value"><?php echo "$subtotal_rp"; ?> </span>
            
            </td>
           
        <?php
		$no++;
		  }
		?>
        
          <tr>
            <td colspan="2" class="empty">
            </td>
            <td colspan="3" class="total-wrapper">
            
              <div class="vat clearfix">
                <div class="half-col">
                  PPN 10%
                </div>
                <div class="half-col">
                  <span class="value"> <? echo "Rp. $vat_rp "; ?></span>
                </div>
              </div>
              
              <div class="total clearfix">
                <div class="half-col">
                  Total
                </div>
                <div class="half-col value-wrapper">
                  
                  <span class="currency">Rp.&nbsp;</span><span class="value"><?php echo "$total_rp"; ?></span>
                  
                </div>
              </div>
            
            </td>
          </tr>
        </table>
        
        <div class="row-fluid checkout">
          <!--<div class="span4">-->
            <a href="?hal=simpantransaksi" class="btn"><span class="gradient">Checkout</span></a>
            <a href="?hal=produk-lists" class="btn"><span class="gradient">Belanja Lagi</span></a>
         <!-- </div> -->
        </div>
        
      </div>    
      
<?php
  }
?>     
      
      
      
     
		
		

		
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
