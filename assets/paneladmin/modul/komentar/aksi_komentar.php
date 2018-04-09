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

// Hapus Komentar
if ($act=='hapus'){
  mysql_query("DELETE FROM komentar WHERE id_komentar='$_GET[id]'");
  header('location:../../index.php?p=komentar');
}

// Update komentar
elseif ($act=='update'){
  mysql_query("UPDATE komentar SET aktif='$_POST[aktif]' WHERE id_komentar='$_POST[id]'");
  header('location:../../index.php?p=komentar');
}
}
?>
