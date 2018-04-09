<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/jasakirim/aksi_jasakirim.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=jasakirim&aksi=tambah' role='button' class='btn'>Input Jasa Kirim Baru</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data jasakirim</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='25%'>Nama Perusahaan</th>
                                    <th width='25%'>Alias</th>
                                    <th width='25%'>Gambar</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$jasakirim=mysql_query('SELECT * FROM shop_pengiriman ORDER BY id_perusahaan ASC');
							while($r=mysql_fetch_array($jasakirim)){
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[nama_perusahaan]</td>
                                    <td>$r[alias]</td>
                                    <td valign='top'><img src=../foto_banner/$r[gambar] width=80 height=30></td>
                                    <td><a href='?p=jasakirim&aksi=edit&id=$r[id_perusahaan]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[id_perusahaan]&namafile=$r[gambar]'>HAPUS</td>
                                    
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
	$edit = mysql_query("SELECT * FROM shop_pengiriman WHERE id_perusahaan='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/jasakirim/aksi_jasakirim.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Edit jasakirim</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_perusahaan]>
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama Perusahaan</div>
                            <div class='span9'><input type='text' name='nama_perusahaan' value='$r[nama_perusahaan]'/></div>
                        </div>
						 
					 <div class='row-form clearfix'>
                            <div class='span3'>Alias</div>
                            <div class='span9'><input type='text' name='alias'  value='$r[alias]'/></div>
                    </div>
					
					 <div class='row-form clearfix'>
					 	<div class='block gallery clearfix'><img src='../foto_banner/$r[gambar]'></div>
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
echo "<form method='post' action='modul/jasakirim/aksi_jasakirim.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Input jasakirim Baru</h1>
                    </div>    
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama Perusahaan</div>
                            <div class='span9'><input type='text' name='nama_perusahaan'/></div>
                        </div>
						 
					 <div class='row-form clearfix'>
                            <div class='span3'>Alias</div>
                            <div class='span9'><input type='text' name='alias'/></div>
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