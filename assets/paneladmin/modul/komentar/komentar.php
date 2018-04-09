<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/komentar/aksi_komentar.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Komentar</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='25%'>Nama Komentar</th>
                                    <th width='25%'>URL</th>
									<th width='25%'>Aktif</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM komentar ORDER BY id_komentar ASC');
							while($r=mysql_fetch_array($tp)){
							$tgl=tgl_indo($r[tgl]);
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[nama_komentar]</td>
                                    <td>$r[url]</td>
									<td>$r[aktif]</td>
                                    <td><a href='?p=komentar&aksi=detail&id=$r[id_komentar]'>Detail | <a>
										<a href='$aksi?act=hapus&id=$r[id_komentar]'>Hapus<a></td>
                                    
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
case "detail":
	$edit = mysql_query("SELECT * FROM komentar WHERE id_komentar='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	$tgl=tgl_indo($r[tgl]);
echo "<form method='post' action='modul/komentar/aksi_komentar.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Komentar</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_komentar]>
                      
					  <div class='row-form clearfix'>
                            <div class='span3'>Nama Komentar</div>
                            <div class='span9'><input type='text' name='nama_komentar' value='$r[nama_komentar]' readonly/></div>
                      </div>
					
					  <div class='row-form clearfix'>
                            <div class='span3'>URL</div>
                            <div class='span9'><input type='text' name='nama_komentar' value='$r[url]' readonly/></div>
                      </div>

					   <div class='row-form clearfix'>
                            <div class='span3'>Isi Komentar</div>
                            <div class='span9'><textarea name='isi_komentar' readonly>$r[isi_komentar]</textarea></div>
                        </div>
                      
					   <div class='row-form clearfix'>
                            <div class='span3'>Waktu Komentar</div>
                            <div class='span9'><input type='text' name='nama_komentar' value='$tgl - $r[jam_komentar]' readonly/></div>
                        </div>";
						
						if ($r[aktif]=='Y')
						{
					echo"<div class='row-form clearfix'>
                            <div class='span3'>Aktif</div>
                            <div class='span9'><input type='radio' name='aktif' value='Y' checked/>Aktif <input type='radio' name='aktif' value='N'/>Tidak Aktif
							
							</div>
                        </div>";
						}
						else
						{
						echo"<div class='row-form clearfix'>
                            <div class='span3'>Aktif</div>
                            <div class='span9'><input type='radio' name='aktif' value='Y'/>Aktif <input type='radio' name='aktif' value='N'  checked/>Tidak Aktif
							
							</div>
                        </div>";	
						}
						 
                echo"</div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'>
		  </form>
		</div>
<div class='dr'><span></span></div>";
break;

		}//penutup switch
}//penutup session
?>    
</body>
</html>