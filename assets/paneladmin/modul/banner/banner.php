<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/banner/aksi_banner.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=banner&aksi=tambah' role='button' class='btn'>Input banner Baru</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data banner</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='20%'>Judul</th>
                                    <th width='20%'URL</th>
									<th width='20%'>Tgl Posting</th>
                                    <th width='20%'>Gambar</th>
                                    <th width='20%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$banner=mysql_query('SELECT * FROM banner ORDER BY id_banner ASC');
							while($r=mysql_fetch_array($banner)){
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[judul]</td>
                                    <td>$r[url]</td>
									<td>$r[tgl_posting]</td>
                                    <td valign='top'><img src=../foto_banner/$r[gambar] width=50 height=20></td>
                                    <td><a href='?p=banner&aksi=edit&id=$r[id_banner]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[id_banner]&namafile=$r[gambar]'>HAPUS</td>
                                    
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
	$edit = mysql_query("SELECT * FROM banner WHERE id_banner='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/banner/aksi_banner.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Edit banner</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_banner]>
                      <div class='row-form clearfix'>
                            <div class='span3'>Judul</div>
                            <div class='span9'><input type='text' name='judul' value='$r[judul]'/></div>
                        </div>
						 
					 <div class='row-form clearfix'>
                            <div class='span3'>URL</div>
                            <div class='span9'><input type='text' name='url'  value='$r[url]'/></div>
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
break;

case "tambah":
echo "<form method='post' action='modul/banner/aksi_banner.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Input banner Baru</h1>
                    </div>    
                      <div class='row-form clearfix'>
                            <div class='span3'>Judul</div>
                            <div class='span9'><input type='text' name='judul'/></div>
                        </div>
						 
					 <div class='row-form clearfix'>
                            <div class='span3'>URL</div>
                            <div class='span9'><input type='text' name='url'/></div>
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
break;
			}//penutup switch
}//penutup session
?>    
</body>
</html>