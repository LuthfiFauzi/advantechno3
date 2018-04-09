<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/kategori/aksi_kategori.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=kategori&aksi=tambah' role='button' class='btn'>Input Kategori Baru</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Kategori</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='3%'><input type='checkbox' name='checkbox'/></th>
                                    <th width='5%'>No</th>
                                    <th width='45%'>Nama Kategori</th>
                                    <th width='25%'>Kategori SEO</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM kategori ORDER BY id_kategori ASC');
							$no=1;
							while($r=mysql_fetch_array($tp)){
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$no</td>
                                    <td>$r[nama_kategori]</td>
                                    <td>$r[kategori_seo]</td>
                                    <td><a href='?p=kategori&aksi=edit&id=$r[id_kategori]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[id_kategori]'>HAPUS</td>
                                    
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
	$edit = mysql_query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/kategori/aksi_kategori.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Edit Kategori</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_kategori]>
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama kategori</div>
                            <div class='span9'><input type='text' name='nama_kategori' value='$r[nama_kategori]'/></div>
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
echo "<form method='post' action='modul/kategori/aksi_kategori.php?act=input' enctype='multipart/form-data'>";
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
                            <div class='span3'>Nama kategori</div>
                            <div class='span9'><input type='text' name='nama_kategori'/></div>
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