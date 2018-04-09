<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/bank/aksi_bank.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=bank&aksi=tambah' role='button' class='btn'>Input Bank Baru</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Bank</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='20%'>Nama Bank</th>
                                    <th width='20%'>No Rekening</th>
									<th width='20%'>Pemilik</th>
                                    <th width='20%'>Gambar</th>
                                    <th width='20%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$bank=mysql_query('SELECT * FROM bank ORDER BY id_bank ASC');
							while($r=mysql_fetch_array($bank)){
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[nama_bank]</td>
                                    <td>$r[no_rekening]</td>
									<td>$r[pemilik]</td>
                                    <td valign='top'><img src=../foto_banner/$r[gambar] width=50 height=20></td>
                                    <td><a href='?p=bank&aksi=edit&id=$r[id_bank]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[id_bank]&namafile=$r[gambar]'>HAPUS</td>
                                    
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
	$edit = mysql_query("SELECT * FROM bank WHERE id_bank='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/bank/aksi_bank.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Edit bank</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_bank]>
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama Bank</div>
                            <div class='span9'><input type='text' name='nama_bank' value='$r[nama_bank]'/></div>
                        </div>
						 
					 <div class='row-form clearfix'>
                            <div class='span3'>No Rekening</div>
                            <div class='span9'><input type='text' name='no_rekening'  value='$r[no_rekening]'/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Pemilik</div>
                            <div class='span9'><input type='text' name='pemilik'  value='$r[pemilik]'/></div>
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
echo "<form method='post' action='modul/bank/aksi_bank.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Input bank Baru</h1>
                    </div>    
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama Bank</div>
                            <div class='span9'><input type='text' name='nama_bank'/></div>
                        </div>
						 
					 <div class='row-form clearfix'>
                            <div class='span3'>No Rekening</div>
                            <div class='span9'><input type='text' name='no_rekening'/></div>
                    </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Nama Pemilik</div>
                            <div class='span9'><input type='text' name='pemilik'/></div>
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