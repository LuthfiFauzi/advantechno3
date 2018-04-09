<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/produk/aksi_produk.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=produk&aksi=tambah' role='button' class='btn'>Input Produk Baru</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Produk</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='25%'>Nama Produk</th>
                                    <th width='25%'>Harga</th>
                                    <th width='25%'>Stok</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM produk ORDER BY id_produk ASC');
							while($r=mysql_fetch_array($tp)){
							$harga=format_rupiah($r[harga]);
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[nama_produk]</td>
                                    <td>$harga</td>
                                    <td>$r[stok]</td>
                                    <td><a href='?p=produk&aksi=edit&id=$r[id_produk]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[id_produk]&namafile=$r[gambar]'>HAPUS</td>
                                    
                                </tr>";
							}
                               
                                        
                        echo"</tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>
    </div>";    

break;
case "edit":
	$edit = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/produk/aksi_produk.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Edit Produk</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_produk]>
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama Produk</div>
                            <div class='span9'><input type='text' name='nama_produk' value='$r[nama_produk]'/></div>
                        </div>
						 
					   <div class='row-form clearfix'>
                            <div class='span3'>Kategori</div>
                            <div class='span9'>
							<select name='kategori' id='s2_1' style='width: 100%;'>";
								  $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
								  if ($r[id_kategori]==0){
									echo "<option value=0 selected>- Pilih Kategori -</option>";
								  }   
								  
                                  while($w=mysql_fetch_array($tampil)){
									if ($r[id_kategori]==$w[id_kategori]){
									  echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
									}
									else{
									  echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
									}
								  }                                 
                       echo"</select>
							</div>
                        </div>
						
					 <div class='row-form clearfix'>
                            <div class='span3'>Berat</div>
                            <div class='span9'><input type='text' name='berat'  value='$r[berat]'/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Harga</div>
                            <div class='span9'><input type='text' name='harga' value='$r[harga]'/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Diskon</div>
                            <div class='span9'><input type='text' name='diskon' value='$r[diskon]'/></div>
                    </div>
							
					 <div class='row-form clearfix'>
                            <div class='span3'>Stok</div>
                            <div class='span9'><input type='text' name='stok' value='$r[stok]'/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Deskripsi</div>
                            <div class='span9'> <textarea id='wysiwyg2' name='deskripsi'' style='height: 500px;'>$r[deskripsi]</textarea></div>
                    </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Review</div>
                            <div class='span9'> <textarea id='wysiwyg' name='review' style='height: 500px;'>$r[review]</textarea></div>
                    </div>
					
					 <div class='row-form clearfix'>
					 	<div class='block gallery clearfix'><img src='../foto_produk/small_$r[gambar]'></div>
					 </div>
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>Gambar</div>
                            <div class='span9'> <input type='file' name='fupload'>
							<br>
							*) Apabila gambar tidak diubah, dikosongkan saja.
							</div>
                    </div>
					
							
                    </div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'>
		  </form>
		</div>
<div class='dr'><span></span></div>";
echo "";
break;

case "tambah":
echo "<form method='post' action='modul/produk/aksi_produk.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Input Produk Baru</h1>
                    </div>    
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama Produk</div>
                            <div class='span9'><input type='text' name='nama_produk'/></div>
                        </div>
						 
					   <div class='row-form clearfix'>
                            <div class='span3'>Kategori</div>
                            <div class='span9'>
							<select name='kategori' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih Kategori -</option>";
										$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
										}                               
                       echo"</select>
							</div>
                        </div>
						
					 <div class='row-form clearfix'>
                            <div class='span3'>Berat</div>
                            <div class='span9'><input type='text' name='berat'/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Harga</div>
                            <div class='span9'><input type='text' name='harga'/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Diskon</div>
                            <div class='span9'><input type='text' name='diskon'/></div>
                    </div>
							
					 <div class='row-form clearfix'>
                            <div class='span3'>Stok</div>
                            <div class='span9'><input type='text' name='stok'/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Deskripsi</div>
                            <div class='span9'> <textarea id='wysiwyg' name='deskripsi'' style='height: 500px;'></textarea></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Gambar</div>
                            <div class='span9'> <input type='file' name='fupload'>
							<br>
							*) Apabila gambar tidak diubah, dikosongkan saja.
							</div>
                    </div>
					
							
                    </div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'>
		  </form>
		</div>
<div class='dr'><span></span></div>";
echo "";
break;
			}//penutup switch
}//penutup session
?>    
</body>
</html>