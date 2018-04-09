<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$act=$_GET[act];

// Hapus ym
if ($act=='hapus'){
  mysql_query("DELETE FROM ym WHERE id='$_GET[id]'");
  header('location:../../index.php?p=ym');
}

// Input ym
elseif ($act=='input'){
  $ym_seo = seo_title($_POST['nama_ym']);
  mysql_query("INSERT INTO ym(nama,username) VALUES('$_POST[nama]','$_POST[username]')");
  header('location:../../index.php?p=ym');
}

// Update ym
elseif ($act=='update'){
  $ym_seo = seo_title($_POST['nama_ym']);
  mysql_query("UPDATE ym SET nama = '$_POST[nama]', username='$_POST[username]' WHERE id = '$_POST[id]'");
  header('location:../../index.php?p=ym');
}
}
?>
