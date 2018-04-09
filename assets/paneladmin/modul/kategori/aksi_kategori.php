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

// Hapus Kategori
if ($act=='hapus'){
  mysql_query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");
  header('location:../../index.php?p=kategori');
}

// Input kategori
elseif ($act=='input'){
  $kategori_seo = seo_title($_POST['nama_kategori']);
  mysql_query("INSERT INTO kategori(nama_kategori,kategori_seo) VALUES('$_POST[nama_kategori]','$kategori_seo')");
  header('location:../../index.php?p=kategori');
}

// Update kategori
elseif ($act=='update'){
  $kategori_seo = seo_title($_POST['nama_kategori']);
  mysql_query("UPDATE kategori SET nama_kategori = '$_POST[nama_kategori]', kategori_seo='$kategori_seo' WHERE id_kategori = '$_POST[id]'");
  header('location:../../index.php?p=kategori');
}
}
?>
