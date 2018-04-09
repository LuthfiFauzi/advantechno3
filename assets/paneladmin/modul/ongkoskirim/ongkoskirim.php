<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/ongkoskirim/aksi_ongkoskirim.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=ongkoskirim&aksi=tambah' role='button' class='btn'>Input Ongkos Kirim Baru</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Ongkos Kirim</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='25%'>Nama Kota</th>
                                    <th width='25%'>Nama Perusahaan</th>
                                    <th width='25%'>Ongkos Kirim</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							  $tampil=mysql_query("SELECT * FROM kota ORDER BY id_kota DESC");
							  while ($r=mysql_fetch_array($tampil)){
       						  $ongkos = format_rupiah($r[ongkos_kirim]);
                              echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>";
							  $perusahaan=mysql_query("SELECT * FROM shop_pengiriman WHERE id_perusahaan='$r[id_perusahaan]'");
							  $p=mysql_fetch_array($perusahaan);
                              echo "<td>$r[nama_kota]</td>
                                    <td>$p[nama_perusahaan]</td>
                                    <td>$ongkos</td>
                                    <td><a href='?p=ongkoskirim&aksi=edit&id=$r[id_kota]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[id_kota]'>HAPUS</td>
                                    
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
	$edit = mysql_query("SELECT * FROM kota WHERE id_kota='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/ongkoskirim/aksi_ongkoskirim.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Edit Ongkos Kirim</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_kota]>
                       <div class='row-form clearfix'>
                            <div class='span3'>Nama Kota</div>
                            <div class='span9'><input type='text' name='nama_kota' value='$r[nama_kota]'/></div>
                        </div>
						
						<div class='row-form clearfix'>
                            <div class='span3'>Nama Perusahaan</div>
                            <div class='span9'>
							 <select name='perusahaan'>
								<option value=$r[id_perusahaan] selected='selected'>$r[nama_perusahaan]</option>";
								$tampil=mysql_query("SELECT * FROM shop_pengiriman ORDER BY nama_perusahaan");
								while($r2=mysql_fetch_array($tampil)){
									echo "<option value=$r2[id_perusahaan]>$r2[nama_perusahaan]</option>";
								}
					     echo"</select>
							</div>
                        </div> 
						
						 <div class='row-form clearfix'>
                            <div class='span3'>Ongkos Kirim</div>
                            <div class='span9'><input type='text' name='ongkos_kirim' value='$r[ongkos_kirim]'/></div>
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
echo "<form method='post' action='modul/ongkoskirim/aksi_ongkoskirim.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Input kategori Baru</h1>
                    </div>    
                      <div class='row-form clearfix'>
                           <div class='span3'>Nama Kota</div>
                            <div class='span9'><input type='text' name='nama_kota'/></div>
                        </div>
						
						<div class='row-form clearfix'>
                            <div class='span3'>Nama Perusahaan</div>
                            <div class='span9'>
							 <select name='perusahaan'>
								<option value='' selected='selected'>--Pilih Jasa Pengiriman---</option>";
								$tampil=mysql_query("SELECT * FROM shop_pengiriman ORDER BY nama_perusahaan");
								while($r2=mysql_fetch_array($tampil)){
									echo "<option value=$r2[id_perusahaan]>$r2[nama_perusahaan]</option>";
								}
					     echo"</select>
							</div>
                        </div> 
						
						 <div class='row-form clearfix'>
                            <div class='span3'>Ongkos Kirim</div>
                            <div class='span9'><input type='text' name='ongkos_kirim' value='$r[ongkos_kirim]'/></div>
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