<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/subproduk/aksi_subproduk.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=subproduk&aksi=tambah' role='button' class='btn'>Input subproduk Baru</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data subproduk</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='3%'><input type='checkbox' name='checkbox'/></th>
                                    <th width='5%'>No</th>
                                    <th width='45%'>Nama Subproduk</th>
									<th width='25%'>Gambar</th>
                                    <th width='12%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";
							$no=1;
							$tp=mysql_query('SELECT * FROM subproduk ORDER BY id_subproduk ASC');
							while($r=mysql_fetch_array($tp)){
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>";
							 $p=mysql_query("select * from produk where id_produk='$r[id_produk]'");
							 $namaproduk=mysql_fetch_array($p);		
                               echo"<td>$no</td>
							 		<td>$namaproduk[nama_produk]</td>
									<td><img src='../foto_produk/small_$r[gambar]' width=80 height=50></td>
                                    <td><a href='?p=subproduk&aksi=edit&id=$r[id_subproduk]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[id_subproduk]&namafile=$r[gambar]'>HAPUS</td>
                                    
                                </tr>";
							$no++;
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
	$edit = mysql_query("SELECT * FROM subproduk WHERE id_subproduk='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/subproduk/aksi_subproduk.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Edit subproduk</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_subproduk]>
					   <div class='row-form clearfix'>
                            <div class='span3'>Nama Produk</div>
                            <div class='span9'>
							<select name='produk' id='s2_1' style='width: 100%;'>";
							  $tampil=mysql_query("SELECT * FROM produk ORDER BY nama_produk");
							  if ($r[id_produk]==0){
								echo "<option value=0 selected>- Pilih Produk -</option>";
							  }   
					
							  while($w=mysql_fetch_array($tampil)){
								if ($r[id_produk]==$w[id_produk]){
								  echo "<option value=$w[id_produk] selected>$w[nama_produk]</option>";
								}
								else{
								  echo "<option value=$w[id_produk]>$w[nama_produk]</option>";
								}
							  }                                
                       echo"</select>
							</div>
                        </div>
						
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>Gambar</div>
								<div class='span9'>
								  <img src='../foto_produk/small_$r[gambar]'>
								</div>
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
echo "<form method='post' action='modul/subproduk/aksi_subproduk.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Input subproduk Baru</h1>
                    </div>    
					   <div class='row-form clearfix'>
                            <div class='span3'>Nama Produk</div>
                            <div class='span9'>
							<select name='produk' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih Produk -</option>";
										$tampil=mysql_query("SELECT * FROM produk ORDER BY id_produk");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[id_produk]>$r[nama_produk]</option>";
										}                               
                       echo"</select>
							</div>
                        </div>
						
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Gambar</div>
                            <div class='span9'> <input type='file' name='fupload'>
							<br>
							*) Gambar harus dalam format jpg
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