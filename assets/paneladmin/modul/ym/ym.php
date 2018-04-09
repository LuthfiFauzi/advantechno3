<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/ym/aksi_ym.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=ym&aksi=tambah' role='button' class='btn'>Input YM Baru</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data ym</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='3%'><input type='checkbox' name='checkbox'/></th>
                                    <th width='23%'>Nama</th>
                                    <th width='23%'>User Name</th>
									<th width='23%'>Status</th>
                                    <th width='23%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query("SELECT * FROM ym ORDER BY id ASC");
							while($r=mysql_fetch_array($tp)){
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[nama]</td>
                                    <td>$r[username]</td>
									<td>[status]</td>
                                    <td><a href='?p=ym&aksi=edit&id=$r[id]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[id]'>HAPUS</td>
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
	$edit = mysql_query("SELECT * FROM ym WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/ym/aksi_ym.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Edit Customer Online</h1>
                    </div>    
					<input type=hidden name=id value=$r[id]>
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama</div>
                            <div class='span9'><input type='text' name='nama' value='$r[nama]'/></div>
                      </div>
						
					 <div class='row-form clearfix'>
                            <div class='span3'>User Name</div>
                            <div class='span9'><input type='text' name='username' value='$r[username]'/></div>
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
echo "<form method='post' action='modul/ym/aksi_ym.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Input ym Baru</h1>
                    </div>    
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama</div>
                            <div class='span9'><input type='text' name='nama'/></div>
                     </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>User Name</div>
                            <div class='span9'><input type='text' name='username'/></div>
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